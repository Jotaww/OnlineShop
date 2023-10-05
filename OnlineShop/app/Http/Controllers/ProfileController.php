<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Jogo;
use App\Models\JogoUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $user = User::findOrFail(auth()->user()->id);
        
        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $requestImage = $request->photo;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('image/jogos'), $imageName);
            $user->photo = $imageName;
            $user->save();
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return redirect('/account/details');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function signInwithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackToGoogle()
    {
        try {
     
            $user = Socialite::driver('google')->user();
      
            $finduser = User::where('gauth_id', $user->id)->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect('/dashboard');
      
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'gauth_id'=> $user->id,
                    'gauth_type'=> 'google',
                    'password' => encrypt('admin@123')
                ]);
     
                Auth::login($newUser);
      
                return redirect('/dashboard');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function viewProfile(Request $request) {

        $carrinho = $request->session()->get('carrinho', []);
        $countCart = Count($carrinho);

        return view('site.profile', ['user' => $request->user(), 'countCart' => $countCart]);

    }

    public function viewRequests(Request $request) {

        $carrinho = $request->session()->get('carrinho', []);
        $countCart = Count($carrinho);

        return view('site.requests', ['user' => $request->user(), 'countCart' => $countCart]);

    }

    public function viewWishlist(Request $request) {

        $id = auth()->user()->id;
        $jogo = Jogo::findOrFail($id);
        $user = auth()->user();
        $userFavs = $user->favAsParticipant->toArray();
        $carrinho = $request->session()->get('carrinho', []);
        $countCart = Count($carrinho);

        return view('site.wishlist', ['user' => $request->user(), 'userFavs' => $userFavs, 'countCart' => $countCart]);

    }

    public function favGame($id) {

        $user = auth()->user();
        
        $user->favAsParticipant()->attach($id);

        $jogo = Jogo::findOrFail($id);

        return back();

    }

    public function disfavorGame($id) {

        $user = auth()->user();

        $user->favAsParticipant()->detach($id);

        $jogo = Jogo::findOrFail($id);

        return back();

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\GameSection;
use App\Models\Genero;
use App\Models\Highlight;
use App\Models\Jogo;
use Illuminate\Http\Request;

class AdminController extends Controller {
    
    public function viewAdmin() {

        return view('admin.adminView');

    }

    public function viewGameList() {

        $jogos = Jogo::all();

        return view('admin.Games.listaJogo', [
            'jogos' => $jogos
        ]);

    }
    
    public function viewCreateGame() {

        $genders = Genero::all();

        return view('admin.Games.createGame', ['genders' => $genders]);

    }

    public function createGame(Request $request) {

        $jogo = new Jogo;
        $jogo->producer = $request->producer;
        $jogo->name = $request->name;
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('image/jogos'), $imageName);
            $jogo->image = $imageName;
        }
        $jogo->platform = $request->platform;
        $jogo->launch = $request->launch;
        $jogo->price = $request->price;
        $jogo->discount = $request->discount;
        $jogo->about = $request->about;
        $priceDiscount = $request->price - ($request->price / 100 * $request->discount);
        $priceDiscount = number_format($priceDiscount, 2, '.', '');
        $jogo->priceDiscount = $priceDiscount;
        $jogo->category = $request->category;
        $jogo->modoJogo = $request->modoJogo;
        $jogo->reqMinimos = $request->reqMinimos;
        $jogo->reqRecomendados = $request->reqRecomendados;

        $jogo->save();

        return redirect('/admin/game/list');

    }

    public function viewEditGame($id) {

        $jogo = Jogo::findOrFail($id);
        $genders = Genero::all();

        $arrayPlatform = array();
        foreach ($jogo->platform as $platform) {
            array_push($arrayPlatform, $platform);
        }
        $arrayCategory = array();
        foreach ($jogo->category as $category) {
            array_push($arrayCategory, $category);
        }
        $arrayModoJogo = array();
        foreach ($jogo->modoJogo as $modoJogo) {
            array_push($arrayModoJogo, $modoJogo);
        }
        $arrayReqMinimos = array();
        foreach ($jogo->reqMinimos as $reqMinimos) {
            array_push($arrayReqMinimos, $reqMinimos);
        }
        $arrayReqRecomendados = array();
        foreach ($jogo->reqRecomendados as $reqRecomendados) {
            array_push($arrayReqRecomendados, $reqRecomendados);
        }

        return view('admin.Games.editGame', [
            'jogo' => $jogo,
            'genders' => $genders,
            'arrayPlatform' => $arrayPlatform,
            'arrayCategory' => $arrayCategory,
            'arrayModoJogo' => $arrayModoJogo,
            'arrayReqMinimos' => $arrayReqMinimos,
            'arrayReqRecomendados' => $arrayReqRecomendados,
        ]);

    }

    public function editGame(Request $request, $id) {

        $jogo = Jogo::findOrFail($id);
        $jogo->producer = $request->producer;
        $jogo->name = $request->name;
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('image/jogos'), $imageName);
            $jogo->image = $imageName;
        }
        $jogo->platform = $request->platform;
        $jogo->launch = $request->launch;
        $jogo->price = $request->price;
        $jogo->discount = $request->discount;
        $jogo->about = $request->about;
        $priceDiscount = $request->price - ($request->price / 100 * $request->discount);
        $priceDiscount = number_format($priceDiscount, 2, '.', '');
        $jogo->priceDiscount = $priceDiscount;
        $jogo->category = $request->category;
        $jogo->modoJogo = $request->modoJogo;
        $jogo->reqMinimos = $request->reqMinimos;
        $jogo->reqRecomendados = $request->reqRecomendados;

        $jogo->save();

        return redirect('/admin/game/list');

    }

    public function deleteGame($id) {

        $game = Jogo::findOrFail($id)->delete();

        return redirect('/admin/game/list');

    }

    public function viewListCarousel() {

        $carousels = Carousel::all();

        return view('admin.Carousel.carousel', [
            'carousels' => $carousels
        ]);

    }

    public function viewCreateCarousel() {

        return view('admin.Carousel.createCarousel');

    }

    public function createCarousel(Request $request) {

        $carousel = new Carousel;

        $carousel->name = $request->name;
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('image/jogos'), $imageName);
            $carousel->image = $imageName;
        }
        $carousel->idGame = $request->idGame;
        $carousel->price = $request->price;
        $carousel->discount = $request->discount;
        $priceDiscount = $request->price - ($request->price / 100 * $request->discount);
        $priceDiscount = number_format($priceDiscount, 2, '.', '');
        $carousel->priceDiscount = $priceDiscount;

        $carousel->save();

        return redirect('/admin/list/carousel');

    }

    public function viewEditCarousel($id) {

        $carousel = Carousel::findOrFail($id);

        return view('admin.Carousel.editCarousel', ['carousel' => $carousel]);

    }

    public function editCarousel(Request $request, $id) {

        $carousel = Carousel::findOrFail($id);

        $carousel->name = $request->name;
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('image/jogos'), $imageName);
            $carousel->image = $imageName;
        }
        $carousel->idGame = $request->idGame;
        $carousel->price = $request->price;
        $carousel->discount = $request->discount;
        $priceDiscount = $request->price - ($request->price / 100 * $request->discount);
        $priceDiscount = number_format($priceDiscount, 2, '.', '');
        $carousel->priceDiscount = $priceDiscount;

        $carousel->save();

        return redirect('/admin/list/carousel');

    }

    public function deleteCarousel($id) {

        $carousel = Carousel::findOrFail($id)->delete();

        return redirect('/admin/list/carousel');

    }

    public function viewGenderList() {

        $genders = Genero::all();

        return view('admin.genderList', [
            'genders' => $genders
        ]);

    }

    public function createGender(Request $request) {

        $gender = new Genero;
        $gender->name = $request->name;
        $gender->save();

        return redirect('/admin/gender/list');

    }

    public function deleteGender($id) {

        $gender = Genero::findOrFail($id)->delete();

        return redirect('/admin/gender/list');

    }

    public function viewGameHighlight(Request $request) {

        $highlights = Highlight::all();

        return view('admin.highlights', [
            'highlights' => $highlights
        ]);

    }

    public function createHighlight (Request $request) {

        $highlight = new Highlight;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('image/jogos'), $imageName);
            $highlight->image = $imageName;
        }
        $highlight->price = $request->price;
        $highlight->discount = $request->discount;
        $priceDiscount = $request->price - ($request->price / 100 * $request->discount);
        $priceDiscount = number_format($priceDiscount, 2, '.', '');
        $highlight->priceDiscount = $priceDiscount;
        $highlight->idGame = $request->idGame;
        $highlight->save();

        return redirect('/admin/highlight/list');

    }

    public function deleteHighlight($id) {

        $highlight = Highlight::findOrFail($id)->delete();

        return redirect('/admin/highlight/list');

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Carrossel;
use App\Models\GameSection;
use App\Models\Genero;
use App\Models\Highlight;
use App\Models\Jogo;
use Illuminate\Http\Request;

class LojaController extends Controller {
    
    public function viewHome(Request $request) {

        $carousels = Carousel::all();
        $arrayCarrossel = array();
        foreach ($carousels as $carousel) {
            array_push($arrayCarrossel, $carousel);
        }

        $bethesdaJogos = Jogo::where('producer','Bethesda')->limit(5)->get();
        $nintendoJogos = Jogo::where('producer','Nintendo')->limit(5)->get();
        $discountBethesda = Jogo::where('producer','Bethesda')->max('discount');
        $discountNintendo = Jogo::where('producer','Nintendo')->max('discount');
        $orderByPrices = Jogo::orderByRaw('CAST(priceDiscount AS DECIMAL(10, 2))')->limit(5)->get();
        $orderByDiscounts = Jogo::orderBy('discount', 'desc')->limit(5)->get();
        $bestDiscount = Jogo::max('discount');

        $jogos = Jogo::all();
        $user = auth()->user();
        $arrayTrue = array();
        if($user) {
            $userEvents = $user->favAsParticipant->toArray();
            foreach($userEvents as $userEvent) {
                foreach ($jogos as $jogo) {
                    if($userEvent['id'] == $jogo->id) {
                        array_push($arrayTrue, $jogo->id);
                    }
                }
            }
        }

        $count = Highlight::count();
        $random = rand(1, $count);
        $highlight = Highlight::inRandomOrder()->first();

        $carrinho = $request->session()->get('carrinho', []);
        $countCart = Count($carrinho);

        return view('site.home', [
            'carousel' => $arrayCarrossel,
            'bethesdaJogos' => $bethesdaJogos,
            'nintendoJogos' => $nintendoJogos,
            'discountNintendo' => $discountNintendo,
            'discountBethesda' => $discountBethesda,
            'orderByPrices' => $orderByPrices,
            'orderByDiscounts' => $orderByDiscounts,
            'bestDiscount' => $bestDiscount,
            'arrayTrue' => $arrayTrue,
            'highlight' => $highlight,
            'countCart' => $countCart
        ]);
        
    }

    public function viewGame(Request $request, $id) {

        $jogo = Jogo::findOrFail($id);
        $generos = Genero::all();
        $carrinho = $request->session()->get('carrinho', []);
        $countCart = Count($carrinho);

        return view('site.game', [
            'countCart' => $countCart,
            'jogo' => $jogo,
            'generos' => $generos,
        ]);

    }

    public function viewCatalog(Request $request) {

        $query = Jogo::query();
        $generos = Genero::all();

        $name = $request->input('name');
        $order = $request->input('order');
        $platform = $request->input('platform');
        $category = $request->input('category');
        $price = $request->input('price');
        $mode = $request->input('mode');
        $filterName = $request->except('name');
        $filterOrder = $request->except('order');
        $filterPlatform = $request->except('platform');
        $filterCategory = $request->except('category');
        $filterPrice = $request->except('price');
        $filterMode = $request->except('mode');

        if ($request->has('name')) {
            $query->where('name', 'like', "%$request->name%");
        }
        if ($request->has('mode')) {
            $query->whereJsonContains('modoJogo', "$request->mode");
        }
        if ($request->has('order')) {
            if($request->order == 1) {
                $query->orderBy('created_at', 'desc');
            }
            if($request->order == 2) {
                $query->orderBy('created_at', 'desc');
            }
            if($request->order == 3) {
                $query->orderBy('name', 'asc');
            }
            if($request->order == 4) {
                $query->orderBy('launch', 'desc');
            }
            if($request->order == 5) {
                $query->orderByRaw('CAST(priceDiscount AS DECIMAL(10, 2))');
            }
            if($request->order == 6) {
                $query->orderBy('discount', 'desc');
            }
        }
        if ($request->has('platform')) {
            $query->whereJsonContains('platform', "$request->platform");
        }
        if ($request->has('category')) {
            $query->whereJsonContains('category', "$request->category");
        }
        if ($request->has('price')) {
            if($request->price == 5) {
                $query->where('priceDiscount', '<', 5);
            }
            if($request->price == 10) {
                $query->where('priceDiscount', '<', 10);
            }
            if($request->price == 15) {
                $query->where('priceDiscount', '<', 15);
            }
            if($request->price == 20) {
                $query->where('priceDiscount', '<', 20);
            }
            if($request->price == 25) {
                $query->where('priceDiscount', '<', 25);
            }
            if($request->price == 50) {
                $query->where('priceDiscount', '<', 50);
            }
            if($request->price == 100) {
                $query->where('priceDiscount', '<', 100);
            }
            if($request->price == 'oferta') {
                $query->where('discount', '>', 0);
            }
        }

        $jogos = $query->paginate(16);

        $count = $query->count();

        $carrinho = $request->session()->get('carrinho', []);
        $countCart = Count($carrinho);

        $user = auth()->user();
        $arrayTrue = array();
        if($user) {
            $userEvents = $user->favAsParticipant->toArray();
            foreach($userEvents as $userEvent) {
                foreach ($jogos as $jogo) {
                    if($userEvent['id'] == $jogo->id) {
                        array_push($arrayTrue, $jogo->id);
                    }
                }
            }
        }

        return view('site.catalog', compact('jogos', 'order','name','platform','category','price'), [
            'count' => $count,
            'filterName' => $filterName,
            'filterOrder' => $filterOrder,
            'filterPlatform' => $filterPlatform,
            'filterCategory' => $filterCategory,
            'filterPrice' => $filterPrice,
            'filterMode' => $filterMode,
            'generos' => $generos,
            'countCart' => $countCart,
            'arrayTrue' => $arrayTrue
        ]);

    }

    public function viewCart(Request $request) {

        $carrinho = $request->session()->get('carrinho', []);
        
        $totalDiscount = 0;
        $total = 0;
        foreach ($carrinho as $produtoId => $item) {
            $totalDiscount += $item['produto']->priceDiscount;
            $total += $item['produto']->price;
        }
        $discount = $total - $totalDiscount;
        $countCart = Count($carrinho);

        return view('site.cart', [
            'carrinho' => $carrinho,
            'totalDiscount' => $totalDiscount,
            'discount' => $discount,
            'countCart' => $countCart,
        ]);

    }

    public function addToCart(Request $request)
    {
        $produtoId = $request->input('produto_id');

        $produto = Jogo::find($produtoId);

        $carrinho = $request->session()->get('carrinho', []);
        if (isset($carrinho[$produtoId])) {
            return redirect()->back();
            
        } else {
            $carrinho[$produtoId] = [
                'produto' => $produto,
            ];
        }

        $request->session()->put('carrinho', $carrinho);

        return redirect()->back();
    }

    public function removeToCart (Request $request)
    {
        $produtoId = $request->input('produto_id');

        $carrinho = $request->session()->get('carrinho', []);
        if (isset($carrinho[$produtoId])) {
            unset($carrinho[$produtoId]);
            $request->session()->put('carrinho', $carrinho);
        }

        return redirect('/cart');
    }

}

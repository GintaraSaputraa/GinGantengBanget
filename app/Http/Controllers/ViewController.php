<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ViewController extends Controller
{
    public function Index()
    {
        return view('index');
    }
    public function Checkout($price, $item)
    {
        return view('checkout', ['price' => $price, 'item' => $item]);
    }
    public function HeroML()
    {
        return view('HeroML');
    }
    public function CheckHeroML(Request $request)
    {
        $heroName = $request->input('heroName');

        $response = Http::get('https://api.dazelpro.com/mobile-legends/hero', ['heroName' => $heroName]);

        return response()->json($response->json());
    }
}

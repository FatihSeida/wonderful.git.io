<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisata;

class PagesController extends Controller
{
	public function admin() {
		return view('admin.dashboard');
	}

    public function home() {
        $favourites = Wisata::orderBy('like', 'desc')->where('like', '!=', null)->limit(10)->get();
        $wisatas = Wisata::whereNotIn('id', $favourites->pluck('id'))->get();

    	return view('pages.home', compact('wisatas', 'favourites'));
    }

    public function showWisata($slugWisata) {
    	$wisata = Wisata::where('slug', $slugWisata)->first();

    	return view('wisata.show', compact('wisata'));
    }
}

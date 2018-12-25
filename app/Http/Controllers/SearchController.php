<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisata;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$keyword = $request->get('q'); 
    	
    	if ($keyword) {
    		$wisatas = Wisata::search($keyword)->orderBy('id', 'DESC')->paginate(5);
    	}else{
    		$wisatas = Wisata::paginate(5);
    	}

    	return view('pages.search', compact('wisatas'));
    }
}

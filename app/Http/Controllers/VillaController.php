<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisata;
use App\Villa;

class VillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $wisata = Wisata::where('id', $id)->first();

        return view('admin.villa.index', compact('wisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $wisata = Wisata::where('id', $id)->first();

        return view('admin.villa.create', compact('wisata'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $input = $request->all();

        if(isset($input['slug'])) {
            $slug = $input['slug'];
        }else{
            $slug = str_slug($input['name'], '-');
        }

        if(isset($input['thumbnail'])) {
            $thumbnail = str_random().'-'.$input['thumbnail']->getClientOriginalName();
            $input['thumbnail']->move(public_path("/images/villa/"), $thumbnail);
        }else{
            $thumbnail = null;
        }
        if(isset($input['photo1'])) {
            $photo1 = str_random().'-'.$input['photo1']->getClientOriginalName();
            $input['photo1']->move(public_path("/images/villa/"), $photo1);
        }else{
            $photo1 = null;
        }
        if(isset($input['photo2'])) {
            $photo2 = str_random().'-'.$input['photo2']->getClientOriginalName();
            $input['photo2']->move(public_path("/images/villa/"), $photo2);
        }else{
            $photo2 = null;
        }
        if(isset($input['photo3'])) {
            $photo3 = str_random().'-'.$input['photo3']->getClientOriginalName();
            $input['photo3']->move(public_path("/images/villa/"), $photo3);
        }else{
            $photo3 = null;
        }

        $wisata = Wisata::where('id', $id)->first();

        $wisata->villa()->create([
            'name' => $input['name'],
            'desc' => $input['desc'],
            'price' => $input['price'],
            'address' => $input['address'],
            'hp' => $input['hp'],
            'slug' => $slug,
            'lat' => $input['lat'],
            'long' => $input['long'],
            'thumbnail' => $thumbnail,
            'photo1' => $photo1,
            'photo2' => $photo2,
            'photo3' => $photo3,
        ]);

        return redirect('/admin/'.$wisata->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

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
    public function edit($idWisata, $idVilla)
    {
        $villa = Villa::where('id', $idVilla)->first();

        return view('admin.villa.edit', compact('villa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idWisata, $idVilla)
    {
        $input = $request->all();

        $villa = Villa::where('id', $idVilla)->first();

        if(isset($input['slug'])) {
            $slug = $input['slug'];
        }else{
            $slug = str_slug($input['name'], '-');
        }

        $villa->update([
            'name' => $input['name'],
            'desc' => $input['desc'],
            'price' => $input['price'],
            'address' => $input['address'],
            'hp' => $input['hp'],
            'slug' => $slug,
            'lat' => $input['lat'],
            'long' => $input['long'],
        ]);

        if (isset($input['thumbnail'])) {
            $thumbnail = str_random().'-'.$input['thumbnail']->getClientOriginalName();
            if (isset($villa->thumbnail)) {
                unlink(public_path('images/villa/'.$villa->thumbnail));
            }
            $villa->update([
                'thumbnail' => $thumbnail
            ]);
            $input['thumbnail']->move(public_path("images/villa/"), $thumbnail);  
        }
        if (isset($input['photo1'])) {
            $photo1 = str_random().'-'.$input['photo1']->getClientOriginalName();
            if (isset($villa->photo1)) {
                unlink(public_path('images/villa/'.$villa->photo1));
            }
            $villa->update([
                'photo1' => $photo1
            ]);
            $input['photo1']->move(public_path("images/villa/"), $photo1);  
        }
        if (isset($input['photo2'])) {
            $photo2 = str_random().'-'.$input['photo2']->getClientOriginalName();
            if (isset($villa->photo2)) {
                unlink(public_path('images/villa/'.$villa->photo2));
            }
            $villa->update([
                'photo2' => $photo2
            ]);
            $input['photo2']->move(public_path("images/villa/"), $photo2);  
        }
        if (isset($input['photo3'])) {
            $photo3 = str_random().'-'.$input['photo3']->getClientOriginalName();
            if (isset($villa->photo3)) {
                unlink(public_path('images/villa/'.$villa->photo3));
            }
            $villa->update([
                'photo3' => $photo3
            ]);
            $input['photo3']->move(public_path("images/villa/"), $photo3);  
        }

        return redirect('admin/'.$villa->wisata->id);
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

    public function rating(Request $request, $id) {
        $input = $request->all();

        $villa = Villa::where('id', $id)->first();
        if(isset($input['like'])) {
            $likes = $villa->like + 1;

            $villa->update([
                'like' => $likes
            ]);
        }else{
            $dislike = $villa->dislike + 1;

            $villa->update([
                'dislike' => $dislike
            ]);
        }

        return back();
    }
}

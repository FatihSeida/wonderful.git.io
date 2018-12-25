<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisata;
use App\Masukan;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisatas = Wisata::all();

        return view('admin.wisata.index', compact('wisatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        if(isset($input['slug'])) {
            $slug = $input['slug'];
        }else{
            $slug = str_slug($input['name'], '-');
        }

        if(isset($input['thumbnail'])) {
            $thumbnail = str_random().'-'.$input['thumbnail']->getClientOriginalName();
            $input['thumbnail']->move(public_path("/images/wisata/"), $thumbnail);
        }else{
            $thumbnail = null;
        }
        if(isset($input['photo1'])) {
            $photo1 = str_random().'-'.$input['photo1']->getClientOriginalName();
            $input['photo1']->move(public_path("/images/wisata/"), $photo1);
        }else{
            $photo1 = null;
        }
        if(isset($input['photo2'])) {
            $photo2 = str_random().'-'.$input['photo2']->getClientOriginalName();
            $input['photo2']->move(public_path("/images/wisata/"), $photo2);
        }else{
            $photo2 = null;
        }
        if(isset($input['photo3'])) {
            $photo3 = str_random().'-'.$input['photo3']->getClientOriginalName();
            $input['photo3']->move(public_path("/images/wisata/"), $photo3);
        }else{
            $photo3 = null;
        }
        if(isset($input['photo4'])) {
            $photo4 = str_random().'-'.$input['photo4']->getClientOriginalName();
            $input['photo4']->move(public_path("/images/wisata/"), $photo4);
        }else{
            $photo4 = null;
        }
        if(isset($input['photo5'])) {
            $photo5 = str_random().'-'.$input['photo5']->getClientOriginalName();
            $input['photo5']->move(public_path("/images/wisata/"), $photo5);
        }else{
            $photo5 = null;
        }
        if(isset($input['photo6'])) {
            $photo6 = str_random().'-'.$input['photo6']->getClientOriginalName();
            $input['photo6']->move(public_path("/images/wisata/"), $photo6);
        }else{
            $photo6 = null;
        }
        if(isset($input['photo7'])) {
            $photo7 = str_random().'-'.$input['photo7']->getClientOriginalName();
            $input['photo7']->move(public_path("/images/wisata/"), $photo7);
        }else{
            $photo7 = null;
        }
        if(isset($input['photo8'])) {
            $photo8 = str_random().'-'.$input['photo8']->getClientOriginalName();
            $input['photo8']->move(public_path("/images/wisata/"), $photo8);
        }else{
            $photo8 = null;
        }
        if(isset($input['photo9'])) {
            $photo9 = str_random().'-'.$input['photo9']->getClientOriginalName();
            $input['photo9']->move(public_path("/images/wisata/"), $photo9);
        }else{
            $photo9 = null;
        }

        Wisata::create([
            'name' => $input['name'],
            'desc' => $input['desc'],
            'slug' => $slug,
            'lat' => $input['lat'],
            'long' => $input['long'],
            'thumbnail' => $thumbnail,
            'photo1' => $photo1,
            'photo2' => $photo2,
            'photo3' => $photo3,
            'photo4' => $photo4,
            'photo5' => $photo5,
            'photo6' => $photo6,
            'photo7' => $photo7,
            'photo8' => $photo8,
            'photo9' => $photo9,
        ]);

        return redirect('/admin/wisata');
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
        $wisata = Wisata::where('id', $id)->first();

        return view('admin.wisata.edit', compact('wisata'));
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
        $input = $request->all();

        $wisata = Wisata::where('id', $id)->first();

        if(isset($input['slug'])) {
            $slug = $input['slug'];
        }else{
            $slug = str_slug($input['name'], '-');
        }

        $wisata->update([
            'name' => $input['name'],
            'desc' => $input['desc'],
            'slug' => $slug,
            'lat' => $input['lat'],
            'long' => $input['long']
        ]);

        if (isset($input['thumbnail'])) {
            $thumbnail = str_random().'-'.$input['thumbnail']->getClientOriginalName();
            if (isset($wisata->thumbnail)) {
                unlink(public_path('images/wisata/'.$wisata->thumbnail));
            }
            $wisata->update([
                'thumbnail' => $thumbnail
            ]);
            $input['thumbnail']->move(public_path("images/wisata/"), $thumbnail);  
        }
        if (isset($input['photo1'])) {
            $photo1 = str_random().'-'.$input['photo1']->getClientOriginalName();
            if (isset($wisata->photo1)) {
                unlink(public_path('images/wisata/'.$wisata->photo1));
            }
            $wisata->update([
                'photo1' => $photo1
            ]);
            $input['photo1']->move(public_path("images/wisata/"), $photo1);  
        }
        if (isset($input['photo2'])) {
            $photo2 = str_random().'-'.$input['photo2']->getClientOriginalName();
            if (isset($wisata->photo2)) {
                unlink(public_path('images/wisata/'.$wisata->photo2));
            }
            $wisata->update([
                'photo2' => $photo2
            ]);
            $input['photo2']->move(public_path("images/wisata/"), $photo2);  
        }
        if (isset($input['photo3'])) {
            $photo3 = str_random().'-'.$input['photo3']->getClientOriginalName();
            if (isset($wisata->photo3)) {
                unlink(public_path('images/wisata/'.$wisata->photo3));
            }
            $wisata->update([
                'photo3' => $photo3
            ]);
            $input['photo3']->move(public_path("images/wisata/"), $photo3);  
        }
        if (isset($input['photo4'])) {
            $photo4 = str_random().'-'.$input['photo4']->getClientOriginalName();
            if (isset($wisata->photo4)) {
                unlink(public_path('images/wisata/'.$wisata->photo4));
            }
            $wisata->update([
                'photo4' => $photo4
            ]);
            $input['photo4']->move(public_path("images/wisata/"), $photo4);  
        }
        if (isset($input['photo5'])) {
            $photo5 = str_random().'-'.$input['photo5']->getClientOriginalName();
            if (isset($wisata->photo5)) {
                unlink(public_path('images/wisata/'.$wisata->photo5));
            }
            $wisata->update([
                'photo5' => $photo5
            ]);
            $input['photo5']->move(public_path("images/wisata/"), $photo5);  
        }
        if (isset($input['photo6'])) {
            $photo6 = str_random().'-'.$input['photo6']->getClientOriginalName();
            if (isset($wisata->photo6)) {
                unlink(public_path('images/wisata/'.$wisata->photo6));
            }
            $wisata->update([
                'photo6' => $photo6
            ]);
            $input['photo6']->move(public_path("images/wisata/"), $photo6);  
        }
        if (isset($input['photo7'])) {
            $photo7 = str_random().'-'.$input['photo7']->getClientOriginalName();
            if (isset($wisata->photo7)) {
                unlink(public_path('images/wisata/'.$wisata->photo7));
            }
            $wisata->update([
                'photo7' => $photo7
            ]);
            $input['photo7']->move(public_path("images/wisata/"), $photo7);  
        }
        if (isset($input['photo8'])) {
            $photo8 = str_random().'-'.$input['photo8']->getClientOriginalName();
            if (isset($wisata->photo8)) {
                unlink(public_path('images/wisata/'.$wisata->photo8));
            }
            $wisata->update([
                'photo8' => $photo8
            ]);
            $input['photo8']->move(public_path("images/wisata/"), $photo8);  
        }
        if (isset($input['photo9'])) {
            $photo9 = str_random().'-'.$input['photo9']->getClientOriginalName();
            if (isset($wisata->photo9)) {
                unlink(public_path('images/wisata/'.$wisata->photo9));
            }
            $wisata->update([
                'photo9' => $photo9
            ]);
            $input['photo9']->move(public_path("images/wisata/"), $photo9);  
        }

        return redirect('admin/wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisata = Wisata::where('id', $id)->first();

        if (isset($wisata->thumbnail)) {
            unlink(public_path('images/wisata/'.$wisata->thumbnail));
        }
        if (isset($wisata->photo1)) {
            unlink(public_path('images/wisata/'.$wisata->photo1));
        }
        if (isset($wisata->photo2)) {
            unlink(public_path('images/wisata/'.$wisata->photo2));
        }
        if (isset($wisata->photo3)) {
            unlink(public_path('images/wisata/'.$wisata->photo3));
        }
        if (isset($wisata->photo4)) {
            unlink(public_path('images/wisata/'.$wisata->photo4));
        }
        if (isset($wisata->photo5)) {
            unlink(public_path('images/wisata/'.$wisata->photo5));
        }
        if (isset($wisata->photo6)) {
            unlink(public_path('images/wisata/'.$wisata->photo6));
        }
        if (isset($wisata->photo7)) {
            unlink(public_path('images/wisata/'.$wisata->photo7));
        }
        if (isset($wisata->photo8)) {
            unlink(public_path('images/wisata/'.$wisata->photo8));
        }
        if (isset($wisata->photo9)) {
            unlink(public_path('images/wisata/'.$wisata->photo9));
        }

        Wisata::destroy($id);

        return back();
    }

    public function rating(Request $request, $id) {
        $input = $request->all();

        $wisata = Wisata::where('id', $id)->first();
        if(isset($input['like'])) {
            $likes = $wisata->like + 1;

            $wisata->update([
                'like' => $likes
            ]);
        }else{
            $dislike = $wisata->dislike + 1;

            $wisata->update([
                'dislike' => $dislike
            ]);
        }

        return back();
    }

    public function masukan(Request $request, $id) {
        $input = $request->all();
        $wisata = Wisata::where('id', $id)->first();

        $wisata->masukan()->create([
            'text' => $input['masukan']
        ]);

        return back();
    }
}

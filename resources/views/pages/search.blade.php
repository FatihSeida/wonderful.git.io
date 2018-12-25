@extends('layouts.app')

@section('content')
<!--Business Section-->
<section id="business" class="business bg-grey roomy-100">
    <div class="container">
    <center><h1>Hasil Pencarian : {{ Request::get('q') }}</h1></center><br><br>
        <div class="row">
            @foreach($wisatas as $key => $wisata)
            <div class="main_business">
                <div class="col-md-4" style="margin-bottom: 50px;">
                    <div class="busness_slid">
                        <div class="business_items text-center">
                            <div class="business_item">
                                <div class="business_img">
                                    <img style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->thumbnail) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8" style="margin-bottom: 50px;">
                    <div class="business_item sm-m-top-50">
                        <h2 class="text-uppercase">{{ $wisata->name }}</h2>
                        <p class="m-top-20" style="text-align: justify;">{!! str_limit(strip_tags($wisata->desc), $limit = 200, $end = '...') !!}</p>

                        <div class="business_btn">
                            <table>
                                <tr><td><a href="{{ url($wisata->slug) }}" class="btn btn-default" style="padding: 10px;">Description</a></td>
                                <td><a href="http://www.google.com/maps/place/{{ $wisata->lat }},{{ $wisata->long }}" target="_blank" class="btn btn-primary" style="padding: 10px;;">Maps</a></td></tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
            {{ $wisatas->links() }}
        </div>
    </div>
</section>
<!-- End off Business section -->
@endsection
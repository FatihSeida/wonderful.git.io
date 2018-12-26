@extends('layouts.app')

@section('content')

@include('partials.carousel')
<!--Business Section-->
<section id="business" class="business bg-grey roomy-100">
    <div class="container">
    <center><h1 style="margin-top: -30px;">Wisata Lainnya</h1></center><br><br>
        <div class="row">
            @foreach($wisatas as $key => $wisata)
            @if($key % 2 != 0) <div class="row"> @endif
            <div class="main_business">
                <div class="col-md-3">
                    <div class="business_slid">
                        <div class="business_items text-center">
                            <div class="business_item">
                                <div class="business_img">
                                    <img style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->thumbnail) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
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
        @if($key % 2 != 0) </div><br> @endif
            @endforeach
        </div>
    </div>
</section>
<!-- End off Business section -->
@endsection

@section('script')
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.7/vue.js'></script>
<script src='https://rawgit.com/Wlada/vue-carousel-3d/master/dist/vue-carousel-3d.min.js'></script>
<script >new Vue({
  el: '#carousel3d',
  data: {
    slides: 8
  },
  components: {
    'carousel-3d': Carousel3d.Carousel3d,
    'slide': Carousel3d.Slide
  }
})
</script>
@endsection
@extends('layouts.app')

@section('content')

<!--Business Section-->
<section id="business" class="business bg-grey roomy-100" style="min-height: 90vh;">
    <div class="container">
        <div class="row">
            <div class="main_business">
                <div class="col-md-6">
                    <div class="business_slid">
                        <div class="slid_shap bg-grey"></div>
                        <div class="business_items text-center">
                        	<div class="business_item">
                                <div class="business_img">
                                	@if(isset($villa->thumbnail))
                                    	<img src="{{ url('images/villa/'.$villa->thumbnail) }}" alt="" style="width: 100vw; height: 50vh;" />
                                	@endif
                                </div>
                            </div>
                        	@for($n=1; $n<4; $n++)
                            <div class="business_item">
                                <div class="business_img">
                                	@if(isset(${'villa'}->{'photo'.$n}))
                                    	<img src="{{ url('images/villa/'.${'villa'}->{'photo'.$n}) }}" alt="" style="width: 100vw; height: 50vh;" />
                                	@endif
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div><br>
                <center>
				<h3>Harga Perhari : {{ $villa->price }}</h3>
				<h4>Kontak : {{ $villa->hp }}</h4>
                    <div id="rating">
                    	@if (Route::has('login')) @auth <form action="{{ url('rating/villa/'.$villa->id) }}" method="POST" id="like">{{ csrf_field() }}<input type="hidden" name="like" value="1"></form>
                        <form action="{{ url('rating/villa/'.$villa->id) }}" method="POST" id="dislike">{{ csrf_field() }}<input type="hidden" name="dislike" value="1"></form>@endauth @endif
                        <button type="submit" form="like" class="like btn btn-success" style="width: 49%; padding: 10px;"><i class="fa fa-thumbs-o-up"></i> Like <span class="likes">{{ $villa->like }}</span></button>
                        <button type="submit" form="dislike" class="dislike btn btn-danger" style="width: 49%; padding: 10px;"><i class="fa fa-thumbs-o-down"></i> Dislike <span class="dislikes">{{ $villa->dislike }}</span></button>
                        <div class="alert alert-danger alert-dismissable" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Maaf, Anda Harus Login Terlebih Dahulu!
                        </div>
                    </div>
				</center>

                </div>
                
                <div class="col-md-6">
                    <div class="business_item sm-m-top-50">
                        <h2 class="text-uppercase">{{ $villa->name }}</h2>
                        <h3>{{ $villa->address }}</h3>
                        <p class="m-top-20">{!! $villa->desc !!}</p>

                        <div class="business_btn">
                            <a href="http://www.google.com/maps/place/{{ $villa->lat }},{{ $villa->long }}" target="_blank" class="btn btn-primary">Maps</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End off Business section -->

@endsection

@section('script')
	<script src="{{ url('assets/js/like-dislike.js') }}"></script>
	<script type="text/javascript">
	    @if (Route::has('login')) @auth 
        $('#rating').likeDislike({
            initialValue: 0,
            reverseMode: true,
            click: function (value, l, d, event) {
                var likes = $(this.element).find('.likes');
                var dislikes = $(this.element).find('.dislikes');

                likes.text(parseInt(likes.text()) + l);
                dislikes.text(parseInt(dislikes.text()) + d);

                // $.ajax({
                //     url: '{{ url("rating/".$wisata->slug) }}',
                //     type: 'POST',
                //     data: 'rating=' + likes,
                // });
            }
        });
        @else 
        $(document).ready(function(){
            $('button').click(function(){
                $('.alert').show()
            }) 
        });
        @endauth @endif
	</script>
@endsection
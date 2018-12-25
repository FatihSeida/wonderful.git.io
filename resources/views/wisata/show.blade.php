@extends('layouts.app')

@section('content')

<!--Business Section-->
<section id="business" class="business bg-grey roomy-100">
    <div class="container">
        <div class="row">
            <div class="main_business">
                <div class="col-md-6">
                    <div class="business_slid">
                        <div class="slid_shap bg-grey"></div>
                        <div class="business_items text-center">
                        	<div class="business_item">
                                <div class="business_img">
                                	@if(isset($wisata->thumbnail))
                                    	<img src="{{ url('images/wisata/'.$wisata->thumbnail) }}" alt="" style="width: 100vw; height: 50vh;" />
                                	@endif
                                </div>
                            </div>
                        	@for($n=1; $n<10; $n++)
                            <div class="business_item">
                                <div class="business_img">
                                	@if(isset(${'wisata'}->{'photo'.$n}))
                                    	<img src="{{ url('images/wisata/'.${'wisata'}->{'photo'.$n}) }}" alt="" style="width: 100vw; height: 50vh;" />
                                	@endif
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div><br>
                <center>
                    <div id="rating">
                    	<form action="{{ url('rating/'.$wisata->id) }}" method="POST" id="like">{{ csrf_field() }}<input type="hidden" name="like" value="1"></form>
                        <form action="{{ url('rating/'.$wisata->id) }}" method="POST" id="dislike">{{ csrf_field() }}<input type="hidden" name="dislike" value="1"></form>
                        <button type="submit" form="like" class="like btn btn-success" style="width: 49%; padding: 10px;"><i class="fa fa-thumbs-o-up"></i> Like <span class="likes">{{ $wisata->like }}</span></button>
                        <button type="submit" form="dislike" class="dislike btn btn-danger" style="width: 49%; padding: 10px;"><i class="fa fa-thumbs-o-down"></i> Dislike <span class="dislikes">{{ $wisata->dislike }}</span></button>
                    </div>
					
					<h2>Penginapan</h2>
					<table class="table table-bordered table-striped">
						@foreach($wisata->villa as $villa)
						<tr>
							<th>{{ $villa->name }}</th>
							<th>{{ $villa->price }}</th>
						</tr>
						@endforeach
					</table>

					<button data-toggle="modal" data-target="#tambahkanVilla" data-backdrop="false" class="btn btn-warning" style="width: 49%;padding: 10px;">
					    Tambahkan Villa
					</button>
					<div class="modal fade" id="tambahkanVilla" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title">Tambahkan Villa</h4>
					      </div>
					      <div class="modal-body">
					        <h2>Untuk Pengiklanan Villa</h2>
					        <h3>Silahkan Menghubungi</h3>
					        <h3>+62 89615266856</h3>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal" form="#form_masukan">Close</button>
					      </div>
					    </div>
					  </div>
					</div>

					<button data-toggle="modal" data-target="#myModal" data-backdrop="false" class="btn btn-warning" style="width: 49%; padding: 10px;">
					    Berikan Masukan
					</button>
					<div class="modal fade" id="myModal" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title">Berikan Masukan</h4>
					      </div>
					      <div class="modal-body">
					        <form action="{{ url('masukan/'.$wisata->id) }}" id="form_masukan" method="POST">
								{{ csrf_field() }}
					        	<textarea name="masukan" class="form-control"></textarea>
					        	
					        </form>
					      </div>
					      <div class="modal-footer">
					        <button type="submit" class="btn btn-primary" form="form_masukan">Kirim</button>
					      </div>
					    </div>
					  </div>
					</div>

				</center>

                </div>
                
                <div class="col-md-6">
                    <div class="business_item sm-m-top-50">
                        <h2 class="text-uppercase">{{ $wisata->name }}</h2>
                        <p class="m-top-20">{!! $wisata->desc !!}</p>

                        <div class="business_btn">
                            <a href="http://www.google.com/maps/place/{{ $wisata->lat }},{{ $wisata->long }}" target="_blank" class="btn btn-primary">Maps</a>
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
	</script>
@endsection
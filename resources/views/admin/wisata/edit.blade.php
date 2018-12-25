@extends('layouts.admin')

@section('styles')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('contents')
	<div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Edit Wisata
                    </h1>
                </div>
                <div class="body">
                    <form action="{{ url('admin/wisata/'.$wisata->id) }}" id="myForm" class="willSubmit" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" form="myForm" value="{{ $wisata->name }}">
                                <label class="form-label">Nama</label>
                            </div>
                        </div>

                        <textarea name="desc" class="form-control my-editor" form="myForm">{{ $wisata->desc }}</textarea>

                        <h3>Lokasi</h3>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="lat" class="form-control" form="myForm" value="{{ $wisata->lat }}">
                                <label class="form-label">Latitude</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="long" class="form-control" form="myForm" value="{{ $wisata->long }}">
                                <label class="form-label">Longitude</label>
                            </div>
                        </div>
						
						<h3>Thumbnail</h3>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group form-float">
                                    @if(isset($wisata->thumbnail))
                                        <br>
                                        <img class="img-responsive" style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->thumbnail) }}">
                                    @endif 
		                            <input type="file" name="thumbnail" class="form-control" form="myForm">
		                        </div>
							</div>
						</div>

						<h3>Photo Tambahan</h3>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group form-float">
                                    @if(isset($wisata->photo1))
                                        <br>
                                        <img class="img-responsive" style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->photo1) }}">
                                    @endif 
		                            <input type="file" name="photo1" class="form-control" form="myForm">
		                        </div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-float">
                                    @if(isset($wisata->photo2))
                                        <br>
                                        <img class="img-responsive" style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->photo2) }}">
                                    @endif 
		                            <input type="file" name="photo2" class="form-control" form="myForm">
		                        </div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-float">
                                    @if(isset($wisata->photo3))
                                        <br>
                                        <img class="img-responsive" style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->photo3) }}">
                                    @endif 
		                            <input type="file" name="photo3" class="form-control" form="myForm">
		                        </div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-float">
                                    @if(isset($wisata->photo4))
                                        <br>
                                        <img class="img-responsive" style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->photo4) }}">
                                    @endif 
		                            <input type="file" name="photo4" class="form-control" form="myForm">
		                        </div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-float">
                                    @if(isset($wisata->photo5))
                                        <br>
                                        <img class="img-responsive" style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->photo5) }}">
                                    @endif 
		                            <input type="file" name="photo5" class="form-control" form="myForm">
		                        </div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-float">
                                    @if(isset($wisata->photo6))
                                        <br>
                                        <img class="img-responsive" style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->photo6) }}">
                                    @endif 
		                            <input type="file" name="photo6" class="form-control" form="myForm">
		                        </div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-float">
                                    @if(isset($wisata->photo7))
                                        <br>
                                        <img class="img-responsive" style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->photo7) }}">
                                    @endif 
		                            <input type="file" name="photo7" class="form-control" form="myForm">
		                        </div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-float">
                                    @if(isset($wisata->photo8))
                                        <br>
                                        <img class="img-responsive" style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->photo8) }}">
                                    @endif 
		                            <input type="file" name="photo8" class="form-control" form="myForm">
		                        </div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-float">
                                    @if(isset($wisata->photo9))
                                        <br>
                                        <img class="img-responsive" style="width: 20vw; height: 20vh;" src="{{ url('images/wisata/'.$wisata->photo9) }}">
                                    @endif 
		                            <input type="file" name="photo9" class="form-control" form="myForm">
		                        </div>
							</div>
						</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
              			<div class="form-group form-float">	
	              			<div class="form-line">
	              				<input type="text" name="slug" form="myForm" class="form-control" value="{{ $wisata->slug }}">
	              				<label class="form-label">Slug <em>*optional</em></label>
	              			</div>
	              		</div>
	                    <button type="submit" class="btn btn-primary m-t-15 waves-effect" form="myForm">Update</button>
              		</form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
  var editor_config = {
    path_absolute : "{{ url('/').'/' }}",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endsection

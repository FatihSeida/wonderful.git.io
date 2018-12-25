@extends('layouts.admin')

@section('styles')
<style>
  #mapid {
    height: 300px;
  }
</style>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
@endsection

@section('contents')
	<div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Tambah Wisata
                    </h1>
                </div>
                <div class="body">
                    <form action="{{ url('admin/wisata') }}" id="myForm" class="willSubmit" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" form="myForm">
                                <label class="form-label">Nama</label>
                            </div>
                        </div>

                        <textarea name="desc" class="form-control my-editor" form="myForm"></textarea><br><br>
						
                      <h3>Lokasi</h3>
                        <div id="mapid"></div>

        						  <h3>Thumbnail</h3>
        						    <div class="row">
        							   <div class="col-md-4">
        								    <div class="form-group form-float">
        		                 <input type="file" name="thumbnail" class="form-control" form="myForm">
                            </div>
        	   						</div>
        		  				</div>

                      <h3>Photo Tambahan</h3>
                        <div class="row">
                         <div class="col-md-4">
                            <div class="form-group form-float">
                             <input type="file" name="photo1" class="form-control" form="myForm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                             <input type="file" name="photo2" class="form-control" form="myForm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                             <input type="file" name="photo3" class="form-control" form="myForm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                             <input type="file" name="photo4" class="form-control" form="myForm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                             <input type="file" name="photo5" class="form-control" form="myForm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                             <input type="file" name="photo6" class="form-control" form="myForm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                             <input type="file" name="photo7" class="form-control" form="myForm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                             <input type="file" name="photo8" class="form-control" form="myForm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
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
	              				<input type="text" name="slug" class="form-control" form="myForm">
	              				<label class="form-label">Slug <em>*optional</em></label>
	              			</div>
	              		</div>
                    <input type="hidden" id="lat" name="lat" form="myForm">
                    <input type="hidden" id="long" name="long" form="myForm">
	                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Create</button>
              		</form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
   // Creating map options
   var mapOptions = {
      center: [-6.914744, 107.609810],
      zoom: 10,
   }
   
   // Creating a map object
   var map = new L.map('mapid', mapOptions);
   
   // Creating a Layer object
   var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
   
   // Adding layer to the map
   map.addLayer(layer);

   // Creating a Marker
   var markerOptions = {
      title: "Lokasi Wisata",
      clickable: true,
      draggable: true
   }

   function onMapClick(e) {
    // Creating a marker
    var marker = new L.Marker(e.latlng, markerOptions);
    marker.addTo(map);
    alert("Kordinatnya adalah " + e.latlng.lat + " , " + e.latlng.lng);
    var lat = document.getElementById('lat');
    var long = document.getElementById('long');
    lat.value = e.latlng.lat;
    long.value = e.latlng.lng;
   }

   map.on('click', onMapClick);
</script>

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

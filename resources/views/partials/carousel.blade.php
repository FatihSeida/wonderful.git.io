<section id="home" class="home bg-black fix" style="background: url( {{ url('/assets/images/bg.jpg') }} ) no-repeat scroll center center;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="main_home text-center">
                <div class="col-md-12">
                    <div id="carousel3d">
                      <carousel-3d :perspective="0" :space="200" :display="{{ count($favourites) }}" :controls-visible="true" :controls-prev-html="'❬'" :controls-next-html="'❭'" :controls-width="30" :controls-height="60" :clickable="true" :autoplay="true" :autoplay-timeout="5000">
                        @foreach($favourites as $key => $favourite)
                        <slide :index="{{ $key }}">
                          <div class="carousel-caption">
                            <h3 style="color: white;">{{ $favourite->name }}</h3>
                            <a href="{{ url($favourite->slug) }}" class="btn btn-success" style="padding: 10px;" target="_blank">Description</a>
                          </div>
                          <img src="{{ url('images/wisata/'.$favourite->thumbnail) }}" style="min-height: 100%; min-width: 100%;" alt="...">
                        </slide>
                        @endforeach
                        
                      </carousel-3d>
                    </div>
                </div>

            </div>


        </div><!--End off row-->
    </div><!--End off container -->
</section> <!--End off Home Sections-->
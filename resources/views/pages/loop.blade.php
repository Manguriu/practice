

<div class="row portfolio-container" data-aos="fade-up">
    @foreach($multipic  as $img)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <img src="{{$img -> image}}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>App 1</h4>
            <p>App</p>
            <a href="{{$img -> image}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>

          </div>
        </div>

    @endforeach

    </div>

    <h1> Hello <h1>




    {{-- // to be included in the home blade --}}
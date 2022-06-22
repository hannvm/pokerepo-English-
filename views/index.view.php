<?php include_once 'templates/header.php' ?>


<!--The controls are not working-->
  <div class="container d-flex align-items-center">
    <div id="#carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-interval="5000" data-bs-ride="carousel">

    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
      </button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-current="true" aria-label="Slide 2">
      </button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-current="true" aria-label="Slide 3">
      </button>
    </div>  

    <div class="carousel-inner">


        <div class="carousel-item active">
          <img src="img/hero-1.avif" alt="Hero Image 1" class="d-block w-100">
          <div class="carousel-caption d-none d-md-block"> <!--Carousel item captions-->
            <h1>First slide Label</h1>
            <h5>Description text</h5>
          </div>
        </div>


        <div class="carousel-item">
          <img src="img/hero-2.jpg" alt="Hero Image 1" class="d-block w-100">
          <div class="carousel-caption d-none d-md-block"> <!--Carousel item captions-->
            <h1>Second slide Label</h1>
            <h5>Description text</h5>
          </div>
        </div>


        <div class="carousel-item">
          <img src="img/hero_3.jpg" alt="Hero Image 1" class="d-block w-100">
          <div class="carousel-caption d-none d-md-block"> <!--Carousel item captions-->
            <h1>Third slide Label</h1>
            <h5>Description text</h5>
          </div>
        </div> <!--End of carousel-item div-->



      </div> <!--End of carousel-inner div-->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div> <!--End of carousel-captions div-->
  </div> <!--End of carousel-container div-->


  <!--Main Content-->
  <div class="main-container d-flex flex-column justify-content-center align-items-center">

      <h1 class="py-3">The OK Pokemon Game</h1>
      <p>This is some text about how the game works.</p>
      <p>I'll prob put some buttons in too to the other pages</p>
      <p>This is some more placeholder text.</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit ex rem odio. Sapiente assumenda vel ipsam, mollitia unde rerum aperiam facilis veniam aliquid praesentium dolores ipsum quasi. Totam, commodi odio.</p>

  </div>


<?php include_once 'templates/footer.php' ?>
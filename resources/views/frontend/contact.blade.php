@extends('frontend.layout')

@section('content')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
          <div class="container">
            <div
              class="banner_content d-md-flex justify-content-between align-items-center"
            >
              <div class="mb-3 mb-md-0">
                <h2>Contact Us</h2>
                <p>Very us move be blessed multiply night</p>
              </div>
              <div class="page_link">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/contact') }}">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================End Home Banner Area =================-->
  
      <!-- ================ contact section start ================= -->
    <section class="section_gap">
      <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
          <div id="map" style="height: 480px;"></div>
          <script>
            function initMap() {
              
                  // Koordinat untuk lokasi Samarinda, Kalimantan Timur
                  var samarinda = { lat: -0.5014661698222209, lng: 117.0910468719474 };

                  // Gaya abu-abu untuk peta
                  var grayStyles = [
                      {
                          featureType: "all",
                          stylers: [
                              { saturation: -90 },
                              { lightness: 50 }
                          ]
                      },
                      { elementType: 'labels.text.fill', stylers: [{ color: '#A3A3A3' }] }
                  ];

                  // Inisialisasi peta dengan gaya abu-abu
                  var map = new google.maps.Map(document.getElementById('map'), {
                      center: samarinda,   // Pusatkan peta pada Samarinda
                      zoom: 12,            // Atur tingkat zoom peta
                      styles: grayStyles,  // Terapkan gaya abu-abu
                      scrollwheel: false   // Nonaktifkan scrollwheel pada peta
                  });

                  // Tambahkan marker di lokasi Samarinda
                  var marker = new google.maps.Marker({
                      position: samarinda,
                      map: map,
                      title: "Samarinda, Kalimantan Timur" // Tooltip saat pointer diarahkan pada marker
                  });
              }
            
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2HYkQ-uNf3s7w4GDylhz6aRB8RmunKV4&callback=initMap"></script>
          
        </div>
  
  
        <div class="row">
          <div class="col-12">
            <h2 class="contact-title">Get in Touch</h2>
          </div>
          <div class="col-lg-8 mb-4 mb-lg-0">
            <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                      <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                  </div>
                </div>
              </div>
              <div class="form-group mt-lg-3">
                <button type="submit" class="main_btn">Send Message</button>
              </div>
            </form>
  
  
          </div>
  
          <div class="col-lg-4">
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-home"></i></span>
              <div class="media-body">
                <h3>Buttonwood, California.</h3>
                <p>Rosemead, CA 91770</p>
              </div>
            </div>
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-tablet"></i></span>
              <div class="media-body">
                <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
                <p>Mon to Fri 9am to 6pm</p>
              </div>
            </div>
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-email"></i></span>
              <div class="media-body">
                <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
                <p>Send us your query anytime!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <!-- ================ contact section end ================= -->
    
@endsection
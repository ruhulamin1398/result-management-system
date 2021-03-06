<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{route('index')}}" rel="icon">
  <link href="{{route('index')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('student/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('student/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('student/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('student/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('student/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('student/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('student/assets/css/style.css')}}" rel="stylesheet">


</head>

<body>

  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="{{asset('profile-img.jpg')}}" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="{{route('index')}}">{{$student->profile->name}}</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Profile</span></a></li>
          <li><a href="#result" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Result</span></a></li>
          <li><a href="{{route('enroll.index')}}" class="nav-link scrollto"><i class="bx bx-book"></i> <span>Enroll Course</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->


  {{--
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>{{$student->profile->name}}</h1>
      <p>{{$student->profile->reg}} </p>
      <!-- <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p> -->
    </div>
  </section><!-- End Hero -->

  --}}

  <main id="main" class="p-4">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
        </div>


        <div class="row">

          <div class="col-lg-12 pt-4 pt-lg-0 content" data-aos="fade-left">


            <div class="row">
              <div class="col-lg-6">
                <ul>

                  <li><i class="bi bi-chevron-right"></i> <strong>Registration Number:</strong> <span>{{$student->profile->reg}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Name:</strong> <span>{{$student->profile->name}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{$student->profile->phone}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Sex</strong> <span>{{$student->profile->sex}}</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Address</strong> <span>{{$student->profile->address}}</span></li>

                  <li><i class="bi bi-chevron-right"></i> <strong>Session:</strong> <span>{{$student->profile->session->title}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Department:</strong> <span>{{$student->profile->department->title}}</span></li>
                </ul>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->



    @php
    $credits2=0;
    $points2=0;

    @endphp
    @foreach($results as $resultList)


    @foreach($resultList as $result2)

    @php
    if($result2->point !=0){
    $credits2 += $result2->course->credit;
    $points2 += ($result2->point * $result2->course->credit);
    }
    @endphp

    {{-- <p>   {{$credits2}} </p>
    <p> {{$points2}} </p>
    --}}
    @endforeach
    @endforeach





    @php
    $cgpa=0;

    if($credits2 !=0){

    $cgpa = floor(($points2/$credits2)*100)/100;
    }
    $student->profile->cgpa= $cgpa;
    $student->profile->save();
    @endphp




    <section id="result" class="facts">
      <div class="container">

        <div class="section-title">
          <h2>Result ( {{$student->profile->cgpa}} ) </h2>
          <p></p>
        </div>

        <div class="row  ">






          <div class="nk-block-head-content">

          </div>
        </div>

        <div class="card card-preview p-4">
          <div class="card-inner">

            @foreach($results as $key=>$results)
            @php
            $semester= App\Models\semester::find($key);
            $credits=0;
            $points=0;

            @endphp

            @foreach($results as $result)

            @php
            if($result->point !=0){
            $credits += $result->course->credit;
            $points += ($result->point * $result->course->credit);

            }
            @endphp
            @endforeach

            <div class="section-title">
              <br />
              <h2> {{ $semester->title}} ( @if($credits==0) 0 @else {{floor(($points/$credits)*100)/100}} @endif )</h2>

            </div>



            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist table" data-auto-responsive="true">

              <thead>

                <tr class="nk-tb-item nk-tb-head">
                  <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                  <th class="nk-tb-col tb-col-mb"><span class="sub-text">Course Code </span></th>
                  <th class="nk-tb-col tb-col-md"><span class="sub-text">Course Title </span></th>
                  <th class="nk-tb-col tb-col-md"><span class="sub-text">Credit </span></th>
                  <th class="nk-tb-col tb-col-md"><span class="sub-text">Grade </span></th>
                  <th class="nk-tb-col tb-col-md"><span class="sub-text">Point </span></th>

                </tr>
              </thead>



              <tbody>

                @php

                $i =1;
                $credits=0;
                $points=0;

                @endphp
                @foreach($results as $result)


                @csrf
                <tr class="nk-tb-item ">

                  <td class="nk-tb-col">{{$i++}}</td>
                  <td class="nk-tb-col">{{$result->course->course_code}}</td>
                  <td class="nk-tb-col">{{$result->course->title}}</td>
                  <td class="nk-tb-col">{{$result->course->credit}}</td>
                  <td class="nk-tb-col">{{$result->letter}}</td>
                  <td class="nk-tb-col">{{$result->point}}</td>

                </tr>

                @endforeach




              </tbody>





            </table>


            @endforeach






          </div>

        </div>
    </section><!-- End Facts Section -->



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">


      <button type="button" class="btn btn-outline-primary">

        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a>

      </button>





      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>

    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('student/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('student/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('student/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('student/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('student/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('student/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('student/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('student/assets/vendor/typed.js/typed.min.js')}}"></script>
  <script src="{{asset('student/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('student/assets/js/main.js')}}"></script>

</body>

</html>
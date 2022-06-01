@extends('master.master')

@section('title', 'send-request')

@section('title-page', 'Send Request')


@section('content')


<div class="page-content-wrapper py-3">
    <div class="container">
      <!-- Checkout Wrapper -->
      <div class="checkout-wrapper-area">
        <div class="card">
          <div class="card-body checkout-form">
              <h6 class="mb-3">Entre votre informations</h6>
              @if (Session::has('request_sent'))
                  <div class="alert alert-success">
                      {{Session::get('request_sent')}}
                  </div>

              @endif

              {{--                        @if (Session::has('request_error'))--}}
              {{--                            <div class="alert alert-success">--}}
              {{--                                {{Session::get('request_error')}}--}}
              {{--                            </div>--}}

              {{--                        @endif--}}
              <form  action="{{ route('request.sub')}}" method="POST">
                  @csrf
                  <div>
                      <div class="form-group">
                          <input class="form-control mb-3" type="text" id="firstname" name="firstname" placeholder="Nom">
                          @error("firstname")
                          <small class=" form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>

                      <div class="form-group">
                          <input class="form-control mb-3" type="text" id="lastname" name="lastname" placeholder="Prénom">
                          @error("lastname")
                          <small class=" form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>
                      <div class="form-group">
                          <input class="form-control mb-3" type="text" id="firstname_ar" name="firstname_ar" placeholder="Nom en arabe">
                          @error("firstname_ar")
                          <small class=" form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>
                      <div class="form-group">
                          <input class="form-control mb-3" type="text" id="lastname_ar" name="lastname_ar" placeholder="Prénom en arabe">
                          @error("lastname_ar")
                          <small class=" form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>
                      Date de naissance:
                      <div class="form-group">
                          <input class="form-control mb-3" type="date" id="dateOfBirth" name="dateOfBirth" placeholder="Date de naissance">
                          @error("dateOfBirth")
                          <small class=" form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>

                      Willaya:
                      <div class="form-group">
                          <select class="form-select mb-3" id="Willaya" name="Willaya" aria-label="Willaya">
                              <option value="0" selected>Willaya</option>
                              @foreach($willaya as $key => $willaya)
                                  <option value="{{$willaya->id}}" >{{$willaya->willaya_code}}</option>
                              @endforeach
                          </select>
                          @error("willaya")
                          <small class=" form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>

                      <div class="form-group">
                          <input class="form-control mb-3" type="text" id="diplomanumber" name="diplomanumber" placeholder="Numero de diplome">
                          @error("diplomanumber")
                          <small class=" form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>
                      Date de diplome:
                      <div class="form-group">
                          <input class="form-control mb-3" type="date" id="dateOfDiploma" name="dateOfDiploma" placeholder="Date de diplome">
                          @error("dateOfDiploma")
                          <small class=" form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>


                      Faculté:
                      <div class="form-group">
                          <select class="form-select mb-3" id="faculty" name="faculty" aria-label="Faculté">
                              <option value="0" selected>Faculté</option>
                              @foreach($faculties as $key => $faculty)
                                  <option value="{{$faculty->faculty_id}}" >{{$faculty->faculty_code }}</option>
                              @endforeach
                          </select>
                          @error("faculty")
                          <small class=" form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>





                      <!--
                      <div class="form-group">
                        <select class="form-select mb-3" id="speciality" name="speciality" aria-label="speciality">
                          <option value="1" selected>Your Speciality</option>
                          <option value="2">Dhaka</option>
                          <option value="3">Barishal</option>
                          <option value="3">Khulna</option>
                        </select>
                      </div>
                      -->

                      <!--
                       <div class="form-group">
                         <input class="form-control mb-3" type="text" id="Bdiplome" placeholder="Bachelors Degree">
                       </div>
                       <div class="form-group">
                         <input class="form-control mb-3" type="text" id="Mdiplome" placeholder="Master's degree">
                       </div>
                       <div class="form-group">
                         <input class="form-control mb-3" type="text" id="Scard" placeholder="student card">
                       </div>-->
                      <div class="form-group">
                          <textarea class="form-control mb-3" id="note" name="note" cols="30" rows="10" placeholder="Observation"></textarea>
                      </div>
                      <!--
                      <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="exampleRadio" id="darkRadio1" checked>
                        <label class="form-check-label" for="darkRadio1">Regular Courier $0.49</label>
                      </div>
                      <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="exampleRadio" id="darkRadio2">
                        <label class="form-check-label" for="darkRadio2">Free Shipping $0</label>
                      </div>
                    -->
                      <button class="btn btn-danger mt-3 w-100" id="send-request-btn" style="background:rgb(7, 207, 0); border-color:rgb(7, 207, 0) ;">Demande</button>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>
  <!-- Footer Nav -->
  <div class="footer-nav-area" id="footerNav">
    <div class="container px-0">
      <!-- =================================== -->
      <!-- Paste your Footer Content from here -->
      <!-- =================================== -->
      <!-- Footer Content -->
      <div class="footer-nav position-relative">
        <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
          <li class="active"><a href="page-home.html">
              <svg class="bi bi-house" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
              </svg><span>Home</span></a></li>
          <li><a href="pages.html">
              <svg class="bi bi-collection" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"></path>
              </svg><span>Pages</span></a></li>
          <li><a href="elements.html">
              <svg class="bi bi-folder2-open" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z"></path>
              </svg><span>Elements</span></a></li>
          <li><a href="page-chat-users.html">
              <svg class="bi bi-chat-dots" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                <path d="M2.165 15.803l.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"></path>
              </svg><span>Chat</span></a></li>
          <li><a href="settings.html">
              <svg class="bi bi-gear" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"></path>
                <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"></path>
              </svg><span>Settings</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- All JavaScript Files -->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/internet-status.js') }}"></script>
  <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/js/wow.min.js') }} "></script>
  <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
  <script src=".{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/js/dark-mode-switch.js') }}"></script>
  <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/active.js') }}"></script>
  <!-- PWA -->
  <script src="{{ asset('assets/js/pwa.js') }} "></script>

@endsection

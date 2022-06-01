@section('side_bare')

    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
        <div class="spinner-grow text-primary" role="status">
          <div class="sr-only">Loading...</div>
        </div>
      </div>
      <!-- Internet Connection Status -->
      <!-- # This code for showing internet connection status -->
      <div class="internet-connection-status" id="internetStatus"></div>
      <!-- Header Area -->
      <div class="header-area" id="headerArea">
        <div class="container">
          <!-- Header Content -->
          <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button"></div>
            <!-- Page Title -->
            <div class="page-heading">
              <h6 class="mb-0">@yield('title-page', 'Requests')</h6>
            </div>
            <!-- Navbar Toggler -->
            <div class="navbar--toggler" id="affanNavbarToggler" data-bs-toggle="offcanvas" data-bs-target="#affanOffcanvas" aria-controls="affanOffcanvas"><span class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div>
          </div>
        </div>
      </div>
      <!-- # Sidenav Left -->
      <!-- Offcanvas -->
      <div class="offcanvas offcanvas-start" id="affanOffcanvas" data-bs-scroll="true" tabindex="-1" aria-labelledby="affanOffcanvsLabel">
        <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <div class="offcanvas-body p-0">
          <!-- Side Nav Wrapper -->
          <div class="sidenav-wrapper">
            <!-- Sidenav Profile -->
            <div class="sidenav-profile bg-gradient">
              <div class="sidenav-style1"></div>
              <!-- User Thumbnail -->
              <div class="user-profile"><img src="img/bg-img/2.jpg" alt=""></div>
              <!-- User Info -->
              <div class="user-info">
                <h6 class="user-name mb-0">Affan Islam</h6><span>CEO, Designing World</span>
              </div>
            </div>
            <!-- Sidenav Nav -->
              <ul class="sidenav-nav ps-0">
                  <li class="affan-dropdown"><a href="/univ-certaficate-management/public">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                              <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                          </svg>accueil</a>
                  </li>

                  <li class="affan-dropdown-menu"><a href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-plus" viewBox="0 0 16 16">
                              <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
                              <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
                          </svg>Ajouter une demande</a>
                      <ul>
                          <li><a href="/univ-certaficate-management/public/Send-request-licence">ajouter une demande Licence</a></li>
                          <li><a href="/univ-certaficate-management/public/Send-request-master">ajouter une demande Master</a></li>
                          <li><a href="/univ-certaficate-management/public/Send-request">ajouter une demande Veterinaire</a></li>

                      </ul>
                  </li>

                  <li class="affan-dropdown-menu"><a href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                              <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                              <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                          </svg>Les demandes</a>
                      <ul>
                          <li><a href="/univ-certaficate-management/public/Request-licence">demandes Licence</a></li>
                          <li><a href="/univ-certaficate-management/public/Request-master">demandes Master</a></li>
                          <li><a href="/univ-certaficate-management/public/Request-veterinary">demandes Veterinaire</a></li>

                      </ul>
                  </li>

                  <li class="affan-dropdown-menu"><a href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                              <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                              <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                          </svg>demande status</a>
                      <ul>
                          <li><a href="/univ-certaficate-management/public/Request-bachlor-status">demande status Licence</a></li>
                          <li><a href="/univ-certaficate-management/public/Request-master-status">demande status Master</a></li>
                          <li><a href="/univ-certaficate-management/public/Request-veterinary-status">demande status Veterinaire</a></li>

                      </ul>
                  </li>

                  <li class="affan-dropdown-menu"><a href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                              <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                              <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                          </svg>commandes d'impression</a>
                      <ul>
                          <li><a href="/univ-certaficate-management/public/Request-bachelor-print">Licence</a></li>
                          <li><a href="/univ-certaficate-management/public/Request-master-print">Master</a></li>
                          <li><a href="/univ-certaficate-management/public/Request-veterinary-status">Veterinaire</a></li>

                      </ul>
                  </li>



                  <li>
                      <div class="night-mode-nav">
                          <svg class="bi bi-moon" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z"></path>
                          </svg>Night Mode
                          <div class="form-check form-switch">
                              <input class="form-check-input form-check-success" id="darkSwitch" type="checkbox">
                          </div>
                      </div>
                  </li>
                  <li><a href="#">
                          <svg class="bi bi-box-arrow-right" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"></path>
                              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"></path>
                          </svg>Logout</a></li>
              </ul>
              <!-- Social Info -->
              <div class="social-info-wrap"><a href="#"><i class="bi bi-facebook"></i></a><a href="#"><i class="bi bi-twitter"></i></a><a href="#"><i class="bi bi-linkedin"></i></a></div>
              <!-- Copyright Info -->
              <div class="copyright-info">
                  <p>2022 &copy; Made by<a href="#">Menaili and Abdallah</a></p>
              </div>
          </div>
        </div>
      </div>
    @show

@extends('master.master3')

@section('title', 'home')

@section('title-page', 'home')


@section('content')



    <!-- Hero Slides -->
    <div class="owl-carousel-one owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/32.jpg')">
            <div class="slide-content h-100 d-flex align-items-center text-center">
                <div class="container">
                    <h3 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Université de Souk Ahras</h3>
                    <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">Gestion des facultés et des certificats <br> </p>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/31.jpg')">
            <div class="slide-content h-100 d-flex align-items-center text-center">
                <div class="container">
                    <h3 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="500ms">Université de Souk Ahras</h3>
                    <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="500ms">Gestion des facultés et des certificats</p>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->

        <!-- Single Hero Slide -->

    </div>
    <div class="pt-3"></div>



    <div class="container">
        <div class="card bg-primary mb-3 bg-img" style="background-image: url('img/core-img/1.png')">
            <div class="card-body direction-rtl p-5">
                <h2 class="text-white">Gestion des diplomes</h2>
                <p class="mb-4 text-white">Vous pouvez gérer les certificats avec des demandes d'ajout, de mise à jour et de suppression, ainsi que modifier le statut de la demande et l'imprimer.</p><a class="btn btn-warning" href="/univ-certaficate-management/public/diplomes-home">Suivant</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card bg-primary mb-3 bg-img" style="background-image: url('img/core-img/1.png')">
            <div class="card-body direction-rtl p-5">
                <h2 class="text-white">Gestion des facultés</h2>
                <p class="mb-4 text-white">Vous pouvez gérer les facultés avec ajouter, mettre à jour et supprimer (facultés, domaine, fillière, spécialité).</p><a class="btn btn-warning" href="/univ-certaficate-management/public/Add-faculty">Suivant</a>
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

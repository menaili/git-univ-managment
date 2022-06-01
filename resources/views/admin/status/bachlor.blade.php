@extends('master.master')

@section('title', 'requests-status')

@section('title-page', 'Requests Status')


@section('content')


    <div class="page-content-wrapper py-3" style=" overflow-x:scroll;">
        <div class="container">

            <div class="card" style=" width: 1000px;  ">

                <div class="card-body p-3">

                    @if (Session::has('status_updated'))
                        <div class="alert alert-success">
                            {{Session::get('status_updated')}}
                        </div>
                    @endif
                    @if (Session::has('status_updated_not'))
                        <div class="alert alert-danger">
                            {{Session::get('status_updated_not')}}
                        </div>
                    @endif

                        @if (Session::has('status_valider'))
                            <div class="alert alert-success">
                                {{Session::get('status_valider')}}
                            </div>
                        @endif


                    <table class="data-table w-100" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">view</th>

                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Date de naissance</th>
                            <th scope="col">Specialité</th>
                            <th scope="col">Date de la demande</th>
                            <th scope="col">Status</th>

                            <th scope="col">Step</th>



                        </tr>
                        </thead>
                        <tbody >

                        @foreach ($requests as $key => $request)

                            <tr>

                                <td>
                                    <a href="/univ-certaficate-management/public/Status-view-bachlor/{{$request->request_bachlor_id}}" id="btn-view" >view</a>
                                </td>

                                <td>
                                    {{$request->bachlor_student_first_name}}
                                </td>
                                <td>

                                    {{$request->bachlor_student_last_name}}

                                </td>
                                <td>
                                    {{$request->bachlor_student_birthday}}
                                </td>

                                <td>
                                    {{$request->speciality_code_fr}}
                                </td>


                                <td>
                                    {{$request->bachlor_status_date}}

                                </td>

                                <td>
                                    {{$request->bachlor_status}}
                                </td>

                                <td id="btn-next">


                                    <div class="direction-rtl"><a class="btn m-1 btn-outline-primary" id="btn-step" href="/univ-certaficate-management/public/Status-update-bachlor/{{$request->request_bachlor_id}}">suivant</a></div>
                                    <div class="direction-rtl"><a class="btn m-1 btn-outline-primary" id="btn-step" href="/univ-certaficate-management/public/Status-update-bachlor-valider/{{$request->request_bachlor_id}}">valider</a></div>

                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
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

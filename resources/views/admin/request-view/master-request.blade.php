@extends('master.master')

@section('title', 'requests')

@section('title-page', 'Requests')



@section('content')


    <div class="page-content-wrapper py-3" style=" overflow-x:scroll;">
        <div class="container">

            <div class="card" style="
            width: 1100px;

                ">

                <div class="card-body p-3">
                    @if (Session::has('request_deleted'))
                        <div class="alert alert-danger">
                            {{Session::get('request_deleted')}}
                        </div>

                    @endif
                    <table class="data-table w-100" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">Demande ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Date de naissance</th>
                            <th scope="col">specialité</th>
                            <th scope="col">Date de diplome</th>
                            <th scope="col">Numéro de diplome</th>
                            <th scope="col">Obrevation</th>
                            <th scope="col">Date de la demande</th>
                            <th scope="col">Status</th>

                        </tr>
                        </thead>
                        <tbody >

                        @foreach ($requests as $key => $request)


                            <tr>
                                <td style="text-align:center;">
                                    {{$request->request_master_id}}
                                </td>

                                <td id="firstnamess">
                                    {{$request->master_student_first_name}}
                                </td>
                                <td id="lastnamess">

                                    {{$request->master_student_last_name}}

                                </td>
                                <td id="dateOfBirthss">
                                    {{$request->master_student_birthday}}
                                </td>

                                <td id="specialityss">
                                    {{$request->speciality_code_fr}}
                                </td>
                                <td id="dateOfDiplomass">
                                    {{$request->master_diploma_date}}
                                </td>
                                <td id="diplomanumberss">
                                    {{$request->master_diploma_number}}
                                </td>
                                <td id="notess">
                                    {{$request->master_note}}
                                </td>
                                <td >
                                    {{$request->master_status_date}}
                                </td>
                                <td><h5>
                                        <a class="remove-product" href="/univ-certaficate-management/public/Requests-edit/{{$request->request_master_id}}" id="btn-edit"  ><i class="fa fa-edit"></i></a>
                                        {{-- data-bs-toggle="modal" data-bs-target="#bootstrapBasicModal" --}}
                                        <a class="remove-product" href="/univ-certaficate-management/public/Requests-delete-master/{{$request->request_master_id}}" id="btn-delete"><i class="fa fa-close"></i></a>
                                    </h5>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>






    <div class="modal fade" id="bootstrapBasicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Modal Heading</h6>
                    <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="checkout-wrapper-area">
                        <div class="card">
                            <div class="card-body checkout-form">
                                <h6 class="mb-3">edit student informations</h6>
                                <div>
                                    <div class="form-group">
                                        <input class="form-control mb-3" type="text" id="firstnames" >
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control mb-3" type="text" id="lastnames" >
                                    </div>
                                    Your Birthday:
                                    <div class="form-group">
                                        <input class="form-control mb-3" type="date" id="dateOfBirths" >
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control mb-3" type="text" id="diplomanumbers" >
                                    </div>
                                    date of diploma:
                                    <div class="form-group">
                                        <input class="form-control mb-3" type="date" id="dateOfDiplomas" >
                                    </div>

                                    <div class="form-group">
                                        <select class="form-select mb-3" id="facultys" name="faculty" aria-label="faculty">
                                            <option value="1" selected>Your Faculty</option>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control mb-3" type="text" id="specialitys" >
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
                                    <div class="form-group">
                                        <select class="form-select mb-3" id="levels" name="level" aria-label="levem">
                                            <option value="1" selected>Your level</option>

                                        </select>
                                    </div>
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
                                        <textarea class="form-control mb-3" id="notes" name="note" cols="30" rows="10" ></textarea>
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
                                    <div class="modal-footer">
                                        <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-sm btn-success" id="save" name="save" type="submit">Save</button>
                                    </div>              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-sm btn-success" type="button">Save</button>
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

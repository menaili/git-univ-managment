<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>




    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/sidebars.css') }} " rel="stylesheet">

    <style>

        body {font-family: 'aealarabiya', sans-serif;}



    </style>
</head>
<body >

<div class="A4">
    @foreach($requests as $key => $request)
        <h3 style="
  position: relative;
  left: 25cm;
  top:10.5cm;
  ">محضر الجلسة الجامعية بتاريخ: </h3>

        <h3 style="
  position: relative;
  left: 24cm;
  top:11.3cm;
  "> {{$request->bachlor_student_first_name_ar}} {{$request->bachlor_student_last_name_ar}}</h3>

<h3 style="
  position: relative;
  left: 5.5cm;
  top:13.9cm;
  "> {{$request->bachlor_student_first_name}} {{$request->bachlor_student_last_name}}</h3>

<h3 style="
  position: relative;
  left: 25cm;
  top:12cm;
  ">{{$request->bachlor_student_birthday}}</h3>

        <h3 style="
  position: relative;
  left: 25cm;
  top:13.7cm;
  direction: rtl;
  ">{{$request->domain_code}}</h3>

        <h3 style="
  position: relative;
  left: 25cm;
  top:14.4cm;
  ">{{$request->division_code}}</h3>

        <h3 style="
  position: relative;
  left: 25cm;
  top:14.9cm;
  ">{{$request->speciality_code}}</h3>

{{--<h3 style="--}}
{{--  position: relative;--}}
{{--  left: 25cm;--}}
{{--  top:13.7cm;--}}
{{--  ">{{$request->faculty_code_ar}}</h3>--}}

{{--<h3 style="--}}
{{--  position: relative;--}}
{{--  left: 20cm;--}}
{{--  top:6cm;--}}

{{--  " >{{$request->faculty_code}}</h3>--}}


    @endforeach
</div>


</body>
</html>

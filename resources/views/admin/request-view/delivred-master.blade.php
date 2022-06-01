<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   

    <style>
        button{
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 8px rgb(207, 207, 207);
        }

        button:hover{
            border: none;
            padding: 15px;
            border-radius: 15px;
            box-shadow: inset 0 0 8px #f9f8fc;
        }


        .button-os{
            position: absolute;
            width: 200px;
            height: 65px;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            background-color: #f9f8fc;
            border: 2.5px solid #0e172c;
            transition: background-color 2.2s;
            transition-duration: 3s;
            transition: 1.5s;
        }

        .button-os:hover{
            position: absolute;
            top: 30px;
            background-color: #fec7d7;
        }

        .button-os a{
            font-size: 20px;
            display: block;
            text-decoration: none;
            color:#0e172c;
            transition: 1.5s;
        }

        .button-os a:hover{
            letter-spacing: 5px;
        }


        .A4 {
            width: 29.7cm;
            height: 21cm;
        }
        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;

        }

        @media print {
            body, page {
                margin: 0;

            }
        }





    </style>
</head>
<body>

<div class="A4">
    @foreach($requests_master as $key => $request)
        <h3 style="
  position: relative;
  left: 297mm;
  top:10cm;
  "> {{$request->master_student_first_name}} {{$request->master_student_last_name}}</h3>
        <h3></h3>
        <h3>{{$request->master_student_birthday}}</h3>
    @endforeach
</div>


</body>
</html>

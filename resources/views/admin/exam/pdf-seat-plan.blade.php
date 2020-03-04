<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WPIMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        *{
            font-family: Arial;
        }
        tr{
            padding-bottom: 20px;
        }
        th{
            font-size: 20px;
        }

    </style>

</head>
<body>
@foreach($students->chunk(2) as $key => $chunk)
    <div class="row" style="{{ ($key+1) % 5 == 0 ? 'page-break-after: always' : '' }}">
        @foreach($chunk as $student)
            <div style="padding: 10px; margin-left: 80px">
                <div class="card" style="width: 4.30in;height:2.50in; border: 2px solid black; border-style: double;">
                    <div class="card-header text-center">
                        <h6 style="font-weight: bold;">{{ strtoupper($seatData->exam->name) }}</h6>
                    </div>
                    <div class="card-body">
                        {{--<h5 class="card-title text-center" style="color: #05052e;font-weight: bold; border-radius: 5px; border: 2px solid black">EXAM SEAT PLAN</h5>--}}
                        <table>

                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td> : </td>
                                    <th > {{ ucfirst($student->name) }} </th>
                                </tr>

                                <tr>
                                    <td>Roll</td>
                                    <td> : </td>
                                    <th> {{ $student->rank }} </th>
                                </tr>

                                <tr>
                                    <td>Class</td>
                                    <td> : </td>
                                    <th> {{ $student->classes->name }}
                                        {{ $student->section ? $student->section->name : ''}}
                                        {{ $student->group ? $student->group->name : ''}}
                                    </th>
                                </tr>

                                <tr>
                                    <td>Room No</td>
                                    <td> : </td>
                                    <th> {{ $seatData->room }}
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @endforeach
        {{--        <p>&nbsp;</p>--}}
    </div>
@endforeach

</body>
</html>

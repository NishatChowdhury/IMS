<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('WPIMS') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        * {
            font-family: Arial;
            font-size: 15px;
        }
    </style>

</head>

<body>
    @foreach ($results as $result)
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-12 text-center">
                                        <img src="{{ asset('/assets/img/logos/') }}/{{ siteConfig('logo') }}"
                                            alt="" style="width: 70px;height:70px">
                                        <h3>{{ siteConfig('name') }}</h3>
                                        <p>{{ siteConfig('address') }}</p>
                                    </div>
                                </div>
                                <table id="" class="table">
                                    <tr>
                                        <th>{{ __('Student\'s Name') }} : </th>
                                        <td>{{ $result->studentAcademic->student->name ?? '' }}</td>
                                        <th>{{ __('Exam Name') }} : </th>
                                        <td>{{ $result->exam->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('StudentID :') }} </th>
                                        <td>{{ $result->studentAcademic->student->studentId ?? '' }}</td>
                                        <th>Date : </th>
                                        <td>{{ $result->exam->start }} - {{ $result->exam->end }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Class') }} :</th>
                                        <td>{{ $result->studentAcademic->classes->name ? $result->studentAcademic->classes->name : '' }}
                                        </td>
                                        <th>{{ __('Grade') }} : </th>
                                        <td>{{ $result->grade }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Current Rank') }} :</th>
                                        <td>{{ $result->studentAcademic->rank }}</td>
                                        <th>{{ __('Grade Point') }} :</th>
                                        <td>{{ $result->gpa }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Result Rank') }} :</th>
                                        <td>{{ $result->rank }}</td>
                                        <th>{{ __('Total Marks') }} :</th>
                                        <td>{{ $result->total_mark }}</td>
                                    </tr>
                                </table>

                                <table id="" class="table table-bordered" style="margin-top: 60px;">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Subject') }}</th>
                                            <th>{{ __('Code') }}</th>
                                            <th>{{ __('Exam Mark') }}</th>
                                            <th>{{ __('Result Mark') }}</th>
                                            <th>{{ __('Grade') }}</th>
                                            <th>{{ __('Grade point') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $marks = \App\Models\Backend\Mark::query()
                                                ->where('student_id', $result->studentAcademic->id) //student_id == student academic id
                                                ->where('exam_id', $result->exam_id)
                                                ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
                                                ->select('marks.*', 'subjects.level')
                                                ->orderBy('level')
                                                ->get();
                                        @endphp
                                        @foreach ($marks as $mark)
                                            <tr>
                                                <td>{{ $mark->subject->name }}</td>
                                                <td>{{ $mark->subject->code }}</td>
                                                <td>{{ $mark->full_mark }}</td>
                                                <td>
                                                    @if ($mark->objective > 0)
                                                        {{ __(' Objective:') }} {{ $mark->objective }}<br>
                                                    @endif
                                                    @if ($mark->written > 0)
                                                        {{ __('Written:') }} {{ $mark->written }}<br>
                                                    @endif
                                                    @if ($mark->practical > 0)
                                                        {{ __('Practical:') }} {{ $mark->practical }}<br>
                                                    @endif
                                                    @if ($mark->viva > 0)
                                                        {{ __('Viva:') }} {{ $mark->viva }}
                                                    @endif
                                                </td>
                                                <td>{{ $mark->grade }}</td>
                                                <td>{{ $mark->gpa }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

</body>

</html>

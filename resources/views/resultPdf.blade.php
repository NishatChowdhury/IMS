<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Marks Sheet</title>
      <style>
          table.table {
    border: 1px solid#d5d5d5;
    padding: 10px;
}

      </style>
  </head>
  <body>
  <table class="table" width="100%">
      <tr style="text-align: center">
          <td>
{{--              <img src="{{ asset('/assets/img/logos') }}/{{$logo}}" alt="">--}}
{{--              <img src="{{ $logo }}" alt="">--}}
                                    <h1 style="margin-top: 0px">{{ siteConfig('name') }}</h1>
                                    <p>{{ siteConfig('address') }}</p>
          </td>
      </tr>
  </table>
<table>
    <tr>
        <td>
            <h4>Student Information</h4>
        </td>
    </tr>
</table>
                        <table id="" class="table" width="100%" >
                                <tr>

                                    <th>Student's Name : </th>
                                    <td>{{ $result->studentAcademic->student->name ?? '' }}</td>
                                    <th>Exam Name : </th>
                                    <td>{{ $result->exam->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>StudentID : </th>
                                    <td>{{ $result->studentAcademic->student->studentId }}</td>
                                    <th>Date : </th>
                                    <td>{{ $result->exam->start }} - {{ $result->exam->end }}</td>
                                </tr>
                                <tr>
                                    <th>Class :</th>
                                    <td>{{ $result->studentAcademic->classes->name ? $result->studentAcademic->classes->name : ''  }}</td>
                                    <th>Grade : </th>
                                    <td>{{ $result->grade }}</td>
                                </tr>
                                <tr>
                                    <th>Current Rank :</th>
                                    <td>{{ $result->studentAcademic->rank }}</td>
                                    <th>Grade Point :</th>
                                    <td>{{ $result->gpa }}</td>
                                </tr>
                                <tr>
                                    <th>Result Rank :</th>
                                    <td>{{ $result->rank }}</td>
                                    <th>Total Marks :</th>
                                    <td>{{ $result->total_mark }}</td>
                                </tr>
                            </table>
<table>
    <tr>
        <td>
            <h4>Result Information</h4>
        </td>
    </tr>
</table>
    <table id="" class="table" style="" width="100%">
                                <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Code</th>
                                    <th>Exam Mark</th>
                                    <th>Result Mark</th>
                                    <th>Grade</th>
                                    <th>Grade point</th>
                                </tr>
                                </thead>
                                <tbody style="text-align: center">
                                @foreach($marks as $mark)
                                    <tr>
                                        <td>{{ $mark->subject->name }}</td>
                                        <td>{{ $mark->subject->code }}</td>
                                        <td>{{ $mark->full_mark }}</td>
                                        <td>
                                            @if($mark->objective > 0)
                                                Objective: {{ $mark->objective }}<br>
                                            @endif
                                            @if($mark->written > 0)
                                                Written: {{ $mark->written }}<br>
                                            @endif
                                            @if($mark->practical > 0)
                                                Practical: {{ $mark->practical }}<br>
                                            @endif
                                            @if($mark->viva > 0)
                                                Viva: {{ $mark->viva }}
                                            @endif
                                        </td>
                                        <td>{{ $mark->grade }}</td>
                                        <td>{{ $mark->gpa }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
  </body>
</html>
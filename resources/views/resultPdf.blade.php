<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Marks Sheet</title>
    <style>
        .table{
              font-family: Arial, Helvetica, sans-serif;
              border-collapse: collapse;
              width: 100%;
            font-size: 12px;
        }
        .table1{
              font-family: Arial, Helvetica, sans-serif;
              width: 100%;
            font-size: 12px;
        }
        .table td, th{
            border: 1px solid#d5d5d5;
            /* padding: 10px; */
        }
        /*table.table tr:nth-child(even){background-color: #f2f2f2;}*/

        /*.customTable*/

    </style>
</head>
<body>
    <table class="table1" width="100%">
        <tr style="text-align: center">
            <td>
                <h1 style="margin-top: 0px">{{ siteConfig('name') }}</h1>
                <p>{{ siteConfig('address') }}</p>
            </td>
        </tr>
    </table>
    <table class="table1" width="100%" style="margin-bottom: 5px">
        <tr style="text-align: center">
            <td width="40%" style="text-align: center">

                    <img src="{{ asset('storage/uploads/students') }}/{{ $result->studentAcademic->student->image }}" width="120px" height="120px" alt="">
            </td>
            <td width="50%" style="text-align: left">
                    <img src="{{ asset('/assets/img/logos/') }}/{{ siteConfig('logo') }}" alt="">
            </td>
            <td width="10%">
                <table class="table">
                    <tr>
                        <th>From</th>
                        <th>To</th>
                        <th>GPA</th>
                        <th>Grade</th>
                    </tr>
                    <tr>
                        <td>80</td>
                        <td>99</td>
                        <td>5</td>
                        <td>A+</td>
                    </tr>
                    <tr>
                        <td>70</td>
                        <td>79</td>
                        <td>4</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>60</td>
                        <td>69</td>
                        <td>3.5</td>
                        <td>A-</td>
                    </tr>
                    <tr>
                        <td>50</td>
                        <td>59</td>
                        <td>3</td>
                        <td>B</td>
                    </tr>
                    <tr>
                        <td>40</td>
                        <td>49</td>
                        <td>2</td>
                        <td>C</td>
                    </tr>
                    <tr>
                        <td>33</td>
                        <td>39</td>
                        <td>1</td>
                        <td>D</td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>32</td>
                        <td>0</td>
                        <td>F</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    <table id="" class="table1" width="100%" >
        <tr>
            <td>Student's Name  </td>
            <td> : </td>
            <td>{{ $result->studentAcademic->student->name ?? '' }}</td>
            <td>Exam Name </td>
            <td> : </td>
            <td>{{ $result->exam->name ?? '' }}</td>
        </tr>
        <tr>
            <td>StudentID </td>
            <td> : </td>
            <td>{{ $result->studentAcademic->student->studentId ?? ''}}</td>
            <td>Date  </td>
            <td> : </td>
            <td>{{ $result->exam->start }} - {{ $result->exam->end }}</td>
        </tr>
        <tr>
            <td>Class </td>
            <td> : </td>
            <td>{{ $result->studentAcademic->classes->name ? $result->studentAcademic->classes->name : ''  }}</td>
            <td>Grade : </td>
            <td> : </td>
            <td>{{ $result->grade }}</td>
        </tr>
        <tr>
            <td>Current Rank</td>
            <td> : </td>
            <td>{{ $result->studentAcademic->rank }}</td>
            <td>Grade Point</td>
            <td> : </td>
            <td>{{ $result->gpa }}</td>
        </tr>
        <tr>
            <td>Result Rank </td>
            <td> : </td>
            <td>{{ $result->rank }}</td>
            <td>Total Marks </td>
            <td> : </td>
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
    <table class="table" id="">
        <tr class="row">
          <th rowspan="2">Code</th>
          <th rowspan="2">Subject</th>
          <th colspan="4" class="subjects">{{ $result->exam->name ?? '' }}</th>
          <th rowspan="2">Highest</th>
          <th rowspan="2">Total</th>
          <th rowspan="2">GPA</th>
          <th rowspan="2">Grade</th>
        </tr>
        <tr class="row">
          <th>Marks</th>
          <th>Written</th>
          <th>MCQ</th>
          <th>Obtain</th>
        </tr>
        @foreach($marks as $mark)
        <tr class="row1" style="text-align: center">
          <td>{{ $mark->subject->code }}</td>
          <td>{{ $mark->subject->name }}</td>
          <td>{{ $mark->full_mark }}</td>
          <td>
          @if($mark->written > 0)
            {{ $mark->written }}
            @endif
          </td>
          <td>
          @if($mark->objective > 0)
                {{ $mark->objective }}
            @endif
          </td>
          <td>
          @php
           $obj = $mark->objective ?? 00;
           $wir = $mark->written ?? 00;
           $pra = $mark->practical ?? 00;
           $total = $obj + $wir + $pra;
          @endphp
          {{ $total }}
          </td>
          <td>{{ $total + 1 }}</td>
          <td>{{ $total }}</td>
          <td>{{ $mark->gpa }}</td>
          <td>{{ $mark->grade }}</td>
        </tr>
        @endforeach

</table>
    <!-- //old -->

<table width="100%" style="margin-top: 20px">
    <tr>
        <td>
            <table class="table" id="customTable">
                <tr>
                    <td colspan="2" style="text-align:center"><b>Result Summary</b></td>
                </tr>
                <tr>
                    <td>
                        Exam Marks
                    </td>
                    <td>
                    {{ $result->total_mark }}
                    </td>
                </tr>
                 <tr>
                    <td>
                        Percentage
                    </td>
                    <td>

                    </td>
                </tr>
                 <tr>
                    <td>
                        GPA
                    </td>
                    <td>
                    {{ $result->gpa }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Grade
                    </td>
                    <td>
                    {{ $result->grade }}
                    </td>
                </tr>
            </table>
        </td>
        <td>
             <table class="table" id="customTable">
                <tr>
                    <td colspan="2"><b>Comment</b></td>
                </tr>
                 <tr >
                     <td height="64px">
                         Very Good
                     </td>
                 </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
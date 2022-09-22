<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <title>{{$title}}</title>
</head>

<body>

    <div class="container mt-4 p-4">
        <table id="example" class="table  table-sm table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>SLNO</th>
                    <th>RegNo</th>
                    <th>StdName</th>
                    <th>Session</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>CourseID</th>
                    <th>Course_Title</th>
                    <th>HeldMonth</th>
                    <th>ExamType</th>
                    <th>Credit</th>
                    <th>LG</th>
                    <th>GP</th>
                </tr>
            </thead>
            <tbody>


                @foreach($results as $result)
                
                @php
                    $exam=  App\Models\sessionSemester::where('department_id', $department->id)
       ->where('session_id', $sudySession->id)
       ->where('semester_id', $result->semester_id)
       ->first();

                    @endphp


                <tr>
                    <td>{{$result->id}}</td>
                    <td>{{App\Models\student::find($result->student_id)->reg}}</td>
                    <td>{{App\Models\student::find($result->student_id)->name}}</td>
                    <td>{{$sudySession->title}}</td>
                    <td>{{$department->title}}</td>

                    <td>{{$exam->exam_title}}</td>
                    <td>{{$result->course->course_code}}</td>
                    <td>{{$result->course->title}}</td>
                    <td>{{$exam->held}}</td>
                    <td>
                        @if($result->is_drop == 1)
                        Carry
                        @else
                        Regular
                        @endif
                    </td>

                    
                    <td>{{$result->course->credit}}</td>
                    
                    <td>{{$result->letter}}</td>
                    
                    <td>{{$result->point}}</td>
                </tr>

                @endforeach
            </tbody>

        </table>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    messageTop: null,
                    title: null
                }],
                lengthMenu: [
            [5, 15, 50, -1],
            [5, 15, 50, 'All'],
        ]
            });
        });
    </script>
</body>

</html>
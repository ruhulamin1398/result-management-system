@extends('admin.includes.app')




@section('content')


<div class="nk-block nk-block-lg">
    <div class="nk-block-head">

        @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show center" role="alert">
            <strong>{{ session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @elseif(session('error'))


        <div class="alert alert-danger alert-dismissible fade show center" role="alert">
            <strong>{{ session('error')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @endif
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">{{$department->title}}</h4>
            <div class="nk-block-des">
                <p> Session : {{$studySession->title}}</p>

                <!-- <a href="#" class="btn btn-primary">Yesterday</a> -->


            </div>
        </div>
    </div>

    <div class="card card-preview">
        <div class="card-inner">
            <div class="nk-block-des">
 

<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#PrintModal">
Print
</button>






            </div>

            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                <thead>

                    <tr class="nk-tb-item nk-tb-head">

                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Semester </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Exam Title </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Held On </span></th>
                        <th class="nk-tb-col tb-col-md text-center"><span class="sub-text">Courses </span></th>


                    </tr>
                </thead>


                <tfoot>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Semester </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Exam Title </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Held On </span></th>
                        <th class="nk-tb-col tb-col-md text-center"><span class="sub-text">Courses </span></th>


                    </tr>
                </tfoot>

                <tbody>

                    @php($i =1)
                    @foreach($semesters as $semester)

                    <tr class="nk-tb-item ">


                        <td class="nk-tb-col">{{$i++}}</td>

                        <td class="nk-tb-col">{{$semester->title}}</td>
                        <td class="nk-tb-col"><input type="text" value="{{$semester->exam->exam_title}}" name="exam_title" id="" class="titleInput{{$semester->exam->id}}" onchange= "changedetails({{$semester->exam->id}})" ></td>
                        <td class="nk-tb-col"><input type="text" value="{{$semester->exam->held}}" name="held" id="" class="heldOnInput{{$semester->exam->id}}"  onchange= "changedetails({{$semester->exam->id}})" ></td>


                        <td class="nk-tb-col">


                            @if(isset($courses[$semester->id]))

                            @php($ind =1)
                            @foreach ($courses[$semester->id] as $data)
                            @php($course = \App\Models\course::find($data->course_id))
                            
                            <a href="{{route('results.edit',$course->id)}}?course_id={{$course->id}}&&session_id= {{$studySession->id}}&&semester_id= {{$semester->id}}&&department_id= {{$department->id}}" class="btn btn-success btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">{{$course->course_code }}</a>
                            @if($ind++ == 4) <br> @endif
                            @endforeach

                            @endif

                        </td>





                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="PrintModal" tabindex="-1" role="dialog" aria-labelledby="PrintModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Print Result </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <h5>Mark Sheet</h5>
      <a  href="{{route('print-pdfs.index')}}?department_id={{$department->id}}&&session_id={{$studySession->id}}&&year=1" target="_blank" class="btn btn-primary">First Year</a>
      <a href="{{route('print-pdfs.index')}}?department_id={{$department->id}}&&session_id={{$studySession->id}}&&year=2" target="_blank" class="btn btn-primary">Second Year</a>
      <a href="{{route('print-pdfs.index')}}?department_id={{$department->id}}&&session_id={{$studySession->id}}&&year=3" target="_blank" class="btn btn-primary">Third Year</a>
      <a href="{{route('print-pdfs.index')}}?department_id={{$department->id}}&&session_id={{$studySession->id}}&&year=4" target="_blank" class="btn btn-primary">Fourth Year</a>
      

      <br>
      <br>

      <h5> GPA & CGPA </h5>
      <a  href="{{route('print-cgpas.index')}}?department_id={{$department->id}}&&session_id={{$studySession->id}}&&year=1" target="_blank" class="btn btn-primary">First Year</a>
      <a href="{{route('print-cgpas.index')}}?department_id={{$department->id}}&&session_id={{$studySession->id}}&&year=2" target="_blank" class="btn btn-primary">Second Year</a>
      <a href="{{route('print-cgpas.index')}}?department_id={{$department->id}}&&session_id={{$studySession->id}}&&year=3" target="_blank" class="btn btn-primary">Third Year</a>
      <a href="{{route('print-cgpas.index')}}?department_id={{$department->id}}&&session_id={{$studySession->id}}&&year=4" target="_blank" class="btn btn-primary">Fourth Year</a>
      

      <br>
      <br>

    </div>
      
    </div>
  </div>
</div>



@endsection



@section('additional')
<div class="toast p-2 bg-success" data-autohide="false" 
style="
    right: 10px;
    bottom: 10px;
    position: absolute;
    ">
    <div class="toast-header bg-success  text-white">
      <strong class="mr-auto text-white"> Update Done</strong>
      <!-- <small class="text-muted">5 mins ago</small> -->
      <button type="button" class="ml-2 mb-1 close text-white closeToast" data-dismiss="toast">&times;</button>
    </div>
    <!-- <div class="toast-body">
      Some text inside the toast body
    </div> -->
  </div>
@endsection


@section('js')

<script>




function changedetails(exam_id){
 var url = '{{route("session_semester.index")}}/'+exam_id;
 
    var title= $(".titleInput"+exam_id).val();
// alert(title)
var held= $(".heldOnInput"+exam_id).val();
// alert(heldOnInput)

url = url+'?exam_title='+encodeURIComponent(title)+'&&held='+encodeURIComponent(held)
console.log(url)
$.get(url, function(data, status){
    
    $('.toast').toast('show');
    console.log(data)

setInterval(function () { $('.closeToast').trigger( "click" );}, 2000);


  });
}
</script>

@endsection

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
            <h4 class="nk-block-title">{{$course->course_code}} | {{$course->title}} <a href="{{route('fields.index')}}?course_id={{$course->id}}&&session_id= {{$studySession->id}}&&semester_id={{$semester->id}}&&department_id={{$department->id}}" class=" ml-4btn btn-primary btn-sm">Fields</a></h4>

            <!-- {{$course}} -->

        </div>
    </div>

    <div class="card card-preview">
        <div class="card-inner">

            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                <thead>

                    <tr class="nk-tb-item nk-tb-head">
                        <th><span></span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Reg </span></th>


                        @foreach($fields as $key => $field)
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">{{$field->field_title}} ({{$field->field_marks}})</span></th>
                        @endforeach

                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Total </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text" >Grade </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action </span></th>
                        <th> <span></span></th>
                    </tr>
                </thead>


                <tbody>

                    @php($i =1)
                    @foreach($results as $result)

                    @php($field_marks =json_decode(($result->field_marks)))




                    <tr class="nk-tb-item ">
                        <td>
                            <form method="post" action="{{route('results.update',$result->id)}}" id="updateform{{$result->id}}">
                                @csrf @method('put')
                                <input type="text" value="{{$department->id}}" name="department_id" id="" hidden>
                        </td>
                        <td class="nk-tb-col">{{$i++}}</td>
                        <td class="nk-tb-col">{{$result->student->reg}}</td>
   

                        @foreach($fields as $key => $field)

                        <!-- if this is a new field it will be initialized  -->

                        @if(!isset($field_marks->$key ))
                        @php($field_marks->$key->field_marks=0 )
                        @endif



                        <td>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="field[{{$key}}]" class="form-control" id="b_marks{{$result->id}}" value="{{$field_marks->$key->marks}}">
                                </div>
                            </div>
                        </td>
                        @endforeach

  
                        <td class="nk-tb-col" id="total_marks{{$result->id}}" > {{$result->total_marks}} </td>
                        <td class="nk-tb-col" id="point{{$result->id}}" > {{$result->point}} </td>


                        <td class="nk-tb-col"> <button type="button" value="Update" onclick="updateresult({{$result->id}})" class="btn btn-success btn-sm p-1" style="padding: 2px;">update</button> </td>
                        <!-- <td class="nk-tb-col"> <button type="submit" value="Update"  class="btn btn-success btn-sm p-1" style="padding: 2px;">update</button> </td> -->


                        <td>
                            </form>
                        </td>

                    </tr>



                    <!-- updating all on database -->
                    <?php


                    ?>

                    @endforeach

                </tbody>
            </table>
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
      <strong class="mr-auto text-white">Result Update Done</strong>
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
    function updateresult(id) {
        console.log(('#updateform' + id))

        var form = $('#updateform' + id);
        console.log(form.serialize())

        // alert(form.attr('action'))


        // var attendance_marks = $('#attendance_marks' + id).val().trim();
        // var class_test_marks = $('#class_test_marks' + id).val().trim();
        // var a_code = $('#a_code' + id).val().trim();
        // var a_marks = $('#a_marks' + id).val().trim();
        // var b_code = $('#b_code' + id).val().trim();
        // var b_marks = $('#b_marks' + id).val().trim();
        var action = "{{route('results.index')}}" + "/" + id;
        // var token = "{{csrf_token()}}";

        // var data = {
        //     method: 'put',
        //     _token: token,
        //     id: id,
        //     attendance_marks: attendance_marks,
        //     class_test_marks: class_test_marks,
        // }
        // console.log(data)


        $.ajax({
            type: 'post',
            url: action,
            data: form.serialize(),
            success: function(data) {


                $('#pageloader').hide();
                // location.reload(true);
                // console.log('data');
                console.log(data);
                
                
                $('#total_marks' + id).text(data.total_marks)
                $('#point' + id).text(data.point) 
                
                $('.toast').toast('show');

                setInterval(function () { $('.closeToast').trigger( "click" );}, 2000);
         
                 
 
            },
            error: function(data) {

                $('#pageloader').hide();
                alert("Failed update ..... Try Again !!!!!!!!!!!")
                console.log('An error occurred.');
                console.log(data);
            },
        });


    }
</script>


@endsection
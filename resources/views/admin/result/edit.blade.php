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


            <h4 class="nk-block-title">{{$course->course_code}} | {{$course->title}}  <a href="{{route('fields.index')}}?course_id={{$results->first()->course_id}}&&session_id= {{$results->first()->session_id}}&&semester_id={{$results->first()->semester_id}}&&department_id={{$department->id}}" class=" ml-4btn btn-primary btn-sm">Fields</a></h4>
           

               

 
        </div>
    </div>

    <div class="card card-preview">
        <div class="card-inner">

            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                <thead>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Reg </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Attendance </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">TT </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">A_Code </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">A_Marks </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">B_Code </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">B_Marks </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Total </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Grade </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action </span></th>

                    </tr>
                </thead>


                <!-- <tfoot>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Title </span></th> 
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">student </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">result </span></th> 


                    </tr>
                </tfoot> -->

                <tbody>

                    @php($i =1)
                    @foreach($results as $result)

                
                    <form method="post" action="{{route('results.update',$result->id)}}">
                        @csrf
                        <tr class="nk-tb-item ">

                            <td class="nk-tb-col">{{$i++}}</td>
                            <td class="nk-tb-col">{{$result->student->reg}}</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" name="attendance_marks" class="form-control" id="attendance_marks{{$result->id}}" value="{{$result->attendance_marks}}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="form-control-wrap">

                                        <input type="text" name="class_test_marks" class="form-control" id="class_test_marks{{$result->id}}" value="{{$result->class_test_marks}}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" name="a_code" class="form-control" id="a_code{{$result->id}}" value="{{$result->a_code}}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" name="a_marks" class="form-control" id="a_marks{{$result->id}}" value="{{$result->a_marks}}">
                                    </div>
                                </div>
                            </td>
                             
                            <td>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" name="b_code" class="form-control" id="b_code{{$result->id}}" value="{{$result->b_code}}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" name="b_marks" class="form-control" id="b_marks{{$result->id}}" value="{{$result->b_marks}}">
                                    </div>
                                </div>
                            </td>
                             

                            <td class="nk-tb-col"> {{$result->total_marks}} </td>
                            <td class="nk-tb-col"> {{$result->point}} </td>


                            <td class="nk-tb-col"> <button type="button" value="Update" onclick="updateresult({{$result->id}})" class="btn btn-success btn-sm p-1" style="padding: 2px;">update</button> </td>




                        </tr>
                    </form>
                   
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>













<!-- @method("PUT") -->



@endsection


@section('js')
<script>
    function updateresult(id) {
        var attendance_marks = $('#attendance_marks' + id).val().trim();
        var class_test_marks = $('#class_test_marks' + id).val().trim();
        var a_code = $('#a_code' + id).val().trim();
        var a_marks = $('#a_marks' + id).val().trim();
        var b_code = $('#b_code' + id).val().trim();
        var b_marks = $('#b_marks' + id).val().trim();
        var action = "{{route('results.index')}}" + "/" + id;
        var token = "{{csrf_token()}}";
        
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
            data: {
                "_token": token,
                "_method": "PUT",
                "attendance_marks": attendance_marks,
                "class_test_marks": class_test_marks,
                "a_code": a_code,
                "a_marks": a_marks,
                "b_code": b_code,
                "b_marks": b_marks,


            },
            success: function(data) {
               

                $('#pageloader').hide();
                location.reload(true);
                // console.log('data');
                console.log(data);

                // viewSupplierData(supplier);
            },
            error: function(data) {

                $('#pageloader').hide();
                alert("Failed order ..... Try Again !!!!!!!!!!!")
                console.log('An error occurred.');
                console.log(data);
            },
        });


    }
</script>


@endsection
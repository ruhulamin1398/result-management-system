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
            <h4 class="nk-block-title">{{$course->course_code}} | {{$course->title}}</h4>
            <!-- <div class="nk-block-des">
                <p>All Projects And Task Details</p>

                <a href="#" class="btn btn-primary">Yesterday</a>


            </div> -->
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
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Term Test </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Final </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Total </span></th>
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
                                        <input type="text" name="writtent" class="form-control" id="writtent{{$result->id}}" value="{{$result->writtent}}">
                                    </div>
                                </div>
                            </td>


                            <td class="nk-tb-col"> {{$result->total_marks}} </td>


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
        var writtent = $('#writtent' + id).val().trim();
        var action = "{{route('results.index')}}" + "/" + id;
        var token = "{{csrf_token()}}";
        
        var data = {
            method: 'put',
            _token: token,
            id: id,
            attendance_marks: attendance_marks,
            writtent: writtent,
            class_test_marks: class_test_marks,
        }

        $.ajax({
            type: 'post',
            url: action,
            data: {
                "_token": token,
                "_method": "PUT",
                "attendance_marks": attendance_marks,
                "writtent": writtent,
                "class_test_marks": class_test_marks,


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
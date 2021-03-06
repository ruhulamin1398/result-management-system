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


            <h4 class="nk-block-title p-4">
                Fields <a href=" {{ url()->previous() }}"> <span class="btn btn-small btn-sm btn-primary mr-4" > Go Back</span></a>
            </h4>




        </div>



        <div class="card card-preview">
            <div class="card-inner">



                <form action="{{route('fields.store')}}" method="post">


                    @csrf

                    
           <input type="text" name="success_url" value="{{ url()->previous() }}" id="" hidden>


                    <div class="row g-4">


                        <input type="text" value="{{$session_semester_course->id}}" name="data_id" id="" hidden>


                        <div class=" col-12 col-lg-8 ">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" placeholder="TT marks" name="field_title" class="form-control" i required>
                                </div>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <button type="submit" class="btn  btn-primary">Create Field</button>
                            </div>
                        </div>
                    </div>
                </form>










            </div>
        </div>

    </div>

    <div class="card card-preview">
        <div class="card-inner">

            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                <thead>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Field </span></th>

                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action </span></th>

                    </tr>
                </thead>




                <tbody>

                    @php($i =1)
                    @foreach($fields as $key => $field)

                    <tr class="nk-tb-item ">

                        <td class="nk-tb-col"> {{$i++}} </td>

                        <td class="nk-tb-col"> {{$field}} </td>





                        <td class="nk-tb-col">
                            <form action="{{route('fields.update',$session_semester_course->id)}}" id="updateform{{$key}}" method="post">
                                @csrf
                                @method('put')
                                <input type="text" value="{{$session_semester_course->id}}" name="data_id" hidden >
                                <input type="text" value="{{$key}}" name="data_key" hidden >
                                <input type="text" value="{{$field}}" id="value{{$key}}" name="field" hidden  >
                                <input type="text" name="success_url" value="{{ url()->previous() }}" id="" hidden>


                            </form>

                            <script>
                                function updateform{{$key}}(){
                                    var field = prompt("change {{$field}} : ");
                                     $("#value{{$key}}").val(field);
                                    $("#updateform{{$key}}").submit();

                                }
                            </script>

                            <form action="{{route('fields.destroy',$session_semester_course->id)}}" id="deleteform{{$key}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="text" value="{{$session_semester_course->id}}" name="data_id" hidden >
                                <input type="text" value="{{$key}}" name="data_key" hidden >
                                <input type="text" name="success_url" value="{{ url()->previous() }}" id="" hidden>
                            </form>
                            
                            <button type="button" class="btn btn-success btn-sm p-1 pl-2 pr-2 ml-1"   style="padding: 2px;"  onclick="updateform{{$key}}();"    >edit</button>
                            
                        
                            
                            <button type="button" class="btn btn-danger btn-sm p-1 pl-2 pr-2  ml-1" style="padding: 2px;" onclick=" if (confirm('do you want to delete this? This Cann`t be undone ')) {$('#deleteform{{$key}}').submit();} else {false;}">delete</button>
                        </td>




                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>













<!-- @method("PUT") -->



@endsection
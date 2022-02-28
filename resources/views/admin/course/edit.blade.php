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
            <h4 class="nk-block-title">Update Session</h4>
            <!-- <div class="nk-block-des">
                <p>All Projects And Task Details</p>

                <a href="#" class="btn btn-primary">Yesterday</a>


            </div> -->
        </div>
    </div>

    <div class="card card-preview">
        <div class="card-inner">





            <form action="{{route('courses.update',$course->id)}}" method="post">


            @csrf
            @method('put')
                <div class="row g-4">

                    
 
                    <div class=" col-12 col-lg-12 ">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" placeholder="Course Code" value="{{$course->course_code}}" name="course_code" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" placeholder="Course Title " value="{{$course->title}}" name="title" class="form-control" required>
                            </div>
                        </div>

                    </div>

                    <div class=" col-12 col-lg-12 ">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" placeholder="Credit"  value="{{$course->credit}}"  name="credit" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" value="{{$course->type}}" name="type" id="default-06">
                                       
                                    @if($course->type==1)
                                    <option value="1" selected>Theory</option>
                                        <option value="2">Lab</option>

                                     @else    
                                     
                                    <option value="1" >Theory</option>
                                        <option value="2" selected>Lab</option>
                                     @endif

                                    </select>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-12 ">

                    <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" placeholder="total Marks"  value="{{$course->marks}}"  value="100" name="marks" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-control-wrap">
                                <button type="submit" class="btn  btn-primary">Create Course</button>
                            </div>
                        </div>
                    </div>
                </div>
                  





                  
                   
                </div>
            </form>










        </div>
    </div>
</div>


 













@endsection
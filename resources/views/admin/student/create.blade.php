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
            <h4 class="nk-block-title">New Student</h4>
            <!-- <div class="nk-block-des">
                <p>All Projects And Task Details</p>

                <a href="#" class="btn btn-primary">Yesterday</a>


            </div> -->
        </div>
    </div>

    <div class="card card-preview">
        <div class="card-inner">





            <form action="{{route('students.store')}}" method="post">


            @csrf
                <div class="row g-4">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="pay-amount-1">Registration number</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="pay-amount-1" name="reg" required>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1"> Name</label>
                            <div class="form-control-wrap">
                                <input type="text" name="name" class="form-control" id="full-name-1" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="email-address-1">Email address</label>
                            <div class="form-control-wrap">
                                <input type="text" name="email" class="form-control" id="email-address-1" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="phone-no-1">Phone No</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="phone" id="phone-no-1">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="default-06">Sex</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" name="sex" id="default-06">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="phone-no-1">Address</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="address" id="phone-no-1">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="default-06">Deparment</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" name="department_id" value=""  required>
                                    <option value="">Select department</option> 
                                        @foreach($departments as $department)
                                        
                                        <option value="{{$department->id}}">{{$department->title}}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>     <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="default-06">Session</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" name="session_id" required>
                                        
                                    <option value="">Select Session</option> 
                                        @foreach($study_sessions as $study_session)
                                        
                                        <option value="{{$study_session->id}}">{{$study_session->title}}</option> 
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>




                  
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                        </div>
                    </div>
                </div>
            </form>










        </div>
    </div>
</div>















@endsection
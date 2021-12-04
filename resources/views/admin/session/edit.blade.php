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
            <h4 class="nk-block-title">New Session</h4>
            <!-- <div class="nk-block-des">
                <p>All Projects And Task Details</p>

                <a href="#" class="btn btn-primary">Yesterday</a>


            </div> -->
        </div>
    </div>

    <div class="card card-preview">
        <div class="card-inner">





            <form action="{{route('study_sessions.update',$studySession->id)}}" method="post">


            @csrf
            @method('put')
                <div class="row g-4">

                    



                    <div class=" col-12 col-lg-8 ">
                        <div class="form-group">
                             <div class="form-control-wrap">
                                <input type="text" placeholder="2020-2021" name="title" class="form-control"  value="{{$studySession->title}}" required>
                            </div>
                        </div>
                    </div>
                    
                  





                  
                    <div class="col-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Informations</button>
                        </div>
                    </div>
                </div>
            </form>










        </div>
    </div>
</div>


 













@endsection
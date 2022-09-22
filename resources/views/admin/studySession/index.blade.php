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
            <h4 class="nk-block-title">Sessions | {{$department->title}}</h4>
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
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Title </span></th> 
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">student </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">result </span></th>  

                    </tr>
                </thead>


                <tfoot>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Title </span></th> 
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">student </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">result </span></th>   


                    </tr>
                </tfoot>

                <tbody>
                    @php($i =1)
                    @foreach($department->studySessions as $studySession)

                 @if($studySession->session)
                    <tr class="nk-tb-item ">

                        <td class="nk-tb-col">{{$i++}}    </td>
                        <td class="nk-tb-col">{{$studySession->session->title}}</td>
                        <td class="nk-tb-col">  <a href="{{route('students.index')}}?department_id={{$department->id}}&&session_id={{$studySession->session->id}}"  class="btn btn-success btn-sm p-1" style="padding: 2px;">View</a>  </td>
                        <td class="nk-tb-col">  <a href="{{route('results.index')}}?department_id={{$department->id}}&&session_id={{$studySession->session->id}}"  class="btn btn-success btn-sm p-1" style="padding: 2px;">result</a>  </td>
                                               
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

















@endsection
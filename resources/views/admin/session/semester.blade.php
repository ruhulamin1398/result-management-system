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
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Courses </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Course offer </span></th>

                    </tr>
                </thead>


                <tfoot>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Title </span></th> 
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Courses </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Course offer </span></th>


                    </tr>
                </tfoot>

                <tbody>
                    @php($i =1)
                    @foreach($semesters as $semester)
                    <tr class="nk-tb-item ">

                        <td class="nk-tb-col">{{$i++}}</td>
                        <td class="nk-tb-col">{{$semester->title}}</td>
                        <td class="nk-tb-col">  <a href="{{route('courses.index')}}?department_id={{$department->id}}&&semester_id={{$semester->id}}"  class="btn btn-success btn-sm p-1" style="padding: 2px;">View</a>  </td>
                        
                        @if(1)
                         
                        <td class="nk-tb-col">  <a href="{{route('course-offerings.index')}}?department_id={{$department->id}}&&semester_id={{$semester->id}}"  class="btn btn-success btn-sm p-1" style="padding: 2px;">Open</a>  </td>
                     
                        @else 
                         
                        <td class="nk-tb-col">  <a href="{{route('course-offerings.index')}}?department_id={{$department->id}}&&semester_id={{$semester->id}}"  class="btn btn-success btn-sm p-1" style="padding: 2px;">Closed</a>  </td>
                     
                        @endif

                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
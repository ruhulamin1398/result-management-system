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
                <p>{{$semester->title}}</p>

                <!-- <a href="#" class="btn btn-primary">Yesterday</a> -->


            </div>
        </div>
    </div>

    <div class="card card-preview">
        <div class="card-inner">

            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                <thead>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Code</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">title</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">credit</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">result</span></th>

                    </tr>
                </thead>


                <tfoot>

                
                </tfoot>

                <tbody>
                    @php($i =1)
                    @foreach($courses as $course)
                    <tr class="nk-tb-item ">

                        <td class="nk-tb-col">{{$i++}}</td>
                        <td class="nk-tb-col">{{$course->course_code}}</td>
                        <td class="nk-tb-col">{{$course->title}}</td>
                        <td class="nk-tb-col">{{$course->credit}}</td>
                     <td class="nk-tb-col">  <a href="{{route('results.index')}}?course_id={{$course->id}}"  class="btn btn-success btn-sm p-1" style="padding: 2px;">View</a>  </td>  
                      
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

















@endsection
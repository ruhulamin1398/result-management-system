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
            <h4 class="nk-block-title">Departments</h4>
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
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Sort Form </span></th> 
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Title </span></th>

                    </tr>
                </thead>


                <tfoot>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Sort Form </span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Title </span></th>
            

                    </tr>
                </tfoot>

                <tbody>
                    @php($i =1)
                    @foreach($departments as $department)
                    <tr class="nk-tb-item ">

                        <td class="nk-tb-col">{{$i++}}</td>
                        <td class="nk-tb-col">{{$department->sort_form}}</td>
                        <td class="nk-tb-col">{{$department->title}}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

















@endsection
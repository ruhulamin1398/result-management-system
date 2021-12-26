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
            <h4 class="nk-block-title">{{Auth::user()->profile->department->title}}</h4>
            <div class="nk-block-des">
                <p>OFFER <span class="font-weight-bold border border-dark p-1 pl-2 pr-2 mr-4 ml-2"> 35.00 </span> | ENROLLED <span class="font-weight-bold border border-dark p-1 pl-2 pr-2 mr-4 ml-2"> 25.5 </span> </p>



            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">

            <div class="card card-preview">
                <div class="card-inner">
                    <h4 class="nk-block-title text-center">Theorey courses (Regular)</h4>
                    <table class=" nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                        <thead>

                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Code</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">title</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">credit</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Registration</span></th>

                            </tr>
                        </thead>


                        <tfoot>


                        </tfoot>

                        <tbody>
                            @php($i=1)
                            @php($credit=0)
                            @foreach($results as $result)
                            @if($result->course->type ==1)
                            @php($credit +=$result->course->credit)
                            <tr class="nk-tb-item ">

                                <td class="nk-tb-col"> {{$i++}} </td>
                                <td class="nk-tb-col"> {{$result->course->course_code}} </td>
                                <td class="nk-tb-col"> {{$result->course->title}}</td>
                                <td class="nk-tb-col"> {{$result->course->credit}}</td>

                                <td class="nk-tb-col">
                                    @if($result->is_registered ==1)

                                    <a href="{{route('enroll.edit',$result->id)}} " class="btn btn-danger btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">Remove</a>
                                    @else

                                    <a href="{{route('enroll.edit',$result->id)}} " class="btn btn-success btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">Add</a>
                                    @endif

                                </td>

                            </tr>
                            @endif
                            @endforeach

                            <tr class="nk-tb-item ">

                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> Total</td>

                                <td class="nk-tb-col">
                                    <span class="font-weight-bold border border-dark p-1 pl-2 pr-2 mr-4 ml-4"> {{$credit}} </span> Credit

                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="col-12 col-md-6">

            <div class="card card-preview">
                <div class="card-inner">
                    <h4 class="nk-block-title text-center">Lab courses (Regular)</h4>
                    <table class=" nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                        <thead>

                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Code</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">title</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">credit</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Registration</span></th>

                            </tr>
                        </thead>


                        <tfoot>


                        </tfoot>

                        <tbody>
                            @php($i=1)
                            @php($credit=0)
                            @foreach($results as $result)
                            @if($result->course->type ==2)
                            @php($credit +=$result->course->credit)
                            <tr class="nk-tb-item ">

                                <td class="nk-tb-col"> {{$i++}} </td>
                                <td class="nk-tb-col"> {{$result->course->course_code}} </td>
                                <td class="nk-tb-col"> {{$result->course->title}}</td>
                                <td class="nk-tb-col"> {{$result->course->credit}}</td>

                                <td class="nk-tb-col">
                                    @if($result->is_registered ==1)

                                    <a href="{{route('enroll.edit',$result->id)}} " class="btn btn-danger btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">Remove</a>
                                    @else

                                    <a href="{{route('enroll.edit',$result->id)}} " class="btn btn-success btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">Add</a>
                                    @endif

                                </td>

                            </tr>
                            @endif
                            @endforeach


                            <tr class="nk-tb-item ">

                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> Total</td>

                                <td class="nk-tb-col">
                                    <span class="font-weight-bold border border-dark p-1 pl-2 pr-2  ml-4"> {{$credit}} </span> 

                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 mt-4">

            <div class="card card-preview">
                <div class="card-inner">
                    <h4 class="nk-block-title text-center">Theorey courses (Drop)</h4>
                    <table class=" nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                        <thead>

                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Code</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">title</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">credit</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Registration</span></th>

                            </tr>
                        </thead>


                        <tfoot>


                        </tfoot>

                        <tbody>
                            @php($i=1)
                            @php($credit=0)
                            @foreach($dropCourseArray as $result)
                                @if($result->course->type ==1)
                                @php($credit +=$result->course->credit)
                                <tr class="nk-tb-item ">

                                <td class="nk-tb-col"> {{$i++}} </td>
                                <td class="nk-tb-col"> {{$result->course->course_code}} </td>
                                <td class="nk-tb-col"> {{$result->course->title}}</td>
                                <td class="nk-tb-col"> {{$result->course->credit}}</td>

                                <td class="nk-tb-col">
                                    @if($result->is_registered ==1)

                                    <a href="{{route('enroll.edit',$result->id)}} " class="btn btn-danger btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">Remove</a>
                                    @else

                                    <a href="{{route('enroll.edit',$result->id)}} " class="btn btn-success btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">Add</a>
                                    @endif

                                </td>

                                </tr>
                                @endif
                            @endforeach


                            <tr class="nk-tb-item ">

                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> Total</td>

                                <td class="nk-tb-col">
                                    <span class="font-weight-bold border border-dark p-1 pl-2 pr-2 ml-4"> {{$credit}} </span> 

                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 mt-4">

            <div class="card card-preview">
                <div class="card-inner">
                    <h4 class="nk-block-title text-center">Lab courses (Drop)</h4>
                    <table class=" nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                        <thead>

                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Code</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">title</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">credit</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Registration</span></th>

                            </tr>
                        </thead>


                        <tfoot>


                        </tfoot>

                        <tbody>
                            @php($i=1)
                            @php($credit=0)
                            @foreach($dropCourseArray as $result)
                                @if($result->course->type ==2)
                                @php($credit +=$result->course->credit)
                                <tr class="nk-tb-item ">

                                <td class="nk-tb-col"> {{$i++}} </td>
                                <td class="nk-tb-col"> {{$result->course->course_code}} </td>
                                <td class="nk-tb-col"> {{$result->course->title}}</td>
                                <td class="nk-tb-col"> {{$result->course->credit}}</td>

                                <td class="nk-tb-col">
                                    @if($result->is_registered ==1)

                                    <a href="{{route('enroll.edit',$result->id)}} " class="btn btn-danger btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">Remove</a>
                                    @else

                                    <a href="{{route('enroll.edit',$result->id)}} " class="btn btn-success btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">Add</a>
                                    @endif

                                </td>

                                </tr>
                                @endif
                            @endforeach


                            <tr class="nk-tb-item ">

                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> </td>
                                <td class="nk-tb-col"> Total</td>

                                <td class="nk-tb-col">
                                    <span class="font-weight-bold border border-dark p-1 pl-2 pr-2 ml-4"> {{$credit}} </span> 

                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>

















@endsection
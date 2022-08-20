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
                Fields <a href=" {{ url()->previous() }}"> <span class="btn btn-small btn-sm btn-primary mr-4"> Go Back</span></a>
            </h4>




        </div>



        <div class="card card-preview">
            <div class="card-inner">



                <form action="{{route('fields.store')}}" method="post">


                    @csrf


                    <input type="text" name="success_url" value="{{ url()->previous() }}" id="" hidden>

                    <div class="row g-4">
                        <input type="text" value="{{$session_semester_course->id}}" name="data_id" id="" hidden>

                        <div class=" col-12 col-lg-10 row ">
                            <div class="form-group col-6">
                                <div class="form-control-wrap">
                                    <input type="text" placeholder="Field title" name="field_title" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-2">
                                <div class="form-control-wrap">
                                    <input type="number" placeholder="marks" name="field_marks" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-4 pt-2 pl-4">
                                <div class="form-control-wrap">

                                <input type="checkbox"  name="is_dynamic" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Make Dynamic </label>
                                <small> <u> <em>  use this field on  adjustment calculation   </em></u></small>
                                </div>
                            </div>
 
                        </div>

                        <div class="col-2">
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

                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">mark </span></th>

                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Type </span></th>

                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action </span></th>

                    </tr>
                </thead>




                <tbody>

                    @php($i =1)
                    @foreach($fields as $key => $field)

                    <tr class="nk-tb-item ">

                        <td class="nk-tb-col"> {{$i++}} </td>

                            <td class="nk-tb-col"> {{$field->field_title}} </td>

                            <td class="nk-tb-col"> {{$field->field_marks}} </td>
                            @if($field->is_dynamic==1)

                            <td class="nk-tb-col font-weight-bold">  Dynamic </td>
                            @else
                            @php ($field->is_dynamic=0)
                            <td class="nk-tb-col">Not Dynamic </td>
                            @endif 



 

                        <td class="nk-tb-col">
                        
                      
                           
                          

                             
                         

                            <form action="{{route('fields.destroy',$session_semester_course->id)}}" id="deleteform{{$key}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="text" value="{{$session_semester_course->id}}" name="data_id" hidden>
                                <input type="text" value="{{$key}}" name="data_key" hidden>
                                <input type="text" name="success_url" value="{{ url()->previous() }}" id="" hidden>
                            </form>

                            <button type="button" class="btn btn-primary"   onclick="openEditModal('{{$key}}','{{$field->field_title}}', '{{$field->field_marks}}', '{{$field->is_dynamic}}'  )" >Edit</button>
                         


                            <button type="button" class="btn btn-danger btn-sm p-1 pl-2 pr-2  ml-1" style="padding: 2px;" onclick=" if (confirm('do you want to delete this? This Cann`t be undone ')) {$('#deleteform{{$key}}').submit();} else {false;}">delete</button>
                        </td>

                   


                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        





      <form action="{{route('fields.update',$session_semester_course->id)}}"  method="post">
                                @csrf
                                @method('put')
  

<input type="text" name="success_url" value="{{ url()->previous() }}" id="" hidden >

<div class="row g-4">
    <input type="text" value="{{$session_semester_course->id}}" name="data_id" id="" hidden>
    <input type="text" value="" name="key" id="editKey" hidden>


    <div class=" col-12 col-lg-12 row ">
        <div class="form-group col-12">
            <div class="form-control-wrap">
                <input type="text" placeholder="Field title" name="field_title" id="field_title" class="form-control" required>
            </div>
        </div>

        <div class="form-group col-12">
            <div class="form-control-wrap">
                <input type="number" placeholder="marks" name="field_marks"  id="field_marks" class="form-control" required>
            </div>
        </div>

        <div class="form-group col-12 pt-2 pl-4">
            <div class="form-control-wrap">

            <input type="checkbox"  name="is_dynamic" class="form-check-input" id="makeDynamic">
            <label class="form-check-label" for="makeDynamic">Make Dynamic </label>
            <small> <u> <em>  use this field on  adjustment calculation   </em></u></small>
            </div>
        </div>

        <div class="col-12">
        <div class="form-group">
            <button type="submit" class="btn  btn-primary">Update</button>
        </div>
    </div>

    </div>

    
</div>
</form>


      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div> -->
    </div>
  </div>
</div>






<script>
function openEditModal(key,field_title,field_marks,is_dynamic){

    $("#editKey").val(key);
$("#field_title").val(field_title);
$("#field_marks").val(field_marks);
if(is_dynamic == 1)
    $("#makeDynamic").attr('checked', true);
    else
        $("#makeDynamic").attr('checked', false);

 
 
$("#exampleModal").modal();
}


</script>






 



@endsection
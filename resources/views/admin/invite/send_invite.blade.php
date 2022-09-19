@extends('admin.layouts.app')

@section('title','Send Invite   || PathPorts')

@section('content') 

 <style type="text/css">
   .tox-statusbar__branding
    {
        display:none;
    }
    
    .tox-notification__body
    {
        display:none;
    }
    
    .tox-notifications-container
    {
        display:none;
    }
    span.select2-selection.select2-selection--multiple {
    height: 33px !important;
}
 .header-navbar .navbar-container, .card {
    box-shadow:unset !important;
}
nav.header-navbar.navbar.navbar-expand-lg.align-items-center.floating-nav.navbar-light.navbar-shadow.container-xxl {
    padding: 0px !important;
}
button#survey_submit {
     padding: 4px 14px !important;
    margin-right: 15px;
    margin-top: 5px;
}
.container.survey-checkbox {
    padding-top: 29px;
}
.survey-category {
    margin-top: 16px !important;
}
li.select2-selection__choice {
    margin-bottom: 5px !important;
    padding: 0px 9px !important;
}
li.survey-list {
    display: flex;
    width: 100%;
    padding: 0 21px 8px 0px;
    justify-content: space-between;
    background: #fff;
    margin-bottom: 8px;
    padding-top: 8px;
    font-weight: 400;
    letter-spacing: 1px;
    padding-left: 15px;
}
li.survey-list:hover {
    color: #38c9ff;
}
svg#minus_1 {
    color: white;
    font-weight: bold;
    background: #ff0000;
    padding: 3px 6px;
    border: 1px solid #000000;
}
svg#minus_1:hover {
    background: none;
    color: red;
}
.survey-category {
   padding-right: calc(var(--bs-gutter-x) * .5);
   padding-left: calc(var(--bs-gutter-x) * .5);
}
.container.survey-checkbox {
    padding-top: 29px;
    max-width: 1104px;
    padding-left: 0px;
    margin: auto;
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5);
}
.container.survey-checkbox ul {
    border: 1px solid #d8d6de;
    padding: 18px;
    background: #38c9ff4d;
}
label.form-label.category-label {
    padding-bottom: 3px;
    padding-top: 5px;
    padding-left: 5px;
}

</style>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


    <!-- BEGIN: Content-->
    
        <div class="alert-msg success-msg" style="display:none;">
              <span class="closebtn">&times;</span>  
              <strong id="resultDiv"></strong>
        </div>
    
        <div class="content-wrapper container-xxl p-0 container-main-div">
            <div class="content-header row">
                
                    
             

            </div>

            <div class="col-12 d-flex mb-2">

                <h2 class="content-header-title float-start mb-0"style="padding-bottom:15px;">Invite</h2>

            </div>

            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif 



            <div class="content-body">
                <div class="row">
                    <div class="col-12">


                  
                        <div class="card">

                            <div class="card-body py-4 my-25">


                                <!-- form -->
                                <form class="validate-form mt-0" method="post" action="{{route('create-invite')}}" id="invite" >
                                    @csrf
                                    <div class="row ">

                                    <div class="col-lg-6 col-md-12 pb-2 inviteusr">
                                            <label for="language" class="form-label"style="margin-top: 1rem; margin-bottom: 0.5rem;">Type Of Users</label>
                                            <select class="form-select select2" id="user_role"  name="role">
                                               
                                                @foreach($roles as $users_role)
                                                    <option value="{{$users_role->id}}" {{$users_role->id, old("role") ?: [] ? "selected": ""}} >{{$users_role->name}}</option>
                                                @endforeach
                                            </select>
                                             
                                        </div> 
                                        <div class="col-lg-6 col-md-6 pb-2"> <label for="language" class="form-label"style="margin-top: 1rem; margin-bottom: 0.5rem;">Users</label>
                                    <select  class="select2-data-array form-select selectpicker p-0 m-0 " id="users" multiple data-live-search="true" name="user[]" >
                                           
                                                   
                                               
                                    </select>
                                </div>
                                           <div class="col-lg-12 col-md-12 pb-2">
                                            <label for="language" class="form-label"style="margin-top: 1rem;margin-bottom: 0.5rem;">Subject</label>
                                             <input  type="text" id="modalEditUsersubject" name="subject" class="form-control @error('subject') is-invalid @enderror"  value="{{old('subject')}}"  />
                                                 @error('subject')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                            
                                        </div>
                                      
                                        

                                        
                                         <div class="form-group pt-2">
                                              <label style="padding-left: 5px;">Message</label>
                                             <!-- <textarea id="editor"></textarea> -->
                                               <textarea class="tinymce-editor @error('message') is-invalid @enderror" name="message"></textarea>  @error('message')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                          </div>
                                          <div class="container">
                                        <div class="row">
                                        <div class="col-md-12 surverycheck mt-3">
                                            <div class="checksurvery">
                                         <div class="form-check survery_category">
                                              <input class="form-check-input send_invite " type="checkbox" value="1" name="send_invite" id="send_invite" >
                                              <label class="form-check-label" for="flexCheckChecked"style="padding-top: 3px;">
                                                Add Survey
                                              </label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-12 col-md-12 survey-category "><label class="form-label category-label" for="basicSelect">Survey Category</label>
                                    <select class="form-select select2" id="survey_category" name="survey_category">
                                            <option value="">Select Survey Category</option>
                                            <option value="1">Income By Major</option>
                                            <option value="2">Econ Majors</option>
                                            <option value="3">Spokane Medical School</option>
                                            <option value="4">Location</option>
                                            <option value="5">Demographic</option>
                                            <option value="6">College Level</option>
                                            <option value="7">Team or program level</option>
                                            <option value="8">Individual Level</option>
                                    </select>
                                </div>

                                <div class="container survey-checkbox">
                                </div>   
                                <input type="hidden" id="hidden_ques" name="hidden_ques" value="">      
                                <button type="submit" class="btn btn-primary inviter">Submit</button>
                            </div>
                            </div>
                        </form>
                           
                            </div>
                        </div>

 
                       
                    </div>
                </div>

            </div>
        </div>

    <!-- END: Content-->
    
 


@endsection


@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-flat-pickr.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-pickadate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endsection



@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('/')}}assets/admin/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/datatables.buttons.min.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.date.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.time.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/legacy.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/forms/pickers/form-pickers.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/forms/form-select2.js"></script>
    <<!-- script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

   
<script type="text/javascript">
        $(".survey-category").hide();
        $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount:5,
        searchResultLimit:5,
        renderChoiceLimit:5
      }); 
     
     
 });
</script>
  
    <script type="text/javascript">
     
       
       
        tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount', 'image'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
        });


    $('#send_invite').on('click',function() {
     
        var checkbox= $('input[name="send_invite"]:checked').val();
        if(this.checked){
            $(".survey-category").show();
        }else{
            $(".survey-category").hide();
            $(".survey-checkbox").hide();
        }
    });
    
   
    

    $("#survey_category").change( function() { 
       
        var title = $('#survey_category :selected').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:"POST",
            url:"/pathports/get_survey_data",
            dataType: 'json',
            data:{title:title},
            success: function (res){
                $('.survey-checkbox').html('');
                    var html=``;
                    var ques_array = [];
                    if(res !=""){
                        var html=html+`<ul class="ques_ul">`;
                        $.each(res, function(index, val) {
                            ques_array.push(val.id);
                        html = html+`<li class="survey-list" name="survey_list" value="${val.id}">${val.question}<i class="fa fa-remove" id="minus_1" onclick="remove_data(this)"></i></li>`;
                        });
                        var html =html+`</ul>`;
                        console.log(ques_array);
                        $('#hidden_ques').val(ques_array);
                        $('.survey-checkbox').html(html);
                    }
                    
            }
        });
    });

    function remove_data(data){
        
       
           $(data).parent().closest('li').remove(); 
       
          // $('.ques_ul').remove();  
       
        
    }
    
   $("#user_role").change( function() { 
    var user_role = $('#user_role :selected').val();
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:"POST",
            url:"/pathports/get_user_data",
            dataType: 'json',
            data:{user_role:user_role},
            success: function (res){
                console.log(res);
                var html = ``;
                 $.each(res, function(index, val) {
                   
                    html = html+`<option value="${val.id}">${val.firstName} ${val.lastName}</option>`;

                 });
                  $('#users').html(html);

            }
        });
   

   });
</script>

@endsection






@extends('admin.layouts.app')

@section('title','Survey Manage || PathPorts')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>


    <!-- BEGIN: Content-->
    
        <div class="alert-msg success-msg" style="display:none;">
              <span class="closebtn">&times;</span>  
              <strong id="resultDiv"></strong>
        </div>
    
        <div class="content-wrapper container-xxl p-0 container-main-div">
            <div class="content-header row">
                
                    
               
              

            </div>

            <div class="col-12 d-flex mb-2">

                <h2 class="content-header-title float-start mb-0">Survey Management</h2>

            </div>

      



            <div class="content-body">
                <div class="row">
                    <div class="col-12">


                        <!-- profile -->
                        <div class="card">

                            <div class="card-body py-2 my-25">


                                <!-- form -->
                               <form class="validate-form mt-0"  id="surveyManage" method="post" onsubmit="return false" >

                                <div class="col-12 col-md-6">



<label class="form-label" for="basicSelect">Survey Title</label>



<select class="form-select select2-data-array @error('survey_title') is-invalid @enderror" id="surveytitle" name="title">



    <option value="">Select Survey Title</option>
    <!-- <option value="1">WSU REC Salary</option> -->
    <option value="1">Income By Major</option>
    <option value="2">Econ Majors</option>
    <option value="3">Spokane Medical School</option>
    <option value="4">Location</option>
    <option value="5">Demographic</option>
    <option value="6">College Level</option>
    <option value="7">Team or program level</option>
    <option value="8">Individual Level</option>
   
     

          


</select>
@error('university_id')<div class="invalid-feedback"> {{ $message }} </div>@enderror


</div>
                                    <input  type="text" id="user_id" name="addMoreInputFields[0][user_id]" class="form-control @error('question') is-invalid @enderror"  value="<?php echo Auth::user()->id ?>" style="display:none"  />
                                    <div class="row sub_col_1" id = "col_11">

                                        <div class="col-lg-6 col-md-12 pb-2 inviteusrqusans">
                                            <label for="language" class="form-label"style="margin-top: 1rem; margin-bottom: 0.5rem;">Question</label>
                                           
                                           <input  type="text" id="question" name="addMoreInputFields[0][question]" class="form-control @error('question') is-invalid @enderror"  value="{{old('question')}}"  />
                                                 @error('question')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                        </div>
                                           <div class="col-lg-6 col-md-12 pb-2 inviteusrqusans">
                                            <label for="language" class="form-label"style="margin-top: 1rem;margin-bottom: 0.5rem;">Answer</label>
                                             <input  type="text" id="answer" name="addMoreInputFields[0][answer]" class="form-control @error('answer') is-invalid @enderror"  value="{{old('answer')}}"  />
                                                 @error('answer')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                            
                                        </div>
                                        <i class="fa-solid fa-plus" id="plus" onclick="append(event,this,1)"></i>
                                    </div>
                                         <button type="submit" class="btn btn-primary inviter waves-effect waves-float waves-light" >Save</button>
                                       </div>
                                     
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>


                        <!--/ profile -->
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

@endsection

    <script>
      var i = 0;
      var j = 1;
      var k = 1;
      function append(e,a,id){
   
       var div_count = $(".sub_col_"+id).length;
       var div_count_other=div_count + 1;
       var div_pre = div_count_other-1;
     
       
       var html= `<input  type="text" id="user_id" name="addMoreInputFields[${k++}][user_id]" class="form-control @error('question') is-invalid @enderror"  value="<?php echo Auth::user()->id; ?>" style="display:none"  /><div class="row sub_col_${id}" id = "col_${id}${div_count_other}"> <div class="col-lg-6 col-md-12 pb-2 inviteusr"><input  type="text" id="question" name="addMoreInputFields[${i++}][question]" class="form-control @error('question') is-invalid @enderror"  value="{{old('question')}}"  />@error('question')<div class="invalid-feedback"> {{ $message }} </div>@enderror</div><div class="col-lg-6 col-md-12 pb-2"><input  type="text" id="answer" name="addMoreInputFields[${j++}][answer]" class="form-control @error('answer') is-invalid @enderror"  value="{{old('answer')}}"  />@error('answer')<div class="invalid-feedback"> {{ $message }} </div>@enderror</div><i class="fa-solid fa-minus" id="minus" onclick="remove_data(this)"></i></div>`

            console.log(html);
            $('#col_'+id+div_pre).after(html);
        }


        function remove_data(data){

            $(data).parents(".sub_col_1").remove();
            
        }
        
      

    </script>

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

<script type="text/javascript">

      $('#surveyManage').on('submit',function(){

            var title = $('#surveytitle :selected').val();
            var question = $('#question').val();
            var answer = $('#answer').val();

            console.log("title",title);
            console.log("question",question);
            console.log("answer",answer);
//           
               var question = [];
               var answer = [];

                  $('.sub_col_1').each( function() {
                    var ques = $(this).find("#question").val(); 
                    var ans = $(this).find("#answer").val();
                   
                   
               question.push(ques);
               answer.push(ans);
                
               
            });
            console.log("question",question);
            console.log("answer",answer);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
               $.ajax({

               url:'create_surveymanage',
               method:'POST',
               dataType: 'json',
               data:$(this).serialize(),
               success:function(res){
                $(".success-msg").css("display", "block");
                    $("#resultDiv").html("Survey Manage Saved Successfully!!");
                        
                    setTimeout(function() {
                        $("#resultDiv").fadeOut();
                        location.reload();
                    }, 2000);
                  },
                  
            });

            
        });
</script>
@endsection






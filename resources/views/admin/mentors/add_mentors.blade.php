@extends('admin.layouts.app')

@section('title','Mentors || PathPorts')

@section('content')
<?php 
$id_array=array();
foreach($mentor_data as $mentor_datas){
    $ids = $mentor_datas['mentor_id'];
    array_push($id_array,$ids);
}
$mentors_data_array=json_encode($id_array);

?>

    <!-- BEGIN: Content-->
    <div class="alert-msg success-msg" style="display:none;">
        <span class="closebtn">&times;</span>  
        <strong id="resultDiv"></strong>
    </div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <!-- <h2 class="content-header-title float-start mb-0">Choose Your On Campus Mentors</h2> -->
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Mentors</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Lists</a>
                                </li>
                                <li class="breadcrumb-item active">Add Mentors
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        
               <div class="row">
                  <div class="col-md-12 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="73dMHZHnIg">
                     <div class="panel lobidisable panel-bd lobipanel lobipanel-sortable" data-inner-id="73dMHZHnIg" data-index="0">
                        <div class="panel-heading ui-sortable-handle">
                           <div class="panel-title" style="max-width: calc(100% - 90px);">
                              <h4 class="Mentors-heading">Mentors</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="row" id="mentor_main">
                                <div class="col-md-6 off_campus">
                                    <label class="pt-1">Add Off Campus Mentors</label>
                                    <input type="text" class="form-control @error('off_campus') is-invalid @enderror" value="" name="off_campus" id="off_campus">
                                    @error('off_campus')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                </div> 
                                <div class="col-md-6 demo-section">
                                     <label class="pt-1">Select On Campus Mentors</label>
                                    <select id="customers" class="form-select @error('on_campus') is-invalid @enderror on-campus-select " name="on_campus" required data-required-msg="Select On Campus Mentors"></select>
                                    @error('on_campus')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                </div>
                            </div>

                            <div class="col-12 text-center mt-1 pt-1">
                                <button type="submit" class="btn btn-primary " name="add_mentor" id="add_mentor">Save</button>
                            </div>  
                        </div>
                     </div>
                  </div>
               </div>
            
        <!-- <div class="card">

            
            <div class="content-body">
                
                
                <div id="mentor_main">
                    <div class="off_campus">
                        <label class="pt-1">Add Off Campus Mentors</label>
                        <input type="text" class="form-control" value="" name="off_campus" id="off_campus">
                        
                    </div> 
                    <div class="demo-section">
                         <label class="pt-1 pb-1">Select On Campus Mentors</label>
                        <select id="customers" class="form-select on-campus-select" style="width: 81%;"></select>
                    </div>
                </div>

                <div class="col-12 text-center mt-1 mb-1 pt-30">
                    <button type="submit" class="btn btn-primary me-1" name="add_mentor" id="add_mentor">Save</button>
                </div>  

            </div>
        </div> -->
    </div>
    <br><br>

  

        
<div class="row">
    <div class="col-sm-6 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="SS6revpPV6">
      <div class="panel lobidisable panel-bd lobipanel lobipanel-sortable panel-offCampus" data-inner-id="SS6revpPV6" data-index="0">
         <div class="panel-heading ui-sortable-handle">
            <div class="panel-title" style="max-width: calc(100% - 90px);">
               <h4 class="On-Campus-heading">Off Campus Mentors</h4>
            </div>
            
         </div>
         <div class="panel-body">
            <div class="table-responsive">
               <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Serial No.</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$offcampus_mentor_data->isEmpty())
                            @php
                            $i =1;@endphp
                            @foreach($offcampus_mentor_data as $offcampus_mentor)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $offcampus_mentor['mentor_name'] }}</td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        @else
                        <td colspan="2">No Data Available</tr>
                        @endif
                        
                    </tbody>
               </table>
            </div>
         </div>
       </div>
    </div>
    <div class="col-sm-6 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="W7jbnTPK2A">
      <div class="panel lobidisable panel-bd lobipanel lobipanel-sortable panel-onCampus" data-inner-id="W7jbnTPK2A" data-index="0">
         <div class="panel-heading ui-sortable-handle">
            <div class="panel-title" style="max-width: calc(100% - 90px);">
               <h4 class="On-Campus-heading">On Campus Mentors</h4>
            </div>
            
         </div>
         <div class="panel-body">
            <div class="table-responsive">
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr class="info">
                        <th>Serial No.</th>
                        <th>Name</th>
                       
                     </tr>
                  </thead>
                  <tbody>
                     @if(!$mentor_data->isEmpty())
                        @php $k=1; @endphp
                        @foreach($mentor_data as $oncampus_mentor)
                       
                        <tr>
                            <td>{{$k}}</td>
                            <td>{{ $oncampus_mentor['mentor_name'] }}</td>
                        </tr>
                        @php $k++; @endphp
                        @endforeach
                    @else
                    <td colspan="2">No Data Available</td>
                    @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
    </div>
   
   
</div>



    <!-- END: Content-->



@endsection

@section('styles')
<!-- 
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/vendors.min.css"> -->
    
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('/')}}assets/admin/css/kendo.default.min.css" />
    <link rel="stylesheet" href="{{ asset('/')}}assets/admin/css/kendo.common.min.css" />
   
    <link rel="stylesheet" href="{{ asset('/')}}assets/admin/css/kendo.default.mobile.min.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" /> 


  

    <style>
/*.content {
    min-height: 250px;
    margin-right: auto;
    margin-left: auto;
    padding: 0 30px 10px;
    background: #ececec;
    padding-top: 20px;
}*/
#add_mentor{
    margin-bottom: 5px;
}
.k-input:not(:-webkit-autofill) {
    animation-name: autoFillEnd;
    margin-top: 8px;
}
.k-list-item.k-selected, .k-selected.k-list-optionlabel {
    color: #fff;
    background-color: skyblue;
}
div#mentor_main {
    padding-left: 30px;
    margin-left: 30px;
}
.demo-section {
    padding-left: 30px;
    width: 87%;
}
.panel-onCampus{
    background-color: #fff;
}
.panel-offCampus{
    background-color: #fff;
}
.panel-bd > .panel-heading {
    color: #010611;
    background-color: #cfebf1;
    border-color: #b7b9bf;
    position: relative;
}
.lobipanel>.panel-heading {
    padding: 5px;
    position: relative;
    border-top-right-radius: 0;
    border-top-left-radius: 0;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
/*.panel {
    box-shadow: none;
    border-radius: 0px;
    border: none;
}*/
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: 0 1px 1pxrgba(0,0,0,.05);
}
.panel-body {
    padding: 15px;
}
.table-bordered {
    border: 1px solid #e4e5e7;
}

.off_campus label {
    font-size: 1.286rem;
}
.demo-section label{
    font-size: 1.286rem;
}
.image-parent {
  max-width: 20px;
}
    .dropdown-header {
        border-width: 0 0 1px 0;
        text-transform: uppercase;
    }

    .dropdown-header > span {
        display: inline-block;
        padding: 10px;
    }

    .dropdown-header > span:first-child {
        width: 50px;
    }

    .k-list-container > .k-footer {
        padding: 10px;
    }

    .selected-value {
        display: inline-block;
        vertical-align: middle;
        width: 18px;
        height: 18px;
        background-size: 100%;
        margin-right: 5px;
        border-radius: 50%;
    }

    #customers-list .k-list-item-text {
        line-height: 1em;
        min-width: 300px;
    }

    /* Material Theme padding adjustment*/

    .k-material #customers-list .k-list-item-text,
    .k-material #customers-list .k-list-item-text.k-state-hover,
    .k-materialblack #customers-list .k-list-item-text,
    .k-materialblack #customers-list .k-list-item-text.k-state-hover {
        padding-left: 5px;
        border-left: 0;
    }

    #customers-list .k-list-item-text > span {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        display: inline-block;
        vertical-align: top;
        margin: 20px 10px 10px 5px;
    }

    #customers-list .k-list-item-text > span:first-child {
        -moz-box-shadow: inset 0 0 30px rgba(0,0,0,.3);
        -webkit-box-shadow: inset 0 0 30px rgba(0,0,0,.3);
        box-shadow: inset 0 0 30px rgba(0,0,0,.3);
        margin: 10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-size: 100%;
        background-repeat: no-repeat;
    }


    #customers-list h3 {
        font-size: 1.2em;
        font-weight: normal;
        margin: 0 0 1px 0;
        padding: 0;
    }

    #customers-list p {
        margin: 0;
        padding: 0;
        font-size: .8em;
    }


    .rating-block, .review-block {
        background-color: #fff;
        border: 1px solid #e1e6ef;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    /*.k-icon, .k-tool-icon, .k-grouping-dropclue, .k-drop-hint, .k-column-menu .k-sprite, .k-grid-mobile .k-resize-handle-inner:before, .k-grid-mobile .k-resize-handle-inner:after {
        background-image: url(http://wellspringinfotech.com/pathports/assets/admin/images/alumini/profile/sprite.png);
        border-color: transparent;
    }*/



</style>

@endsection

@section('scripts')

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/datatables.buttons.min.js"></script>

    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
   
    <script src="{{ asset('/')}}assets/admin/js/kendo.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script>

    <script>

        $(document).ready( function () {

            $('#mentors_table').DataTable();

        });

    </script>

    <script>
        $('.phone-number-mask').inputmask('999.999.9999');
    /*$(document).ready(function() {
        $("#customers").kendoMultiSelect({
            dataTextField: "ContactName",
            dataValueField: "CustomerID",
            headerTemplate: '<div class="dropdown-header k-widget k-header">' +
                    '<span>Photo</span>' +
                    '<span>Contact info</span>' +
                '</div>',
            footerTemplate: 'Total #: instance.dataSource.total() # items found',
            itemTemplate: '<span class="k-state-default" style="background-image: url(\'../pathports/assets/admin/images/mentors/#:data.CustomerID#.jpg\')"></span>' +
                      '<span class="k-state-default"><h3>#: data.ContactName #</h3><p>#: data.CompanyName #</p></span>',
            tagTemplate:  '<span class="selected-value" style="background-image: url(\'../pathports/assets/admin/images/mentors/#:data.CustomerID#.jpg\')"></span><span>#:data.ContactName#</span>',
            dataSource: {
                transport: {
                    read: {
                        dataType: "jsonp",
                        url: "https://demos.telerik.com/kendo-ui/service/Customers",
                    }
                }
            },
            height: 400
        });

        var customers = $("#customers").data("kendoMultiSelect");
        customers.wrapper.attr("id", "customers-wrapper");
    });*/




        var alumni_data = <?php echo $alumni_data;?>;
        var str = JSON.stringify(alumni_data);
        var data = JSON.parse(str);
        console.log(data);

        var mentors_data_array = <?php echo $mentors_data_array;?>;
        /*var str1 = JSON.stringify(mentor_data);
        var data1 = JSON.parse(str1);
        console.log(mentor_data);*/

      
            var ms = $("#customers").kendoMultiSelect({
                dataTextField: "firstname",
                dataValueField: "id",
                dataSource: data,
                filter: "contains",
                value: mentors_data_array,
               /* headerTemplate: '<div class="dropdown-header k-widget k-header">' +
                    '<span>Photo</span>' +
                    '<span>Contact info</span>' +
                '</div>',*/
                footerTemplate: 'Total #: instance.dataSource.total() # items found',
                itemTemplate: '<span class="k-state-default" data-id="${data.id}" style="background-image: url(\'../pathports/assets/admin/images/alumini/profile/#:data.image#\')"></span>' +
                          '<span class="k-state-default" data-id="${data.id}"><h3>#:data.firstname+" "+data.lastname#</h3></span>',
                tagTemplate:  '<span class="selected-value" style="background-image: url(\'../pathports/assets/admin/images/alumini/profile/#:data.image#\')"></span><span>#:data.firstname+" "+data.lastname#</span>',
               
                height: 400,
            });


            $('#add_mentor').click(function(){
                
                var on_campus_mentorsId = $("#customers").data("kendoMultiSelect").value();
                //var on_campus_mentorsName = $("#customers").data("kendoMultiSelect").text();
                //console.log(on_campus_mentorsName);
                var off_campus_mentors =  $('#off_campus').val();

                var max_allowed = 5;
                var selected_count = on_campus_mentorsId.length;

                if (selected_count > max_allowed ) {
                    alert("Please select a maximum of " + max_allowed + " options.");
                }
                else{
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "/pathports/storeMentors",
                        data: { on_campus_mentorsId: on_campus_mentorsId, off_campus_mentors: off_campus_mentors},
                        success: function(data) {
                            console.log(data);
                            $("#resultDiv").html("Mentors Added successfully!!");
                                
                            setTimeout(function() {
                                $("#resultDiv").fadeOut();
                                location.reload();
                            }, 2000);
                        }
                    });
                }
            });

</script>



@endsection



    
    


        



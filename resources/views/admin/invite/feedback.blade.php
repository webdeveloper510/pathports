<?php

/*echo base64_decode($_GET['surv_cat']);
echo "<br>";
echo base64_decode($_GET['surv']);*/
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Survey</title>
 <link rel="stylesheet" type="text/css" href="http://wellspringinfotech.com/pathports/assets/admin/css/custom.css?v=1663146512">
<link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/')}}assets/admin/images/favicon.png">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

  
<!--     <script type="text/javascript">
google_ad_client = "ca-pub-2783044520727903";
/* CSSScript Demo Page */
google_ad_slot = "3025259193";
google_ad_width = 728;
google_ad_height = 90;
//-->
<!-- </script> --> 
     <!--  <script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script> -->

<div class="contentsurveymain">

 <div class="container">
       @if ($message = Session::get('success'))

            <div class="alert alert-success">

                <p>{{ $message }}</p>

            </div>

        @endif

     <div class="row surveymainintro">
      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
          <h2>Survey Form</h2>
            <div class="card-body surveycard bg-light">
              <div class = "container">
                <form id="contact-formsurvey" role="form" action="{{route('survey-create')}}" method="post">
                  @csrf
            <div class="controls">
              <div class="row labelfirst">
               
                  
                <input type="text" class="form-control" name="user_id" value="{{$user_id}}" style="display:none">
             
              <div class="col namesurvey">
                    <label for="form_need" >First Name*</label>
                	<input type="text" class="form-control" name="firstname">
              </div>
                  <div class="col namesurvey">
                        <label for="form_need" >Last Name *</label>
                    <input type="text" class="form-control" name="lastname" >
                  </div>
                </div>
               
                <div class="form-group labelemail">
                    <label for="form_email" class="labelemail">Email *</label>
                    <input type="email" class="form-control"  name="email" id="email" >
                </div>
                <div class="form-group comment">
                          <label for="comment" >Comment</label>
                          <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
                    </div>
                <h4 class="star"><b>How did you like our service? *</b></h4>
                   <div class="wrappersurvey"> 
                      <input type="checkbox" id="st1" value="5" name="rating"/>
                      <label for="st1"></label>
                      <input type="checkbox" id="st2" value="4" name="rating"/>
                      <label for="st2"></label>
                      <input type="checkbox" id="st3" value="3" name="rating"/>
                      <label for="st3"></label>
                      <input type="checkbox" id="st4" value="2" name="rating"/>
                      <label for="st4"></label>
                      <input type="checkbox" id="st5" value="1" name="rating"/>
                      <label for="st5"></label>
                    </div>
                    @foreach($ques_list as $datas)
                    <div class="form-group">
	                    <label for="form_need" >{{$datas->question}}</label>
	                	<input type="text" class="form-control" name="answer[]">
	                </div>
	                @endforeach
                        </div>              
                     <div class="col-md-12 feedback_btn">
                          <button type="submit" class="btn btn-success surveysubmit">Submit</button>
                    
                    </div>
             </form>
            </div>
        </div>
      </div>
     </div>
        <!-- /.8 -->

    </div>
    <!-- /.row-->

</div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script>

</body>
</html>

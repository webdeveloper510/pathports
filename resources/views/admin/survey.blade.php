

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Survey</title>
<link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/')}}assets/admin/images/favicon.png">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
body { background-color:#fafafa;}
.content {
    text-align: center;
    /*margin-top: 150px;*/
    align-items: center;
    display: flex;
    height: 700px;
}
.content h1 {
  font-family: 'Sansita', sans-serif;
  letter-spacing: 1px;
  font-size: 50px;
  color: #282828;
  margin-bottom: 10px;
}
.content  i {
  color: #FFC107;
}
.content span {
  position: relative;
  display: inline-block;
}
.content  span:before, .content  span:after {
  position: absolute;
  content: "";
  background-color: #282828;
  width: 40px;
  height: 2px;
  top: 40%;
}
.content  span:before {
  left: -45px;
}
.content  span:after {
  right: -45px;
}
.content p {
  font-family: 'Open Sans', sans-serif;
  font-size: 18px;
  letter-spacing: 1px;
}
.wrapper {
  position: relative;
  display: inline-block;
  border: none;
  font-size: 14px;
  margin: 50px auto;
  left: -24%;
  transform: translateX(-50%);
  margin-top: -5px;
}

.wrapper input {
  border: 0;
  width: 1px;
  height: 1px;
  overflow: hidden;
  position: absolute !important;
  clip: rect(1px 1px 1px 1px);
  clip: rect(1px, 1px, 1px, 1px);
  opacity: 0;
}

.wrapper label {
  position: relative;
  float: right;
  color: #C8C8C8;
}

.wrapper label:before {
  margin: 5px;
  content: "\f005";
  font-family: FontAwesome;
  display: inline-block;
  font-size: 1.5em;
  color: #ccc;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

.wrapper input:checked ~ label:before {
  color: #FFC107;
}

.wrapper label:hover ~ label:before {
  color: #ffdb70;
}

.wrapper label:hover:before {
  color: #FFC107;
}
body {
    font-family: 'Lato', sans-serif;
}

h1 {
    margin-bottom: 40px;
}

label {
    color: #333;
}

.btn-send {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    width: 80%;
    margin-left: 3px;
    }
.help-block.with-errors {
    color: #ff5050;
    margin-top: 5px;

}

.card{
  margin-left: 10px;
  margin-right: 10px;
}
.form-group {
    margin-bottom: 1rem;
    margin-top: 22px;
}
label {
    color: #333;
    font-size: 14px;
}

h4.star {
  text-align: left;
  margin-top: 20px;
}
.btn-success {
    color: #fff;
    /* background-color: #28a745; */
    border-color: #38c9ff;
    margin-top: 2px;
    padding: 10px;
    width: 117px;
    font-size: 12px;
    background-color: #38c9ff !important;
}

.form-control {
  font-size: 1.5rem;
}
.col-md-12 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    margin-top: -47px;
}
.form-group.labelemail {
    text-align: left;
}
.row.labelfirst {
    text-align: left;
}
.card.mt-2.mx-auto.p-4.bg-light {
    background: #38c9ff47 !important;
    box-shadow: -10px -5px 40px 0 rgb(0 0 0 / 10%);
}
.feedback_btn button.btn.btn-success {
    box-shadow: none !important;
    border: none;
}
.feedback_btn button.btn.btn-success :focus-visible {
    border: none;
    outline: none;
}
.form-group.comment {
    text-align: left;
}
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    max-width: 455px;
    margin: inherit;
    margin-bottom: 20px;
}
</style>
</head>

<body>

  


<div class="content">

 <div class="container">
       @if ($message = Session::get('success'))

            <div class="alert alert-success">

                <p>{{ $message }}</p>

            </div>

        @endif

     <div class="row ">
      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
          <h2>Survey Form</h2>
            <div class="card-body bg-light">
              <div class = "container">
                <form id="contact-form" role="form" action="{{route('survey-create')}}" method="post">
                  @csrf
            <div class="controls">
              <div class="row labelfirst">
               
                  
                <input type="text" class="form-control" name="user_id" value="{{$id}}" style="display:none">
             
              <div class="col">
                    <label for="form_need" >First Name*</label>
                <input type="text" class="form-control" name="firstname">
              </div>
                  <div class="col">
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
                   <div class="wrapper"> 
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

                    
                                     
                     <div class="col-md-12 feedback_btn">
                          <button type="submit" class="btn btn-success">Submit</button>
                    
                    </div>
              </div>
            </div>
         </form>
        </div>
      </div>
     </div>
        <!-- /.8 -->

    </div>
    <!-- /.row-->

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

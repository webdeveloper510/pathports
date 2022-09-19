<nav class="navbar navbar-expand-md bg-dark navbar-dark darkback p-0">
	<div class="left-section">
	    <div class="logo-img"> <a class="navbar-brand" href="#"><img src="{{ asset('/')}}assets/frontend/images/path-logo.png" alt="path-logo"></a></div>
	</div>
	<div class="right-section">
	    <!-- top header  -->
	    <div class="headerRightTop">
	       <div class="utilityMenu">
	          <div class="topnav" id="myTopnav">
	             <div class="dropdown">
	                <button class="dropbtn">Resources  
	                <i class="fa fa-caret-down"></i>
	                </button>
	                <div class="dropdown-content">
	                   <a href="#">Alumini</a>
	                   <a href="#">University </a>
	                   <a href="#">Faculty & Staff</a>
	                </div>
	             </div>
	             <a href="{{url('/home')}}" class="active">Home</a>
	             <a href="#news">About</a>
	             <a href="#contact">Contact</a>
	             <a href="#about">News</a>
	          </div>
	          <!-- <a href="http://127.0.0.1:8000/admin/login">Login</a> -->
	          <div class="searchIcon">
	          	<a href="http://wellspringinfotech.com/pathports/login/">Login</a>
	             <!-- <input type="text" placeholder="Search.." name="search2">
	             <button type="submit"><i class="fa fa-search"></i></button> -->
	          </div>
	        </div>
	       
	    </div>
	    <!-- top header  -->
	    <div class="header-bottom">
	       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	       <span class="navbar-toggler-icon"></span>
	       </button>
	       <div class="collapse navbar-collapse text-navbar" id="collapsibleNavbar">
	          <ul class="navbar-nav">
	             <li class="nav-item">
	                <a class="nav-link" href="#">university</a>
	             </li>
	             <li class="nav-item">
	                <a class="nav-link" href="#">Student</a>
	             </li>
	             <li class="nav-item">
	                <a class="nav-link" href="#">Alumni</a>
	             </li>
	             <li class="nav-item">
	                <a class="nav-link" href="#">School</a>
	             </li>
	          </ul>
	       </div>
	       <div class="applyButton"><a href="{{ route('register.index' )}}">register with us <img src="{{ asset('/')}}assets/frontend/images/arrow_apply.png" alt="Apply Now"></a></div>
	    </div>
	</div>
</nav>
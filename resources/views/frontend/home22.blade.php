@extends('frontend.layouts.app')
@section('title','Home || PathPorts')
@section('content')
      <!-- COVID-section html start -->
      <div class="contentArea dark">
         <div class="mainContentArea">
            <div class="mwPageArea">
               <h6 class="text-center">
                  <span class="COVID-Information" style="font-size: 14pt; color: #ffffff;">
                     <a style="text-decoration: none;" href="#">
                        <span style="font-size: 16px;color: #ffffff; font-weight: 600;text-transform: uppercase;">
                           <marquee width="100%" direction="left">
                              <span class="latest-news">LATEST UPDATE:  </span>Guiding Student Success.
                           </marquee>
                        </span>
                     </a>
                  </span>
               </h6>
            </div>
         </div>
      </div>
      <!-- COVID-section html end -->
      <!-- Video-section html start -->
      <div class="container-fluid p-0">
         <div class="homeBannerWrap">
            <div class="homeBannerVideo">
               <video autoplay="" loop="" muted="" preload="metadata">
                  <source src="{{ asset('/')}}assets/frontend/images/homevideo.mp4" type="video/mp4">
                  Your browser does not support the HTML5 video tag. 
               </video>
               <div class="videoBannerInner">
                  <div class="videoBanner">
                     <!-- <h2 style="">GET READY</h2> -->
                     <div class="videoBannerText">
                        <!-- <p>TO DISCOVER PATHPORTH </p> --> 
                        <p>Mission we create immense value for students and universities for the next generation changing the workforce </p>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Video-section html end -->
      <!-- Undergraduate-image section html start -->
      <div class="container blockContents  pad-top-l">
         <div class="row introIcons">
            <div class="col-md-2 introIconWrap">
               <div class="university-img-sec">	
                  <img src="{{ asset('/')}}assets/frontend/images/Picture8.png" alt="Undergraduate icon" class="introIconImage">
               </div>
               <p class="introIcon-p orange">Baba Farid University<br></p>
            </div>
            <div class="col-md-2 introIconWrap">
               <div class="university-img-sec">
                  <img src="{{ asset('/')}}assets/frontend/images/Picture5.png" alt="Graduate icon" class="introIconImage">
               </div>
               <p class="introIcon-p pink">Administrative University<br></p>
            </div>
            <div class="col-md-2 introIconWrap">
               <div class="university-img-sec">
                  <img src="{{ asset('/')}}assets/frontend/images/Picture3.png" alt="Transfer icon" class="introIconImage">
               </div>
               <p class="introIcon-p magenta">IK Gujral University</p>
            </div>
            <div class="col-md-2 introIconWrap">
               <div class="university-img-sec">
                  <img src="{{ asset('/')}}assets/frontend/images/Picture2.png" alt="Financial aid icon" class="introIconImage">
               </div>
               <p class="introIcon-p red">Guru Kashi University<br></p>
            </div>
            <div class="col-md-2 introIconWrap">
               <div class="university-img-sec">
                  <img src="{{ asset('/')}}assets/frontend/images/Picture6.png" alt="Visit icon" class="introIconImage">
               </div>
               <p class="introIcon-p purple">GNA University<br></p>
            </div>
         </div>
         <div class="show-btn">
            <button type="button" class="button-show">Show All</button>
         </div>
      </div>
      <!-- Undergraduate-image section html end -->
      <!-- DIVERSITY, EQUITY & INCLUSION AT ALVERNO  section html start -->
      <div class="container-fluid p-0">
         <div class="blockContents-section">
            <div class="overlay">
               <div class="eightHundred">
                  <div class="row small-hor">
                     <div class="col-md-6">
                        <div class="blockContents">
                           <p>
                              <img src="{{ asset('/')}}assets/frontend/images/Alverno-Pergola.jpg" alt="Diversity, Equity &amp; Inclusion"> 
                             
                           </p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="blockContents">
                           <!-- <h5>
                              Our shared, beloved community
                              
                              </h5> -->
                           <p>Pathports is enabling student success by capturing 360 deg student view and providing the armature for the true value to a college education.
                           </p>
                        </div>
                        <div class="mwBtnCenter">
                           <div class="button-border">
                              <p> 
                                 <a href="#" template="default" class="medium">Learn More</a> 
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- DIVERSITY, EQUITY & INCLUSION AT ALVERNO  section html end -->
      <!--  Programs  section html start -->
      <div class="container-fluid">
         <div class="small-hor">
            <h4 class="ContentArea">
               <span style="color: #175ec6;">Alumni and Mentors</span>
            </h4>
            <div class="bottom-border"></div>
         </div>
         <div class="row threeColumn">
            <div class="col-md-4">
               <div class="homeImageHoverWrapper trans">
                  <div class="homeImage">
                     <a href="#">
                        <img src="{{ asset('/')}}assets/frontend/images/Undergraduate.jpg" alt="Graduate icon">
                        <div class="homeImageColorbar pink"></div>
                     </a>
                  </div>
                  <div class="homeImageContent">
                     <h5>Anna</h5>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                     <div class="homeImageButton trans pink">
                        <a href="#">Learn More</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="homeImageHoverWrapper trans">
                  <div class="homeImage">
                     <a href="#">
                        <img src="{{ asset('/')}}assets/frontend/images/Graduate.jpg" alt="Graduate icon">
                        <div class="homeImageColorbar pink"></div>
                     </a>
                  </div>
                  <div class="homeImageContent">
                     <h5>Camila</h5>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                     <div class="homeImageButton trans pink">
                        <a href="#">Learn More</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="homeImageHoverWrapper trans">
                  <div class="homeImage">
                     <a href="#">
                        <img src="{{ asset('/')}}assets/frontend/images/Adult-Learning.jpg" alt="Graduate icon">
                        <div class="homeImageColorbar pink"></div>
                     </a>
                  </div>
                  <div class="homeImageContent">
                     <h5>John</h5>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                     <div class="homeImageButton trans pink">
                        <a href="#">Learn More</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  Programs  section html end -->

@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
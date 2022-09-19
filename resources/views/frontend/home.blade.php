@extends('frontend.layouts.app')
@section('title','Home || PathPorts')
@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/multi/img/slide/slide-1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>the platform that supercharges your network.</span></h2>
              <p class="animate__animated animate__fadeInUp">We connect prospective students to current students, current students to alumni, and alumni to alumni.</p>

              <!-- <p>Over 75% of positions are found through word-of-mouth and networking. The PathPorts Team works with colleges and universities to access the mostly-untapped potential of their alumni network. By doing so, we improve the student experience, increase placement rates, and increase alumni engagement for the university.</p> -->
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/multi/img/slide/slide-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <!-- <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2> -->
              <p class="animate__animated animate__fadeInUp">By using student & alumni backgrounds, areas of interest, and artificial intelligence, we pair mentors and mentees to maximize efforts and help everyone accomplish their goals.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/multi/img/slide/slide-3.jpg);background-size: cover;background-position:bottom;">
          <div class="carousel-container">
            <div class="container">
              <!-- <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2> -->
              <p class="animate__animated animate__fadeInUp">Previously untapped network connections are created to open opportunities for new positions, new careers, and new locations.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <p>About Us</p>
        </div>

        <div class="row content">
          <div class="col-md-6  aos-init aos-animate">
            
            <img src="http://wellspringinfotech.com/pathports/assets/multi/img/Work.jpg" class="img-fluid" alt="">
             
          </div>
          <div class="col-md-6  pt-lg-0 about-us-section">
            <p>
              PathPorts was born out of the desire to help college students find success as they enter the professional world. Few college degree programs fully prepare students for their careers and, beyond the occasional career fair, do not help students excel after graduation. PathPorts is here to change that by helping prospective students, current students, and alumni all find success.
            </p>
           
              <p>
                Today’s students have more knowledge at their fingertips than ever before. They are making decisions based on long term outlooks of placement rates and potential careers. Universities need to hear the call and support their current, and past, students. 
              </p>
              <p>Enter the Pathports team. We bring over 60 years of experience in collegiate leadership, networking, engineering, software design, cloud design, and strategic consulting. Our breadth of knowledge and targeted mentor-mentee platform allows us to build a custom program for each specific university's needs.
              </p>
             
          </div>
          <div class="container">
            <div class="row">
                <div class="col-md-12 about-us-section pt-3">
                  
                  <div class="about-us-clicker">
                    <a href="#" class="btn-learn-more">Learn More</a>
                  </div>
                </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <!-- <i class="bi bi-emoji-smile"></i> -->
              <span data-purecounter-start="0" data-purecounter-end="6.6" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Enrollment</strong> decrease since fall 2019</p>
              <!-- <a href="#">Find out more &raquo;</a> -->
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <!-- <i class="bi bi-journal-richtext"></i> -->
              <span data-purecounter-start="0" data-purecounter-end="180" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Inflation-adjusted</strong> increase in total cost of college education since 1980</p>
              <!-- <a href="#">Find out more &raquo;</a> -->
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <!-- <i class="bi bi-headset"></i> -->
              <span data-purecounter-start="0" data-purecounter-end="75" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Jobs found</strong> through networking and word-of-mouth introductions</p>
              <!-- <a href="#">Find out more &raquo;</a> -->
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <!-- <i class="bi bi-people"></i> -->
              <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Drop in birth rate</strong> in 2008 (high school class of 2025-2026)</p>
              <!-- <a href="#">Find out more &raquo;</a> -->
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-6  mt-4 mb-5 align-items-stretch video-box">
             <!-- style='background-image: url("assets/multi/img/Work-2.jpg");' data-aos="zoom-in" data-aos-delay="100" -->


            <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> -->
            <!-- <a href="" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> -->
            <div class="WhyPathimg"style="height: 100%;
    width: 100%;background-position: center;background-size: cover;background-image: url(assets/multi/img/Work-2.jpg);">
            </div>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3><strong>Why Pathports?</strong></h3>
              <p>
                The PathPorts Team works with colleges and universities to access the mostly-untapped potential of their alumni network. By doing so, we improve the student experience, increase placement rates, and increase alumni engagement for the university. 
              </p>
              <p>We provide the smartest and most configurable platform on the market. By working with current students, colleges, the campus alumni association, and alumni network, we enable students to create their own success.</p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span>  Improve impactfulness of coursework </a>
                  <!-- <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                    </p> 
                  </div>-->
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Increases student professional opportunities </a>
                  <!-- <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div> -->
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Improve alumni contact and support </a>
                  <!-- <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div> -->
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>04</span> Increase applications and enrollment </a>
                  <!-- <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div> -->
                </li>
                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>05</span> Increase funding for the university </a>
                  <!-- <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div> -->
                </li>

              </ul>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Check our Services</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-people"></i></div>
              <h4><a href="">High School to College</a></h4>
              <p>Imagine making the transition from high school to college knowing that you already know your on-campus success team.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-people"></i></div>
              <h4><a href="">College to Alumni</a></h4>
              <p>Students develop relationships with working professionals & graduate students who can offer industry insight, relevant course guidance, and instructions to important community players.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-people"></i></div>
              <h4><a href="">Alumni to Alumni</a></h4>
              <p>Alumni connect with other experienced professionals inside and outside of their career vertical to gain knowledge onf the professional landscape, to learn about opportunities, and get valuable introductions to open new pathways.</p>
            </div>
          </div>

          
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>Testimonials</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{ asset('/')}}assets/multi/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Christina McElvaney, VP of Strategic Solutions at PeopleShare</h3>
                  <!-- <h4>Ceo &amp; Founder</h4> -->
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Professional networking is THE way to fast track career opportunities. Anyone can have a resume, but if you cannot get your resume to the right desk, it may go unnoticed in a pile of resumes of other qualified people. WHO you know and HOW you have influenced them is the main key when it comes to professional development.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{ asset('/')}}assets/multi/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Liz Vescio, ESG Advisor</h3>
                  <!-- <h4>Designer</h4> -->
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Networking has not only enabled information sharing that has helped me to optimize my decision making and ultimately drive better results, but it has also opened the door to incredibly fulfilling career opportunities. It has connected me with people to support and people to be supported by, many of whom are now close friends, resulting in a community of professionals that want to help each other succeed.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{ asset('/')}}assets/multi/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jenny Glowacki, FSA</h3>
                  <!-- <h4>Store Owner</h4> -->
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    A childhood friend's father was an industry leader in my profession. He introduced me to company leaders, helped me get a job, and then continued to challenge and support me throughout my career. His mentorship didn't just get me a job, it gave me the confidence to push harder and keep progressing, even when progress is hard. 
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Let's Do This</h3>
          <p> Reach out today to learn more about PathPorts and schedule a demo for you and your team.</p>
          <a class="cta-btn" href="mailto: Info@Pathports.com">Schedule my Demo</a>
        </div>

      </div>
    </section><!-- End Cta Section -->



    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Check our Team</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="{{ asset('/')}}assets/multi/img/team/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Shelby Craghead (Pfizer)</h4>
                  <span>Meeting the right people, paired with my education, allowed me to lock down onepageple offers before graduation.</span>
                </div>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-wow-delay="0.1s">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <img src="{{ asset('/')}}assets/multi/img/team/team-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Jared Martin (Alaska Airlines)</h4>
                  <span>Networking with the right people, before I needed their help, gave me access to opportunities years before my counterparts.</span>
                </div>
                
              </div>
            </div>
          </div>

          

          <div class="col-lg-4 col-md-6" data-wow-delay="0.3s">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <img src="{{ asset('/')}}assets/multi/img/team/team-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Jennifer Glowacki (AIG)</h4>
                  <span>Finding trusted mentors early in my career helped me streamline my efforts and be promoted faster than my peers.</span>
                </div>
                
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> -->
    <!-- End Team Section -->


    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>How does Pathports connect students to alumni?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Pathports uses algorithms and artificial intelligence to align mentors and mentees with similar backgrounds to boost the opportunity for valuable interactions.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>How do you ensure a valuable interactions?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              We provide university-visible management tools to ensure conversations are being organized and executed. We also provide key metrics for students to ensure benefit from interactions.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Can Pathports be implemented at the College or Department level??</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Yes, Pathports can be rolled out to a smaller subset of students. We generally don't recommend this approach, but in certain circumstances it can still be immensely successful.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>When do high school students gain access to the current students?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              We generally work with the university to outline a timeline that works for everyone.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div class="row">
              <div class="col-md-12 mapenvelope">
                <div class="row">
                    <div class="col-md-6">
                      <div class="info-box">
                        <i class="bx bx-map"></i>
                        <h3>Our Offices</h3>
                        <p>Raleigh, NC Seattle, WA</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="info-box">
                          <i class="bx bx-envelope"></i>
                        <h3>Email Us</h3>
                        <p><span style="padding-right: 10px;">Info@Pathports.com</span></p>
                      </div>
                    </div>
                </div>
              </div>
         </div>    
          <!-- <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div> -->


      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
<?php
    // Template Name: Contact
    get_header();
?>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <?php 
        get_template_part('nav','other');
      ?>
      <div class="main">
        <section class="module bg-dark-60 contact-page-header bg-dark" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/contact/stadium.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Contact Us</h2>
              </div>
            </div>
          </div>
        </section>
        <section class="module bg-colore">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <h4 class="font-alt">Get in touch</h4><br/>
                <form id="contactForm" role="form" method="post" action="php/contact.php">
                  <div class="form-group">
                    <label class="sr-only" for="name">Name</label>
                    <input class="form-control formulario-contacto" type="text" id="name" name="name" placeholder="Your Name*" required="required" data-validation-required-message="Please enter your name."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input class="form-control formulario-contacto" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <textarea style="resize:none" class="form-control formulario-contacto" rows="7" id="message" name="message" placeholder="Your Message*" required="required" data-validation-required-message="Please enter your message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d boton-contacto" id="cfsubmit" type="submit">Submit</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
              <div class="col-sm-6">
                <h4 class="font-alt">Additional info</h4><br/>
                <p>Nebula Enterprises is your gateway to a universe of electrifying experiences, specializing in immersive <b>music festivals</b> that transcend the ordinary. With a dedication to innovation and creativity, we curate unforgettable events where electronic beats intertwine with celestial vibes, offering an array of exhilarating experiences such as <b>live DJ sets</b>, <b>interactive art installations</b>, and <b>cosmic performances</b>. Join us as we embark on a journey through the cosmos of electronic music, where dreams come to life and memories are made under the stars!</p>
                <hr/>
                <h4 class="font-alt">Business Hours</h4><br/>
                <ul class="list-unstyled">
                  <li>Mo - Fr: 8am to 6pm</li>
                  <li>Sa, Su: 10am to 2pm</li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        
        <section class="module bg-colore" id="team">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Meet Our Office</h2>
              </div>
            </div>
            <div class="row">
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="team-item">
                  <div class="team-image"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/contact/office/office1.jpg" alt="Member Photo">
                    <div class="team-detail">
                      <p class="font-serif">Central hub for innovative cosmic event planning.</p>
                      <div class="team-social"><a href="#"><i class="fa fa-phone"></i></a></div>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Nebula Headquarters</div>
                    <div class="team-role">7 Nebula Avenue, Lumina City</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="team-item">
                  <div class="team-image"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/contact/office/office2.jpg" alt="Member Photo">
                    <div class="team-detail">
                      <p class="font-serif">Serene beachside office fostering creative inspiration.</p>
                      <div class="team-social"><a href="#"><i class="fa fa-phone"></i></a></div>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Nebula Coastal Retreat</div>
                    <div class="team-role">23 Seashell Lane, Aqua Bay City</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="team-item">
                  <div class="team-image"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/contact/office/office3.jpg" alt="Member Photo">
                    <div class="team-detail">
                      <p class="font-serif">Tranquil mountain sanctuary for strategic brainstorming sessions.</p>
                      <div class="team-social"><a href="#"><i class="fa fa-phone"></i></a></div>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Nebula Mountain Hideaway</div>
                    <div class="team-role">42 Summit Road, Celestial Peak City</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="team-item">
                  <div class="team-image"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/contact/office/office4.jpg" alt="Member Photo">
                    <div class="team-detail">
                      <p class="font-serif">Dynamic urban workspace fueling creativity and collaboration.</p>
                      <div class="team-social"><a href="#"><i class="fa fa-phone"></i></a></div>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Nebula Urban Oasis</div>
                    <div class="team-role">11 Starlight Street, Metropolis Junction City</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <section id="map-section">
          <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2506.175550591271!2d4.380842976969699!3d51.08676764134424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3ee3b6465f7bf%3A0x4c64aa6a2defbc53!2sProvinciaal%20Recreatiedomein%20De%20Schorre!5e0!3m2!1ses!2ses!4v1702316285601!5m2!1ses!2ses" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </section>
        <?php
    get_footer();
?>
<?php
get_header();
?>

<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
  <main>
    <div class="page-loader">
      <div class="loader">Loading...</div>
    </div>
    <?php
    get_template_part('nav');
    ?>
    <section class="home-section home-parallax home-fade home-full-height bg-dark-30" id="home" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/header/Header2.jpg">
      <div class="titan-caption">
        <div class="caption-content">
          <div class="font-alt mb-30 titan-title-size-1">We love to create music</div>
          <div class="font-alt mb-40 titan-title-size-3"><span class="rotate">We are electrifying | We are amazing | We are best</span>
          </div><a class="section-scroll btn btn-header btn-border-w btn-circle" href="<?php echo get_permalink(get_page_object('EVENTS')->ID) ?>">Explore</a>
          <div class="scroll-down"></div>

        </div>
      </div>
    </section>
    <div class="main">
      <!--<section class="module-extra-small bg-dark">-->
      <!--  <div class="container">-->
      <!--    <div class="row">-->
      <!--      <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">-->
      <!--        <div class="callout-text font-alt">-->
      <!--          <h4 style="margin-top: 0px; font-;">looking for a first-class business consultant?</h4>-->
      <!--          <p style="margin-bottom: 0px;">We are always here for you</p>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--      <div class="col-sm-6 col-md-4 col-lg-2">-->
      <!--        <div class="callout-btn-box"><a class="btn btn-w btn-round" href="#">get a quote</a></div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</section>-->

      <section class="module bg-colore" id="intro">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
              <h2 class="module-title font-alt">Welcome to nebula</h2>
              <div class="module-subtitle font-serif large-text">We are a passionate collective of electronic music enthusiasts, blending cosmic sounds to create unique sensory experiences. We don't follow a style, but rather cutting-edge standards!</div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2 col-sm-offset-5">
              <div class="large-text align-center"><a class="section-scroll" href="#about"><i class="fa fa-angle-down"></i></a></div>
            </div>
          </div>
        </div>
      </section>

      <!-- <section class="module bg-colore">
        <div class="container">
          <div class="row multi-columns-row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="features-item">
                <div class="features-icon"><span class="icon-hotairballoon"></span></div>
                <h3 class="features-title font-alt">EXHILARATING MUSIC FESTIVAL</h3>Dive into groundbreaking beats and visionary concepts, meticulous planning for an unforgettable experience.
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="features-item">
                <div class="features-icon"><span class="icon-aperture"></span></div>
                <h3 class="features-title font-alt">VIBRANT VISUALS</h3>Explore visually stunning stages, hypnotic light displays, and seamless interfaces, artistic design ensures a captivating journey.
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="features-item">
                <div class="features-icon"><span class="icon-adjustments"></span></div>
                <h3 class="features-title font-alt">PRECISE CODING</h3>Behind the scenes, our festival boasts precise coding for a glitch-free digital experience, innovative development ensures technical excellence.
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="features-item">
                <div class="features-icon"><span class="icon-gears"></span></div>
                <h3 class="features-title font-alt">DEDICATED SUPPORT</h3>Join a community where support goes beyond the beats, seamless, hassle-free experience from tickets to navigation. Immerse in the music, we've got it covered.
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <section class="module pt-0 pb-0 bg-colore" id="about">
        <div class="row position-relative m-0">
          <div class="col-xs-12 col-md-6 side-image image-side" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/festival/GaleriaHome/festivalHome.jpg"></div>
          <div class="col-xs-12 col-md-6 col-md-offset-6">
            <div class="row finance-image-content">
              <div class="col-md-10 col-md-offset-1">
                <h2 class="module-title font-alt align-left">Practice Areas</h2>
                <div class="row multi-columns-row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-linegraph"></span></div>
                      <h3 class="alt-features-title font-alt">FESTIVAL HIGHLIGHTS</h3>Immerse in <b>groundbreaking beats</b> and <b>visionary concepts</b> for an unforgettable experience.
                    </div>
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-happy"></span></div>
                      <h3 class="alt-features-title font-alt">EXHILARATING PERFORMANCES</h3>Thrilling <b>energy captivates</b>, creating unforgettable moments and sweet memories.
                    </div>
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-lifesaver"></span></div>
                      <h3 class="alt-features-title font-alt">VISUAL SPECTACULAR</h3>Mesmerizing <b>visuals enrapture</b> the audience in a captivating spectacle.
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-tools-2"></span></div>
                      <h3 class="alt-features-title font-alt">DIGITAL EXPERIENCE</h3>Seamless <b>coding</b> and <b>innovative development</b> offer glitch-free bliss in the electronic realm.
                    </div>
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-chat"></span></div>
                      <h3 class="alt-features-title font-alt">COMMUNITY CONNECTION</h3>Dedicated support, ensuring the best experience from start to finish.
                    </div>
                    <div class="alt-features-item">
                      <div class="alt-features-icon"><span class="icon-mic"></span></div>
                      <h3 class="alt-features-title font-alt">ARTIST LINEUP</h3>Dive into an electrifying lineup, <b>soul-stirring performances</b> and unforgettable moments.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- <section class="module-small bg-dark p-0">
        <div class="container">
          <div class="row client">
            <div class="owl-carousel text-center" data-items="6" data-pagination="false" data-navigation="false">
              <div class="owl-item">
                <div class="col-sm-12">
                  <div class="client-logo"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/logos/SONY.png" alt="Client Logo" /></div>
                </div>
              </div>
              <div class="owl-item">
                <div class="col-sm-12">
                  <div class="client-logo"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/logos/bmw.png" alt="Client Logo" /></div>
                </div>
              </div>
              <div class="owl-item">
                <div class="col-sm-12">
                  <div class="client-logo"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/logos/cocacola.png" alt="Client Logo" /></div>
                </div>
              </div>
              <div class="owl-item">
                <div class="col-sm-12">
                  <div class="client-logo"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/logos/adidas.png" alt="Client Logo" /></div>
                </div>
              </div>
              <div class="owl-item">
                <div class="col-sm-12">
                  <div class="client-logo"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/logos/mcdonalds.png" alt="Client Logo" /></div>
                </div>
              </div>
              <div class="owl-item">
                <div class="col-sm-12">
                  <div class="client-logo"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/logos/starbucks.png" alt="Client Logo" /></div>
                </div>
              </div>
              <div class="owl-item">
                <div class="col-sm-12">
                  <div class="client-logo"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/logos/amazon.png" alt="Client Logo" /></div>
                </div>
              </div>
              <div class="owl-item">
                <div class="col-sm-12">
                  <div class="client-logo"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/logos/carrefour.png" alt="Client Logo" /></div>
                </div>
              </div>
              <div class="owl-item">
                <div class="col-sm-12">
                  <div class="client-logo"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/logos/airbnb.png" alt="Client Logo" /></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
       -->
      <section class="module bg-colore">
        <div class="container">
          <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Activate your senses</h2>
              </div>
            </div>
          <div class="row">
            <div class="col-sm-6 description-module">
              <p class="module-subtitle text-izquierda">In the limitless expanse of the digital cosmos, <b>Nebula</b> emerges as a beacon of <b>innovation</b> and <b>creativity</b>. We are more than just a <b>festival</b>; We are the <b>culmination</b> of <b>dreams</b>, the intersection of <b>art</b> and <b>technology</b>, where the <b>melodies</b> of <b>electronic music</b> intertwine with the <b>human experience</b>.</p>
            </div>
            <div class="col-sm-6 description-module">
              <p class="module-subtitle text-izquierda">Our <b>mission</b> transcends mere <b>entertainment</b>; It is a search to light the flames of <b>inspiration</b>, awaken the <b>senses</b> and redefine the limits of <b>possibilities</b>. Don't miss the best <b>sensitive festival</b> with <b>electronic music</b> in the world, we are waiting for you here.</p>
            </div>
          </div>
        </div>
      </section>

      <section class="module pb-0 bg-colore" id="works">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Our Festivals</h2>
              <div class="module-subtitle font-serif"></div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <ul class="filter font-alt" id="filters">
                <li><a class="wow fadeInUp ancla-btn-navegacion current" href="#" data-filter="*" style="visibility: visible; animation-name: fadeInUp;">All</a></li>
                <li><a class="wow fadeInUp ancla-btn-navegacion" href="#" data-filter=".nebula" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Nebula</a></li>
                <li><a class="wow fadeInUp ancla-btn-navegacion" href="#" data-filter=".europe" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Europe</a></li>
                <li><a class="wow fadeInUp ancla-btn-navegacion" href="#" data-filter=".latinAmerica" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Latin America</a></li>
                <li><a class="wow fadeInUp ancla-btn-navegacion" href="#" data-filter=".unitedStates" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">United States</a></li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="works-grid works-hover-w works-grid-gut works-grid-4 " id="works-grid" style="position: relative; height: 1098px;">
          <li class="work-item latinAmerica" style="position: absolute; left: 0px; top: 0px;"><a href="#" onclick="return false;">
              <div class="work-image imgResponsive img">
                <img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/GaleriaHome/festival1.jpg" alt="Portfolio Item">
              </div>
              <div class="work-caption font-alt">
                <h3 class="work-title">NEBULA_TIN AMERICA</h3>
                <div class="work-descr">PLAYA DEL CARMEN - MEXICO</div>
              </div>
            </a></li>
          <li class="work-item nebula unitedStates" style="position: absolute; left: 0px; top: 183px;">
            <a href="#" onclick="return false;">
              <div class="work-image imgResponsive img">
                <img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/GaleriaHome/festival2.jpg" alt="Portfolio Item">
              </div>
              <div class="work-caption font-alt">
                <h3 class="work-title">NEBULA 2018</h3>
                <div class="work-descr">MIAMI - UNITED STATES</div>
              </div>
            </a>
          </li>
          <li class="work-item latinAmerica" style="position: absolute; left: 0px; top: 366px;"><a href="#" onclick="return false;">
              <div class="work-image imgResponsive img">
                <img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/GaleriaHome/festival3.jpg" alt="Portfolio Item">
              </div>
              <div class="work-caption font-alt">
                <h3 class="work-title">UNITE NEBULA</h3>
                <div class="work-descr">ITU - BRASIL</div>
              </div>
            </a>
          </li>
          <li class="work-item nebula europe" style="position: absolute; left: 0px; top: 549px;"><a href="#" onclick="return false;">
              <div class="work-image imgResponsive img">
                <img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/GaleriaHome/festival4.jpg" alt="Portfolio Item">
              </div>
              <div class="work-caption font-alt">
                <h3 class="work-title">NEBULA 2020</h3>
                <div class="work-descr">BOOM - BELGIUM</div>
              </div>
            </a>
          </li>
          <li class="work-item europe" style="position: absolute; left: 0px; top: 732px;"><a href="#" onclick="return false;">
              <div class="work-image imgResponsive img">
                <img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/GaleriaHome/festival5.jpg" alt="Portfolio Item">
              </div>
              <div class="work-caption font-alt">
                <h3 class="work-title">BOOM BEACH NEBULA</h3>
                <div class="work-descr">BARCELONA - SPAIN</div>
              </div>
            </a></li>
          <li class="work-item europe" style="position: absolute; left: 0px; top: 915px;"><a href="#" onclick="return false;">
              <div class="work-image imgResponsive img">
                <img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/GaleriaHome/festival6.jpg" alt="Portfolio Item">
              </div>
              <div class="work-caption font-alt">
                <h3 class="work-title">NEBULA WINTER</h3>
                <div class="work-descr">ALPE D'HUEZ - FRANCE</div>
              </div>
            </a></li>
          <li class="work-item nebula unitedStates" style="position: absolute; left: 0px; top: 915px;"><a href="#" onclick="return false;">
              <div class="work-image imgResponsive img">
                <img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/GaleriaHome/festival7.jpg" alt="Portfolio Item">
              </div>
              <div class="work-caption font-alt">
                <h3 class="work-title">NEBULA 2022</h3>
                <div class="work-descr">LOS ANGELES - UNITED STATES</div>
              </div>
            </a></li>
          <li class="work-item latinAmerica" style="position: absolute; left: 0px; top: 915px;"><a href="#" onclick="return false;">
              <div class="work-image imgResponsive img">
                <img src="<?php echo bloginfo('template_directory') ?>/assets/images/festival/GaleriaHome/festival8.jpg" alt="Portfolio Item">
              </div>
              <div class="work-caption font-alt">
                <h3 class="work-title">NebulaFest</h3>
                <div class="work-descr">SANTA CRUZ - ARGENTINA</div>
              </div>
            </a></li>
        </ul>
      </section>



      <section class="module pt-0 pb-0 bg-colore">
        <div class="row position-relative m-0 second-about">
          <div class="col-xs-12 col-md-6 side-image image-side second-about-div image-wrap-div" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/festival/man-jump.jpg"></div>
          <div class="col-xs-12 col-md-6 col-md-offset-6 ">
            <div class="row finance-image-content">
              <div class="col-md-10 col-md-offset-1">
                <h2 class="module-title font-alt align-left">Let's get to know nebula</h2>
                <div class="row multi-columns-row image-text-wrap">
                    <p>A few years ago, a group of friends passionate about electronic music decided to create something unique for their community: the <b>Nebula festival</b>. After months of hard work and dedication, the day of the event finally arrived. With impressive performances, interactive art, and a vibrant atmosphere, the <b>Nebula festival</b> became an instant success, uniting the community around their shared love for music and creativity. It was more than an event; it was a symbol of unity and the power to turn dreams into reality.</p>
                </div>
                <div class="row multi-columns-row image-icons-wrap">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="features-item">
                      <div class="features-icon"><span class="icon-lightbulb"></span></div>
                      <h3 class="features-title font-alt">CREATIVE CONCEPTS</h3>Nebula thrives on imaginative concepts, delivering an immersive experience that sparks creativity at every turn.
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="features-item">
                      <div class="features-icon"><span class="icon-hotairballoon"></span></div>
                      <h3 class="features-title font-alt">SWIFT PERFORMANCE:</h3>Engineered for speed, Nebula's digital platform ensures fast loading times and seamless navigation, maximizing enjoyment for all attendees.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row position-relative m-0 ">
          <div class="col-xs-12 col-md-6  second-about-div">
            <div class="row finance-image-content">
              <div class="col-md-10 col-md-offset-1">
                <h2 class="module-title font-alt align-left">Community and culture</h2>
                <div class="row multi-columns-row image-text-wrap">
                    <p class="font-serif"><b>Nebula Festival</b> has transformed into a global meeting point for electronic music enthusiasts, fostering a community that champions diversity, inclusion, and creativity. It serves as a platform where individuals from all backgrounds come together to celebrate their shared love for music, embracing differences and promoting acceptance. In essence, <b>Nebula</b> is not just a music festival but a celebration of the vibrant community and culture it represents.</p>
                </div>
                <div class="row multi-columns-row image-icons-wrap">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="features-item">
                      <div class="features-icon"><span class="icon-heart"></span></div>
                      <h3 class="features-title font-alt">COMMUNITY HUB</h3>Nebula Festival unites global electronic music fans, promoting diversity and creativity. It's a celebration of music and acceptance.
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="features-item">
                      <div class="features-icon"><span class="icon-refresh"></span></div>
                      <h3 class="features-title font-alt">GLOBAL COMMUNITY</h3>Nebula Festival unites electronic music fans worldwide, celebrating diversity and creativity.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-6 col-md-offset-6 side-image image-side image-wrap-div" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/festival/people.webp"></div>
        </div>
      </section>



      <section class="module pb-0 bg-colore">
        <section class="module bg-dark-60" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/portadavideo/people.jpg" style="background-image: url(&quot;assets/images/section-6.jpg&quot;);">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="video-box">
                  <div class="video-box-icon"><a class="video-pop-up" href="<?php echo bloginfo('template_directory') ?>/assets/videos/Nebula2023.mp4"><i class="fa fa-play"></i></a></div>
                  <div class="video-title font-alt">Nebula 2023</div>
                  <div class="video-subtitle font-alt">Experience the aftermovie of Nebula 2023</div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
      <section class="module bg-colore" id="news">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Latest blog posts</h2>
            </div>
          </div>
          <div class="row multi-columns-row post-columns">

            <?php
            //Comienza el LOOP
            $args = array(
              'posts_per_page' => 3, //Only the last three posts
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
              while ($query->have_posts()) :
                $query->the_post();

                if (has_post_thumbnail()) {
                  //Si tengo post_thumbnail: 
                  $thumb_url = get_the_post_thumbnail_url();
                } else {
                  //Pero si no tengo que mostrar una imagen por defecto
                  $thumb_url = get_template_directory_uri() . '/assets/images/logo/logoblanco-espacio.png';
                }



            ?>

                <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="post mb-20 ">
                    <div class="post-thumbnail featured-img"><a href="<?php the_permalink();?>"><img class="hover-img" src="<?php echo $thumb_url;?>" alt="Blog-post Thumbnail" />
                      </a></div>
                    <div class="post-header font-alt">
                      <h2 class="post-title "><a class="front-title" href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                      <div class="post-meta info-head-post author-post">By&nbsp;<?php the_author_posts_link() ?>&nbsp;| <?php the_time('F j, Y') ?></div>
                      <div class="post-meta">
                        <div class="post-categories"><i class="fa fa-thumb-tack">:</i><?php the_category('&amp;'); ?></div>
                        <div class="post-categories"><i class="fa-solid fa-tags">:</i><?php the_tags('', '-'); ?></div>
                      </div>

                    </div>
                    <div class="post-entry">
                      <p><?php the_excerpt(); ?></p>
                    </div>
                    <div class="post-more"><a class="btn btn-border-d btn-round bontonmas" href="<?php the_permalink(); ?>">Read more &nbsp; <i class="fa fa-angle-right"></i></a></div>
                  </div>
                </div>

            <?php
              endwhile;
            else :

              echo '<h2 class="noposts">No post published yet ...</h2>';

            endif;

            wp_reset_query(); //Reset the main WP Query
            ?>
          </div>
        </div>
      </section>

      <div class="module-small bg-dark">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 col-lg-offset-2">
              <div class="callout-text font-alt">
                <h3 class="callout-title">Subscribe now</h3>
                <p>Get the latest news from Nebula.</p>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="callout-btn-box">
                <form id="subscription-form" role="form" method="post" action="php/subscribe.php">
                  <div class="input-group">
                    <input class="form-control form-control-newsletter" type="email" id="semail" name="semail" placeholder="Your Email" data-validation-required-message="Please enter your email address." required="required"><span class="input-group-btn">
                      <button class="btn btn-g btn-round" id="subscription-form-submit" type="submit">Submit</button></span>
                  </div>
                </form>
                <div class="text-center" id="subscription-response"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      get_footer();
      ?>
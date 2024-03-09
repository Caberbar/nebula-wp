<?php
get_header();

//Get the author object
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));

$user_info = get_userdata($curauth->ID);

$author_id = $curauth->ID;
?>

<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
  <main>
    <div class="page-loader">
      <div class="loader">Loading...</div>
    </div>
    <?php
    get_template_part('nav', 'other');
    ?>
    <div class="main">
      <section class="module bg-dark-60 about-page-header bg-colore" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/carlos/carlos2.jpg">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3 cabecera-autor">
              <h2 class="module-title font-alt"><?php echo $curauth->nickname; ?></h2>
              <div class="module-subtitle font-serif">
                <p><?php //echo $curauth->first_name; 
                    ?>&nbsp;<?php //echo $curauth->last_name; 
                            ?></p>
              </div>
              <div class="module-subtitle font-serif">
                <p><?php echo get_author_role($author_id); ?></p>
              </div>
              <div class="module-subtitle socialmedia font-serif">
                <a href=#><span class="dashicons dashicons-facebook"></span></a>
                <a href=#><span class="dashicons dashicons-twitter"></span></a>
                <a href=#><span class="dashicons dashicons-instagram"></span></a>
                <a href=#><span class="dashicons dashicons-linkedin"></span></a>
              </div>

            </div>
          </div>
        </div>
      </section>
      <section class="module pt-0 pb-0 bg-colore" id="about">
        <div class="row position-relative m-0 post-destacado">
          <div class="col-xs-12 col-md-6 side-image image-position image-side imagen-post-destacado imgaen-autores" style="background-size: contain" data-background="<?php echo get_user_meta($curauth->ID,'user_pic',true);?>"></div>
          <div class="col-xs-12 col-md-6 col-md-offset-6 side-image-text post-destacado-text posts-about-author">
            <div class="row">
              <div class="col-sm-12">
                <h2 class="module-title font-alt align-left">About me</h2>
                <div class="module-subtitle font-serif align-left">
                  <?php echo $curauth->description ?>
                </div>
              </div>
            </div>
          </div>
      </section>


      <section class="module bg-colore">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">My skills</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12"> <!-- 6 -->
              <h6 class="font-alt"><span class="icon-strategy"></span>&nbsp;&nbsp;<?php echo get_the_author_meta('skill1', $author_id); ?>
              </h6>
              <div class="progress">
                <div class="progress-bar pb-dark" aria-valuenow="<?php echo get_the_author_meta('skill1V', $author_id); ?>" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
              </div>
              <h6 class="font-alt"><span class="icon-puzzle"></span>&nbsp;&nbsp;<?php echo get_the_author_meta('skill2', $author_id); ?>
              </h6>
              <div class="progress">
                <div class="progress-bar pb-dark" aria-valuenow="<?php echo get_the_author_meta('skill2V', $author_id); ?>" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
              </div>
              <h6 class="font-alt"><span class="icon-lightbulb"></span>&nbsp;&nbsp;<?php echo get_the_author_meta('skill3', $author_id); ?>
              </h6>
              <div class="progress">
                <div class="progress-bar pb-dark" aria-valuenow="<?php echo get_the_author_meta('skill3V', $author_id); ?>" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
              </div>
              <h6 class="font-alt"><span class="icon-heart"></span>&nbsp;&nbsp;<?php echo get_the_author_meta('skill4', $author_id); ?>
              </h6>
              <div class="progress">
                <div class="progress-bar pb-dark" aria-valuenow="<?php echo get_the_author_meta('skill4V', $author_id); ?>" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>

    <section class="module bg-dark-60 parallax-bg" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/festival/festival1.jpg"> <!--style="background-position: 50% 15%;"> -->
      <div class="container">
        <div class="row multi-columns-row">
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="count-item mb-sm-40">
              <div class="count-icon"><span class="icon-target"></span></div>
              <h3 class="count-to font-alt" data-countto="21"></h3>
              <h5 class="count-title font-serif">Captivating Performances</h5>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="count-item mb-sm-40">
              <div class="count-icon"><span class="icon-bargraph"></span></div>
              <h3 class="count-to font-alt" data-countto="164"></h3>
              <h5 class="count-title font-serif">Electrifying Performances</h5>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="count-item mb-sm-40">
              <div class="count-icon"><span class="icon-trophy"></span></div>
              <h3 class="count-to font-alt" data-countto="56"></h3>
              <h5 class="count-title font-serif">Award-Winning Artists</h5>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="count-item mb-sm-40">
              <div class="count-icon"><span class="icon-happy"></span></div>
              <h3 class="count-to font-alt" data-countto="248642"></h3>
              <h5 class="count-title font-serif">Festival-Enthralled Guests</h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="module bg-colore" id="contact">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Contact with me</h2>
                <div class="module-subtitle font-serif"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
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
                    <textarea class="form-control formulario-contacto" rows="7" id="message" name="message" placeholder="Your Message*" required="required" data-validation-required-message="Please enter your message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d boton-contacto" id="cfsubmit" type="submit">Submit</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>
          </div>
        </section>
    
    <section class="module module-video bg-dark-30" data-background="assets/images/restaurant/coffee_bg.png" style="background-image: url(&quot;assets/images/restaurant/coffee_bg.png&quot;);">
      <div class="mbYTP_wrapper" id="wrapper_mbYTP_YTP_1708934782354" style="position: absolute; z-index: 0; min-width: 100%; min-height: 100%; left: 0px; top: 0px; overflow: hidden; opacity: 1; transition-property: opacity; transition-duration: 1000ms;"><iframe class="mbYTP_playerBox" id="mbYTP_YTP_1708934782354" style="position: absolute; z-index: 0; width: 0; height: 592px; top: 0px; left: 0px; overflow: hidden; opacity: 1; user-select: none; margin-top: -74px; margin-left: 0px; max-width: initial; transition-property: opacity; transition-duration: 1000ms;" frameborder="0" allowfullscreen="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" title="Beachfront B-Roll: Coffee Bean Mixing (Free to Use HD Stock Video Footage)" width="640" height="360" src="https://www.youtube.com/embed/i_XV7YCRzKo?modestbranding=1&amp;autoplay=0&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;version=3&amp;playerapiid=mbYTP_YTP_1708934782354&amp;origin=*&amp;allowfullscreen=true&amp;wmode=transparent&amp;iv_load_policy=3&amp;html5=1&amp;widgetid=1" unselectable="on"></iframe>
        <div class="mbYTP_overlay" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
      </div>
      <div class="container" style="position: relative;">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
            <h2 class="module-title font-alt mb-0">The most visited show on our networks.</h2>
          </div>
        </div>
      </div>
      <div class="video-player mb_YTPlayer isMuted" data-property="{videoURL:'https://www.youtube.com/watch?v=l1ZlwbHuhrU&ab_channel=AStateOfMusic', containment:'.module-video', startAt:56, mute:true, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:0}" id="YTP_1708934782354" style="display: none; position: relative;"></div>
    </section>



    <section class="module bg-colore" id="services">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
            <h2 class="module-title font-alt">My Lasts Posts</h2>
            <div class="module-subtitle font-serif"></div>
          </div>
        </div>
        <div class="row multi-columns-row post-columns">

          <?php
          //Comienza el LOOP
          $args = array(
            'posts_per_page' => 3, //Only the last three posts
            //Solo los posts que sean del autor
            'author' => $author_id,
            'post_type' => array('post', 'events'),
          );

          $author_posts = new WP_Query($args); //Instanciación de la clase wp_query

          if ($author_posts->have_posts()) :
            // $num_posts = $author_posts->found_posts;
            // $cont = 0;
            while ($author_posts->have_posts()) :
              $author_posts->the_post();
              // $cont ++;



              if (has_post_thumbnail()) {
                //Si tengo post_thumbnail: 
                $thumb_url = get_the_post_thumbnail_url();
              } else {
                //Pero si no tengo que mostrar una imagen por defecto
                $thumb_url = get_template_directory_uri() . '/assets/images/logo/logonegro-espacio.png';
              }



          ?>

              <div class="col-sm-6 col-md-4 col-lg-4"> <!-- Cuando solo nos da un post debemos cambiar el número de columnas para el boostrap, si es un posts sera 12 sino 6-->
                <div class="post mb-20 ">
                  <div class="post-thumbnail featured-img"><a href="<?php the_permalink(); ?>"><img class="hover-img" src="<?php echo $thumb_url; ?>" alt="Blog-post Thumbnail" />
                    </a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title "><a class="front-title" href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                    <div class="post-meta post-categories posts-blog posts-categories"><?php the_time('F j, Y') ?> | <i class="fa fa-thumb-tack">:</i><?php if (get_post_type() == 'events') {
                                                                                                            echo do_shortcode('[mpm_show_categories id="' . $post->ID . '"]');
                                                                                                          } else {
                                                                                                            the_category('&amp;');
                                                                                                          } ?>
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
    <?php
    get_footer();
    ?>
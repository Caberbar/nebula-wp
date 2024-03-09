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
                <p><?php //echo $curauth->first_name; ?>&nbsp;<?php //echo $curauth->last_name; ?></p>
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
                  <p><?php //echo $curauth->description 
                      ?></p>
                  <p>Hello there! I'm the driving force behind Nebula, a passionate visionary with a relentless pursuit of innovation and growth. My journey is fueled by a deep love for pushing boundaries and exploring new possibilities in the ever-evolving tech world.</p>
                  <p>As the founder of Nebula, I thrive on the thrill of turning bold ideas into reality and shaping the future of technology. With a sharp focus on excellence and a commitment to fostering a culture of creativity, I lead by example, inspiring my team to reach new heights of success.</p>
                  <p>Beyond the confines of the office, you'll find me embarking on adventures, seeking inspiration in the wonders of nature and the richness of diverse cultures. From traversing remote landscapes to engaging in thought-provoking conversations, I'm constantly seeking new experiences that fuel my passion for innovation.</p>
                  <p>Join me on this exciting journey with Nebula, where we're rewriting the rules of technology and shaping a future limited only by our imagination.</p>
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
              <div class="module-subtitle font-serif">Discover more about me, my tastes, my entertainment, my hobbies, etc...</div>
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

    <section class="module pb-0 bg-colore">
      <section class="module bg-dark-60" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/portadavideo/syren.jpg" style="background-image: url(&quot;assets/images/section-6.jpg&quot;);">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="video-box">
                <div class="video-box-icon"><a class="video-pop-up" href="<?php echo bloginfo('template_directory') ?>/assets/videos/Anyma.mp4"><i class="fa fa-play"></i></a></div>
                <div class="video-title font-alt">My favourite show</div>
                <div class="video-subtitle font-alt">My favorite nebula show</div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>

    <section class="module bg-colore">
      <div class="container">
        <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Know more</h2>
            </div>
          <div class="col-sm-8 col-sm-offset-2">
            <div class="tab-content">
              <div class="tab-pane active" id="support">
                <div class="panel-group " id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt panel-preguntas-autor"><a data-toggle="collapse" data-parent="#accordion" href="#support1"><span>What is your main motivation as the leader of Nebula?</span></a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="support1">
                      <div class="panel-body panel-preguntas-autor-answer">My main motivation is to drive innovation and growth in the tech world, taking Nebula to new frontiers and pushing the boundaries of what's possible.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt panel-preguntas-autor"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support2"><span>What values guide your leadership at Nebula?</span></a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="support2">
                      <div class="panel-body panel-preguntas-autor-answer">At Nebula, we value excellence, creativity, and collaboration. These values form the foundation of our company culture and drive us to achieve our goals with integrity and passion.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt panel-preguntas-autor"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support3"><span>How would you describe your leadership style at Nebula?</span></a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="support3">
                      <div class="panel-body panel-preguntas-autor-answer">My leadership style focuses on inspiration and empowerment. I believe in fostering an environment where every team member feels valued and motivated to contribute their unique ideas and skills.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt panel-preguntas-autor"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support4"><span>What sets you apart as the leader of Nebula from others in the tech industry?</span></a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="support4">
                      <div class="panel-body panel-preguntas-autor-answer">What sets me apart is my passionate focus on balancing disruptive innovation with social responsibility. At Nebula, we strive not only to lead in technology but also to do so in an ethical and sustainable manner that benefits society as a whole.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
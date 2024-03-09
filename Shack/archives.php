<?php

get_header();
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
      <section class="module module-archive bg-dark-60 about-page-header " data-background="<?php echo bloginfo('template_directory') ?>/assets/images/archives/festival.jpg">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">ARCHIVES</h2>
              <div class="module-subtitle font-serif">Surf my blog</div>
            </div>
          </div>
        </div>
      </section>
      <!--<section class="module pb-0" id="works">-->
      <!--  <div class="container">-->
      <!--    <div class="row">-->
      <!--      <div class="col-sm-6 col-sm-offset-3">-->
      <!--        <h2 class="module-title font-alt">Site index</h2>-->
      <!--        <div class="module-subtitle font-serif"></div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--  <div class="container">-->
      <!--    <div class="row">-->
      <!--      <div class="col-sm-12">-->
      <!--        <ul class="filter font-alt" id="filters">-->
      <!--          <li><a class="current wow fadeInUp" href="#" data-filter="*" style="visibility: visible; animation-name: fadeInUp;">All</a></li>-->
      <!--          <li><a class="wow fadeInUp" href="#" data-filter=".illustration" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Illustration</a></li>-->
      <!--          <li><a class="wow fadeInUp" href="#" data-filter=".marketing" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Marketing</a></li>-->
      <!--          <li><a class="wow fadeInUp" href="#" data-filter=".photography" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Photography</a></li>-->
      <!--          <li><a class="wow fadeInUp" href="#" data-filter=".webdesign" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Web Design</a></li>-->
      <!--        </ul>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--  <ul class="works-grid works-grid-gut works-grid-3 works-hover-w" id="works-grid" style="position: relative; height: 784.599px;">-->
      <!--    <li class="work-item illustration webdesign" style="position: absolute; left: 0px; top: 0px;"><a href="portfolio-single-1.html">-->
      <!--        <div class="work-image"><img src="assets/images/work-1.jpg" alt="Portfolio Item"></div>-->
      <!--        <div class="work-caption font-alt">-->
      <!--          <h3 class="work-title">Corporate Identity</h3>-->
      <!--          <div class="work-descr">Illustration</div>-->
      <!--        </div></a></li>-->
      <!--    <li class="work-item marketing photography" style="position: absolute; left: 427px; top: 0px;"><a href="portfolio-single-1.html">-->
      <!--        <div class="work-image"><img src="assets/images/work-2.jpg" alt="Portfolio Item"></div>-->
      <!--        <div class="work-caption font-alt">-->
      <!--          <h3 class="work-title">Bag MockUp</h3>-->
      <!--          <div class="work-descr">Marketing</div>-->
      <!--        </div></a></li>-->
      <!--    <li class="work-item illustration photography" style="position: absolute; left: 0px; top: 261px;"><a href="portfolio-single-1.html">-->
      <!--        <div class="work-image"><img src="assets/images/work-3.jpg" alt="Portfolio Item"></div>-->
      <!--        <div class="work-caption font-alt">-->
      <!--          <h3 class="work-title">Disk Cover</h3>-->
      <!--          <div class="work-descr">Illustration</div>-->
      <!--        </div></a></li>-->
      <!--    <li class="work-item marketing photography" style="position: absolute; left: 427px; top: 261px;"><a href="portfolio-single-1.html">-->
      <!--        <div class="work-image"><img src="assets/images/work-4.jpg" alt="Portfolio Item"></div>-->
      <!--        <div class="work-caption font-alt">-->
      <!--          <h3 class="work-title">Business Card</h3>-->
      <!--          <div class="work-descr">Photography</div>-->
      <!--        </div></a></li>-->
      <!--    <li class="work-item illustration webdesign" style="position: absolute; left: 0px; top: 523px;"><a href="portfolio-single-1.html">-->
      <!--        <div class="work-image"><img src="assets/images/work-5.jpg" alt="Portfolio Item"></div>-->
      <!--        <div class="work-caption font-alt">-->
      <!--          <h3 class="work-title">Business Card</h3>-->
      <!--          <div class="work-descr">Webdesign</div>-->
      <!--        </div></a></li>-->
      <!--    <li class="work-item marketing webdesign" style="position: absolute; left: 427px; top: 523px;"><a href="portfolio-single-1.html">-->
      <!--        <div class="work-image"><img src="assets/images/work-6.jpg" alt="Portfolio Item"></div>-->
      <!--        <div class="work-caption font-alt">-->
      <!--          <h3 class="work-title">Business Cards in paper clip</h3>-->
      <!--          <div class="work-descr">Marketing</div>-->
      <!--        </div></a></li>-->
      <!--  </ul>-->
      <!--</section>-->
      <section class="module bg-colore">
        <div class="container">
          <div class="row post-masonry post-columns" style="position: relative; height: 1474.2px;">
            <div class="col-sm-6 col-md-4 col-lg-4 archives-box" style="position: absolute; left: 0px; top: 0px;">
              <div class="post post-box">
                <div class="card-header">
                  <h3 class="card-title">Last Entries</h3>
                </div>
                <div class="card-body">
                  <ul class="last-entries">
                    <?php

                    $args = array(
                      'type' => 'postbypost', //Esto te muestra el nombre los posts - Retrive the posts title
                      'limit' => 20, //Limitamos el número de posts que mostraremos - Only last 20 posts published 
                    );

                    wp_get_archives($args);

                    ?>
                  </ul>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 archives-box" style="position: absolute; left: 390px; top: 0px;">
              <div class="post post-box">
                <div class="card-header">
                  <h3 class="card-title">Events</h3>
                </div>
                <div class="card-body">
                  <ul class="last-entries">
                    <?php
                    $args = array(
                      'posts_per_page' => 20,
                      'post_type' => array('events'),
                    );

                    $events = get_posts($args);
                    if (empty($events)) {
                      echo '<h5>No posts visited ...</h5>';
                    } else {
                      foreach ($events as $post) {
                        echo '<li><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '<span class="badge pull-right">' . '</span></a></li>';
                      }
                    }

                    ?>
                  </ul>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 archives-box" style="position: absolute; left: 780px; top: 0px;">
              <div class="post post-box">
                <div class="card-header">
                  <h3 class="card-title">Tag List</h3>
                </div>
                <div class="card-body">
                  <ul class="last-entries">
                    <?php
                    echo get_tag_list(20);
                    ?>
                  </ul>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 archives-box" style="position: absolute; left: 0px; top: 449px;">
              <div class="post post-box">
                <div class="card-header">
                  <h3 class="card-title">Category List</h3>
                </div>
                <div class="card-body">
                  <ul class="last-entries">
                    <?php
                    $categorias = wp_list_categories('title_li=&show_count=1&echo=0');
                    $categorias = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="mybadge pull-right">\\1</span></a>', $categorias);
                    echo '<span class="enlaceLista">' . $categorias . '</span>';
                    ?> <!-- Devulve un li por cada categoria por eso necesitamos un ul-->
                  </ul>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 archives-box" style="position: absolute; left: 780px; top: 449px;">
              <div class="post post-box">
                <div class="card-header">
                  <h3 class="card-title">Authors</h3>
                </div>
                <div class="card-body">
                  <ul class="last-entries">
                    <?php
                    $args = array(
                      'optioncount' => 1, //Visualiza el numero de post que ha escrito este autor
                      'echo' => 0, //Nos devuelve la lista de autores en lugar de visualizarla
                      'hide_empty' => false, //Hace que se visualice también los autores sin post publicados
                      'orderby' => 'post_count', //Ordena los autores según el número de post publicados (Esta en orden ascendente)
                      'order' => 'DESC', //En orden de mayor número de posts publicados a menor número de posts publicados
                    );

                    $authors = wp_list_authors($args);
                    $authors = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="mybadge  pull-right">\\1</span></a>', $authors);
                    echo $authors;
                    ?>
                  </ul>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 archives-box" style="position: absolute; left: 390px; top: 512px;">
              <?php

              //Authors loop
              //We need name and ID of each author

              $args = array('displa_name', 'ID',);

              $authors = get_users($args); //Retrieve an authors objects collection with display_name and ID properties

              foreach ($authors as $author) {



              ?>
                <div class="post post-box">
                  <div class="card-header">
                    <h3 class="card-title"><?php echo $author->display_name ?> Posts</h3>
                  </div>
                  <div class="card-body">
                    <ul class="last-entries">
                      <?php
                      $args = array(
                        'posts_per_page' => 20,
                        'author' => $author->ID,
                      );

                      $posts_by_author = get_posts($args);
                      if (empty($posts_by_author)) {
                        echo '<h5>No posts visited ...</h5>';
                      } else {
                        foreach ($posts_by_author as $post) {
                          echo '<li><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '<span class="badge pull-right">' . $post->numvisits . '</span></a></li>';
                        }
                      }

                      ?>
                    </ul>
                  </div>
                  <div class="card-footer">

                  </div>
                </div>
              <?php
              }
              ?>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 archives-box" style="position: absolute; left: 780px; top: 898px;">
              <div class="post post-box post-box">
                <div class="card-header">
                  <h3 class="card-title">Daily Posts</h3>
                </div>
                <div class="card-body">
                  <ul class="last-entries">
                    <?php
                    $args = array(
                      'type' => 'daily', //dated with posts published
                      'show_post_count' => true, //Show number of posts published
                      'limit' => 20, //20 dated tops
                      'echo' => false,
                    );

                    $daily = wp_get_archives($args);
                    $daily = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="mybadge  pull-right">\\1</span></a>', $daily);
                    echo $daily;
                    ?>
                  </ul>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 archives-box" style="position: absolute; left: 0px; top: 961px;">
              <div class="post post-box">
                <div class="card-header">
                  <h3 class="card-title">Monthly Posts</h3>
                </div>
                <div class="card-body">
                  <ul class="last-entries">
                    <?php
                    $args = array(
                      'type' => 'monthly', //dated with posts published
                      'show_post_count' => true, //Show number of posts published
                      'limit' => 20, //20 dated tops
                      'echo' => false,
                    );

                    $daily = wp_get_archives($args);
                    $daily = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="mybadge  pull-right">\\1</span></a>', $daily);
                    echo $daily;
                    ?>
                  </ul>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 archives-box" style="position: absolute; left: 390px; top: 961px;">
              <div class="post post-box">
                <div class="card-header">
                  <h3 class="card-title">Yearly Posts</h3>
                </div>
                <div class="card-body">
                  <ul class="last-entries">
                    <?php
                    $args = array(
                      'type' => 'yearly', //dated with posts published
                      'show_post_count' => true, //Show number of posts published
                      'limit' => 20, //20 dated tops
                      'echo' => false,
                    );

                    $daily = wp_get_archives($args);
                    $daily = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="mybadge  pull-right">\\1</span></a>', $daily);
                    echo $daily;
                    ?>
                  </ul>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 archives-box" style="position: absolute; left: 390px; top: 961px;">
              <div class="post post-box">
                <div class="card-header">
                  <h3 class="card-title">Most popular posts</h3>
                </div>
                <div class="card-body">
                  <ul class="last-entries">
                    <?php
                    $args = array(
                      'posts_per_page' => 20,
                      'meta_key' => 'numvisits', //filter by numvisits metadata
                      'orderby' => 'meta_value_num', //Order by numvisits numeric value
                      'order' => 'DESC',
                    );

                    $popular = get_posts($args);
                    if (empty($popular)) {
                      echo '<h5>No posts visited ...</h5>';
                    } else {
                      foreach ($popular as $post) {
                        echo '<li><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '<span class="badge pull-right">' . $post->numvisits . '</span></a></li>';
                      }
                    }

                    ?>
                  </ul>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 archives-box" style="position: absolute; left: 390px; top: 961px;">
              <div class="post post-box">
                <div class="card-header">
                  <h3 class="card-title">Mosts commented posts</h3>
                </div>
                <div class="card-body">
                  <ul class="last-entries">
                    <?php
                    $args = array(
                      'posts_per_page' => 15,
                      'orde' => 'DESC',
                      'orderby' => 'comment_count',
                    );

                    $posts = get_posts($args);
                    if (empty($posts)) {
                      echo '<h5>No posts commented ...</h5>';
                    } else {
                      foreach ($posts as $post) {
                        echo '<li><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '<span class="badge pull-right">'.get_comments_number($post->ID).'</span></a></li>';
                      }
                    }

                    ?>
                  </ul>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
    </section>


    <?php
    get_footer();
    ?>
    
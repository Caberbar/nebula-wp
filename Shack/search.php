<?php
get_header();
//Recogemos el criterio de búsqueda
if (isset($_GET['s'])) { //Si existe una variable de busqueda en la URL
  if (empty($_GET['s'])) {
    //He pulsado en busca sin meter ningún valor en el cuadro de texto en el form
    $words = "All Posts";
  } else {
    $words = get_search_query(); //Devuelve la palabra o palabras que ha introducido en el cuadro de busqueda
  }
}
//Hallar el número de resultados de la búsqueda
if (have_posts()) {
  $total = $wp_the_query->found_posts; //Almacenamos en numero de posts encontrados
  if ($total != 1) {
    $whatever = $total . ' Posts';
  } else {
    $whatever = $total . ' Post';
  }
} else {
  $whatever = 'No posts';
}
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
      <section class="module bg-dark-60 blog-page-header bg-colore" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/search/search.jpg">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt"><?php ?>SEARCH FOR: <?php echo $words ?></h2>
              <div class="module-subtitle font-serif"><?php echo $whatever ?> found</div>
            </div>
          </div>
        </div>
      </section>

      <!-- RESTO DE POSTS-->
      <section class="module bg-colore">
        <div class="container">
          <div class="row reset-margin">
            <div class="col-sm-8">
              <div class="row multi-columns post-columns">
                <?php

                if (have_posts()) :
                  while (have_posts()) :
                    the_post();
                    if (has_post_thumbnail()) {
                      $thumb_url = get_the_post_thumbnail_url();
                    } else {
                      if (get_post_type() == 'page') { //si es una pagina
                        switch ($post->post_title) {

                          case 'HOME':
                            $thumb_url = get_template_directory_uri() . '/assets/images/screenshots/home.png';
                            break;
                          case 'BLOG':
                            $thumb_url = get_template_directory_uri() . '/assets/images/screenshots/blog.png';
                            break;
                          case 'EVENTS':
                            $thumb_url = get_template_directory_uri() . '/assets/images/screenshots/events.png';
                            break;
                          case 'CONTACT':
                            $thumb_url = get_template_directory_uri() . '/assets/images/screenshots/contact.png';
                            break;
                          case 'ARCHIVES':
                            $thumb_url = get_template_directory_uri() . '/assets/images/screenshots/archives.png';
                            break;
                          case 'PRIVATE':
                            $thumb_url = get_template_directory_uri() . '/assets/images/screenshots/private.png';
                            break;
                          case 'Privacy Policy':
                            $thumb_url = get_template_directory_uri() . '/assets/images/screenshots/Privacy.jpeg';
                            break;
                            case 'TERMS':
                            $thumb_url = get_template_directory_uri() . '/assets/images/screenshots/terms.jpeg';
                            break;
                            case 'LICENSE':
                            $thumb_url = get_template_directory_uri() . '/assets/images/screenshots/license.jpeg';
                            break;
                        }
                      } else {
                        $thumb_url = get_template_directory_uri() . '/assets/images/logo/logoblanco-espacio.png';
                      }
                    }

                ?>
                    <div class="col-md-6 col-lg-12 search-posts">
                      <li class="clearfix lista-busqueda">
                        <div class="widget-posts-image  imagen-search">
                          <a href="<?php the_permalink() ?>">
                            <img src="<?php echo $thumb_url; ?>" alt="hola">
                          </a>
                        </div>
                        <div class="widget-posts-body contenido-search">
                          <div class="widget-posts-title titulos-posts">
                            <a href="<?php the_permalink(); ?>" class="ancla-btn-navegacion"><?php the_title() ?></a>
                          </div>
                          <div class="widget-posts-meta enlaces-search">
                            <?php
                            if (get_post_type() == 'post' || get_post_type() == 'events') { ?>
                              <span><?php the_time('F j, Y') ?></span>
                            <?php  } else {
                            ?>
                              <span>PAGE</span>
                            <?php
                            }
                            ?>
                            <span><?php the_author_posts_link(); ?></span>
                            <?php
                            if (get_post_type() == 'events') { ?>
                              <span>Event</span>
                            <?php  }
                            ?>

                          </div>
                          <div class="post-more"><a class="btn btn-border-d btn-round bontonmas-search" href="<?php the_permalink(); ?>">Read more &nbsp; <i class="fa fa-angle-right"></i></a></div>
                        </div>
                      </li>
                    </div>
                <?php

                  endwhile;

                endif;
                wp_reset_query(); //Resetea la query
                ?>
              </div>
              <?php
              //PAGINACIÓN
              $args = array(
                'type' => 'a',
              );
              the_posts_pagination($args); //
              ?>
              <!--<div class="pagination font-alt"><a href="#"><i class="fa fa-angle-left"></i></a><a class="active" href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#"><i class="fa fa-angle-right"></i></a></div>-->
            </div>

            <!-- START SIDEBAR-->
            <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
              <?php get_sidebar(); ?>
              <!---->
            </div>
          </div>
      </section>
      <?php
      get_footer();
      ?>
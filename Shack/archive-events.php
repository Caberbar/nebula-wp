<?php
// Template Name: Events

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
      <section class="module bg-dark-60 blog-page-header" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/blog/blog.jpg">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Events Posts</h2>
              <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
            </div>
          </div>
        </div>
      </section>
      <!-- RESTO DE POSTS-->
      <section class="module bg-colore">
        <div class="container">
          <div class="row">
            <div class="col-sm-8">
              <!---->
              <?php
              $paged = get_query_var('paged') > 1 ? get_query_var('paged') : 1;

              $args = array(
                'paged' => $paged, //Se usa en aquellas plantilla de wp que sean dinamicas
                'posts_per_page' => 6, //4 posts per page
                'post_type' => array('events'),
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
                    $thumb_url = get_template_directory_uri() . '/assets/images/logo/logonegro-espacio.png';
                  }
              ?>

                  <div class="post">
                    <div class="post-thumbnail"><a href="<?php the_permalink(); ?>"><img class="posts-imagen-scala" src="<?php echo $thumb_url; ?>" alt="<?php the_title() ?>" /></a></div>
                    <div class="post-header font-alt">
                      <h2 class="post-title posts-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                      <div>By&nbsp;<span class="author-post"><?php the_author_posts_link(); ?></span>&nbsp;| <?php the_time('F j, Y'); ?></p>
                      </div>
                      <div class="post-categories posts-blog posts-categories"><i class="fa fa-thumb-tack">&nbsp;:</i><?php do_shortcode('[mpm_show_categories id="' . $post->ID . '"]'); ?></div>
                      <div class="post-meta posts-tags "><i class="fa-solid fa-tags"></i>&nbsp;<?php do_shortcode('[mpm_show_tags id="' . $post->ID . '"]'); ?></div>
                    </div>
                    <div class="post-entry posts-excerpt-events">

                      <?php do_shortcode('[mpm_show_main_fields id="' . $post->ID . '"]'); ?>
                      <p><?php the_excerpt(); ?></p>
                    </div>
                    <div class="post-more"><a class="btn btn-border-d btn-round bontonmas" href="<?php the_permalink(); ?>">Read more &nbsp; <i class="fa fa-angle-right"></i></a></div>
                  </div>


              <?php
                endwhile;
              else :
                echo "No post published yet ...";
              endif;
              ?>

              <?php the_posts_pagination() ?>
              <!--<div class="pagination font-alt"><a href="#"><i class="fa fa-angle-left"></i></a><a class="active" href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#"><i class="fa fa-angle-right"></i></a></div>-->

            </div>

            <!-- START SIDEBAR-->
            <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
              <?php get_sidebar('events'); ?>
              <!---->
            </div>
          </div>
      </section>
      <?php
      get_footer();
      ?>
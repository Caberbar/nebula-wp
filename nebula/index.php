<?php
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
        <section class="module bg-dark-60 blog-page-header" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/blog/blog.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">BLOG</h2>
                <div class="module-subtitle font-serif">Explore our latest news.</div>
              </div>
            </div>
          </div>
        </section>
        <!-- POST DESTACADO -->
        
        <?php
          $args = array(
            'posts_per_page' => 1,
          );
          
          $post_destacado = new WP_Query($args);
          if($post_destacado->have_posts() ):
            while ($post_destacado->have_posts() ):
              $post_destacado->the_post(); //Nos da acceso a todas las funciones the_* y al objeto $post
              
              if(has_post_thumbnail()){
                      //Si tengo post_thumbnail: 
                      $thumb_url = get_the_post_thumbnail_url();
                    }else{
                      //Pero si no tengo que mostrar una imagen por defecto
                      $thumb_url = get_template_directory_uri().'/assets/images/logo/logonegro-espacio.png';
                    }
                    
                    //Store the post ID to exclude in the main LOOP
                    $post_destacado_id = $post -> ID;
        ?>
        <section class="module pt-0 pb-0 bg-colore" id="about">
          <div class="row position-relative m-0 post-destacado">
            <div class="col-xs-12 col-md-6 side-image image-position image-side imagen-post-destacado" data-background="<?php echo $thumb_url; ?>"></div>
            <div class="col-xs-12 col-md-6 col-md-offset-6 side-image-text post-destacado-text">
              <div class="row">
                <div class="col-sm-12 post_separado">
                  <a href="<?php the_permalink();?>">
                  <h2 class="module-title font-alt align-left post-destacado-title"><?php the_title() ?></h2></a>
                  <!--<div class="module-subtitle font-serif align-left">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>-->
                  <!--<p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>-->
                  <!--<p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.</p>-->
                  <p class="destacado-author-date">Published on&nbsp;<span><?php the_time('F j, Y');?></span> by <span class="author-post"><?php the_author_posts_link();?></span></p>
                  <p><?php the_excerpt();?></p>
                  <div class="post-categories posts-blog"><i class="fa fa-thumb-tack">&nbsp;:</i><?php the_category('&amp;'); ?></div>
                  <div class="post-categories posts-blog posts-tags"><i class="fa-solid fa-tags">&nbsp;:</i><?php the_tags('', '-'); ?></div>
                  <div class="post-more post-destacado-mas"><a class="btn btn-border-d btn-round bontonmas" href="<?php the_permalink(); ?>">Read more &nbsp; <i class="fa fa-angle-right"></i></a></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php
            endwhile;
                endif;
                
            wp_reset_postdata(); //Reset the WP main query
        ?>
        
        <!-- RESTO DE POSTS-->
        <section class="module bg-colore">
          <div class="container">
            <div class="row">
              <div class="col-sm-8">
                <!---->
                <?php
                    $paged = get_query_var('paged') > 1 ? get_query_var('paged') : 1;
                
                    $args=array(
                      'paged' => $paged, //Se usa en aquellas plantilla de wp que sean dinamicas
                      'posts_per_page' => 4, //4 posts per page
                      'post__not_in' => array($post_destacado_id), //Exclude the features post ID
                    );
                    
                    $query = new WP_Query($args);
                    if($query->have_posts()):
                      while($query->have_posts()):
                          $query->the_post();
                          
                          if(has_post_thumbnail()){
                      //Si tengo post_thumbnail: 
                      $thumb_url = get_the_post_thumbnail_url();
                    }else{
                      //Pero si no tengo que mostrar una imagen por defecto
                      $thumb_url = get_template_directory_uri().'/assets/images/logo/logonegro-espacio.png';
                    }
                ?>
                
                <div class="post">
                  <div class="post-thumbnail"><a href="<?php the_permalink();?>"><img class="posts-imagen-scala" src="<?php echo $thumb_url; ?>" alt="<?php the_title() ?>"/></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title posts-title"><a href="<?php the_permalink();?>"><?php the_title() ?></a></h2>
                    <br>
                    <div >By&nbsp;<span class="author-post"><?php the_author_posts_link();?></span>&nbsp;| <?php the_time('F j, Y');?></p>
                    
                    </div>
                    <div class="post-categories posts-blog posts-categories"><i class="fa fa-thumb-tack">&nbsp;:</i><?php the_category('&amp;'); ?></div>
                    <div class="post-meta posts-tags "><i class="fa-solid fa-tags"></i>&nbsp;<?php the_tags(':  ');?></div>
                  </div>
                  <div class="post-entry posts-excerpt">
                    <p><?php the_excerpt();?></p>
                  </div>
                  <div class="post-more"><a class="btn btn-border-d btn-round bontonmas" href="<?php the_permalink(); ?>">Read more &nbsp; <i class="fa fa-angle-right"></i></a></div>
                </div>
                  
                  
                  <?php 
                      endwhile;
                    else:
                      echo "No post published yet ...";
                    endif;
                  ?>
                  
                  <?php the_posts_pagination() ?>
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
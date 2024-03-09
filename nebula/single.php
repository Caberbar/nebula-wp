<?php
    get_header();
    
    if(has_post_thumbnail()){
                      //Si tengo post_thumbnail: 
                      $thumb_url = get_the_post_thumbnail_url();
                    }else{
                      //Pero si no tengo que mostrar una imagen por defecto
                      $thumb_url = get_template_directory_uri().'/assets/images/logo/logonegro-espacio.png';
                    }
    
    the_post();
    
    $post_id = $post->ID;
    add_num_visits($post_id);
    
    //Get an array with the categories id
    $cats = wp_get_post_categories($post_id);
    //Para ver el contenido del array usaremos var_dump($cats)
    
    $author_id = $post -> post_author; //author ID
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
        <section class="pt-0 pb-0 bg-colore" id="about">
          <div class="row position-relative m-0">
            <div class="col-xs-12 col-md-6 side-image image-position image-side imagen-post-destacado" data-background="<?php echo $thumb_url; ?>"></div>
            <div class="col-xs-12 col-md-6 col-md-offset-6 side-image-text">
              <div class="row">
                <div class="col-sm-12">
                  <h2 class="module-title font-alt align-left"><?php the_title() ?></h2>
                  <p class="destacado-author-date">Published on&nbsp;<span><?php the_time('F j, Y');?></span> by <span class="author-post"><?php the_author_posts_link();?></span></p>
                  <div class="post-categories posts-blog posts-blog-cat"><i class="fa fa-thumb-tack">&nbsp;:</i><?php the_category('&amp;'); ?></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module-small bg-colore">
          <div class="container">
            <div class="row">
              <div class="col-sm-8">
                <div class="post">
                  <div class="post-entry">
                    <div class="post-meta-items"><span><i class="fa fa-comment"></i></span>&nbsp;&nbsp;<span><?php comments_number('No comments', '1 comment', '% comments') ?></span>&nbsp;&nbsp; | &nbsp;&nbsp;<span><i class="fa fa-eye"></i></span>&nbsp;&nbsp;<span><?php echo get_num_visits($post_id); ?></span></div>
                    <br>
                    <?php the_content();?>
                    <br>
                      <div class="post-categories posts-blog posts-tags posts-blog-cat"><i class="fa-solid fa-tags">&nbsp;:</i><?php the_tags('', '-'); ?></div>
                  </div>
                </div>
                
                <div class="comments">
                      <div class="comment clearfix">
                        <div class="comment-avatar">
                          <?php
                              // Obtener el ID del autor del post actual
                              $author_id = get_the_author_meta('ID');
                              
                              // Obtener el enlace a la página de perfil del autor
                              $author_link = get_author_posts_url($author_id);
                              
                              // Obtener el avatar del autor con el tamaño predeterminado de 96 píxeles
                              $avatar = get_avatar_url($author_id, array('size' => 96));
                              
                              // Mostrar el avatar envuelto en un enlace al perfil del autor
                              echo '<a href="' . esc_url($author_link) . '"><img alt="" src="' . esc_url($avatar) . '" class="avatar avatar-96 photo avatar-default" height="96" width="96" decoding="async"></a>';
                              ?>                    
                        </div>
                        <div class="comment-content clearfix">
                          <div class="comment-author font-alt">
                            <span class="author-post"><?php the_author_posts_link();?></span>
                          </div>
                          <div class="comment-body">
                              <?php echo get_the_author_meta('description',get_the_author_meta('ID'));?>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row multi-columns-row post-columns">
              
              <?php 
                //Comienza el LOOP
                $args = array(
                  'posts_per_page' => 3, //Only the last three posts
                  //Solo los posts que compartan categoria
                  'category__in' => $cats,
                  //Que no se repita el post que estamos viendo
                  'post__not_in' => array($post_id),
                );
                
                $related_posts = new WP_Query( $args ); //Instanciación de la clase wp_query
                
                if($related_posts->have_posts() ):
                  while( $related_posts->have_posts()):
                    $related_posts->the_post();
                    
                    if(has_post_thumbnail()){
                      //Si tengo post_thumbnail: 
                      $thumb_url = get_the_post_thumbnail_url();
                    }else{
                      //Pero si no tengo que mostrar una imagen por defecto
                      $thumb_url = get_template_directory_uri().'/assets/images/logo/logonegro-espacio.png';
                    }
                    
                    
                    
              ?>
              
              <div class="col-sm-6 col-md-4 col-lg-4"> <!-- Cuando solo nos da un post debemos cambiar el número de columnas para el boostrap, si es un posts sera 12 sino 6-->
                <div class="post mb-20 ">
                  <div class="post-thumbnail featured-img"><a href="<?php the_permalink();?>"><img class="hover-img" src="<?php echo $thumb_url;?>" alt="Blog-post Thumbnail" />
                  </a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title "><a class="front-title" href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                    <div class="post-meta info-head-post author-post">By&nbsp;<?php the_author_posts_link() ?>&nbsp;| <?php the_time('F j, Y') ?></div>
                      <div class="post-meta">
                        <div class="post-categories"><i class="fa fa-thumb-tack">:</i><?php the_category('&amp;'); ?></div>
                      </div>
                  </div>
                  <!--<div class="post-entry">-->
                  <!--  <p>the_excerpt();?></p>-->
                  <!--</div>-->
                  <div class="post-more"><a class="btn btn-border-d btn-round bontonmas" href="<?php the_permalink(); ?>">Read more &nbsp; <i class="fa fa-angle-right"></i></a></div>
                </div>
              </div>
              
              <?php 
                  endwhile;
                else:
                  
                  echo '<h4 class="noposts">No post published yet ...</h4>';
                  
                endif;
                
                wp_reset_query(); //Reset the main WP Query
              ?>
            </div>
              
              
                
              
                <div class="comments">
                  <h4 class="comment-title font-alt"><?php comments_number('No comments', '1 comments', '% comments'); ?></h4>
                  <?php comments_template(); ?>
                </div>
                
                
                
                
                
                
                
                
              </div>
              <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
                <?php get_sidebar('other'); ?>
              </div>
            </div>
          </div>
        </section>
        <?php
    get_footer();
?>
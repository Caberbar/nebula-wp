<div class="widget">
                  <form role="form" method="get" action="<?php echo home_url('/'); ?>">
                    <div class="search-box">
                      <input class="form-control" name="s" id="s" type="text" placeholder="Search..."/>
                      <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                  </form>
                </div>
                
                <div class="widget widget-calendar-tags">
                  <!-- AREA DE WIDGETS -->
                  <h5 class="widget-title font-alt">TAG CLOUD & CALENDAR</h5>
                  <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets')):?> <!-- Preguntamos si existe un área de widgets definida en el back-end -->
                  <p>Sorry, no widget installed for this theme !</p>  <!-- Texto para cuando no haya definida un área de widget-->
                  <?php endif; ?>
                </div>
                
                <div class="widget widget-categories">
                  <h5 class="widget-title font-alt">Blog Categories</h5>
                  <ul class="icon-list">
                    <?php 
                      $categorias = wp_list_categories('title_li=&show_count=1&echo=0'); 
                      $categorias = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="mybadge  pull-right">\\1</span></a>', $categorias);
                      echo $categorias;
                    ?> <!-- Devulve un li por cada categoria por eso necesitamos un ul-->
                  </ul>
                </div>
                <div class="widget widget-authors">
                  <h5 class="widget-title font-alt">Authors</h5>
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
                </div>
                <div class="widget widget-pages">
                  <h5 class="widget-title font-alt">Pages</h5>
                  <?php
                    $pages = get_pages(); //Devuelve una colección de objetos tipo página
                    foreach ($pages as $page){
                      if(!in_array( $page -> post_title, array('HOME','ABOUT','BLOG','EVENTS','CONCERTS','CONTACT','ARCHIVES'))){
                        $exclude_page[] = $page -> ID;
                      }
                    }
                    $args = array(
                      'title_li' => '',//Elimino el título que me pone la función por defecto para usar el de mi layout
                      'exclude' => implode(',',$exclude_page), //String con los ID separados por comas
                      
                    );
                    wp_list_pages($args);
                  ?>
                </div>
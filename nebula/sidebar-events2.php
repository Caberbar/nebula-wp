<div class="widget">
  <form role="form" method="get" action="<?php echo home_url('/'); ?>">
    <div class="search-box">
      <input class="form-control" name="s" id="s" type="text" placeholder="Search..." />
      <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
    </div>
  </form>
</div>

<div class="widget widget-calendar-tags">
  <!-- AREA DE WIDGETS -->
  <h5 class="widget-title font-alt">TAG CLOUD & CALENDAR</h5>
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets')) : ?> <!-- Preguntamos si existe un área de widgets definida en el back-end -->
    <p>Sorry, no widget installed for this theme !</p> <!-- Texto para cuando no haya definida un área de widget-->
  <?php endif; ?>
</div>

<div class="widget widget-categories">
  <h5 class="widget-title font-alt">Blog Categories</h5>
  <ul class="icon-list">
    <!--listado de todas las categorias del BLOG-->
    <?php
    // Obtener las categorías de un tipo de publicación personalizado llamado "custom_post_type_name"
    $custom_post_type_categories = get_categories(array(
      'taxonomy'   => 'events-category', // Reemplaza 'taxonomy_name' con el nombre de la taxonomía asociada al tipo de publicación personalizado
      'hide_empty' => false, // Mostrar incluso las categorías sin publicaciones asociadas
    ));

    // Iterar sobre las categorías obtenidas
    foreach ($custom_post_type_categories as $category) {
      echo '<li class="cat-item">';
      echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
      echo '</li>';
    }
    ?>
  </ul>
</div>
<div class="widget widget-authors">
  <h5 class="widget-title font-alt">Authors</h5>
  <?php
  $authors = get_users();

  foreach ($authors as $author) {
    $args = array(
      'author' => $author->ID,
      'post_type' => 'events', // Reemplaza 'custom_post_type_name' con el nombre de tu tipo de publicación personalizado
    );

    $author_posts = new WP_Query($args);

    echo '<a href="' . esc_url(get_author_posts_url($author->ID)) . '">' . esc_html($author->display_name) . '</a>';
    echo ' <span class="mybadge pull-right">' . $author_posts->found_posts . '</span><br>';
  }
  ?>
</div>
<div class="widget widget-pages">
  <h5 class="widget-title font-alt">Pages</h5>
  <?php
  $pages = get_pages(); //Devuelve una colección de objetos tipo página
  foreach ($pages as $page) {
    if (!in_array($page->post_title, array('HOME', 'ABOUT', 'BLOG', 'EVENTS', 'CONCERTS', 'CONTACT', 'ARCHIVES'))) {
      $exclude_page[] = $page->ID;
    }
  }
  $args = array(
    'title_li' => '', //Elimino el título que me pone la función por defecto para usar el de mi layout
    'exclude' => implode(',', $exclude_page), //String con los ID separados por comas

  );
  wp_list_pages($args);
  ?>
</div>
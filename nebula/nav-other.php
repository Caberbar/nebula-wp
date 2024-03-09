<?php

// Obtener la URL actual
$current_url = home_url($_SERVER['REQUEST_URI']);
// Obtener el ID de la página actual

$blog = false;
$reviews = false;
$contact = false;
$archives = false;
$private = false;

if ($current_url) {
  if ($current_url == 'https://cberbar117.ieszaidinvergeles.es/wp2023/wp2023/blog/') {
    $blog = true;
  } else if ($current_url == 'https://cberbar117.ieszaidinvergeles.es/wp2023/wp2023/concerts/') {
    $events = true;
  } else if ($current_url == 'https://cberbar117.ieszaidinvergeles.es/wp2023/wp2023/contact/') {
    $contact = true;
  } else if ($current_url == 'https://cberbar117.ieszaidinvergeles.es/wp2023/wp2023/archives/') {
    $archives = true;
  } else if ($current_url == 'https://cberbar117.ieszaidinvergeles.es/wp2023/wp2023/private/') {
    $private = true;
  } else if (is_singular('BLOG') && !is_singular('EVENTS')) {
    $blog = true;
  } else if (is_singular('EVENTS') && !is_singular('BLOG')) {
    $events = true;
  }
}
?>

<nav class="navbar navbar-custom-other navbar-custom navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand logos logonavother" href="<?php echo home_url(); ?>"><img class="logonav logoother" src="<?php echo bloginfo('template_directory') ?>/assets/images/logo/logoblancoletras.png"></img></a>
    </div>
    <div class="collapse navbar-collapse" id="custom-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a href="<?php echo home_url(); ?>"><span>Home</span></a>
        </li>
        <li class="dropdown"><a href="<?php echo home_url(); ?>#about"><span>About</span></a>
        </li>
        <li class="dropdown <?php if ($blog) {
                              echo 'enlace-actual';
                            } ?>"><a href="<?php echo get_page_link(get_page_object("BLOG")->ID); ?>"><span>Blog</span></a>
        </li>
        <li class="dropdown <?php if ($events) {
                              echo 'enlace-actual';
                            } ?>"><a href="<?php echo get_page_link(get_page_object("EVENTS")->ID); ?>"><span>Events</span></a>
        <li>
        <li class="dropdown <?php if ($contact) {
                              echo 'enlace-actual';
                            } ?>"><a href="<?php echo get_page_link(get_page_object("CONTACT")->ID); ?>"><span>Contact</span></a>
        </li>
        <li class="dropdown <?php if ($archives) {
                              echo 'enlace-actual';
                            } ?>"><a href="<?php echo get_page_link(get_page_object("ARCHIVES")->ID); ?>"><span>Archives</span></a>
        </li>

        <li class="dropdown <?php if ($private) {
                              echo 'enlace-actual';
                            } ?>"><a href="<?php echo get_page_link(get_page_object("PRIVATE")->ID); ?>"><span><i class="fa fa-user"></i></span></a></li>
      </ul>
    </div>
  </div>
</nav>
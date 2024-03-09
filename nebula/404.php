<?php
/**
 * The template for displaying 404 pages (Not Found)
 * Template Name: 404
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <section class="home-section home-parallax home-fade home-full-height bg-dark bg-dark-30" id="home" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/404/b1.jpg">
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-4">Error 404</div>
            <div class="font-alt">The requested URL was not found on this website.<br/>That is all we know.
            </div>
            <div class="font-alt mt-30"><a class="btn btn-border-w btn-round" href="<?php echo home_url(); ?>">Back to home page</a></div>
          </div>
        </div>
      </section>

<?php get_template_part('footer','other'); ?>
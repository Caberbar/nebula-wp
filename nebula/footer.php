<div class="module-small bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt logo-footer"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/logo/logoblancoletras.png"></h5>
                  <p>Embark on a Cosmic Journey of Sound and Vision: Explore Nebula, Where Dreams Meet Innovation and Music Transcends Boundaries!</p>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">Explore</h5>
                  <ul class="icon-list icon-list-footer">
                    <li><a href="<?php echo home_url(); ?>"><span>Home</span></a></li>
                    <li><a href="<?php echo home_url(); ?>#about"><span>About</span></a></li>
                    <li><a href="<?php echo get_page_link(get_page_object("BLOG")->ID); ?>"><span>Blog</span></a></li>
                    <li><a href="<?php echo get_page_link(get_page_object("EVENTS")->ID); ?>"><span>Events</span></a></li>
                    <li><a href="<?php echo get_page_link(get_page_object("CONTACT")->ID); ?>"><span>Contact</span></a></li>
                    <li><a href="<?php echo get_page_link(get_page_object("ARCHIVES")->ID); ?>"><span>Archives</span></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">Contact</h5>
                  <ul class="icon-list icon-list-footer">
                    <li>De Schorre, Boom, Belgium</li>
                    <li>Korte Vlierstraat 6m</li>
                    <li>Antwerp, Antwerp 2000</li>
                    <li><i class="fa fa-phone"></i>&nbsp;&nbsp;<a href="mailto:dpo@nebula.com"><span>dpo@nebula.com</span></a></li>
                    <li><i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="tel:9493333160"><span>949.333.3160</span></a></li>
                  </ul>
                </div>
              </div>
              <div>
                
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">Follow</h5>
                    <ul class="icon-list icon-list-footer">
                    <li><i class="fa fa-spotify"></i>&nbsp;&nbsp;<a href="#"><span>Spotify</span></a></li>
                    <li><i class="fa fa-x-twitter"></i>&nbsp;&nbsp;<a href="#"><span>X</span></a></li>
                    <li><i class="fa fa-instagram"></i>&nbsp;&nbsp;<a href="#"><span>Instagram</span></a></li>
                    <li><i class="fa fa-tiktok"></i>&nbsp;&nbsp;<a href="#"><span>TikTok</span></a></li>
                    <li><i class="fa fa-youtube"></i>&nbsp;&nbsp;<a href="#"><span>Youtube</span></a></li>
                  </ul>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="divider-d">
<footer class="footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright font-alt">&copy; 2024&nbsp;<a href="<?php echo home_url(); ?>">Nebula</a>, All Rights Reserved</p>
              </div>
              <div class="col-sm-6">
                <div class="footer-social-links"><a href="<?php echo get_page_link(get_page_object("LICENSE")->ID); ?>">License</a>&nbsp;•&nbsp;<a href="<?php echo get_privacy_policy_url() ?>">Privacy Policy</a>&nbsp;•&nbsp;<a href="<?php echo get_page_link(get_page_object("TERMS")->ID); ?>">Terms & Conditions</a>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-arrow-up"></i></a></div>
    </main>
    <!--  
    JavaScripts
    =============================================
    -->
  <!--  <script src="assets/lib/jquery/dist/jquery.js"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/lib/wow/dist/wow.js"></script>
    <script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/lib/smoothscroll.js"></script>
    <script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK2Axt8xiFYMBMDwwG1XzBQvEbYpzCvFU"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script> -->
    <?php 
        wp_footer(); //"Percha" donde enganchar los hooks en el footer
    ?>
    
  </body>
</html>
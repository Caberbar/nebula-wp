<?php
    // Template Name: Private
    
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
        <section class="module bg-dark-30" data-background="<?php echo bloginfo('template_directory') ?>/assets/images/login/login.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt mb-0">Login-Register</h1>
              </div>
            </div>
          </div>
        </section>
        
        
        
        <section class="module bg-colore">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 mb-sm-40 login-fronted">
                   <?php 
                        
                        if(!is_user_logged_in()){
                            
                            
                        
                    ?>
                <h4 class="font-alt h4-login">Login</h4>
                <hr class="divider-w mb-10">
              
                  <?php 
                  
                    $args = array(
                    'form_id' => 'formulario_inicio',
                    'label_username' => 'Username',
                    'label_password' => 'Password',
                    'label_log_in'   => 'LOGIN',
                    
                    );
                  
                    wp_login_form($args);
                  
                  ?>
              
                <!--<form class="form">-->
                    
                <!--  <div class="form-group">-->
                <!--    <input class="form-control" id="username" type="text" name="username" placeholder="Username"/>-->
                <!--  </div>-->
                <!--  <div class="form-group">-->
                <!--    <input class="form-control" id="password" type="password" name="password" placeholder="Password"/>-->
                <!--  </div>-->
                <!--  <div class="form-group">-->
                <!--    <button class="btn btn-round btn-b">Login</button>-->
                <!--  </div>-->
                <!--  <div class="form-group"><a href="">Forgot Password?</a></div>-->
                <!--</form>-->
                
                <?php 
        
                    }else{
                         //User is logged in, show the admin-area and logout buttons
                         $user = wp_get_current_user(); //Retrieve an object user
                         $user_name = $user -> display_name;
                         $role = get_author_role($user -> ID);
                         $avatar = get_avatar($user -> ID, 32);
                         
                         echo '<h4 class="font-alt">Hello <span>'.$user_name.'</span>!</h4>';
                         echo '<h6 class="avatar-role">'.$avatar.$role.'</h6>';
                         echo '<hr class="divider-w mb-10">';
                         echo '<div class="mensaje-mmm">';
                         do_shortcode('[mmm_show_message id="'.$user->ID.'"]');
                         echo '</div>';
                         echo '<div class="enlaces-fronted">';
                         
                         //Display admin-area button
                         wp_register('','');
                         
                         
                         //Display logout button
                         wp_loginout(get_the_permalink());
                         
                         echo '</div>';
                    }
                    
                    
                    
                ?>
              </div>
            </div>
          </div>
        </section>
        
                <?php
    get_footer();
?>
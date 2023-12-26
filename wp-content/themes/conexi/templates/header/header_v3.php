<?php
$options = conexi_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
$image_logo = $options->get( 'image_normal_logo' );

$logo_dimension = $options->get( 'normal_logo_dimension' );
$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>
<header class="site-header header-one">
      <?php if( $options->get( 'top_header_show_v1' ) ):?>      
	<div class="top-bar">
                <div class="container">
                    <div class="left-block">
                        <a href="#"><i class="fa fa-user-circle"></i> <?php echo wp_kses( $options->get( 'email_title_v1'), $allowed_html ); ?></a>
                        <a href="#"><i class="fa fa-envelope"></i> <?php echo wp_kses( $options->get( 'email_v1'), $allowed_html ); ?></a>
                    </div><!-- /.left-block -->
                    <div class="logo-block">
                       <?php echo conexi_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?>
                    </div><!-- /.logo-block -->

<?php if( $options->get( 'header_social_show_v1' ) ):?>                        
                <?php echo wp_kses( $options->get( 'social_profile'), $allowed_html ); ?>
<?php endif; ?>						

					
					
                </div><!-- /.container -->
            </div><!-- /.top-bar -->
<?php endif; ?>		
            <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
                <div class="container clearfix">
                   
					<!-- Brand and toggle get grouped for better mobile display -->
                    <div class="logo-box clearfix">
                        <button class="menu-toggler" data-target="#main-nav-bar">
                            <span class="fa fa-bars"></span>
                        </button>
                    </div><!-- /.logo-box -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    
					<div class="main-navigation" id="main-nav-bar">
                        <ul class="navigation-box">
                           <?php wp_nav_menu( array( 'theme_location' => 'onepage_menu', 'container_id' => 'navbar-collapse-1',
							'container_class'=>'main-navigation',
							'menu_class'=>'navigation-box',
							'fallback_cb'=>false, 
							'items_wrap' => '%3$s', 
							'container'=>false,
							'depth'=>'3',
							'walker'=> new Bootstrap_walker()  
							) ); ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
					
                    <div class="right-side-box">
                        <a href="#" class="contact-btn-block">
                            <span class="icon-block">
                                <i class="conexi-icon-phone-call"></i>
                            </span>
                            <span class="text-block">
                                <?php echo wp_kses( $options->get( 'phone_v1'), $allowed_html ); ?>
                                <span class="tag-line"><?php echo wp_kses( $options->get( 'phone_title_v1'), $allowed_html ); ?></span>
                            </span>
                        </a>
                    </div><!-- /.right-side-box -->
					
                </div>
                <!-- /.container -->
            </nav>
 </header><!-- /.site-header header-one -->
	
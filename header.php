<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="<?php bloginfo('charset');  ?>">
	<meta name="description" content="<?php bloginfo('description');  ?>">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" > 

   <?php wp_enqueue_script('jquery'); ?>
    
    <?php wp_head(); ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>

<body>
   
   
   
   
   
   <!-- Header
   ================================================== -->
   <header>

      <div class="row">

         <div class="twelve columns">

            <div class="logo">
                    <a href="<?php bloginfo( 'url' ); ?>">
                    <?php if( has_custom_logo() ): the_custom_logo(); ?>
                     <?php else: ?>
                     <a  href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                     <?php endif; ?>

            </div>
            <nav id="nav-wrap">




               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	            <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

               <?php wp_nav_menu( [
                        'theme_location'  => 'top',
                        'container'       =>  null,
                        'menu_class'      => 'nav',
                        'menu_id'         => 'nav',
                     ] ); ?>

            </nav> <!-- end #nav-wrap -->

         </div>

      </div>

    </header> <!-- Header End -->
</body>

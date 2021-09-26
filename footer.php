<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
   </head>
      <body>
             
          <!-- footer
            ================================================== -->
            <footer>

               <div class="row">

                  <div class="twelve columns">



                     <ul class="footer-nav">
                     <?php wp_nav_menu( [
                                 'theme_location'  => 'footer',
                                 'container'       => null,
                                 'menu_class'      => 'footer-menu'
                              ] ); 
                           ?>
                     </ul>

                     <ul class="copyright">
                        <li>Copyright &copy; 2014 Sparrow</li> 
                        <li>Design by <a href="http://www.styleshout.com/">Styleshout</a></li>               
                     </ul>

                  </div>

                  <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>

               </div>

            </footer> <!-- Footer End-->


               <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

   <script src="js/jquery.flexslider.js"></script>
   <script src="js/doubletaptogo.js"></script>
   <script src="js/init.js"></script>


            <?php wp_footer();?>
      </body>
</html>

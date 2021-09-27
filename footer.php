          
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

            <?php wp_footer();?>



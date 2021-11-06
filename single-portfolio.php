
   <?php get_header();  ?>

   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row portfolio">

         <section class="entry cf">

            <div id="secondary"  class="four columns entry-details">

                  <h1><?php the_title(); //заголовок портфолио?></h1>

                  <ul class="portfolio-meta-list">
						   <li><span>Date: </span><?php the_field('project-date'); // подключение кастомных полей ?></li>
						   <li><span>Client </span><?php the_field('client'); // подключение кастомных полей ?></li>
						   <li><span>Skills: </span><?php the_terms( get_the_ID(), 'skills', '' , ' / '); // подключение кастомной таксономии ?></li>
				      </ul>

            </div> <!-- secondary End-->

            <div id="primary" class="eight columns">

               <div class="entry-media">

                  <img src="<?php the_field('project-photo'); // подключение кастомных полей ?>" alt="">

                  <img src="images/portfolio/entries/geometric-backgrounds-02.jpg" alt="" />

               </div>

               <div class="entry-excerpt">
                  
               <?php  the_content(); // подключи содержание портфолио ?>

			   </div>

            </div> <!-- primary end-->

         </section> <!-- end section -->

         <ul class="post-nav cf">
               <li class="prev">
                  <?php previous_post_link( $format = '%link', $link = '<strong>PREVIOUS PORTFOLIO</strong> %title');?>
               <li class="next">
                  <?php next_post_link( $format = '%link', $link = '<strong>NEXT PORTFOLIO</strong> %title');?>
               </li>
         </ul>
         


      </div>

   </div> <!-- content End-->

   </section> <!-- Tweet Section End-->

   
 <?php  get_footer(); ?>


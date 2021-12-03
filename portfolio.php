<?php
/*
Template Name: Портфолио
*/
?>
   <?php get_header(); ?>
   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">

            <h1>Olllllll </h1>


         </div>

      </div>

   </div>

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row portfolio">

         <section class="entry cf">

            <div id="secondary"  class="four columns entry-details">

               <h1>Our Portfolio.</h1>

               <p class="lead">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh.</p>

               <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
               cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
               ornare odio.</p>

            </div> <!-- Secondary End-->

            <div id="primary" class="eight columns portfolio-list">
            <div id="portfolio-wrapper" class="bgrid-halves cf">


                        <?php // Получает записи (посты, страницы, вложения) из базы данных по указанным критериям. 
                           //Можно выбрать любые посты и отсортировать их как угодно.
                           $posts = get_posts( array(
                                 'numberposts' => 3,
                                 'post_type'   => 'portfolio',
                                 'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                           ) );

                           foreach( $posts as $post ){
                                 setup_postdata($post);
                                 // формат вывода the_title() ...
                           ?>
                                 <div class="columns portfolio-item">
                                    <div class="item-wrap">
                                       <a href="<?php the_permalink()//ссылка при клике?>">
                                       <?php the_post_thumbnail(); //картинка ?>
                                       <div class="overlay"></div>
                                       <div class="link-icon"><i class="fa fa-link"></i></div>
                                       </a>
                                    <div class="portfolio-item-meta">
                                       <h5><a href="<?php the_permalink()//ссылка при клике?>"></a><?php  the_title(); //название ?></h5>
                                       <p><?php the_excerpt();  ?></p>
                                    </div>
                                 </div>
                                 </div>

                           <?php

                           }

                           wp_reset_postdata(); // сброс
                        ?>


               </div>

            </div> <!-- primary end-->

         </section> <!-- end section -->

      </div> <!-- #page-content end-->

   </div> <!-- content End-->

   <!-- Tweets Section
   ================================================== -->
   <section id="tweets">

      <div class="row">

         <div class="tweeter-icon align-center">
            <i class="fa fa-twitter"></i>
         </div>

         <ul id="twitter" class="align-center">
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">2 Days Ago</a></b>
            </li>
            <!--
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">3 Days Ago</a></b>
            </li>
            -->
         </ul>

         <p class="align-center"><a href="#" class="button">Follow us</a></p>

      </div>

   </section> <!-- Tweet Section End-->

   <!-- footer
   ================================================== -->
 <?php get_footer(); ?>

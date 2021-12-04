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

            <h1><?php  the_field('title') ?></h1>


         </div>

      </div>

   </div>

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row portfolio">

         <section class="entry cf">

            <div id="secondary"  class="four columns entry-details">

               <h1><?php  the_field('title_page') ?></h1>

               <p class="lead"><?php  the_field('text_page') ?></p>

               

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
                                       <a href="<?php the_permalink()//ссылка при клике?>"   target="_blank" >
                                       <?php the_post_thumbnail(); //картинка ?>
                                       <div class="overlay"></div>
                                       <div class="link-icon"><i class="fa fa-link"></i></div>
                                       </a>
                                    <div class="portfolio-item-meta">
                                       <h5><a href="<?php the_permalink()//ссылка при клике?>"  target="_blank"></a><?php  the_title(); //название ?></h5>
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


   <!-- footer
   ================================================== -->
 <?php get_footer(); ?>

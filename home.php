<?php
/*
Template Name: Home
*/ ?>


<?php get_header(); ?>

<div id="page-title">

   <div class="row">

      <div class="ten columns centered text-center">
         <h1><?php the_field('name_page');?></h1>
      </div>

      <div class="eight columns offset-1">
         <h5><?php the_field('text_sale_block');?><br>

            <?php 
               $max_sale = get_field('max_sale');  
               function my_sale($max_sale){
                  $sale = rand(0, $max_sale);
                  return $sale;
               }

               $f_sale = my_sale($max_sale);
               echo $f_sale . "%";
            ?>   

            <a href="" class="button" ><?php the_field('button_name');?></a>
         </h5>

      </div>


   </div>

</div>


   <!-- Info Section
   ================================================== -->

   <section id="info">
        <div style="text-align: center;"><h2><?php the_field('advice');?></h2></div><br><br>


        <div class="row">                     


            <div class="bgrid-quarters s-bgrid-halves">            
              
                
                <div class="columns">
                    <a href=""><img src="<?php the_field('photo1');?>" alt=""></a>

                    <p><?php the_field('text1');?></p>
                </div>

                <div class="columns">
                    <a href=""><img src="<?php the_field('photo2');?>" alt=""></a>

                    <p><?php the_field('text2');?></p>
                </div>

                <div class="columns">
                    <a href=""><img src="<?php the_field('photo3');?>" alt=""></a>

                    <p><?php the_field('text3');?></p>
                </div>

                <div class="columns">
                    <a href=""><img src="<?php the_field('photo4');?>" alt=""></a>

                    <p><?php the_field('text4');?></p>
                </div>
            </div>

        </div>

   </section> <!-- Info Section End-->

   <!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">

         <div class="twelve columns align-center">
            <div style="text-align: center;"><h2><?php the_field('title_section');?></h2></div>
         </div>
         <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-halves">

    		   
            <div class="columns portfolio-item">
               <div class="item-wrap">
                  <div class="portfolio-item-meta">
    					   <h5><a href="<?php the_field('tire_fitting');?>"  target="_blank"><?php the_field('name_1');?></a></h5>
    					</div>
               </div>
    			</div>

            <div class="columns portfolio-item">
               <div class="item-wrap">
                  <div class="portfolio-item-meta">
    					   <h5><a href="<?php the_field('car_wash');?>"  target="_blank"><?php the_field('name_2');?></a></h5>
    					</div>
               </div>
    			</div>

             <div class="columns portfolio-item">
               <div class="item-wrap">
                  <div class="portfolio-item-meta">
    					   <h5><a href="<?php the_field('car_mall');?>"  target="_blank"><?php the_field('name_3');?></a></h5>
    					</div>
               </div>
    			</div>

             <div class="columns portfolio-item">
               <div class="item-wrap">
                  <div class="portfolio-item-meta">
    					   <h5><a href="<?php the_field('fuel');?>"  target="_blank"><?php the_field('name_4');?></a></h5>
    					</div>
               </div>
    			</div>

         </div>

      </div>

   </section> <!-- Works Section End-->

   <!-- Journal Section
   ================================================== -->
   <section id="journal">

      <div class="row">
         <div class="twelve columns align-center">
             <div style="text-align: center;"><h2><?php the_field('news_name_block');?></h2></div><br><br>          
         </div>
      </div>

      <div class="blog-entries">
         <?php  
               // Получает записи (посты, страницы, вложения) из базы данных по указанным критериям
               $posts = get_posts( array(
                  'numberposts' => 3,
                  'post_type'   => 'post',
                  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
               ) );

               foreach( $posts as $post ){
                  setup_postdata($post);
                  // формат вывода the_title() ... ?>

                          <!-- Entry -->
         <article class="row entry">

         
            <div class="entry-header">

                  <div class="permalink">
                     <a href="<?php the_permalink() ?>"><i class="fa fa-link"></i></a>
                  </div>

                  <div class="ten columns entry-title pull-right">
                     <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  </div>

                  <div class="two columns post-meta end">
                     <p>
                     <time datetime="2014-01-31" class="post-date" pubdate=""><?php the_time('F, jS, Y') ?></time>
                     <span class="dauthor">By <?php the_author(); ?></span>
                     </p>
                  </div>

            </div>

               <div class="ten columns offset-2 post-content">
                  <?php the_excerpt(); ?>
               </div>

         </article> <!-- Entry End -->


            <?php }

               wp_reset_postdata(); // сброс
         ?>


      </div> <!-- Entries End -->

   </section> <!-- Journal Section End-->

<?php get_footer(); ?>



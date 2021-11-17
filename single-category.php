<?php
/*
Template Name: Category

*/

?>

<?php get_header(); ?>


<!-- Page Title
================================================== -->
<div id="page-title">

    <div class="row">

        <div class="ten columns centered text-center">
           <h1><?php the_field('name_page_category');  ?></h1><br>
           <?php the_field('title_page_category');  ?>
        </div>

    </div>

</div> <!-- Page Title End-->





<!-- Content
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
               <a href="<?php the_permalink() ?> " target="_blank"><i class="fa fa-link"></i></a>
            </div>

            <div class="ten columns entry-title pull-right">
               <h3><a href="<?php the_permalink(); ?>"  target="_blank"><?php the_title(); ?></a></h3>
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


<!-- footer
================================================== -->
<?php get_footer(); ?>



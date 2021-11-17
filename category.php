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
       <h1><?php
            $categories = get_the_category();
            if($categories){
                foreach($categories as $category) {
                $out .= '<a href="'.get_category_link($category->term_id ).'">' . $category->name . '</a>, ';
            }
            echo trim($out, ', ');
                }
        ?></h1>
        </div>

    </div>

</div> <!-- Page Title End-->

<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">

        <?php if (have_posts()) {
            while (have_posts()) {
            the_post(); ?>

        <article class="post">

            <div class="entry-header cf">

                <h1><a href="<?php the_permalink();?>" title=""><?php the_title();?></a></h1>

                <p class="post-meta">

                    <time class="date" datetime="2014-01-14T11:24"><?php the_time('F, jS, Y') ?></time>
                    /
                    <span class="categories">
                        <?php the_tags( ' ', ' / ');  ?>
                    </span>

                </p>

            </div>

            <div class="post-thumb">
                <a href="<?php the_permalink();//картинка становиться ссылкой при нажатии на нее?>" title=""><?php the_post_thumbnail('post_thumb') ?></a>
            </div>

            <div class="post-content">

               <?php the_excerpt(); //Выводит "отрывок" (цитату) поста или первые 55 слов контента, со вставкой в конец [...]?>

            </div>

        </article> <!-- post end -->

        <?php  } //end while ?>

        <?php  the_posts_pagination(); //Выводит на экран ссылки пагинации ?>

        <?php  } //end if ?>


        </div> <!-- Primary End-->

        <div id="secondary" class="four columns end"> 

        <?php get_sidebar(); //sidebar?>



        </div> <!-- Secondary End-->

    </div>

</div> <!-- Content End-->

<!-- footer
================================================== -->
<?php get_footer(); ?>



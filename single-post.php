<?php get_header(); ?>

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

        </div>


<?php // echo get_post_format() //показывает формат поста?>

<?php if ( have_posts()) : while ( have_posts()) : the_post(); //Устанавливает индексы поста в Цикле WP?>

<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">

          <?php  get_template_part('post-templates/post', get_post_format()); //Ищет и подключает указанный файл темы?>

          <?php comments_template(); ?>

        </div> <!-- Primary End-->

        <div id="secondary" class="four columns end"> 

           <?php get_sidebar(); //sidebar?>



        </div> <!-- Secondary End-->

    </div>

</div> <!-- Content End-->

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
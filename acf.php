<?php
/*
Template Name: ACF
*/
?>
<?php get_header(); ?>



<div class="content-outer">

    <div id="page-content" class="row portfolio">

        <section class="entry cf">

            <div id="secondary"  class="four columns entry-details">

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




            <div class="entry-excerpt">
            
                <?php
                    if (have_posts()):
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    endif;
                ?>

                <?php the_field('text');  ?>
                <?php the_field('tex_area');  ?>
                <?php the_field('int');  ?>
                <?php the_field('range');  ?>
                <?php the_field('e_mail');  ?>
                <?php the_field('link');  ?>
                <?php the_field('password');  ?>
                <?php the_field('image');  ?>
                <?php the_field('file');  ?>
                <?php the_field('editor_wp');  ?>
                <?php the_field('media');  ?>
                <?php the_field('select');  ?>
                <?php the_field('checkbox');  ?>
                <?php the_field('radio');  ?>
                <?php the_field('button_group');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>
                <?php the_field('');  ?>

            </div>


        </section> 
    </div>
</div>

<?php  get_footer(); ?>



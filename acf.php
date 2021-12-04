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
                <h1>
                   текст - <?php the_field('text');  ?><br>

                   область текста -  <?php the_field('text_area');  ?><br>

                   число -  <?php the_field('int');  ?>$<br>

                   диапазон -  <?php the_field('range');  ?>$<br>

                   почта -  <a href="<?php the_field('email');?>"  target="_blank">email</a><br>

                   ссылка -  <a href="<?php the_field('link');?>"  target="_blank">github</a><br>

                   пароль -  <?php  $pas = get_field('password');
                                if ($pas != null) {
                                    echo "hello";
                                } ?><br><br>

                   изображение - <img src="<?php the_field('image');?>" alt="загрузите фото"><br><br>

                   файл -  <a href="<?php the_field('file');?>"  target="_blank">book</a><br>

                   редактор вп -  <?php the_field('editor_wp');  ?><br>

                   медиа -  <?php the_field('media');?><br>

                   выбор -  <?php the_field('select');?>$<br>

                   флажок -  <?php the_field('checkbox');?>$<br>

                   переключатель -  <?php the_field('radio');  ?>$<br>

                   группа кнопок - <?php the_field('button_group');  ?>$<br>

                   да/нет - <?php  $pas = get_field('yes_no');
                                if ($pas != null) {
                                    echo "of course YES";
                                }
                                else {
                                echo "NO";
                                }
                                ?><br><br>



                    объект записи -
                            <?php
                            $post_object = get_field('recording_object');
                            if( $post_object ): 
                                $post = $post_object;
                                setup_postdata( $post );
                                ?>
                                <div>
                                    <h3><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h3>
                                    <span><?php the_field('recording_object'); ?></span>
                                </div>
                                <?php wp_reset_postdata();  ?>
                            <?php endif; ?><br>

                    ссылка на страницу -  <a href="<?php the_field('link_to_the_page');?>"  target="_blank">page</a><br><br>   

                    записи - 

                            <?php

                                $post_objects = get_field('records');

                                if( $post_objects ): ?>
                                    <ul>
                                    <?php foreach( $post_objects as $post):?>
                                        <?php setup_postdata($post); ?>
                                        <li>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <span><?php the_field('records'); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                    </ul>
                                    <?php wp_reset_postdata();?>
                                <?php endif;

                            ?>

                    таксономия - <?php
                                    $terms = get_field('taxonomy');
                                    if( $terms ): ?>
                                        <ul>
                                        <?php foreach( $terms as $term ): ?>
                                            <li>
                                                <h2><?php echo esc_html( $term->name ); ?></h2>
                                                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"   target="_blank"> Выбранная <?php echo esc_html( $term->name ); ?>таксономия</a><br><br>
                                            </li>
                                        <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>  

                    пользователь -  <?php
                                        $user = get_field("user");
                                        if( $user ){
                                        echo $user['display_name'];
                                        } 
                                        else {
                                        echo "no user selected";
                                        }
                                     ?><br><br>

                       
 
 
            </div>


        </section> 
    </div>
</div>

<?php  get_footer(); ?>



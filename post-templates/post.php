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

              <?php the_post_thumbnail(); //выводим картинку поста?>

            </div>

            <div class="post-content">

              
              <?php the_content(); //Выводит контент текущего поста (записи).?>

            </div>

        </article> <!-- post end -->

<?php /*Template Name: TOP*/get_header();?>

        <div class="content">
            <div class="wrap-new-house">
                <div class="">
                    <h1><span class="title-en">Remodeling</span><br><span class="title-jp">リフォーム</span></h1>
                </div>
                <div class="photo-container">
                    <?php
                    $args = array(
                        'post_type' => 'work', // ← スラッグ修正済
                        'posts_per_page' => 6,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    $work_query = new WP_Query($args);
                    if ($work_query->have_posts()) :
                        while ($work_query->have_posts()) : $work_query->the_post();
                            $image = get_field('works_photo1'); // ACFの画像フィールド
                            if ($image): ?>
                                <div class="photo-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                        <p><?php the_title(); ?></p>
                                    </a>
                                </div>
                            <?php endif;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
              

            </div>
        </div>




        

<?php get_footer(); ?>
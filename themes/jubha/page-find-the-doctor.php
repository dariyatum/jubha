<?php
get_header();
?>
<link rel="stylesheet" href="wp-content/themes/jubha/stylesheet/find-the-doctor.css">
<section class="doctor-section">
    <h2>Find a Doctor</h2>

    <div class="doctor-grid">

        <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;

$doctors = new WP_Query([
    'post_type' => 'doctor',
    'posts_per_page' => 6,   // 6 doctors per page
    'page' => $page
]);


        if($doctors->have_posts()):
            while($doctors->have_posts()): $doctors->the_post();

                $specialty   = get_post_meta(get_the_ID(),'_specialty',true);
                $experience  = get_post_meta(get_the_ID(),'_experience',true);
                $description = get_post_meta(get_the_ID(),'_description',true);
        ?>

        <div class="doctor-card">
            <!-- Make the whole card clickable -->
            <a href="<?php the_permalink(); ?>">
                <div class="doctor-img">
                    <?php the_post_thumbnail('medium'); ?>
                </div>

                <h3><?php the_title(); ?></h3>
                <p class="spec"><?php echo esc_html($specialty); ?></p>
                <p class="exp"><?php echo esc_html($experience); ?> Years Experience</p>
                <p class="desc"><?php echo esc_html($description); ?></p>
            </a>
        </div>

        <?php 
            endwhile; 
            wp_reset_postdata(); 
        endif; 
        ?>
    </div>
    <div class="doctor-pagination">
    <?php
    echo paginate_links([
        'total' => $doctors->max_num_pages,
        'current' => $paged,
        'prev_text' => '←',
        'next_text' => '→'
    ]);
    ?>
</div>
</section>


<?php get_footer(); ?>



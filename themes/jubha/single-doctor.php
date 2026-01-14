<?php get_header(); ?>
<div class="space"></div>
<!-- Back Header -->
<header class="back-header">
  <button class="back-button" onclick="history.back()">← Back</button>
  <h1 class="back-title">Doctor Information</h1>
</header>

<section class="single-doctor">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();

            // Custom fields
            $specialty   = get_post_meta(get_the_ID(), '_specialty', true);
            $experience  = get_post_meta(get_the_ID(), '_experience', true);
            $description = get_post_meta(get_the_ID(), '_description', true);
    ?>

    <div class="doctor-detail">
        <div class="doctor-img">
            <?php the_post_thumbnail('medium'); ?>
        </div>

        <h1><?php the_title(); ?></h1>
        <p class="spec"><strong>Specialty:</strong> <?php echo esc_html($specialty); ?></p>
        <p class="exp"><strong>Experience:</strong> <?php echo esc_html($experience); ?> Years</p>
        <p class="desc"><?php echo esc_html($description); ?></p>
    </div>

    <?php
        endwhile;
    else:
        echo '<p>No doctor found.</p>';
    endif;
    ?>
</section>

<?php get_footer(); ?>


<style>
.back-header {
  display: flex;
  align-items: center;
  padding: 10px 20px;
  background-color: #f5f5f5; /* light gray background */
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.back-button {
  background-color: transparent;
  border: none;
  font-size: 16px;
  cursor: pointer;
  margin-right: 15px;
  color: #333;
}

.back-button:hover {
  color: #007BFF; /* change color on hover */
}

.back-header h1 {
  margin: 0;
  font-size: 18px;
  font-weight: 500;
}
</style>

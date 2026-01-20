<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="sticky">
<header class="navbar">
  <div class="nav-container">

    <!-- Logo -->
    <img class="logo" src="https://i.ibb.co/bRYNL2sn/Chat-GPT-Image-Jan-9-2026-07-44-02-AM-1.png" alt="">

    <!-- Mobile menu toggle -->
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-icon">
      <span></span>
      <span></span>
      <span></span>
    </label>

    <!-- Menu -->
   <?php wp_nav_menu(['theme_location' => 'primary']); ?>
<div class="register">
  <a href="<?php echo site_url('/signup'); ?>">
    <i class="fa-solid fa-user"></i>
  </a>
</div>
<div class="nav-actions">
  <a href="<?php echo site_url('/book-an-appointment'); ?>" class="calendar-btn">
    <i class="fa-solid fa-calendar"></i>
  </a>
</div>

</header>


</div>


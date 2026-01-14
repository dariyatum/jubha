<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  </div>
</header>

<nav class="bottom-nav">
   <a href=""></a> 
</nav>
</div>



<link rel="stylesheet" href="wp-content/themes/jubha/stylesheet/header.css">
<html <?php language_attributes(); ?>>
<head>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="sticky">
<header class="navbar">
  
  <div class="nav-container">

    <!-- Logo -->

    <img class="logo" src="https://i.ibb.co/bRYNL2sn/Chat-GPT-Image-Jan-9-2026-07-44-02-AM-1.png" alt="">


    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-icon">
      <span></span>
      <span></span>
      <span></span>
    </label>


   <?php wp_nav_menu (['theme_location'=>'primary']);?>

  </div>
</header>
<nav class="bottom-nav">
   <a href=""></a> 
</nav>
</div>

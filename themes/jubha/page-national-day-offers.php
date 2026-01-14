<?php

get_header();
?>

<style>
/* General Page */
:root{
    --one:#FED7BF;
    --two:#e4afb0;
    --three:#9a7787;
}
.national-day-page {
  margin: 0;
  padding: 0;
 background: linear-gradient(135deg, var(--two), #fff);
}

/* Hero Section */
.national-day-hero {
 background: linear-gradient(135deg, var(--three), var(--two));
  color: #fff;
  text-align: center;
  padding: 100px 20px;
  position: relative;
}

.national-day-hero::after {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
 background: linear-gradient(135deg, var(--three), var(--two));
}

.national-day-hero h1 {
  font-size: 40px;
  position: relative;
  z-index: 1;
  margin-bottom: 15px;
}

.national-day-hero p {
  font-size: 20px;
  position: relative;
  z-index: 1;
  margin-bottom: 30px;
}

.national-day-hero .cta-button {
  display: inline-block;
  padding: 15px 30px;
  background-color: var(--two);
  color: #fff;
  font-weight: bold;
  border-radius: 30px;
  text-decoration: none;
  position: relative;
  z-index: 1;
  transition: 0.3s;
}

.national-day-hero .cta-button:hover {
  background-color: #fff;
  color:var(--two);
}

/* Offer Section */
.offer-details {
  max-width: 1000px;
  margin: 50px auto;
  padding: 0 20px;
  text-align: center;
}

.offer-details h2 {
  font-size: 32px;
  color: var(--three);
  margin-bottom: 30px;
}

.offer-cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.offer-card {
  background-color: #f8f9fa;
  border-radius: 10px;
  padding: 25px;
  width: 250px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  transition: transform 0.3s;
}

.offer-card:hover {
  transform: translateY(-5px);
}

.offer-card img {
  width: 60px;
  margin-bottom: 15px;
}

.offer-card h3 {
  font-size: 20px;
  margin-bottom: 10px;
  color: var(--three);
}

.offer-card p {
  font-size: 14px;
  color: #333;
}

.offer-note {
  margin-top: 30px;
  font-style: italic;
  color: #555;
}
</style>

<div class="national-day-page">

  <!-- Hero Section -->
  <section class="national-day-hero">
    <h1>🎉 Jubha Hospital National Day Offer!</h1>
    <p>Celebrate National Day with special health check-up packages and discounts!</p>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cta-button">Book Your Check-Up</a>
  </section>

  <!-- Offer Details Section -->
  <section class="offer-details">
    <h2>Our Special Offers</h2>
    <div class="offer-cards">
      <div class="offer-card">
        <img src="https://i.pinimg.com/1200x/4e/81/10/4e8110f1f7cc643c89e3ba5a73895018.jpg" alt="Check-up">
        <h3>Full-Body Check-Up</h3>
        <p>Get a 20% discount on comprehensive health check-ups for National Day.</p>
      </div>

      <div class="offer-card">
        <img src="https://i.pinimg.com/1200x/29/03/59/290359b24582c71c052a4653492b5f44.jpg" alt="Consultation">
        <h3>Free Consultation</h3>
        <p>First-time patients enjoy a free consultation with our expert doctors.</p>
      </div>

      <div class="offer-card">
        <img src="https://i.pinimg.com/1200x/66/5b/53/665b53c70b3c0655b8d503598bcb42b7.jpg" alt="Family">
        <h3>Family Packages</h3>
        <p>Special rates for family health screening packages during National Day.</p>
      </div>
    </div>
    <p class="offer-note">*Valid from January 23–25. Terms and conditions apply.</p>
  </section>

</div>

<?php
get_footer();
?>

<?php get_header();?>

 <section class="national-day-hero">
    <h1>Ceo Message</h1>
    <p>Jubha Hospital</p>
    <a href="<?php echo esc_url(home_url('/book-an-appointment')); ?>" class="cta-button">Book Your Check-Up</a>
  </section>

<section class="legacy-section">
  <div class="legacy-content">

    <div class="legacy-text">
      <span class="vertical-line"></span>

      <h2>
        Our Legacy is a Responsibility.. Our Future<br>
        is a <span>National Health Partnership</span>
      </h2>

      <p>
        We are confident that the rich legacy of Almana Medical Group represents
        both a great responsibility and a unique opportunity to create a lasting
        impact on the health of our society and the national economy. With God’s
        help, we will continue to move forward as the ideal healthcare partner in
        the Kingdom’s transformation journey — contributing to the realization of Vision...
      </p>
    </div>

    <div class="legacy-image">
      <img src="https://i.pinimg.com/736x/47/a4/44/47a4448f2df0046ee1f7bed28f87e551.jpg" alt="Chairman" />
    </div>

  </div>
</section>
<?php get_footer();?>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
:root{
    --one:#FED7BF;
    --two:#e4afb0;
    --three:#9a7787;
}
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

.legacy-section {
  background-color: var(--three);
  padding: 60px 80px;
}

.legacy-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1200px;
  margin: auto;
  gap: 50px;
}

.legacy-text {
  position: relative;
  max-width: 55%;
  color: #ffffff;
  padding-left: 30px;
}

.vertical-line {
  position: absolute;
  left: 0;
  top: 0;
  width: 3px;
  height: 100%;
  background-color: var(--two);
}

.legacy-text h2 {
  font-size: 34px;
  line-height: 1.3;
  font-weight: 600;
  color: var(--two);
  margin-bottom: 20px;
}

.legacy-text h2 span {
  color: (--one);
}

.legacy-text p {
  font-size: 16px;
  line-height: 1.8;
  color: #e6f3f3;
}

.legacy-image img {
  max-width: 360px;
  width: 100%;
  border-radius: 4px;
}

/* ✅ Responsive */
@media (max-width: 768px) {
  .legacy-content {
    flex-direction: column;
    text-align: left;
  }

  .legacy-text {
    max-width: 100%;
  }

  .legacy-image img {
    max-width: 280px;
  }
}
</style>
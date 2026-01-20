
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheet/news.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

<?php get_header();?>
 <section class="national-day-hero">
    <h1>News</h1>
    <p>Jubha Hospital</p>
    <a href="<?php echo esc_url(home_url('/book-an-appointment')); ?>" class="cta-button">Book Your Check-Up</a>
  </section>
<section>

<section>
    <div class="box__selech__year">
        <div class="selech__year">
            <form action="">
                <input type="seach" placeholder="type the keyword">
                <select name="year" id="">
                    <option value="2026">2026 Info</option>
                    <option value="2025">2025 Info</option>
                    <option value="2024">2024 Info</option>
                    <option value="2023">2023 Info</option>
                    <option value="2022">2022 Info</option>
                    <option value="2021">2021 Info</option>
                    <option value="2020">2020 Info</option>
                    <option value="2019">2019 Info</option>
                    <option value="2018">2018 Info</option>
                    <option value="2017">2017 Info</option>
                </select>
                <button onclick="">Search</button>  
            </form>
        </div>
    </div>
    <br>
    <!-- Photo and info in news -->
     <div class="Photo_and_info_in_news">
        <img src="http://jubha.test/wp-content/uploads/2026/01/bone.jpeg" alt="">
        <div>
            <h2>
                Successful Scoliosis Surgery for 14-Year-Old Girl
            </h2>
            <p>
                In a medical achievement we take great pride in, our surgical team at Almana Hospital in Dammam, led by spinal
                <br> surgery consultant Dr. Ahmed Hamed Amin,successfull yperformed a complex scoliosis correction surgery for
                <br> a 14-year-old girl suffering from an advanced spinal curvature exceeding 54 degrees.
            </p>
            <a href="">
                Read more
            </a>
        </div>
     </div>
</section>
<div class="titlle_news">
    <h1>Breaking News</h1>
</div>
<div class="cat__">
    <?php echo do_shortcode('[show_cats]'); ?>
</div>

<?php get_footer();?>
<style>
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
}/* Hero Section */
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
</style>
<?php get_header();?>


 <!-- Hero Section -->
  <section class="national-day-hero">
    <h1>Visitor Information</h1>
    <p>Jubha Hospital</p>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cta-button">Book Your Check-Up</a>
  </section>
  <section class="visitor_info">
    <div class="info">
  <h1>Visitor Information
</h1>
<li>From 7 am to 10 pm daily in coordination with the patient’s care team.</li>
<li>Children under the age of 14 must be accompanied by an adult.</li>
<li>All visitors must follow the hospital visitation guidelines.</li>
<li>From 7 am to 10 pm daily in coordination with the patient’s care team.</li>
<li>Children under the age of 14 must be accompanied by an adult.</li>
<li>All visitors must follow the hospital visitation guidelines.</li>

    </div>
    <div class="visitor">
  <img src="https://i.pinimg.com/1200x/35/ab/bf/35abbfd8d238eeef3e087a66a32b3a8b.jpg" alt="">
    </div>
  </section>


<?php get_footer();?>
<style>
    :root{
    --one:#FED7BF;
    --two:#e4afb0;
    --three:#9a7787;
}
.visitor_info{
  display:flex;
  justify-content:space-between;
  width: 100%;
  padding:0 80px;

}
.info{
  width: 100%;
  padding:80px 0;
}
.info h1{
  color:var(--three);
  font-size:40px;
  margin-bottom:20px;
}
.info li{
  font-size:20px;
}
.visitor img{
  width: 100%;
}
.visitor{
  width: 50%;
  padding:80px 0;

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
</style>
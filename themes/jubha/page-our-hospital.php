<?php get_header();?>
<div class="scroll"></div>


<section class="national-day-hero">
    <h1>Visitor Information</h1>
    <p>Jubha Hospital</p>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cta-button">Book Your Check-Up</a>
  </section>

<section class="facility-content">


  <div class="facility-section">
    <h2>Reception & Waiting Area Inspiration</h2>
    <div class="facility-images-grid">
      <img src="https://keiai-clinic.jp/wp/wp-content/uploads/2023/08/65.jpg" alt="Clinic Waiting Area Design">
      <img src="https://keiai-clinic.jp/wp/wp-content/uploads/2023/08/07.jpg" alt="Clinic Interior 2">
      <img src="https://keiai-clinic.jp/wp/wp-content/uploads/2023/08/04.jpg" alt="Clinic Interior 3">
    </div>
 
    </p>
  </div>

 
  <div class="facility-section">
    <h2>Examination & Treatment Area Inspiration</h2>
    <div class="facility-images-grid">
      <img src="https://keiai-clinic.jp/wp/wp-content/uploads/2023/08/27.jpg" alt="Exam Room Design">
      <img src="https://keiai-clinic.jp/wp/wp-content/uploads/2023/08/33-1.jpg" alt="Medical Treatment Room">
    </div>

  </div>


  <div class="facility-section">
    <h2>Lab & Sterile Area Inspiration</h2>
    <div class="facility-images-grid">
      <img src="https://keiai-clinic.jp/wp/wp-content/uploads/2023/08/37.jpg" alt="Clean Lab Design">
      <img src="https://keiai-clinic.jp/wp/wp-content/uploads/2023/08/47.jpg" alt="Medical Lab Interior">
    </div>
   
  </div>

</section>

<style>
  body {
    color: #333;
  }
  .facility-hero {
    background: url("https://i.pinimg.com/1200x/eb/af/fb/ebaffb9e3705d21ca429eb9b143ed442.jpg") center/cover no-repeat;
    text-align: center;
    padding: 3rem 1rem;
    color: #fff;
  }
  .facility-hero .hero-overlay h1 {
    font-size: 2.6rem;
    margin-bottom: .5rem;
  }
  .facility-content {
    max-width: 1100px;
    margin: 2.5rem auto;
    padding: 0 1rem;
  }
  .facility-section {
    margin-bottom: 2.5rem;
  }
  .facility-section h2 {
    color: var(--three);
    margin-bottom: 1rem;
    font-size: 1.8rem;
  }
  .facility-images-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 1rem;
  }
  .facility-images-grid img {
    width: 100%;
    border-radius: 8px;
    object-fit: cover;
  }
  .source-note {
    margin-top: .6rem;
    font-size: .9rem;
    color: #666;
  }    :root{
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

<?php get_footer();?>
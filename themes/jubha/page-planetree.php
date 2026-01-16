<?php get_header();?>

 <section class="national-day-hero">
    <h1>Planetree</h1>
    <p>Jubha Hospital</p>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cta-button">Book Your Check-Up</a>
  </section>

  <section class="inpatient">
    <div class="patient-left">
    <h1>Planetree</h1>
    <h3>Jubha Hospital in Phnom Penh has earned the prestigious Gold Cetification from Planetree International for their commitment to exceptional person-centered care and innovation in healthcare delivery. Juhba Hospital in Preah Vihear is the sixth hospital in Cambodia out of 98 healthcare institions worldwide that has achieved this esteemed recognition.</h3>
    <p>To earn the Gold Certification, Jubha had to meet Planetree's rigorous criteria. This criteria focused on quality in healthcare delivery, effective communication with patients and their families, compassion, transparency, inclusion, and a strong emphasis on partnership.</p>

    </div>
    <div class="patient-right">
          <img src="https://i.pinimg.com/736x/1a/d1/41/1ad141f9b0b19f8e9608d16223f587e8.jpg" alt="">
    </div>
  </section>

<?php get_footer();?>
<style>
    :root{
    --one:#FED7BF;
    --two:#e4afb0;
    --three:#9a7787;
}
.patient-left h1{
   color:var(--three);
   margin-bottom:15px;
}
.patient-left h3{
  color:var(--one);
  font-size:20px;
  margin-bottom:15px;
}
.patient-left p{
  font-size:20px;
  margin-bottom:15px;
}
.patient-left p:hover{
  color:var(--one);

}
.inpatient{
    width: 100%;
    display:flex;
}

.patient-left{

     width: 60%;
    margin-right:50px;
    border-right:5px solid var(--three);

}
.patient-right{
       width: 40%;


}
.patient-right h1{
  color:var(--three);
  margin-bottom:20px; 

}
.patient-right h3{
  font-weight:600;
  font-size:20px;
}
.patient-right p{
    text-align:justify;
    font-size:20px;

}
.patient-right img{
  border-radius:20px;
  margin-top:20px; 
  width: 100%; 
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
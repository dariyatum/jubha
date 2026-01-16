<?php get_header();?>

 <section class="national-day-hero">
    <h1>In Patient</h1>
    <p>Jubha Hospital</p>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cta-button">Book Your Check-Up</a>
  </section>

  <section class="inpatient">
    <div class="patient-left">
    <h1>IN PATIENT</h1>
    <h3>Rooms & Sevices</h3>
    <p>Emergency room Instructions</p>
    <p>Patients and their families have the right to health care</p>
    <p>Knowing the right and responsibilities of Petients and their families</p>
    <p>providing Healthcare Sevices and care based on respect and appriciation</p>
    <p>Privacy and Confidentiality</p>
    <p>Provide and Protection and safety</p>

    </div>
    <div class="patient-right">

    <h1>Rooms and Services</h1>
    <h3>At Jubha hospital we are commited to provide quality care at the highest levels.</h3>
    <p>To ensure optimal patient experience and a convenient atmosphere for swift recovery, all our rooms are equipped with the latest avandced medical equipment and well trained medical staff along with the essential entertainment and comfort facailities needed by the patient</p>
    <br>
    <p>Other than the reguler shared and private rooms, luxurious VIP suites are also available at Phnom Penh and Preah Vihear for the most premium healthcare experience.</p>
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
    justify-content:space-between;
}

.patient-left{
    width: 30%;
    margin-right:2%;
    border-right:5px solid var(--three);

}
.patient-right{
    width: 68%;

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
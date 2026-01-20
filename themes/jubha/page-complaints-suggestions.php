<?php get_header() ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheet/compaint.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">


 <section class="national-day-hero">
    <h1>Complaints</h1>
    <p>Jubha Hospital</p>
    <a href="<?php echo esc_url(home_url('/book-an-appointment')); ?>" class="cta-button">Book Your Check-Up</a>
  </section>
<section>
<!--tittle write about get in touch-->
    <div class="tittle__text__getintouch__compaint">
        <h1>
            Get in touch with us
        </h1>
    </div>
    <div class="p__text__ingetintouch__compaint">
        <p>
            At Almana Hospitals we value our clients’ opinions and feedback. We are constantly looking for ways to improve our 
            <br>services and support your needs.
        </p>
    </div>
    <div class="form__cotact__getintouch__compaint">
        <form action="">
            <div>
                <label for="message_type">Type of reques*</label><br>
                <select name="message_type" id="message_type" required>
                    <option value="">-- Select Type --</option>
                    <option value="inquiries_complaints">Complaints</option>
                    <option value="suggestions">Suggestions</option>
                </select>
            </div>
            <div>
                <label for="">Subject*</label>
                <br>
                <input type="text" placeholder="Subject">
            </div>
            <div>
                <label for="">Name*</label>
                <br>
                <input type="text" placeholder="Your name ">
            </div>
            <div>
                <label for="">Email address*</label>
                <br>
                <input type="email" placeholder="Your email">
            </div>
            <div>
                <label for="">Phone number*</label>
                <br>
                <input type="email" placeholder="Your phone number">
            </div>
            <div>
                <label for="message_type">Location</label><br>
                <select name="message_type" id="message_type" required>
                    <option value="">-- Select Type City --</option>
                    <option value="inquiries_complaints">Phone Penh</option>
                    <option value="suggestions">Passies</option>
                </select>
            </div>
            <div>
                <label for="">Message*</label>
                <br>
                <input type="email" placeholder="Fill in message" class="message">
            </div>
        </form>
        <button onclick="" class="buttom_in__compaint">Sent</button>
    </div>
</section>


<?php get_footer() ?>
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
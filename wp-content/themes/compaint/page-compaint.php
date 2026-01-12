<?php get_header() ?>
<link rel="stylesheet" href="wp-content/themes/compaint/stylesheet/compaint.css">
<link rel="stylesheet" href="/wp-content/themes/jubha/stylesheet/compaint.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">


<section>
        <!--   back ground contact-->
    <div class="backgroun_contact_page__compaint">
        <div class="text_background_contact-page__compaint">
            Complaints & Suggestions 
            <div class="Get_in_Touch_background_contact-page__compaint">
                <p>
                <i class="fa-solid fa-house"></i>
                Contact
                Complaints & Suggestions
                </p>
            </div>
        </div>
    </div>
</section><br>
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
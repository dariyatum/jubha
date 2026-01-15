<link rel="stylesheet" href="wp-content/themes/compaint/stylesheet/news.css">
<link rel="stylesheet" href="wp-content/themes/jubha/stylesheet/news.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

<?php get_header();?>
<section>
        <!--   back ground news-->
    <div class="backgroun_page_news">
        <div class="text_background_page_news">
            News 
            <div class="page_news__text">
                <p>
                <i class="fa-solid fa-house"></i>
                Media/News
                </p>
            </div>
        </div>
    </div>

  
</section><br>

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
                <br> surgery consultant Dr. Ahmed Hamed Amin, successfully performed a complex scoliosis correction surgery for
                <br> a 14-year-old girl suffering from an advanced spinal curvature exceeding 54 degrees.
            </p>
            <a href="">
                Read more
            </a>
        </div>
     </div>
</section>
<br>
<div class="titlle_news">
    <h1>Breaking News</h1>
</div>
<br>
<div class="cat__">
    <?php echo do_shortcode('[show_cats]'); ?>
</div>

<?php get_footer();?>
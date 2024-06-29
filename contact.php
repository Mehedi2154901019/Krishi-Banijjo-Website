<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Krishi Banijjo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #50b3a2;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #e8491d 3px solid;
        }
        header a {
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        header ul {
            padding: 0;
            list-style: none;
        }
        header li {
            display: inline;
            padding: 0 20px 0 20px;
        }
        header #branding {
            float: left;
        }
        header #branding h1 {
            margin: 0;
        }
        header nav {
            float: right;
            margin-top: 10px;
        }
        .content-section {
            padding: 20px;
        }
        .content-section h2 {
            color: #333;
        }
        .faq, .admin-info, .contact-info, .help-options {
            margin-bottom: 30px;
        }
        .faq h3, .admin-info h3, .contact-info h3, .help-options h3 {
            color: #e8491d;
        }
        /* Slider styles */
        .faq-slider {
            position: relative;
            border-radius: 10px;
            width: 100%;
            height: 270px;
            overflow: hidden;
            padding: 35px;
            box-sizing: border-box;
        }
        .faq-slider::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('images/img_slider.png'); /* Add your background image URL here */
            background-size: cover;
            background-position: center;
            opacity: 0.5; /* Set the opacity for the background image */
            z-index: 1;
        }
        .faq-slide {
            position: relative;
            height: 200px;
            display: none;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.8); /* Optional: Add a semi-transparent background to the slides for better readability */
            z-index: 2;
            transition: opacity 1s ease-in-out;
        }
        .faq-slide.active {
        
            display: block;
            opacity: 1;
        }
        .faq-slide.inactive {
            opacity: 0;
        }
        /* Navigation arrows */
        .faq-slider .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2rem;
            color:white;
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            cursor: pointer;
            z-index: 3;
            padding: 5px 10px;
            border-radius: 15%;
            user-select:none;
        }
        .faq-slider .arrow.left {
            left: 0px;
        }
        .faq-slider .arrow.right {
            right: 0px;
        }
    </style>
</head>
<body>
    <!-- <header>
        <div class="container">
            <div id="branding">
                <h1>Agricultural Products E-commerce</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div> -->
        <?php include('partials-front/menu.php') ?>
    </header>

    <div class="container content-section">
        <section class="faq">
            <h2 class="text-3xl bold mb-4">Frequently Asked Questions (FAQ)</h2>
            <div class="faq-slider">
                <div class="faq-slide active">
                    <h3>কিভাবে একাউন্ট তৈরি করবো?</h3>
                    <p>পেইজের উপরের 'সাইন আপ' বাটনে ক্লিক করুন এবং প্রয়োজনীয় তথ্য পূরণ করুন। আপনার অ্যাকাউন্ট সক্রিয় করার জন্য আপনি একটি কনফার্মেশন ই-মেইল পাবেন।</p>
                </div>
                <div class="faq-slide">
                    <h3>কি ধরনের কৃষি পণ্য বিক্রি করেন?</h3>
                    <p>আমরা বীজ, সার, কীটনাশক, কৃষি সরঞ্জাম এবং তাজা পণ্য সহ বিভিন্ন কৃষি পণ্য সরবরাহ করি। বিস্তারিত তালিকার জন্য আমাদের পণ্য বিভাগ পরিদর্শন করুন.</p>
                </div>
                <div class="faq-slide">
                    <h3>আমি কিভাবে একটি অর্ডার দিতে পারি?</h3>
                    <p>আপনি পছন্দসই পণ্য নির্বাচন করে কার্টে যোগ করুন এবং চেকআউট অপশনে গিয়ে অর্ডার করুন। আপনার যদি ইতিমধ্যে একটি অ্যাকাউন্ট থাকে তবে আপনাকে লগ ইন করতে হবে। অন্যথায় নতুন অ্যাকাউন্ট তৈরি করতে হবে।</p>
                </div>
                <div class="faq-slide">
                    <h3>আমি কিভাবে পেমেন্ট করতে পারি?
                    </h3>
                    <p>আমরা ক্রেডিট/ডেবিট কার্ড, নেট ব্যাঙ্কিং এবং জনপ্রিয় ডিজিটাল ওয়ালেট সহ বিভিন্ন প্ল্যাটফর্মে পেমেন্ট গ্রহণ করে থাকি। আরও বিস্তারিত জানার জন্য আমাদের পেমেন্ট পৃষ্ঠা চেক করুন।
                    </p>
                </div>
                <div class="faq-slide">

                    <h3>আপনাদের প্রোডাক্ট ফেরত দেওয়ার উপায় কি?</h3>
                    <p>আমরা ডেলিভারির ৩০ দিনের মধ্যে বেশিরভাগ পণ্যের জন্য রিটার্ন গ্রহণ করি। পণ্যগুলি অবশ্যই অক্ষত এবং প্যাকেজিংয়ে থাকতে হবে। আরো বিস্তারিত জানার জন্য অনুগ্রহ করে আমাদের হেল্প লাইনে যোগাযোগ করুন।
                    </p>
                </div>
                <div class="faq-slide">
                    <h3>আমি কিভাবে আমার অর্ডার ট্র্যাক করব?</h3>
                    <p>আপনার অর্ডার পাঠানো হয়ে গেলে ট্র্যাকিং নম্বর সহ একটি ইমেল পাবেন। আপনার প্রোডাক্টের অবস্থান দেখতে আমাদের ট্র্যাক অর্ডার পৃষ্ঠায় এই নম্বরটি ব্যবহার করতে পারেন৷
                    </p>
                </div>
                <div class="faq-slide">
                    <h3>আপনাদের শিপিং অপশন ও ডেলিভারি সময়সূচি কখন?</h3>
                    <p>অর্ডারের সর্বোচ্চ ৭ দিনের মধ্যে আমরা ডেলিভারি দিয়ে থাকি।
                    </p>
                </div>
                <div class="faq-slide">
                    <h3>আপনারা কি দেশের বাইরেও ডেলিভারি সার্ভিস দিয়ে থাকেন?
                    </h3>
                    <p>এখনও শুধুমাত্র বাংলাদেশের মধ্যই আমরা ডেলিভারি দিয়ে থাকি তবে শীঘ্রই বিদেশেও ডেলিভারি দেয়ার পরিকল্পনা রয়েছে।
                    </p>
                </div>
                <div class="faq-slide">
                    <h3>আমি কিভাবে ডিসকাউন্ট পেতে পারি?</h3>
                    <p>ডিসকাউন্ট পেতে আমাদের পেইজে নিয়মিত চোখ রাখুন ও প্রমো কোড সহ আকর্ষণীয় সব অফার উপভোগ করুন।
                    </p>
                </div>
                <div class="faq-slide">
                    <h3>অর্ডার দেওয়ার পর কি তা বাতিল করা সম্ভব?</h3>
                    <p>জি, অর্ডারের ২৪ ঘন্টার মধ্যে আপনার অর্ডারটি বাতিল করতে পারবেন।
                    </p>
                </div>
                
                <!-- Add more FAQ slides as needed -->
                <button class="arrow left">&lt;</button>
                <button class="arrow right">&gt;</button>
            </div>
        </section>

        <section class="admin-info">
            <h2 class="text-3xl bold mb-4">Our Team</h2>
            <h3>Nahid Parvez Mafi</h3>
            <p>Phone: +8801783567890</p>
            <h3>Md Mehedi Hassan</h3>
            <p>Phone: +8801792138063</p>
            <h3>Afsana Setu</h3>
            <p>Phone: +8801795813478</p>
        </section>

        <section class="contact-info">
            <h2 class="text-3xl bold mb-4">Contact Information</h2>
            <h3>Email</h3>
            <p>mehedi3128.mhd@gmail.com</p>
        </section>

        <section class="help-options">
            <h2 class="text-3xl bold mb-4">Help Options</h2>
            <h3>Customer Support</h3>
            <p>If you have any questions or need assistance, please contact our customer support team at <a href="mailto:mehedi3128.mhd@gmail.com">mehedi3128.mhd@gmail.com</a> or call us at +8801792138063.</p>
        </section>
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.faq-slide');
        const slideInterval = 10000; // Change slide every 10 seconds

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
                slide.classList.toggle('inactive', i !== index);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        document.querySelector('.arrow.right').addEventListener('click', nextSlide);
        document.querySelector('.arrow.left').addEventListener('click', prevSlide);

        setInterval(nextSlide, slideInterval);

        // Show the first slide initially
        showSlide(currentSlide);
    </script>
</body>
</html>
<?php include('partials-front/footer.php') ?>
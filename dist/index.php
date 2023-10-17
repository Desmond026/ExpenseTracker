<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Tracker</title>

  <!-- Fontawesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- Additional CSS -->
  <link href="output.css" rel="stylesheet">
  <!-- favicon -->
  <link rel="shortcut icon" href="img/ExP.png" type="image/x-icon">


</head>

<body>

  <!-- Header Section -->
  <header class="bg-white px-10 text-white py-4">
    <nav class="flex justify-between items-center w-[92%]  mx-auto">
      <div>
        <img class="w-14 object-cover cursor-pointer rounded-full text-white" src="img/ExP.png" alt="...">
      </div>
      <!-- <div class="nav-links duration-500 md:static bg-blue-500 absolute md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5">
        <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
          <li>
            <a class="hover:text-gray-500" href="#home">Home</a>
          </li>
          <li>
            <a class="hover:text-gray-500" href="services.html">Services</a>
          </li>
          <li>
            <a class="hover:text-gray-500" href="contact.html">Contact</a>
          </li>
        </ul>
      </div> -->
      <div class="flex items-center gap-6">
        <a href="login.php">
          <button id="openModalBtn" class="bg-blue-500 text-white px-5 py-2 rounded-full hover:bg-[#87acec]">Start Now</button>
        </a>
        <!-- <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon> -->
        <i onclick="onToggleMenu(this)" name="menu" class="fa-solid fa-bars text-3xl cursor-pointer md:hidden"></i>
      </div>
  </header>


  <!-- Hero Section -->
  <section id="home" class="hero bg-cover flex items-center justify-center h-96 text-white" style="background-image: url('https://source.unsplash.com/featured/1280x720/?expense-tracker')">
    <div class="container mx-auto text-center">
      <h1 class="text-4xl font-bold text-white">Track Your Expenses Effortlessly</h1>
      <a href="login.php" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 transition-all duration-200 text-white px-6 py-3 rounded-full">Get Started</a>
    </div>
  </section>

  <!-- Feature Section -->
  <section class="features bg-gray-100 py-16">
    <div class="container mx-auto">
      <div class="flex flex-wrap items-center justify-center space-y-12">

        <!-- Feature Card 1 -->
        <div class="w-full md:w-1/2 lg:w-1/3">
          <div class="max-w-sm mx-auto bg-white shadow rounded-lg overflow-hidden">
            <div class="flex justify-center items-center h-24 bg-blue-500 text-white">
              <i class="fas fa-wallet text-3xl"></i>
            </div>
            <div class="px-4 py-6">
              <h2 class="text-xl font-bold mb-2">Expense Tracking</h2>
              <p class="text-gray-600">Track your expenses efficiently and gain insights into your spending habits.</p>
              <a href="login.php" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 transition-all duration-200 text-white px-6 py-3 rounded-full">Track Now</a>
            </div>
          </div>
        </div>

        <!-- Feature Card 2 -->
        <div class="w-full md:w-1/2 lg:w-1/3">
          <div class="max-w-sm mx-auto bg-white shadow rounded-lg overflow-hidden">
            <div class="flex justify-center items-center h-24 bg-blue-500 text-white">
              <i class="fas fa-chart-pie text-3xl"></i>
            </div>
            <div class="px-4 py-6">
              <h2 class="text-xl font-bold mb-2">Budgeting</h2>
              <p class="text-gray-600">Manage your finances by setting up budgets and tracking your spending against them.</p>
              <a href="login.php" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 transition-all duration-200 text-white px-6 py-3 rounded-full">Start Budgeting</a>
            </div>
          </div>
        </div>

        <!-- Feature Card 3 -->
        <div class="w-full md:w-1/2 lg:w-1/3">
          <div class="max-w-sm mx-auto bg-white shadow rounded-lg overflow-hidden">
            <div class="flex justify-center items-center h-24 bg-blue-500 text-white">
              <i class="fas fa-cogs text-3xl"></i>
            </div>
            <div class="px-4 py-6">
              <h2 class="text-xl font-bold mb-2">Customization</h2>
              <p class="text-gray-600">Tailor the expense tracker to your needs with customizable categories and tags.</p>
              <a href="login.php" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 transition-all duration-200 text-white px-6 py-3 rounded-full">Customize</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Individual Feature Sections -->
  <section class="individual-features py-16">
    <div class="container mx-auto px-20">

      <!-- Individual Feature Section 1 -->
      <div class="flex items-center mb-12 ">

        <div class="w-full md:w-1/2 lg:w-1/3">
          <img src="https://source.unsplash.com/featured/1280x720/?expense-tracking" alt="Expense Tracking Image" class="h-64 w-full object-cover object-center">
        </div>

        <div class="w-full md:w-1/2 lg:w-2/3 px-4">
          <h2 class="text-3xl font-bold mb-2">Effortless Expense Tracking</h2>
          <p class="text-gray-600 mb-4 max-w-sm">Track your expenses effortlessly using our intuitive and user-friendly expense tracker. Say goodbye to manual calculations and tedious data entry.</p>
          <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 transition-all duration-200 text-white px-6 py-3 rounded-full">Get Started</a>
        </div>

      </div>

      <!-- Individual Feature Section 2 -->
      <div class="flex items-center mb-12">

        <div class="w-full md:w-1/2 lg:w-2/3 order-2 md:order-1 px-4">
          <h2 class="text-3xl font-bold mb-2">Efficient Budgeting</h2>
          <p class="text-gray-600 mb-4 max-w-sm">Take control of your finances by setting up budgets and monitoring your spending against them. Stay on track and achieve your financial goals.</p>
          <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 transition-all duration-200 text-white px-6 py-3 rounded-full">Get Started</a>
        </div>

        <div class="w-full md:w-1/2 lg:w-1/3 order-1 md:order-2">
          <img src="https://source.unsplash.com/featured/1280x720/?budgeting" alt="Budgeting Image" class="h-64 w-full object-cover object-center">
        </div>

      </div>

      <!-- Individual Feature Section 3 -->
      <div class="flex items-center">

        <div class="w-full md:w-1/2 lg:w-1/3">
          <img src="https://source.unsplash.com/featured/1280x720/?customization" alt="Customization Image" class="h-64 w-full object-cover object-center">
        </div>

        <div class="w-full md:w-1/2 lg:w-2/3 px-4">
          <h2 class="text-3xl font-bold mb-2">Personalized Customization</h2>
          <p class="text-gray-600 mb-4 max-w-sm">Customize the expense tracker to suit your preferences and needs. Create custom categories and tags, and organize your expenses your way.</p>
          <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 transition-all duration-200 text-white px-6 py-3 rounded-full">Get Started</a>
        </div>

      </div>

    </div>
  </section>

  <!-- Testimonial Section -->
  <section id="testimonials" class="testimonials bg-gray-200 py-16">
    <div class="container mx-auto">
      <div class="flex items-center justify-center mb-8">
        <h2 class="text-3xl font-bold">What Our Customers Say</h2>
      </div>
      <div class="flex flex-wrap items-center justify-center gap-4">

        <!-- Testimonial 1 -->
        <div class="w-full md:w-1/2 lg:w-1/3">
          <div class="max-w-sm mx-auto bg-white shadow rounded-lg overflow-hidden p-6">
            <blockquote class="text-gray-600">The expense tracker has made it incredibly easy for me to keep track of my finances. I love the intuitive interface and the budgeting features are second to none.</blockquote>
            <div class="flex mt-6">
              <div class="mr-4">
                <div id="tooltip-jese" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                  Jese Leos
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <img data-tooltip-target="tooltip-jese" src="img/t1.jpg" alt="" srcset="" class="w-10 h-10 p-1 rounded-full ring-2 ring-blue-300 dark:ring-blue-500">
              </div>
              <div>
                <h4 class="font-bold">John Doe</h4>
                <p class="text-gray-600">Finance Analyst</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="w-full md:w-1/2 lg:w-1/3">
          <div class="max-w-sm mx-auto bg-white shadow rounded-lg overflow-hidden p-6">
            <blockquote class="text-gray-600">I've been using the expense tracker app for over a year now and I couldn't be happier. It has helped me become more aware of my spending habits and saved me a lot of money in the process.</blockquote>
            <div class="flex mt-6">
              <div class="mr-4">
                <div id="tooltip-jese" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                  Jese Leos
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <img data-tooltip-target="tooltip-jese" src="img/t2.jpg" alt="" srcset="" class="w-10 h-10 p-1 rounded-full ring-2 ring-blue-300 dark:ring-blue-500">
              </div>
              <div>
                <h4 class="font-bold">Jane Smith</h4>
                <p class="text-gray-600">Freelancer</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Testimonial 3 -->
        <div class="w-full md:w-1/2 lg:w-1/3">
          <div class="max-w-sm mx-auto bg-white shadow rounded-lg overflow-hidden p-6">
            <blockquote class="text-gray-600">I've been using the expense tracker app for over a year now and I couldn't be happier. It has helped me become more aware of my spending habits and saved me a lot of money in the process.</blockquote>
            <div class="flex mt-6">
              <div class="mr-4">
                <div id="tooltip-jese" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                  Jese Leos
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <img data-tooltip-target="tooltip-jese" src="img/t3.jpg" alt="" srcset="" class="w-10 h-10 p-1 rounded-full ring-2 ring-blue-300 dark:ring-blue-500">
              </div>
              <div>
                <h4 class="font-bold">Joan Helen</h4>
                <p class="text-gray-600">Freelancer</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Blog Section -->
  <section id="blog" class="blog bg-white py-16">
    <div class="container mx-auto">
      <div class="flex items-center justify-center mb-8">
        <h2 class="text-3xl font-bold">Recent Blog Posts</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- Blog Post 1 -->
        <div class="max-w-sm mx-auto bg-gray-100 shadow rounded-lg overflow-hidden">
          <img src="img/expense.jpg" alt="Blog Post 1" class="h-48 w-full object-cover object-center">
          <div class="p-6">
            <h3 class="font-bold mb-2">10 Reasons why tou track your expenses </h3>
            <p class="text-gray-600">Tracking your expenses helps you map out your cash flow and course-correct your spending pattern. This helps you save and grow your wealth...</p>
            <a href="https://shorturl.at/fwAIO" target="_blank" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 transition-all duration-200 text-white px-4 py-2 rounded">Read More</a>
          </div>
        </div>

        <!-- Blog Post 2 -->
        <div class="max-w-sm mx-auto bg-gray-100 shadow rounded-lg overflow-hidden">
          <img src="img/benefits.jpg" alt="Blog Post 2" class="h-48 w-full object-cover object-center">
          <div class="p-6">
            <h3 class="font-bold mb-2">Why should you track your expenses?</h3>
            <p class="text-gray-600 text-ellipsis">You can then start ensuring that you’re spending your money wisely. When you track your spending, you can...</p>
            <a href="https://shorturl.at/hozN4" target="_blank" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 transition-all duration-200 text-white px-4 py-2 rounded">Read More</a>
          </div>
        </div>

        <!-- Blog Post 3 -->
        <div class="max-w-sm mx-auto bg-gray-100 shadow rounded-lg overflow-hidden">
          <img src="img/expense-tracking.jpg" alt="Blog Post 3" class="h-48 w-full object-cover object-center">
          <div class="p-6">
            <h3 class="font-bold mb-2">Why should you keep a daily record of expenses?</h3>
            <p class="text-gray-600">Keeping a daily record of your expenses by tracking receipts, invoices, and other outgoing expenses improves the financial health of your budget...</p>
            <a href="https://shorturl.at/cIPT0" target="_blank" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 transition-all duration-200 text-white px-4 py-2 rounded">Read More</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section id="faq" class="faq bg-gray-100 py-16">
    <div class="container mx-auto px-32">
      <div class="flex items-center justify-center mb-8">
        <h2 class="text-3xl font-bold">Frequently Asked Questions</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- FAQ 1 -->
        <div class="p-6 bg-white shadow rounded-lg">
          <h3 class="font-bold mb-2">Is my data secure?</h3>
          <p class="text-gray-600">Yes, we take data security seriously. Your information is encrypted and stored securely on our servers.</p>
        </div>

        <!-- FAQ 2 -->
        <div class="p-6 bg-white shadow rounded-lg">
          <h3 class="font-bold mb-2">Can I access the expense tracker from any device?</h3>
          <p class="text-gray-600">Yes, the expense tracker is cloud-based and can be accessed from any device with an internet connection.</p>
        </div>

        <!-- FAQ 3 -->
        <div class="p-6 bg-white shadow rounded-lg">
          <h3 class="font-bold mb-2">What if I need help?</h3>
          <p class="text-gray-600">We offer 24/7 customer support. If you have any questions or need assistance, simply contact our support team.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- Newsletter Subscription -->
  <section class="newsletter py-16">
    <div class="container mx-auto">
      <div class="flex items-center justify-center mb-8">
        <h2 class="text-3xl font-bold">Subscribe to Our Newsletter</h2>
      </div>
      <div class="max-w-md mx-auto">
        <form action="#" name="submit-to-google-sheet" class="flex flex-wrap items-center justify-center subs-form">
          <input type="email" name="Email" class="w-full md:w-3/4 px-4 py-3 rounded-l-lg focus:outline-none" placeholder="Enter your email address" required>
          <button type="submit" id="send-btn" class="w-full md:w-auto flex items-center justify-center px-4 py-3 rounded-r-lg bg-blue-500 hover:bg-blue-600 text-white transition-all duration-200">Subscribe</button>
        </form>
        <span id="msg" class="text-green-300 mt-10 block"></span>
      </div>
    </div>
  </section>

  <!-- Contact Form -->
  <section id="contact" class="contact-form py-16 bg-gray-900 text-white">
    <div class="container mx-auto">
      <div class="flex items-center justify-center mb-8">
        <h2 class="text-3xl font-bold">Get In Touch</h2>
      </div>
      <div class="max-w-lg mx-auto">
        <!-- onsubmit="sendEmail(); reset(); return false;" -->
        <form action="#" onsubmit="sendEmail(); reset(); return false;" class="flex flex-wrap">
          <div class="w-full mb-4">
            <label for="name" class="mb-1">Name</label>
            <input type="text" id="name" name="Name" class="w-full bg-gray-800 px-4 py-3 rounded focus:outline-none" placeholder="Your Name" required>
          </div>
          <div class="w-full mb-4">
            <label for="email" class="mb-1">Email</label>
            <input type="email" id="email" name="Contact Email" class="w-full bg-gray-800 px-4 py-3 rounded focus:outline-none" placeholder="Your Email" required>
          </div>
          <div class="w-full mb-4">
            <label for="message" class="mb-1">Message</label>
            <textarea id="message" name="Message" class="w-full bg-gray-800 px-4 py-3 rounded focus:outline-none" rows="4" placeholder="Your Message"></textarea>
          </div>
          <div class="w-full">
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 transition-all duration-200 text-white px-6 py-3 rounded-full">Send Message</button>
          </div>
        </form>
        <span id="cnt" class="text-green-300 mt-10 block"></span>
      </div>
    </div>
  </section>


  <!-- Footer Section -->
  <footer class="bg-gray-900 text-white py-4 px-6 ">
    <div class="container mx-auto flex justify-between items-center">
      <ul class="flex space-x-4">
        <li><a href="#home" class="hover:text-gray-400">Home</a></li>
        <li><a href="#testimonials" class="hover:text-gray-400">Testimonials</a></li>
        <li><a href="#blog" class="hover:text-gray-400">Blog</a></li>
        <li><a href="#contact" class="hover:text-gray-400">Contact</a></li>
      </ul>
      <ul class="flex space-x-4">
        <a href="#" class="text-gray-400 hover:text-blue-500 transition-all duration-200">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="text-gray-400 hover:text-blue-500 transition-all duration-200">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="#" class="text-gray-400 hover:text-blue-500 transition-all duration-200">
          <i class="fab fa-github"></i>
        </a>
      </ul>
    </div>
  </footer>

  <!-- Additional libraries -->
  <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>
    const navLinks = document.querySelector('.nav-links')

    function onToggleMenu(e) {
      e.name = e.name === 'menu' ? 'close' : 'menu'
      navLinks.classList.toggle('top-[9%]')
    }

    const scriptURL = 'https://script.google.com/macros/s/AKfycbydCwWSegcvMkHOXYEWBOYBnEcGTzu_ynXzATous3xruLnOlRNHa91TaHuaOK5tS1fk/exec'
    const form = document.forms['submit-to-google-sheet']
    const formm = document.forms['submitt-to-google-sheet']
    const msg = document.getElementById("msg")
    const cnt = document.getElementById("cnt")

    form.addEventListener('submit', e => {
      e.preventDefault()
      fetch(scriptURL, {
          method: 'POST',
          body: new FormData(form)
        })
        .then(response => {
          msg.innerHTML = "Thank You For Subscribing!";
          setTimeout(() => {
            msg.innerHTML = "";
          }, 5000);
          form.reset();
        })
        // .then(response => console.log('Success!', response))
        .catch(error => console.error('Error!', error.message))
    })
    formm.addEventListener('submit', e => {
      e.preventDefault()
      fetch(scriptURL, {
          method: 'POST',
          body: new FormData(formm)
        })
        .then(response => {
          cnt.innerHTML = "Message Sent Successful!";
          setTimeout(() => {
            cnt.innerHTML = "";
          }, 5000);
          formm.reset();
        })
        // .then(response => console.log('Success!', response))
        .catch(error => console.error('Error!', error.message))
    })
  </script>
  <script src=" https://smtpjs.com/v3/smtp.js"></script>
  <script>
    function sendEmail() {
      Email.send({
        Host: "smtp.elasticemail.com",
        Username: "zoilamcloughlin@gmail.com",
        Password: "0F44E67DF556EE8FA402F91D526994ADEAC0",
        To: 'iantubers957@gmail.com',
        From: 'zoilamcloughlin@gmail.com',
        ReplyFrom: document.getElementById("email").value,
        Subject: "New Contact Form Enquiry!",
        Body: "Name: " + document.getElementById("name").value +
          "<br> Email: " + document.getElementById("email").value +
          "<br> Message: " + document.getElementById("message").value
      }).then(
        message => alert("Message sent Successfully")
      );
    }
  </script>

  <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
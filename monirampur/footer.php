
<footer class="section">
  <style>
    /* Generic styling */
    * {
      box-sizing: border-box;
      font-family: "Lato", sans-serif;
      margin: 0;
      padding: 0;
    }
    ul {
      list-style: none;
      padding-left: 0;
    }
    footer {
      background-color: #555;
      color: #bbb;
      line-height: 1.5;
    }
    footer a {
      text-decoration: none;
      color: #eee;
    }
    a:hover {
      text-decoration: underline;
    }
    .ft-title {
      color: #fff;
      font-family: "Merriweather", serif;
      font-size: 1.375rem;
      padding-bottom: 0.625rem;
    }
    /* Sticks footer to bottom */
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }
    .containerft {
      flex: 1;
    }
    /* Footer main */
    .ft-main {
      padding: 1.25rem 1.875rem;
      display: flex;
      flex-wrap: wrap;
    }
    @media only screen and (min-width: 29.8125rem /* 477px */) {
      .ft-main {
        justify-content: space-evenly;
      }
    }
    @media only screen and (min-width: 77.5rem /* 1240px */) {
      .ft-main {
        justify-content: space-evenly;
      }
    }
    .ft-main-item {
      padding: 1.25rem;
      min-width: 12.5rem;
    }

    /* Footer main | Newsletter form */
    form {
      display: flex;
      flex-wrap: wrap;
    }
    input[type="email"] {
      border: 0;
      padding: 0.625rem;
      margin-top: 0.3125rem;
    }
    input[type="submit"] {
      background-color: #00d188;
      color: #fff;
      cursor: pointer;
      border: 0;
      padding: 0.625rem 0.9375rem;
      margin-top: 0.3125rem;
    }
    /* Footer social */
    .ft-social {
      padding: 0 1.875rem 1.25rem;
    }
    .ft-social-list {
      display: flex;
      justify-content: center;
      border-top: 1px #777 solid;
      padding-top: 1.25rem;
    }
    .ft-social-list li {
      margin: 0.5rem;
      font-size: 1.25rem;
    }
    /* Footer legal */
    .ft-legal {
      padding: 0.9375rem 1.875rem;
      background-color: #333;
    }
    .ft-legal-list {
      width: 100%;
      display: flex;
      flex-wrap: wrap;
    }
    .ft-legal-list li {
      margin: 0.125rem 0.625rem;
      white-space: nowrap;
    }
    /* one before the last child */
    .ft-legal-list li:nth-last-child(2) {
        flex: 1;
    }

  </style>

<!-- Footer main -->
  <section class="container ft-main">
    <div class="ft-main-item">
      <h2 class="ft-title">Importent Links</h2>
      <ul>
        <li><a href="https://docs.google.com/forms/d/1NP3Y25Q6L_FZlmRbnDBneyXf2NxIfyv8D9kC_GWj-L8/edit?usp=sharing">অনলাইন ভর্তি আবেদন</a></li>
        <li><a href="#">ক্লাস লেকচার</a></li>
        <li><a href="#">PDF বই</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Video Class</a></li>
      </ul>
    </div>
    <div class="ft-main-item">
      <h2 class="ft-title">Resources</h2>
      <ul>
        <li><a href="#">Docs</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">eBooks</a></li>
        <li><a href="#">Webinars</a></li>
      </ul>
    </div>
    <div class="ft-main-item">
      <h2 class="ft-title">Contact</h2>
      <ul>
        <li><a href="#">Help</a></li>
        <li><a href="#">Sales</a></li>
        <li><a href="#">Advertise</a></li>
        <li><a href="/dsms/logout.php">Log Out</a></li>
      </ul>
    </div>
    <div class="ft-main-item">
      <h2 class="ft-title">Stay Updated</h2>
      <p>Get free updates before others do!</p>
      <form>
        <input type="email" name="email" placeholder="Enter email address">
        <input type="submit" value="Subscribe">
      </form>
    </div>
  </section>

  <!-- Footer social -->
  <section class="ft-social">
    <ul class="ft-social-list">
      <li><a href="#"><i class="fab fa-facebook"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
      <li><a href="#"><i class="fab fa-github"></i></a></li>
      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
      <li><a href="#"><i class="fab fa-youtube"></i></a></li>
    </ul>
  </section>

  <!-- Footer legal -->
  <section class="ft-legal">
    <ul class="ft-legal-list">
      <li>&copy; 2022 by The Trainig Academy - Dhit</li>
      <li><a href="#">Design &amp; Developed by Suborno IT Ltd.</a></li>
    </ul>
  </section>
</footer>
</body>
</html>

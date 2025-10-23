<?php
// Updated index.php — references site assets in images/, scripts/, stylesheets/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Health Website</title>

  <!-- Main stylesheet -->
  <link rel="stylesheet" href="stylesheets/style.css">

  <!-- Page script -->
  <script defer src="scripts/script.js"></script>

  <!-- Optional: login/signup page styles (if you want those available on this page) -->
  <link rel="stylesheet" href="login_page/stylesheets/login.css">
  <link rel="stylesheet" href="signup_page/stylesheets/login.css">

  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    /* Minimal fallback styling */
    body{font-family:Arial,Helvetica,sans-serif;margin:16px;}
    .gallery{display:flex;flex-wrap:wrap;gap:12px}
    .card{border:1px solid #ddd;padding:8px;border-radius:6px;width:220px;text-align:center}
    .card img{max-width:200px;height:auto;display:block;margin:0 auto 8px}
  </style>
</head>
<body>

  <header>
    <h1>Health Website</h1>
    <!-- logo from images/ -->
    <p><img src="images/Logo.png" alt="Logo" style="max-width:160px"></p>
  </header>

  <main>
    <section>
      <h2>Background images (from images/)</h2>
      <div class="gallery">
        <div class="card">
          <img src="images/bg1.jpg" alt="bg1">
          <div>bg1.jpg</div>
        </div>
        <div class="card">
          <img src="images/bg2.png" alt="bg2">
          <div>bg2.png</div>
        </div>
        <div class="card">
          <img src="images/bg3.png" alt="bg3">
          <div>bg3.png</div>
        </div>
        <div class="card">
          <img src="images/bg4.png" alt="bg4">
          <div>bg4.png</div>
        </div>
        <div class="card">
          <img src="images/bg5.png" alt="bg5">
          <div>bg5.png</div>
        </div>
      </div>
    </section>

    <section>
      <h2>Other assets</h2>
      <ul>
        <li>Stylesheet: <code>stylesheets/style.css</code></li>
        <li>Script: <code>scripts/script.js</code></li>
        <li>Login stylesheet: <code>login_page/stylesheets/login.css</code></li>
        <li>Signup stylesheet: <code>signup_page/stylesheets/login.css</code></li>
        <li>Images folder: <code>images/</code></li>
      </ul>
    </section>
  </main>

  <footer>
    <p><a href="login_page/login.php">Login</a> · <a href="signup_page/signup.php">Sign up</a></p>
  </footer>

</body>
</html>
```// filepath: /var/www/html/T-Level/Health_website 23.10.25/index.php
<?php
// Updated index.php — references site assets in images/, scripts/, stylesheets/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Health Website</title>

  <!-- Main stylesheet -->
  <link rel="stylesheet" href="stylesheets/style.css">

  <!-- Page script -->
  <script defer src="scripts/script.js"></script>

  <!-- Optional: login/signup page styles (if you want those available on this page) -->
  <link rel="stylesheet" href="login_page/stylesheets/login.css">
  <link rel="stylesheet" href="signup_page/stylesheets/login.css">

  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    /* Minimal fallback styling */
    body{font-family:Arial,Helvetica,sans-serif;margin:16px;}
    .gallery{display:flex;flex-wrap:wrap;gap:12px}
    .card{border:1px solid #ddd;padding:8px;border-radius:6px;width:220px;text-align:center}
    .card img{max-width:200px;height:auto;display:block;margin:0 auto 8px}
  </style>
</head>
<body>

  <header>
    <h1>Health Website</h1>
    <!-- logo from images/ -->
    <p><img src="images/Logo.png" alt="Logo" style="max-width:160px"></p>
  </header>

  <main>
    <section>
      <h2>Background images (from images/)</h2>
      <div class="gallery">
        <div class="card">
          <img src="images/bg1.jpg" alt="bg1">
          <div>bg1.jpg</div>
        </div>
        <div class="card">
          <img src="images/bg2.png" alt="bg2">
          <div>bg2.png</div>
        </div>
        <div class="card">
          <img src="images/bg3.png" alt="bg3">
          <div>bg3.png</div>
        </div>
        <div class="card">
          <img src="images/bg4.png" alt="bg4">
          <div>bg4.png</div>
        </div>
        <div class="card">
          <img src="images/bg5.png" alt="bg5">
          <div>bg5.png</div>
        </div>
      </div>
    </section>

    <section>
      <h2>Other assets</h2>
      <ul>
        <li>Stylesheet: <code>stylesheets/style.css</code></li>
        <li>Script: <code>scripts/script.js</code></li>
        <li>Login stylesheet: <code>login_page/stylesheets/login.css</code></li>
        <li>Signup stylesheet: <code>signup_page/stylesheets/login.css</code></li>
        <li>Images folder: <code>images/</code></li>
      </ul>
    </section>
  </main>

  <footer>
    <p><a href="login_page/login.php">Login</a> · <a href="signup_page/signup.php">Sign up</a></p>
  </footer>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Centered Menu Header with Carousel</title>
  <link rel="stylesheet" href="stylesheets/style.css" />
</head>
<body>
  <header>
    <div class="left-section">
      <img src="" alt="Logo" class="logo" />
      <div class="search-bar">
        <input type="text" placeholder="search bar" />
        <button aria-label="Search"></button>
      </div>
    </div>

    <nav>
      <a href="index.html" class="active">Home</a>
      <a href="index.html">Weather</a>
      <a href="index.html">Advice</a>
      <a href="index.html">Allergens</a>
      <a href="index.html">Home Safety</a>
    </nav>
    <div class="account-settings">
      <a href="../login_page/login.html" class="account-link">My account</a>
      <a href="../login_page/login.html" aria-label="login" class="icon-btn login-link">
        <svg height="24" width="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="8" r="4" stroke="white" stroke-width="2" fill="none"/>
          <path d="M4 20c0-4 8-4 8-4s8 0 8 4" stroke="white" stroke-width="2" fill="none"/>
        </svg>
      </a>


      <a href="settings.html" aria-label="Settings" class="icon-btn settings-link">
        <svg height="24" width="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="12" r="3" stroke="white" stroke-width="2" fill="none"/>
          <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" stroke="white" stroke-width="2" fill="none"/>
        </svg>
      </a>
    </div>
  </header>

  <div class="carousel">
    <div class="background bg1"></div>
    <div class="background bg2"></div>
  
    <div class="quote" id="carousel-quote">""</div>
  </div>

  <main>
    <h2>Weather Overview</h2>
    <p>Stay updated with the latest weather conditions in your area. Weather can change rapidly, so always be prepared for sun, rain, wind, or snow. Check local forecasts to plan your day accordingly.</p>
    <div class="content-block image-left">
      <p>Sunny weather often brings a cheerful and vibrant atmosphere. The bright sunlight warms the earth, encouraging outdoor activities like picnics, hiking, and sports. Clear skies and the golden glow of the sun can boost mood and energy levels, making it easier to feel motivated and happy. People tend to enjoy the natural beauty of their surroundings more during sunny days, with blooming flowers, sparkling water, and clear landscapes creating a picturesque environment.
      </p>
    </div>
    <div class="content-block image-right">
      <p>On the other hand, rainy weather has its own unique charm and benefits. The sound of raindrops falling can be soothing and calming, often encouraging relaxation or introspection. Rain nourishes plants and replenishes water supplies, playing a crucial role in sustaining life. While rainy days might keep people indoors, they also create cozy moments perfect for reading a book, sipping hot drinks, or enjoying quiet time. The fresh, clean smell after rain can feel refreshing, offering a peaceful contrast to the hustle and bustle of sunny days.</p>
    </div>
  </main>
  
  <section id="weather-section">
    <h2>Local Weather Forecast</h2>
    <div id="weather-info">Detecting your location...</div>
  </section>
  

  <script src="scripts/script.js"></script>
</body>
</html>

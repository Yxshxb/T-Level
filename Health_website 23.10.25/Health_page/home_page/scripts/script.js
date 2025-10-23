const quotes = [
  `"Life isn't about waiting for the storm to pass. It's about learning how to dance in the rain."`,
  `"Weather is a great example of how unpredictable life can be."`,
  `"Advice from nature: always stay rooted but be flexible with the wind."`,
  `"Allergens affect many, but knowledge is the best defense."`,
  `"Home safety starts with awareness and good habits."`
];
const images = [
  "url('images/bg1.jpg')",
  "url('images/bg2.png')",
  "url('images/bg3.png')",
  "url('images/bg4.png')",
  "url('images/bg5.png')"
];


let currentIndex = 0;

const quoteElement = document.getElementById('carousel-quote');
const bg1 = document.querySelector('.bg1');
const bg2 = document.querySelector('.bg2');

let activeBg = bg1;  
let inactiveBg = bg2; 

activeBg.style.backgroundImage = images[currentIndex];
activeBg.classList.add('active');
quoteElement.textContent = quotes[currentIndex];

function slideToIndex(newIndex, direction = 'right') {
  quoteElement.classList.add(direction === 'right' ? 'slide-out-left' : 'slide-out-right');

  quoteElement.addEventListener('transitionend', onTransitionEnd);

  function onTransitionEnd() {
    quoteElement.removeEventListener('transitionend', onTransitionEnd);

    currentIndex = newIndex;

    inactiveBg.style.backgroundImage = images[currentIndex];
    inactiveBg.classList.add('active');
    activeBg.classList.remove('active');

    [activeBg, inactiveBg] = [inactiveBg, activeBg];

    quoteElement.textContent = quotes[currentIndex];

    quoteElement.classList.remove('slide-out-left', 'slide-out-right');

    quoteElement.classList.add(direction === 'right' ? 'slide-in-right' : 'slide-in-left');

    quoteElement.addEventListener('animationend', () => {
      quoteElement.classList.remove('slide-in-right', 'slide-in-left');
    }, { once: true });
  }
}

setInterval(() => {
  const newIndex = (currentIndex + 1) % quotes.length;
  slideToIndex(newIndex, 'right');
}, 5000);

  const weatherDescriptions = {
    0: "Clear sky",
    1: "Mainly clear",
    2: "Partly cloudy",
    3: "Overcast",
    45: "Fog",
    48: "Depositing rime fog",
    51: "Light drizzle",
    53: "Moderate drizzle",
    55: "Dense drizzle",
    61: "Slight rain",
    63: "Moderate rain",
    65: "Heavy rain",
    80: "Rain showers",
    95: "Thunderstorm"
  };

  async function getWeather(lat, lon) {
    const apiUrl = `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current_weather=true&hourly=temperature_2m,weathercode&timezone=auto`;

    try {
      const response = await fetch(apiUrl);
      const data = await response.json();

      const current = data.current_weather;
      const hourly = data.hourly;

      let html = `
        <p><strong>Current Temperature:</strong> ${current.temperature}°C</p>
        <p><strong>Wind Speed:</strong> ${current.windspeed} km/h</p>
        <p><strong>Condition:</strong> ${weatherDescriptions[current.weathercode] || "Unknown"}</p>
        <p><strong>Time:</strong> ${current.time}</p>

        <h3>Next 12 Hours Forecast</h3>
        <table>
          <tr>
            <th>Time</th>
            <th>Temp (°C)</th>
            <th>Condition</th>
          </tr>
      `;

      for (let i = 0; i < 12; i++) {
        const time = hourly.time[i];
        const temp = hourly.temperature_2m[i];
        const code = hourly.weathercode[i];
        const desc = weatherDescriptions[code] || "Unknown";

        html += `
          <tr>
            <td>${time}</td>
            <td>${temp}°C</td>
            <td>${desc}</td>
          </tr>
        `;
      }

      html += `</table>`;
      document.getElementById("weather-info").innerHTML = html;

    } catch (error) {
      document.getElementById("weather-info").textContent = "Error fetching weather data.";
      console.error(error);
    }
  }

  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
        getWeather(lat, lon);
      },
      (error) => {
        document.getElementById("weather-info").textContent =
          "Unable to retrieve location. Please allow location access.";
        console.error(error);
      }
    );
  } else {
    document.getElementById("weather-info").textContent =
      "Geolocation is not supported by your browser.";
  }

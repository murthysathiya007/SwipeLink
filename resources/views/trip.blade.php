<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tamil Nadu Road Trip - 47 Districts in 23 Weekends</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <style>
      :root {
        --primary: #e63946;
        --secondary: #1d3557;
        --accent: #457b9d;
        --light: #f1faee;
        --dark: #0d1b2a;
        --gold: #ffd700;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Poppins", sans-serif;
        background-color: #f9f9f9;
        color: #333;
        line-height: 1.6;
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
      }

      header {
        background: linear-gradient(135deg, var(--secondary), var(--accent));
        color: white;
        padding: 2rem 0;
        text-align: center;
        position: relative;
        overflow: hidden;
      }

      header::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("https://images.unsplash.com/photo-1587474260584-136574528ed5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80")
          center/cover;
        opacity: 0.3;
        z-index: 0;
      }

      header .container {
        position: relative;
        z-index: 1;
      }

      h1 {
        font-family: "Playfair Display", serif;
        font-size: 2.5rem;
        margin-bottom: 1rem;
      }

      .subtitle {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        font-weight: 300;
      }

      .stats {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1.5rem;
        margin: 2rem 0;
      }

      .stat-box {
        background-color: rgba(255, 255, 255, 0.2);
        padding: 1rem 1.5rem;
        border-radius: 8px;
        backdrop-filter: blur(5px);
        min-width: 150px;
      }

      .stat-box .number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--gold);
      }

      .trip-progress {
        margin: 3rem 0;
      }

      .progress-container {
        background-color: rgba(255, 255, 255, 0.2);
        height: 10px;
        border-radius: 5px;
        margin: 1rem 0;
        overflow: hidden;
      }

      .progress-bar {
        height: 100%;
        background-color: var(--primary);
        width: 0;
        transition: width 1s ease;
      }

      .weekend-selector {
        display: flex;
        overflow-x: auto;
        gap: 10px;
        padding: 10px 0;
        margin: 2rem 0;
        scrollbar-width: thin;
      }

      .weekend-tab {
        background-color: white;
        padding: 10px 20px;
        border-radius: 30px;
        cursor: pointer;
        white-space: nowrap;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        font-weight: 500;
      }

      .weekend-tab:hover {
        background-color: var(--accent);
        color: white;
      }

      .weekend-tab.active {
        background-color: var(--primary);
        color: white;
      }

      .weekend-container {
        display: none;
      }

      .weekend-container.active {
        display: block;
        animation: fadeIn 0.5s ease;
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .weekend-header {
        background-color: var(--secondary);
        color: white;
        padding: 1.5rem;
        border-radius: 8px 8px 0 0;
        margin-top: 2rem;
      }

      .weekend-header h2 {
        font-family: "Playfair Display", serif;
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
      }

      .weekend-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        font-size: 0.9rem;
        opacity: 0.9;
      }

      .meta-item {
        display: flex;
        align-items: center;
        gap: 5px;
      }

      .days-container {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        margin-top: 1.5rem;
      }

      .day-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
      }

      .day-card:hover {
        transform: translateY(-5px);
      }

      .day-header {
        background-color: var(--accent);
        color: white;
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .district-number {
        background-color: white;
        color: var(--secondary);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
      }

      .day-content {
        padding: 1.5rem;
      }

      .places-list {
        margin-top: 1rem;
      }

      .place-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
      }

      .place-item:last-child {
        border-bottom: none;
      }

      .place-icon {
        color: var(--primary);
        font-size: 1.2rem;
        margin-top: 3px;
      }

      .place-details {
        flex: 1;
      }

      .place-name {
        font-weight: 600;
        margin-bottom: 5px;
      }

      .place-location {
        font-size: 0.9rem;
        color: #666;
        display: flex;
        align-items: center;
        gap: 5px;
      }

      .reel-plan {
        background-color: var(--light);
        padding: 1.5rem;
        border-radius: 8px;
        margin-top: 1.5rem;
      }

      .reel-plan h3 {
        color: var(--secondary);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .reel-plan h3 i {
        color: var(--primary);
      }

      .reel-details {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
      }

      .reel-section {
        flex: 1;
        min-width: 250px;
      }

      .reel-section h4 {
        color: var(--accent);
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
      }

      .shot-list {
        list-style-type: none;
      }

      .shot-list li {
        margin-bottom: 8px;
        position: relative;
        padding-left: 20px;
      }

      .shot-list li::before {
        content: "→";
        position: absolute;
        left: 0;
        color: var(--primary);
      }

      .caption-box {
        background-color: white;
        border-left: 4px solid var(--primary);
        padding: 1rem;
        margin-top: 1rem;
        font-style: italic;
        position: relative;
      }

      .caption-box::before {
        content: '"';
        position: absolute;
        top: 5px;
        left: 5px;
        font-size: 2rem;
        color: rgba(0, 0, 0, 0.1);
        font-family: serif;
      }

      .image-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
        margin-top: 1.5rem;
      }

      .gallery-item {
        height: 150px;
        border-radius: 8px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        transition: transform 0.3s ease;
      }

      .gallery-item:hover {
        transform: scale(1.03);
      }

      .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
      }

      .gallery-item:hover img {
        transform: scale(1.1);
      }

      .gallery-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
        color: white;
        padding: 10px;
        font-size: 0.8rem;
        opacity: 0;
        transition: opacity 0.3s ease;
      }

      .gallery-item:hover .gallery-caption {
        opacity: 1;
      }

      .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        z-index: 1000;
        justify-content: center;
        align-items: center;
      }

      .modal-content {
        max-width: 90%;
        max-height: 90%;
      }

      .modal-content img {
        max-width: 100%;
        max-height: 90vh;
        border-radius: 8px;
      }

      .close-modal {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 2rem;
        cursor: pointer;
      }

      footer {
        background-color: var(--dark);
        color: white;
        text-align: center;
        padding: 2rem 0;
        margin-top: 3rem;
      }

      .completion-banner {
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: white;
        padding: 2rem;
        border-radius: 8px;
        text-align: center;
        margin: 2rem 0;
        animation: pulse 2s infinite;
      }

      @keyframes pulse {
        0% {
          transform: scale(1);
        }
        50% {
          transform: scale(1.02);
        }
        100% {
          transform: scale(1);
        }
      }

      .completion-banner h2 {
        font-family: "Playfair Display", serif;
        font-size: 2rem;
        margin-bottom: 1rem;
      }

      .completion-stats {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1.5rem;
        margin: 1.5rem 0;
      }

      .completion-stat {
        background-color: rgba(255, 255, 255, 0.2);
        padding: 1rem;
        border-radius: 8px;
        min-width: 150px;
      }

      .completion-stat .number {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--gold);
      }

      @media (max-width: 768px) {
        h1 {
          font-size: 2rem;
        }

        .subtitle {
          font-size: 1rem;
        }

        .stat-box {
          padding: 0.8rem 1rem;
          min-width: 120px;
        }

        .stat-box .number {
          font-size: 1.5rem;
        }

        .weekend-header h2 {
          font-size: 1.5rem;
        }

        .reel-details {
          flex-direction: column;
          gap: 1rem;
        }

        .image-gallery {
          grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }

        .gallery-item {
          height: 120px;
        }
      }

      @media (max-width: 480px) {
        h1 {
          font-size: 1.8rem;
        }

        .stats {
          gap: 0.8rem;
        }

        .stat-box {
          min-width: 100px;
          padding: 0.6rem 0.8rem;
        }

        .stat-box .number {
          font-size: 1.3rem;
        }

        .weekend-meta {
          flex-direction: column;
          gap: 0.5rem;
        }

        .image-gallery {
          grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        }

        .gallery-item {
          height: 100px;
        }
      }
    </style>
  </head>
  <body>
    <header>
      <div class="container">
        <h1>Tamil Nadu Road Trip</h1>
        <p class="subtitle">47 Districts in 23 Weekends</p>

        <div class="stats">
          <div class="stat-box">
            <div class="number">47</div>
            <div>Districts</div>
          </div>
          <div class="stat-box">
            <div class="number">23</div>
            <div>Weekends</div>
          </div>
          <div class="stat-box">
            <div class="number">14,000+</div>
            <div>Kilometers</div>
          </div>
          <div class="stat-box">
            <div class="number">47+</div>
            <div>Instagram Reels</div>
          </div>
        </div>

        <div class="trip-progress">
          <p>
            Your trip progress: <span id="completed-count">0</span>/47 districts
          </p>
          <div class="progress-container">
            <div class="progress-bar" id="progress-bar"></div>
          </div>
        </div>
      </div>
    </header>

    <main class="container">
      <div class="weekend-selector" id="weekend-selector">
        <!-- Weekend tabs will be added here by JavaScript -->
      </div>

      <div id="weekend-containers">
        <!-- Weekend containers will be added here by JavaScript -->
      </div>

      <div
        class="completion-banner"
        id="completion-banner"
        style="display: none"
      >
        <h2>🎉 Trip Completion Milestone!</h2>
        <p>You've successfully explored all 47 districts of Tamil Nadu!</p>

        <div class="completion-stats">
          <div class="completion-stat">
            <div class="number">47</div>
            <div>Districts</div>
          </div>
          <div class="completion-stat">
            <div class="number">23</div>
            <div>Weekends</div>
          </div>
          <div class="completion-stat">
            <div class="number">14,000+</div>
            <div>KM Covered</div>
          </div>
          <div class="completion-stat">
            <div class="number">47+</div>
            <div>Instagram Reels</div>
          </div>
        </div>

        <p>📍 Final stop: Chennai – Mission Accomplished!</p>
      </div>
    </main>

    <footer>
      <div class="container">
        <p>Created with ❤️ for Tamil Nadu</p>
        <p>Start your own district exploration today!</p>
      </div>
    </footer>

    <div class="modal" id="image-modal">
      <span class="close-modal">&times;</span>
      <div class="modal-content">
        <img id="modal-image" src="" alt="Enlarged view" />
      </div>
    </div>

    <script>
      // Trip data
      const tripData = [
        {
          weekend: 1,
          distance: "~120 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Chengalpattu",
              number: 2,
              spots: [
                {
                  name: "Mahabalipuram Shore Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "shore_temple.jpg",
                },
                {
                  name: "Pancha Rathas",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "pancha_rathas.jpg",
                },
                {
                  name: "Tiger Cave Beach",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "tiger_cave.jpg",
                },
              ],
              reel: {
                song: "'Sutti Sutti Vandha Nilavu'",
                script: [
                  "Shot 1: District board",
                  "Shot 2: Shore Temple view",
                  "Shot 3: Beach sunset",
                ],
                caption:
                  "District 2 🌅 Chengalpattu – where rocks tell stories of empires & oceans whisper tales.",
              },
            },
            {
              day: 2,
              district: "Kanchipuram",
              number: 3,
              spots: [
                {
                  name: "Ekambareswarar Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "ekambareswarar.jpg",
                },
                {
                  name: "Varadharaja Perumal Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "varadharaja.jpg",
                },
                {
                  name: "Silk Saree Weaving Workshop",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "silk_weaving.jpg",
                },
              ],
              reel: {
                song: "'Kanchipurathu Kadhala'",
                script: [
                  "Shot 1: District board selfie",
                  "Shot 2: Temple gopuram",
                  "Shot 3: Silk weaving",
                ],
                caption:
                  "District 3 🧵 Kanchipuram – Draped in silk and soaked in divinity. Temple bells, vibrant threads & timeless grace.",
              },
            },
          ],
        },
        {
          weekend: 2,
          distance: "~410 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Tiruvallur",
              number: 4,
              spots: [
                {
                  name: "Poondi Reservoir",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "poondi.jpg",
                },
                {
                  name: "Veeraraghava Perumal Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "veeraraghava.jpg",
                },
                {
                  name: "Pulicat Lake Bird Sanctuary",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "pulicat.jpg",
                },
              ],
              reel: {
                song: "'Yaaro Yaarodi – Alaipayuthey'",
                script: [
                  "Shot 1: Tiruvallur district board",
                  "Shot 2: Water birds flying over reservoir",
                  "Shot 3: Temple gopuram with time-lapse",
                ],
                caption:
                  "District 4 🌾 Tiruvallur – Water, wings & heritage. From serene reservoirs to divine vibes!",
              },
            },
            {
              day: 2,
              district: "Vellore",
              number: 5,
              spots: [
                {
                  name: "Vellore Fort",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "vellore_fort.jpg",
                },
                {
                  name: "Golden Temple (Sripuram)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "golden_temple.jpg",
                },
                {
                  name: "Amirthi Zoological Park",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "amirthi_zoo.jpg",
                },
              ],
              reel: {
                song: "'Unakena Naan – Kadhalil Vizhundhen'",
                script: [
                  "Shot 1: Vellore welcome board",
                  "Shot 2: Fort aerial view",
                  "Shot 3: Night view of Golden Temple",
                ],
                caption:
                  "District 5 ✨ Vellore – Golden hues & royal views. Forts, faith & forest calm.",
              },
            },
          ],
        },
        {
          weekend: 3,
          distance: "~470 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Tiruvannamalai",
              number: 6,
              spots: [
                {
                  name: "Arunachaleswarar Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "arunachaleswarar.jpg",
                },
                {
                  name: "Ramana Ashram",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "ramana_ashram.jpg",
                },
                {
                  name: "Girivalam Path",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "girivalam.jpg",
                },
              ],
              reel: {
                song: "'Arunachala Siva – Devotional'",
                script: [
                  "Shot 1: District board",
                  "Shot 2: Aerial temple gopuram shot",
                  "Shot 3: Footpath walk with pilgrims",
                ],
                caption:
                  "District 6 🔥 Tiruvannamalai – Sacred fire & silent peace. A walk with the divine.",
              },
            },
            {
              day: 2,
              district: "Villupuram",
              number: 7,
              spots: [
                {
                  name: "Gingee Fort",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "gingee_fort.jpg",
                },
                {
                  name: "Mailam Murugan Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "mailam_murugan.jpg",
                },
                {
                  name: "Auroville (Optional Detour)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "auroville.jpg",
                },
              ],
              reel: {
                song: "'Oru Kuchi Oru Kulfi – Kulir 100°'",
                script: [
                  "Shot 1: Fort entry gate",
                  "Shot 2: Climbing aerial ramp",
                  "Shot 3: Temple bell & landscape shot",
                ],
                caption:
                  "District 7 🏯 Villupuram – Fort trails & breezy tales. Power-packed & peaceful.",
              },
            },
          ],
        },
        {
          weekend: 4,
          distance: "~420 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Cuddalore",
              number: 8,
              spots: [
                {
                  name: "Silver Beach",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "silver_beach.jpg",
                },
                {
                  name: "Padaleeswarar Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "padaleeswarar.jpg",
                },
                {
                  name: "Pichavaram Mangrove Forest (boat ride)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "pichavaram.jpg",
                },
              ],
              reel: {
                song: "'Uyirin Uyire – Kaakha Kaakha'",
                script: [
                  "Shot 1: District entry board",
                  "Shot 2: Mangrove ride POV",
                  "Shot 3: Walking on beach during sunset",
                ],
                caption:
                  "District 8 🌊 Cuddalore – Boats, breeze & bliss. A coastal calm before the city storm.",
              },
            },
            {
              day: 2,
              district: "Puducherry (Union Territory Bonus Trip)",
              number: 0,
              spots: [
                {
                  name: "Rock Beach",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "rock_beach.jpg",
                },
                {
                  name: "French Colony Streets",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "french_colony.jpg",
                },
                {
                  name: "Aurobindo Ashram",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "auro_ashram.jpg",
                },
              ],
              reel: {
                song: "'Nenjinile – Uyire'",
                script: [
                  "Shot 1: Street shot with pastel houses",
                  "Shot 2: Rock Beach waves slow-mo",
                  "Shot 3: Calm shot in Ashram or café",
                ],
                caption:
                  "Weekend Treat 🥐 Puducherry – A French kiss to the South. Bonus vibes with pastel skies.",
              },
            },
          ],
        },
        {
          weekend: 5,
          distance: "~590 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Salem",
              number: 9,
              spots: [
                {
                  name: "Yercaud Hills",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "yercaud.jpg",
                },
                {
                  name: "1008 Lingam Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "lingam_temple.jpg",
                },
                {
                  name: "Mettur Dam",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "mettur_dam.jpg",
                },
              ],
              reel: {
                song: "'Kannamma – Kaala'",
                script: [
                  "Shot 1: District board near Yercaud",
                  "Shot 2: Hilltop drive shots",
                  "Shot 3: Dam water flowing + sunset",
                ],
                caption:
                  "District 9 🌄 Salem – Chill air & spicy food. Hills echo stories of Tamil pride.",
              },
            },
            {
              day: 2,
              district: "Namakkal",
              number: 10,
              spots: [
                {
                  name: "Namakkal Anjaneyar Temple (huge Hanuman)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "anjaneyar.jpg",
                },
                {
                  name: "Namakkal Fort",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "namakkal_fort.jpg",
                },
                {
                  name: "Kolli Hills (mini view)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "kolli_hills.jpg",
                },
              ],
              reel: {
                song: "'Ullam Paadum – Komban'",
                script: [
                  "Shot 1: Giant Anjaneyar statue",
                  "Shot 2: Fort drone shot",
                  "Shot 3: Riding around Kolli Ghat roads",
                ],
                caption:
                  "District 10 💪 Namakkal – Strength in stone. Temples that tower and hills that heal.",
              },
            },
          ],
        },
        {
          weekend: 6,
          distance: "~580 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Erode",
              number: 11,
              spots: [
                {
                  name: "Bhavani Sangameshwarar Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "bhavani_temple.jpg",
                },
                {
                  name: "Kodiveri Dam",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "kodiveri.jpg",
                },
                {
                  name: "Vellode Bird Sanctuary",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "vellode.jpg",
                },
              ],
              reel: {
                song: "'Mazhai Kuruvi – Chekka Chivantha Vaanam'",
                script: [
                  "Shot 1: Bhavani river confluence",
                  "Shot 2: Water splash on dam rocks",
                  "Shot 3: Bird flyover slow motion",
                ],
                caption:
                  "District 11 🌿 Erode – Where rivers meet and colors bloom. Nature's vibrant blend!",
              },
            },
            {
              day: 2,
              district: "Tiruppur",
              number: 12,
              spots: [
                {
                  name: "Avinashiappar Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "avinashiappar.jpg",
                },
                {
                  name: "Tiruppur Kumaran Memorial",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "kumaran_memorial.jpg",
                },
                {
                  name: "Textile Showroom Visit",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "textile_showroom.jpg",
                },
              ],
              reel: {
                song: "'Vaadi Vaadi – Pasanga 2'",
                script: [
                  "Shot 1: Tiruppur signage with textile backdrop",
                  "Shot 2: Close-up of stitching machine",
                  "Shot 3: Memorial shot of Kumaran statue",
                ],
                caption:
                  "District 12 👕 Tiruppur – India's T-shirt town. Threads of history stitched with pride.",
              },
            },
          ],
        },
        {
          weekend: 7,
          distance: "~1,050 KM",
          startEnd: "Chennai (Pallikaranai)",
          note: "Longer trip, consider taking Friday night train/bus to Coimbatore and rent a bike/car from there to save time.",
          days: [
            {
              day: 1,
              district: "The Nilgiris (Ooty)",
              number: 13,
              spots: [
                {
                  name: "Ooty Lake (Boating)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "ooty_lake.jpg",
                },
                {
                  name: "Doddabetta Peak",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "doddabetta.jpg",
                },
                {
                  name: "Government Botanical Garden",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "botanical_garden.jpg",
                },
                {
                  name: "Toy Train Snippet",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "toy_train.jpg",
                },
              ],
              reel: {
                song: "'Ennai Vittu – Love Today (OST)'",
                script: [
                  "Shot 1: Ooty district board on winding road",
                  "Shot 2: Drone view from Doddabetta Peak",
                  "Shot 3: Boating & Tea estate reels",
                ],
                caption:
                  "District 13 🍃 The Nilgiris – Mist-kissed peaks, toy trains & tea-scented dreams!",
              },
            },
            {
              day: 2,
              district: "Coimbatore",
              number: 14,
              spots: [
                {
                  name: "Marudhamalai Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "marudhamalai.jpg",
                },
                {
                  name: "Isha Yoga Center (Adiyogi Statue)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "adiyogi.jpg",
                },
                {
                  name: "Siruvani Waterfalls (Optional)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "siruvani.jpg",
                },
              ],
              reel: {
                song: "'Adiyogi Anthem – Sounds of Isha'",
                script: [
                  "Shot 1: Selfie with Coimbatore board",
                  "Shot 2: Walking to Adiyogi Statue",
                  "Shot 3: Prayers at temple",
                ],
                caption:
                  "District 14 🧘‍♂️ Coimbatore – Spiritual soul of the West. Hills, healing & heritage.",
              },
            },
          ],
        },
        {
          weekend: 8,
          distance: "~540 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Dharmapuri",
              number: 15,
              spots: [
                {
                  name: "Hogenakkal Falls (Mini Niagara of India)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "hogenakkal.jpg",
                },
                {
                  name: "Theerthamalai Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "theerthamalai.jpg",
                },
                {
                  name: "Kottai Kovil (Town temple)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "kottai_kovil.jpg",
                },
              ],
              reel: {
                song: "'Suttrum Vizhi – Ghajini'",
                script: [
                  "Shot 1: Boat swirling at Hogenakkal",
                  "Shot 2: Shot of fish fry stall (local taste!)",
                  "Shot 3: River mist effect shot",
                ],
                caption:
                  "District 15 💦 Dharmapuri – Roars of water, warmth of temples & smoky fish fry love!",
              },
            },
            {
              day: 2,
              district: "Krishnagiri",
              number: 16,
              spots: [
                {
                  name: "Krishnagiri Dam",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "krishnagiri_dam.jpg",
                },
                {
                  name: "Rayakottai Fort Trek",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "rayakottai.jpg",
                },
                {
                  name: "Mango Market (if in season!)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "mango_market.jpg",
                },
              ],
              reel: {
                song: "'Mango Song – Vettai'",
                script: [
                  "Shot 1: Holding a mango at Krishnagiri market",
                  "Shot 2: Dam breeze clip",
                  "Shot 3: Fort climb top view",
                ],
                caption:
                  "District 16 🥭 Krishnagiri – Mangoes, forts & breezy breaks. Summer starts here!",
              },
            },
          ],
        },
        {
          weekend: 9,
          distance: "~950 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Madurai",
              number: 17,
              spots: [
                {
                  name: "Meenakshi Amman Temple (Iconic)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "meenakshi.jpg",
                },
                {
                  name: "Thirumalai Nayakar Mahal",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "nayakar_mahal.jpg",
                },
                {
                  name: "Gandhi Memorial Museum",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "gandhi_museum.jpg",
                },
              ],
              reel: {
                song: "'Singa Penne – Bigil'",
                script: [
                  "Shot 1: Grand entrance at Meenakshi Temple",
                  "Shot 2: Walking in colorful corridors",
                  "Shot 3: Night lit temple + city buzz",
                ],
                caption:
                  "District 17 🌺 Madurai – Temple city with soul in every street. Every step echoes centuries.",
              },
            },
            {
              day: 2,
              district: "Theni",
              number: 18,
              spots: [
                {
                  name: "Vaigai Dam (Evening fountain show)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "vaigai_dam.jpg",
                },
                {
                  name: "Suruli Falls",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "suruli_falls.jpg",
                },
                {
                  name: "Megamalai (if early start possible)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "megamalai.jpg",
                },
              ],
              reel: {
                song: "'Aathichudi – TN 07 AL 4777'",
                script: [
                  "Shot 1: Riding through misty roads to Megamalai",
                  "Shot 2: Slow-mo of Suruli Falls",
                  "Shot 3: Vaigai Dam lights at night",
                ],
                caption:
                  "District 18 🍃 Theni – Valleys that breathe mist, falls that sing, and silence that speaks.",
              },
            },
          ],
        },
        {
          weekend: 10,
          distance: "~750 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Dindigul",
              number: 19,
              spots: [
                {
                  name: "Dindigul Fort (Sunset view)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "dindigul_fort.jpg",
                },
                {
                  name: "Sirumalai Hills",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "sirumalai.jpg",
                },
                {
                  name: "Lock & Key Market (Unique!)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "lock_market.jpg",
                },
              ],
              reel: {
                song: "'Ooru Vittu Ooru Vandhu – Karakattakaran'",
                script: [
                  "Shot 1: Climbing fort steps",
                  "Shot 2: Lock & key stalls (macro shots)",
                  "Shot 3: Hills + laughter from locals",
                ],
                caption:
                  "District 19 🔐 Dindigul – Forts that tell tales, keys that unlock tradition. Rustic & proud.",
              },
            },
            {
              day: 2,
              district: "Karur",
              number: 20,
              spots: [
                {
                  name: "Pasupathieswarar Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "pasupathieswarar.jpg",
                },
                {
                  name: "Amaravathi River Banks",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "amaravathi.jpg",
                },
                {
                  name: "Handloom Textile Showroom visit",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "handloom.jpg",
                },
              ],
              reel: {
                song: "'Vinnaithaandi Varuvaaya BGM – AR Rahman'",
                script: [
                  "Shot 1: Temple tower framed with clouds",
                  "Shot 2: Riverside calm – feet in water shot",
                  "Shot 3: Handloom closeup reel (threads in motion)",
                ],
                caption:
                  "District 20 🧶 Karur – Where threads dance and rivers breathe. A quiet charm that lingers.",
              },
            },
          ],
        },
        {
          weekend: 11,
          distance: "~650 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Tiruchirappalli",
              number: 21,
              spots: [
                {
                  name: "Rockfort Temple (Uchipillayar)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "rockfort.jpg",
                },
                {
                  name: "Srirangam Ranganathaswamy Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "srirangam.jpg",
                },
                {
                  name: "Kallanai Dam (Grand Anicut)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "kallanai.jpg",
                },
              ],
              reel: {
                song: "'Ullam Paadum – Pithamagan'",
                script: [
                  "Shot 1: Aerial pan of Rockfort Temple steps",
                  "Shot 2: Temple corridor slow-motion walk",
                  "Shot 3: Sunset at Kallanai Dam",
                ],
                caption:
                  "District 21 🪨 Trichy – Stones carved with stories, devotion flowing with the river.",
              },
            },
            {
              day: 2,
              district: "Ariyalur",
              number: 22,
              spots: [
                {
                  name: "Gangaikonda Cholapuram Temple (UNESCO Heritage)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "gangai_konda.jpg",
                },
                {
                  name: "Fossil Museum",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "fossil_museum.jpg",
                },
                {
                  name: "Local lime stone fields",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "limestone.jpg",
                },
              ],
              reel: {
                song: "'Sandhana Thendral – Kizhakku Vasal'",
                script: [
                  "Shot 1: Temple gopuram rising into the sky",
                  "Shot 2: Zoom into dinosaur fossil display",
                  "Shot 3: Limestone workers (optional local feature)",
                ],
                caption:
                  "District 22 🦴 Ariyalur – Where history's buried beneath stones & kings ruled with grace.",
              },
            },
          ],
        },
        {
          weekend: 12,
          distance: "~580 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Perambalur",
              number: 23,
              spots: [
                {
                  name: "Ranjankudi Fort",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "ranjankudi.jpg",
                },
                {
                  name: "Elambalur Hills viewpoint",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "elambalur.jpg",
                },
                {
                  name: "Murugan Temple (Siruvachur)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "siruvachur.jpg",
                },
              ],
              reel: {
                song: "'Kandangi Kandangi – Jilla'",
                script: [
                  "Shot 1: Fort walking scene",
                  "Shot 2: Slow pan of green hill trails",
                  "Shot 3: Temple bell ring",
                ],
                caption:
                  "District 23 🏰 Perambalur – Quiet hills, forts forgotten, yet standing strong.",
              },
            },
            {
              day: 2,
              district: "Pudukkottai",
              number: 24,
              spots: [
                {
                  name: "Sittanavasal Cave Paintings",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "sittanavasal.jpg",
                },
                {
                  name: "Thirumayam Fort",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "thirumayam.jpg",
                },
                {
                  name: "Avudaiyar Koil",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "avudaiyar.jpg",
                },
              ],
              reel: {
                song: "'Theeratha Vilayattu Pillai – Azhagiya Tamil Magan'",
                script: [
                  "Shot 1: Close-up of ancient cave art",
                  "Shot 2: Fort drone shot",
                  "Shot 3: Temple arch with early morning mist",
                ],
                caption:
                  "District 24 🎨 Pudukkottai – Where walls whisper art and forts preserve silence.",
              },
            },
          ],
        },
        {
          weekend: 13,
          distance: "~500 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Cuddalore",
              number: 25,
              spots: [
                {
                  name: "Silver Beach (Morning sunrise)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "silver_beach2.jpg",
                },
                {
                  name: "Pichavaram Mangrove Forest (Boating)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "pichavaram2.jpg",
                },
                {
                  name: "Pataleeswarar Temple (Cuddalore OT)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "pataleeswarar.jpg",
                },
              ],
              reel: {
                song: "'Neela Vaanam – Neethaane En Ponvasantham'",
                script: [
                  "Shot 1: Sunrise walk on Silver Beach",
                  "Shot 2: Drone/boat shot through mangroves",
                  "Shot 3: Temple gopuram with calm music",
                ],
                caption:
                  "District 25 🌊 Cuddalore – Salt in the breeze, mystery in the mangroves, and serenity in every frame.",
              },
            },
            {
              day: 2,
              district: "Villupuram",
              number: 26,
              spots: [
                {
                  name: "Gingee Fort (Climb!)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "gingee_fort2.jpg",
                },
                {
                  name: "Auroville (Matri Mandir)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "matri_mandir.jpg",
                },
                {
                  name: "Mailam Murugan Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "mailam_murugan2.jpg",
                },
              ],
              reel: {
                song: "'Uyirin Uyire – Kaakha Kaakha'",
                script: [
                  "Shot 1: Hiking up Gingee Fort",
                  "Shot 2: Auroville Golden Dome from a distance",
                  "Shot 3: Drone spin at the fort viewpoint",
                ],
                caption:
                  "District 26 🏯 Villupuram – Forts that breathe courage, domes that beam peace. A land of contrast.",
              },
            },
          ],
        },
        {
          weekend: 14,
          distance: "~550 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Tiruvannamalai",
              number: 27,
              spots: [
                {
                  name: "Arunachaleswarar Temple (Main)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "arunachaleswarar2.jpg",
                },
                {
                  name: "Girivalam Path (Night Walk or Cycle)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "girivalam2.jpg",
                },
                {
                  name: "Skandashram & Virupaksha Caves (Spiritual vibe)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "skandashram.jpg",
                },
              ],
              reel: {
                song: "'Om Namah Shivaya Chant fusion or Yaar Azhaippadhu – Easan'",
                script: [
                  "Shot 1: Temple tower from below",
                  "Shot 2: Walking the Girivalam path with chants",
                  "Shot 3: Sunrise meditation clip on the hill",
                ],
                caption:
                  "District 27 🔥 Tiruvannamalai – Where faith walks miles and silence is sacred. The fire of devotion burns bright.",
              },
            },
            {
              day: 2,
              district: "Vellore",
              number: 28,
              spots: [
                {
                  name: "Vellore Fort & Jalakanteswarar Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "vellore_fort2.jpg",
                },
                {
                  name: "Golden Temple, Sripuram",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "golden_temple2.jpg",
                },
                {
                  name: "Amirthi Zoological Park (optional)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "amirthi_zoo2.jpg",
                },
              ],
              reel: {
                song: "'Kannamma – Kaala'",
                script: [
                  "Shot 1: Top view of Vellore Fort moat",
                  "Shot 2: Golden Temple glow in the evening",
                  "Shot 3: Temple bell slow ring",
                ],
                caption:
                  "District 28 🛡️ Vellore – Where gold glitters with grace and the fort still watches history unfold.",
              },
            },
          ],
        },
        {
          weekend: 15,
          distance: "~630 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Salem",
              number: 29,
              spots: [
                {
                  name: "Yercaud Hills (Lake, Pagoda Point, 32-km loop road)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "yercaud2.jpg",
                },
                {
                  name: "Kottai Mariamman Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "kottai_mariamman.jpg",
                },
                {
                  name: "Mettur Dam (optional, long ride)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "mettur_dam2.jpg",
                },
              ],
              reel: {
                song: "'Chinna Chinna Vanna Kuyil – Mouna Ragam'",
                script: [
                  "Shot 1: Bike/drive clip on the 32-km loop",
                  "Shot 2: View from Pagoda Point",
                  "Shot 3: Boating on Yercaud Lake",
                ],
                caption:
                  "District 29 🌄 Salem – Chill winds, coffee scent, and curves that lead to calm. Yercaud heals the city soul.",
              },
            },
            {
              day: 2,
              district: "Namakkal",
              number: 30,
              spots: [
                {
                  name: "Namakkal Anjaneyar Temple (18-ft tall)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "anjaneyar2.jpg",
                },
                {
                  name: "Namakkal Fort (on a rock)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "namakkal_fort2.jpg",
                },
                {
                  name: "Kolli Hills (Hairpin bends – optional if extra day)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "kolli_hills2.jpg",
                },
              ],
              reel: {
                song: "'Karu Karu Vizhigalal – Pachai Kili Muthucharam'",
                script: [
                  "Shot 1: Walking toward the giant Hanuman statue",
                  "Shot 2: Fort view from the ground",
                  "Shot 3: Bike ride on Kolli bends (if included)",
                ],
                caption:
                  "District 30 🙏 Namakkal – Forts on rocks, gods in grandeur. Peace with a warrior's heart.",
              },
            },
          ],
        },
        {
          weekend: 16,
          distance: "~580 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Krishnagiri",
              number: 31,
              spots: [
                {
                  name: "Krishnagiri Dam",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "krishnagiri_dam2.jpg",
                },
                {
                  name: "Rayakottai Fort Trek",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "rayakottai2.jpg",
                },
                {
                  name: "Government Museum",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "govt_museum.jpg",
                },
              ],
              reel: {
                song: "'Vaa Machi Vaa – Kumki'",
                script: [
                  "Shot 1: Trekking Rayakottai sunrise",
                  "Shot 2: Dam reservoir from the bridge",
                  "Shot 3: Museum artifacts",
                ],
                caption:
                  "District 31 🏞️ Krishnagiri – Quiet hills, calm waters, and a trek into Tamil history's lesser-known lanes.",
              },
            },
            {
              day: 2,
              district: "Dharmapuri",
              number: 32,
              spots: [
                {
                  name: "Hogenakkal Falls (main!)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "hogenakkal2.jpg",
                },
                {
                  name: "Theerthamalai Temple (hilltop)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "theerthamalai2.jpg",
                },
                {
                  name: "Adhiyaman Fort",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "adhiyaman.jpg",
                },
              ],
              reel: {
                song: "'Hogenakkal Song – Ethir Neechal (instrumental mix with water sounds)'",
                script: [
                  "Shot 1: Boatman pushing through the falls",
                  "Shot 2: Waterfall close-up splash",
                  "Shot 3: Temple steps climb",
                ],
                caption:
                  "District 32 💦 Dharmapuri – Where the river roars, the wind sings, and stone stairs lead to the divine.",
              },
            },
          ],
        },
        {
          weekend: 17,
          distance: "~630 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Karur",
              number: 33,
              spots: [
                {
                  name: "Pasupatheeswarar Temple (ancient Shiva temple)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "pasupathieswarar2.jpg",
                },
                {
                  name: "Kalyana Venkataramana Swamy Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "venkataramana.jpg",
                },
                {
                  name: "Amaravathi River View Point",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "amaravathi2.jpg",
                },
              ],
              reel: {
                song: "'Pachai Nirame – Alaipayuthey'",
                script: [
                  "Shot 1: Temple corridor with soft lighting",
                  "Shot 2: Close-up of idols and lamps",
                  "Shot 3: River breeze with flowing cloth/camera pan",
                ],
                caption:
                  "District 33 🌿 Karur – Sacred stones, sacred silence. A gentle town where rivers pray too.",
              },
            },
            {
              day: 2,
              district: "Erode",
              number: 34,
              spots: [
                {
                  name: "Bhavani Sangameswarar Temple (confluence of rivers)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "bhavani_temple2.jpg",
                },
                {
                  name: "Kodiveri Falls",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "kodiveri2.jpg",
                },
                {
                  name: "Chennimalai Murugan Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "chennimalai.jpg",
                },
              ],
              reel: {
                song: "'Vinnaithaandi Varuvaayaa Title Theme – AR Rahman'",
                script: [
                  "Shot 1: Footsteps near the riverbank",
                  "Shot 2: Temple bell swing",
                  "Shot 3: Waterfall slow motion with wide frame",
                ],
                caption:
                  "District 34 💧 Erode – Where rivers meet, stories flow, and gods smile at the sangam's edge.",
              },
            },
          ],
        },
        {
          weekend: 18,
          distance: "~720 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Dindigul",
              number: 35,
              spots: [
                {
                  name: "Dindigul Fort (hilltop panoramic view)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "dindigul_fort2.jpg",
                },
                {
                  name: "Sirumalai Hills (scenic drive)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "sirumalai2.jpg",
                },
                {
                  name: "Begambur Big Mosque",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "begambur.jpg",
                },
              ],
              reel: {
                song: "'Un Per Solla Aasaithan – Angadi Theru'",
                script: [
                  "Shot 1: View from the fort top",
                  "Shot 2: Riding up Sirumalai hills",
                  "Shot 3: Evening skyline over the fort",
                ],
                caption:
                  "District 35 🏰 Dindigul – Forts that stand strong, hills that whisper secrets, and roads less travelled.",
              },
            },
            {
              day: 2,
              district: "Theni",
              number: 36,
              spots: [
                {
                  name: "Suruli Falls (lush & misty)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "suruli_falls2.jpg",
                },
                {
                  name: "Meghamalai Hills (optional early visit)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "megamalai2.jpg",
                },
                {
                  name: "Vaigai Dam",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "vaigai_dam2.jpg",
                },
              ],
              reel: {
                song: "'Kangal Irandal – Subramaniapuram'",
                script: [
                  "Shot 1: Mist covering Suruli Falls",
                  "Shot 2: Drone/zoom through Meghamalai curves",
                  "Shot 3: Walkway at Vaigai Dam during sunset",
                ],
                caption:
                  "District 36 🌲 Theni – Misty mornings, chilly streams, and curves that cradle the clouds.",
              },
            },
          ],
        },
        {
          weekend: 19,
          distance: "~760 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Tirupathur",
              number: 37,
              spots: [
                {
                  name: "Yelagiri Hills (beautiful hill station)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "yelagiri.jpg",
                },
                {
                  name: "Jalagamparai Waterfalls",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "jalagamparai.jpg",
                },
                {
                  name: "Vainu Bappu Observatory (optional night stop)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "observatory.jpg",
                },
              ],
              reel: {
                song: "'Pudhiya Manidha – Enthiran (for cosmic vibes & hills)'",
                script: [
                  "Shot 1: Drone/pan of Yelagiri's hill road",
                  "Shot 2: Waterfall flow & forest vibe",
                  "Shot 3: Observatory stars (if night available)",
                ],
                caption:
                  "District 37 ✨ Tirupathur – Stars above, mist below. Where cosmos and countryside collide.",
              },
            },
            {
              day: 2,
              district: "Madurai",
              number: 38,
              spots: [
                {
                  name: "Meenakshi Amman Temple (must-visit)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "meenakshi2.jpg",
                },
                {
                  name: "Thirumalai Nayakar Mahal",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "nayakar_mahal2.jpg",
                },
                {
                  name: "Alagar Kovil or Pazhamudircholai (Murugan Temple)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "alagar_kovil.jpg",
                },
                {
                  name: "Jigarthanda stall (local treat!)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "jigarthanda.jpg",
                },
              ],
              reel: {
                song: "'Maduraikku Pogadhadi – Azhagiya Tamil Magan'",
                script: [
                  "Shot 1: Entering temple gopuram",
                  "Shot 2: Walking barefoot through the corridor",
                  "Shot 3: Drinking Jigarthanda in the street",
                ],
                caption:
                  "District 38 🌸 Madurai – The heartbeat of Tamil Nadu. A divine finale in the city of jasmine, gods, and stories.",
              },
            },
          ],
        },
        {
          weekend: 20,
          distance: "~900 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Ramanathapuram",
              number: 39,
              spots: [
                {
                  name: "Rameswaram (Ramanathaswamy Temple)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "rameswaram.jpg",
                },
                {
                  name: "Dhanushkodi (Ruins & beach)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "dhanushkodi.jpg",
                },
                {
                  name: "Pamban Bridge",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "pamban.jpg",
                },
              ],
              reel: {
                song: "'Naan Thaan Ungappanda – VIP 2'",
                script: [
                  "Shot 1: Crossing Pamban Bridge (slow pan)",
                  "Shot 2: Beach breeze and ruins in Dhanushkodi",
                  "Shot 3: Sand print walking to temple gate",
                ],
                caption:
                  "District 39 🌊 Ramanathapuram – Touch the sea where history sank, and gods still whisper from the waves.",
              },
            },
            {
              day: 2,
              district: "Sivaganga",
              number: 40,
              spots: [
                {
                  name: "Chettinad Mansions (Karaikudi)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "chettinad.jpg",
                },
                {
                  name: "Pillayarpatti Karpaga Vinayakar Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "karpaga_vinayakar.jpg",
                },
                {
                  name: "Chettinad Palace architecture walk",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "chettinad_palace.jpg",
                },
              ],
              reel: {
                song: "'Anbil Avan – Vinnaithaandi Varuvaayaa'",
                script: [
                  "Shot 1: Antique doors and mansion corridors",
                  "Shot 2: Vinayakar close-up with bells ringing",
                  "Shot 3: Walking through narrow Chettinad street",
                ],
                caption:
                  "District 40 🏛️ Sivaganga – Where tiles tell tales and old wood remembers glory.",
              },
            },
          ],
        },
        {
          weekend: 21,
          distance: "~950 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Virudhunagar",
              number: 41,
              spots: [
                {
                  name: "Ayyanar Falls",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "ayyanar.jpg",
                },
                {
                  name: "Srivilliputhur Andal Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "andal_temple.jpg",
                },
                {
                  name: "Virudhunagar Clock Tower Market",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "clock_tower.jpg",
                },
              ],
              reel: {
                song: "'Ayyayo Nenju – Paruthiveeran'",
                script: [
                  "Shot 1: Andal temple gopuram sunrise",
                  "Shot 2: Splash at Ayyanar falls",
                  "Shot 3: Local market buzz in slow motion",
                ],
                caption:
                  "District 41 💐 Virudhunagar – From temples to towers, taste the divine in every detail.",
              },
            },
            {
              day: 2,
              district: "Tenkasi",
              number: 42,
              spots: [
                {
                  name: "Courtallam Waterfalls",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "courtallam.jpg",
                },
                {
                  name: "Kasi Viswanathar Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "kasi_viswanathar.jpg",
                },
                {
                  name: "Five Falls & Herbal Bath stalls",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "five_falls.jpg",
                },
              ],
              reel: {
                song: "'Thuli Thuli – Paiyaa'",
                script: [
                  "Shot 1: Waterfalls in slow-motion",
                  "Shot 2: Herbal bath vibe + crowd cheer",
                  "Shot 3: Temple gopuram + falling droplets frame",
                ],
                caption:
                  "District 42 💧 Tenkasi – A temple town soaked in waterfalls and cool mist.",
              },
            },
          ],
        },
        {
          weekend: 22,
          distance: "~1100 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Kanniyakumari",
              number: 43,
              spots: [
                {
                  name: "Vivekananda Rock Memorial",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "vivekananda_rock.jpg",
                },
                {
                  name: "Thiruvalluvar Statue",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "thiruvalluvar.jpg",
                },
                {
                  name: "Kanyakumari Sunset & Sunrise point",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "sunset_point.jpg",
                },
              ],
              reel: {
                song: "'Uyire Uyire – Bombay'",
                script: [
                  "Shot 1: Sunrise timelapse",
                  "Shot 2: Boat ride to the rock memorial",
                  "Shot 3: Wind blowing scarf on sunset deck",
                ],
                caption:
                  "District 43 🌞 Kanniyakumari – Where three oceans bow and the sun writes poetry.",
              },
            },
            {
              day: 2,
              district: "Tirunelveli",
              number: 44,
              spots: [
                {
                  name: "Nellaiappar Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "nellaiappar.jpg",
                },
                {
                  name: "Papanasam Dam",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "papanasam.jpg",
                },
                {
                  name: "Tirunelveli Halwa stall",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "halwa.jpg",
                },
              ],
              reel: {
                song: "'Munbe Vaa – Sillunu Oru Kaadhal'",
                script: [
                  "Shot 1: Temple elephant blessing",
                  "Shot 2: Papanasam water view",
                  "Shot 3: Street halwa being poured fresh",
                ],
                caption:
                  "District 44 🍬 Tirunelveli – Divine vibes, sweet stories & waters that cleanse the soul.",
              },
            },
          ],
        },
        {
          weekend: 23,
          distance: "~1150 KM",
          startEnd: "Chennai (Pallikaranai)",
          days: [
            {
              day: 1,
              district: "Thoothukudi",
              number: 45,
              spots: [
                {
                  name: "Our Lady of Snows Basilica",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "snows_basilica.jpg",
                },
                {
                  name: "Beach Walk & Harbor",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "tuticorin_harbor.jpg",
                },
                {
                  name: "Pearl Culturing Site (if accessible)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "pearl_culture.jpg",
                },
              ],
              reel: {
                song: "'Oru Naalil – Pudhupettai'",
                script: [
                  "Shot 1: Church front shot with seagulls",
                  "Shot 2: Walking along Tuticorin harbor",
                  "Shot 3: Pearls in hand or beach shells",
                ],
                caption:
                  "District 45 ⚓ Thoothukudi – Salt, sea & soul. A breeze full of blessings and pearls of pride.",
              },
            },
            {
              day: 2,
              district: "Ariyalur & Mayiladuthurai",
              number: 46,
              spots: [
                {
                  name: "Gangaikonda Cholapuram Temple (UNESCO site)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "gangai_konda2.jpg",
                },
                {
                  name: "Fossil Museum",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "fossil_museum2.jpg",
                },
                {
                  name: "Kila Pazhuvur Temples",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "pazhuvur.jpg",
                },
                {
                  name: "Mayuranathaswami Temple",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "mayuranathaswami.jpg",
                },
                {
                  name: "Thirukkadaiyur Temple (for longevity rituals)",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "thirukkadaiyur.jpg",
                },
                {
                  name: "Kaveri riverside stroll",
                  location: "https://goo.gl/maps/XYzW9J8PqyF2XQYy8",
                  image: "kaveri_riverside.jpg",
                },
              ],
              reel: {
                song: "'Kaatre En Vaasal – Rhythm'",
                script: [
                  "Shot 1: Temple ritual frame",
                  "Shot 2: Flower market by the temple",
                  "Shot 3: Evening Kaveri walk",
                ],
                caption:
                  "District 46-47 🌿 Mayiladuthurai – Walk with grace where gods bless life's length and love's journey.",
              },
            },
          ],
        },
      ];

      // Initialize the app
      document.addEventListener("DOMContentLoaded", function () {
        renderWeekendTabs();
        renderWeekendContainers();
        updateProgress();

        // Set first weekend as active by default
        if (tripData.length > 0) {
          document.querySelector(".weekend-tab").classList.add("active");
          document.querySelector(".weekend-container").classList.add("active");
        }

        // Setup image modal
        setupImageModal();
      });

      function renderWeekendTabs() {
        const weekendSelector = document.getElementById("weekend-selector");

        tripData.forEach((weekend, index) => {
          const tab = document.createElement("div");
          tab.className = "weekend-tab";
          tab.textContent = `Weekend ${weekend.weekend}`;
          tab.dataset.weekend = weekend.weekend;

          tab.addEventListener("click", function () {
            // Remove active class from all tabs
            document.querySelectorAll(".weekend-tab").forEach((t) => {
              t.classList.remove("active");
            });

            // Add active class to clicked tab
            this.classList.add("active");

            // Hide all weekend containers
            document.querySelectorAll(".weekend-container").forEach((c) => {
              c.classList.remove("active");
            });

            // Show the selected weekend container
            document
              .getElementById(`weekend-${this.dataset.weekend}`)
              .classList.add("active");
          });

          weekendSelector.appendChild(tab);
        });
      }

      function renderWeekendContainers() {
        const containers = document.getElementById("weekend-containers");

        tripData.forEach((weekend) => {
          const container = document.createElement("div");
          container.className = "weekend-container";
          container.id = `weekend-${weekend.weekend}`;

          // Weekend header
          const header = document.createElement("div");
          header.className = "weekend-header";
          header.innerHTML = `
                    <h2>Weekend ${weekend.weekend} Road Trip</h2>
                    <div class="weekend-meta">
                        <div class="meta-item"><i class="fas fa-road"></i> Distance: ${weekend.distance}</div>
                        <div class="meta-item"><i class="fas fa-map-marker-alt"></i> Start/End: ${weekend.startEnd}</div>
                    </div>
                `;
          container.appendChild(header);

          // Days container
          const daysContainer = document.createElement("div");
          daysContainer.className = "days-container";

          weekend.days.forEach((day) => {
            const dayCard = document.createElement("div");
            dayCard.className = "day-card";

            // Day header
            const dayHeader = document.createElement("div");
            dayHeader.className = "day-header";
            dayHeader.innerHTML = `
                        <h3>Day ${day.day} – ${day.district} District</h3>
                        <div class="district-number">${day.number}</div>
                    `;
            dayCard.appendChild(dayHeader);

            // Day content
            const dayContent = document.createElement("div");
            dayContent.className = "day-content";

            // Places to visit
            const placesTitle = document.createElement("h4");
            placesTitle.textContent = "📍 Top Spots:";
            dayContent.appendChild(placesTitle);

            const placesList = document.createElement("div");
            placesList.className = "places-list";

            day.spots.forEach((spot) => {
              const placeItem = document.createElement("div");
              placeItem.className = "place-item";
              placeItem.innerHTML = `
                            <div class="place-icon"><i class="fas fa-map-pin"></i></div>
                            <div class="place-details">
                                <div class="place-name">${spot.name}</div>
                                <div class="place-location">
                                    <i class="fas fa-location-dot"></i>
                                    <a href="${spot.location}" target="_blank">View on Map</a>
                                </div>
                            </div>
                        `;
              placesList.appendChild(placeItem);
            });

            dayContent.appendChild(placesList);

            // Instagram Reel Plan
            const reelPlan = document.createElement("div");
            reelPlan.className = "reel-plan";
            reelPlan.innerHTML = `
                        <h3><i class="fas fa-video"></i> Instagram Reel Plan</h3>
                        <div class="reel-details">
                            <div class="reel-section">
                                <h4>Song</h4>
                                <p>${day.reel.song}</p>
                            </div>
                            <div class="reel-section">
                                <h4>Script</h4>
                                <ul class="shot-list">
                                    ${day.reel.script
                                      .map((shot) => `<li>${shot}</li>`)
                                      .join("")}
                                </ul>
                            </div>
                        </div>
                        <div class="caption-box">
                            <h4>Caption</h4>
                            <p>${day.reel.caption}</p>
                        </div>
                    `;
            dayContent.appendChild(reelPlan);

            // Image gallery
            const galleryTitle = document.createElement("h4");
            galleryTitle.textContent = "📷 Photo Spots:";
            dayContent.appendChild(galleryTitle);

            const gallery = document.createElement("div");
            gallery.className = "image-gallery";

            day.spots.forEach((spot) => {
              const galleryItem = document.createElement("div");
              galleryItem.className = "gallery-item";
              galleryItem.innerHTML = `
                            <img src="${spot.image}" alt="${spot.name}">
                            <div class="gallery-caption">${spot.name}</div>
                        `;
              gallery.appendChild(galleryItem);
            });

            dayContent.appendChild(gallery);
            dayCard.appendChild(dayContent);
            daysContainer.appendChild(dayCard);
          });

          container.appendChild(daysContainer);
          containers.appendChild(container);
        });
      }

      function updateProgress() {
        // In a real app, this would track user's actual progress
        // For this demo, we'll simulate some progress
        const completedCount = 0; // Change this to simulate progress
        const totalDistricts = 47;

        document.getElementById("completed-count").textContent = completedCount;
        const progressPercent = (completedCount / totalDistricts) * 100;
        document.getElementById(
          "progress-bar"
        ).style.width = `${progressPercent}%`;

        // Show completion banner if all districts are completed
        if (completedCount >= totalDistricts) {
          document.getElementById("completion-banner").style.display = "block";
        }
      }

      function setupImageModal() {
        const modal = document.getElementById("image-modal");
        const modalImg = document.getElementById("modal-image");
        const closeModal = document.querySelector(".close-modal");

        // When any gallery image is clicked
        document.addEventListener("click", function (e) {
          if (
            e.target.classList.contains("gallery-item") ||
            e.target.closest(".gallery-item")
          ) {
            const imgSrc =
              e.target.querySelector("img")?.src ||
              e.target.closest(".gallery-item").querySelector("img").src;
            modal.style.display = "flex";
            modalImg.src = imgSrc;
          }
        });

        // When the close button is clicked
        closeModal.addEventListener("click", function () {
          modal.style.display = "none";
        });

        // When clicking outside the image
        modal.addEventListener("click", function (e) {
          if (e.target === modal) {
            modal.style.display = "none";
          }
        });
      }
    </script>
  </body>
</html>

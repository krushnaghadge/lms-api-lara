<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>MyStay.in - Coming Soon</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #fff;
      color: #000;
    }

    /* ===== Header ===== */
    header {
      width: 100%;
      padding: 20px 40px;
      background-color: #fff;
      border-bottom: 1px solid #eee;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .logo {
      font-size: 1.8rem;
      font-weight: 700;
      color: #ff5a3c;
    }

    nav a {
      text-decoration: none;
      color: #000;
      margin-left: 30px;
      font-weight: 500;
      transition: 0.3s;
    }

    nav a:hover {
      color: #ff5a3c;
    }

    /* ===== Main ===== */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 40px 20px;
      text-align: center;
    }

    .headline {
      font-size: 2.8rem;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .headline span {
      color: #ff5a3c;
    }

    .subtext {
      font-size: 1.1rem;
      color: #444;
      margin-bottom: 30px;
    }

    .coming-soon {
      background-color: #fff0ec;
      color: #ff5a3c;
      padding: 10px 18px;
      border-radius: 8px;
      font-weight: 500;
      display: inline-block;
      margin-bottom: 30px;
    }

    /* ===== Search Box (Advanced) ===== */
    .advanced-search-box {
      max-width: 800px;
      margin: 30px auto;
      display: flex;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 5px rgba(0,0,0,0.03);
    }

    .city-dropdown {
      padding: 14px 16px;
      border: none;
      background: #fff;
      font-size: 1rem;
      color: #333;
      min-width: 150px;
      border-right: 1px solid #e0e0e0;
      appearance: none;
      background-image: url('data:image/svg+xml;utf8,<svg fill="gray" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>');
      background-repeat: no-repeat;
      background-position: right 10px center;
      background-size: 16px;
    }

    .advanced-search-box input {
      flex: 1;
      padding: 14px;
      font-size: 1rem;
      border: none;
      outline: none;
      color: #333;
    }

    .search-btn {
      background-color: #ff5a3c;
      color: white;
      border: none;
      padding: 0 24px;
      font-size: 1rem;
      cursor: pointer;
      white-space: nowrap;
      display: flex;
      align-items: center;
      transition: background 0.3s;
    }

    .search-btn:hover {
      background-color: #e94a2d;
    }

    /* ===== City Cards ===== */
    .cities {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 16px;
      margin-top: 30px;
    }

    .city-card {
      border: 1px solid #eee;
      border-radius: 8px;
      padding: 20px;
      min-width: 120px;
      text-align: center;
      transition: 0.3s;
      cursor: pointer;
    }

    .city-card:hover {
      border-color: #ff5a3c;
      color: #ff5a3c;
    }

    /* ===== Subscribe Section ===== */
    .subscribe {
      margin-top: 50px;
      text-align: center;
    }

    .subscribe input {
      padding: 12px;
      width: 250px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-right: 10px;
      font-size: 1rem;
    }

    .subscribe button {
      background-color: #ff5a3c;
      color: white;
      border: none;
      padding: 12px 18px;
      font-size: 1rem;
      border-radius: 6px;
      cursor: pointer;
    }

    /* ===== Footer ===== */
    footer {
      background-color: #f8f8f8;
      padding: 30px 20px;
      text-align: center;
      margin-top: 60px;
      border-top: 1px solid #eee;
      font-size: 0.9rem;
      color: #555;
    }

    footer a {
      color: #ff5a3c;
      text-decoration: none;
      margin: 0 10px;
    }

    /* ===== Responsive ===== */
    @media (max-width: 768px) {
      header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }

      nav a {
        margin-left: 0;
        margin-right: 20px;
      }

      .headline {
        font-size: 2rem;
      }

      .advanced-search-box {
        flex-direction: column;
      }

      .city-dropdown {
        width: 100%;
        border-right: none;
        border-bottom: 1px solid #e0e0e0;
        background-position: right 10px center;
      }

      .search-btn {
        width: 100%;
        justify-content: center;
        padding: 14px;
      }

      .subscribe input {
        width: 100%;
        margin-bottom: 10px;
      }

      .subscribe button {
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <div class="logo">MyStay.in</div>
    <nav>
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
    </nav>
  </header>

  <!-- Main -->
  <div class="container">
    <div class="headline">Your Stay. <span>Your Way.</span></div>
    <div class="subtext">Hostels and PGs for students & working professionals</div>
    <div class="coming-soon">We’re Coming Soon</div>

    <!-- City + Location Search -->
    <div class="advanced-search-box">
      <select class="city-dropdown">
        <option value="gurgaon">Gurgaon</option>
        <option value="delhi">Delhi</option>
        <option value="mumbai">Mumbai</option>
        <option value="pune">Pune</option>
        <option value="bangalore">Bangalore</option>
        <option value="chennai">Chennai</option>
        <option value="hyderabad">Hyderabad</option>
      </select>

      <input type="text" placeholder="Search upto 3 localities or landmarks" />

      <button class="search-btn">
        🔍 Search
      </button>
    </div>

    <!-- City Cards -->
    <div class="cities">
      <div class="city-card">Pune</div>
      <div class="city-card">Bangalore</div>
      <div class="city-card">Chennai</div>
      <div class="city-card">Coimbatore</div>
      <div class="city-card">Hyderabad</div>
      <div class="city-card">Noida</div>
      <div class="city-card">Delhi</div>
      <div class="city-card">Mumbai</div>
    </div>

    <!-- Subscribe -->
    <div class="subscribe">
      <p><strong>Get early access:</strong></p>
      <input type="email" placeholder="Enter your email" />
      <button>Notify Me</button>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    &copy; 2025 MyStay.in &nbsp;|&nbsp;
    <a href="#">Privacy Policy</a> |
    <a href="#">Terms</a> |
    <a href="#">Support</a>
  </footer>
</body>
</html>

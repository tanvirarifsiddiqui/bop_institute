<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        h1 {
            font-size: 3.5rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 40px;
        }
        .countdown {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
        }
        .countdown div {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            width: 100px;
        }
        .countdown span {
            display: block;
            font-size: 2rem;
            font-weight: 600;
        }
        .countdown small {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }
        .subscribe-form {
            max-width: 500px;
            margin: 0 auto;
        }
        .subscribe-form input {
            padding: 12px;
            border: none;
            border-radius: 5px;
            width: 70%;
            margin-right: 10px;
        }
        .subscribe-form button {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            background: #ff6b6b;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .subscribe-form button:hover {
            background: #ff4757;
        }
        .social-links {
            margin-top: 40px;
        }
        .social-links a {
            color: #fff;
            margin: 0 10px;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }
        .social-links a:hover {
            color: #ff6b6b;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Coming Soon!</h1>
    <p>We're working hard to bring you something amazing. Stay tuned!</p>

    <!-- Countdown Timer -->
    <div class="countdown">
        <div>
            <span id="days">00</span>
            <small>Days</small>
        </div>
        <div>
            <span id="hours">00</span>
            <small>Hours</small>
        </div>
        <div>
            <span id="minutes">00</span>
            <small>Minutes</small>
        </div>
        <div>
            <span id="seconds">00</span>
            <small>Seconds</small>
        </div>
    </div>

{{--    <!-- Subscription Form -->--}}
{{--    <form class="subscribe-form">--}}
{{--        <input type="email" placeholder="Enter your email to get notified" required>--}}
{{--        <button type="submit">Notify Me</button>--}}
{{--    </form>--}}

    <!-- Social Links -->
    <div class="social-links">
        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
    </div>
</div>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- Countdown Timer Script -->
<script>
    const countdown = () => {
        const targetDate = new Date('2025-04-01T00:00:00').getTime(); // Set your launch date here
        const now = new Date().getTime();
        const timeLeft = targetDate - now;

        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        document.getElementById('days').innerText = days < 10 ? `0${days}` : days;
        document.getElementById('hours').innerText = hours < 10 ? `0${hours}` : hours;
        document.getElementById('minutes').innerText = minutes < 10 ? `0${minutes}` : minutes;
        document.getElementById('seconds').innerText = seconds < 10 ? `0${seconds}` : seconds;
    };

    setInterval(countdown, 1000);
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        /* Reset some default styles */
        body,
        h1,
        p,
        a {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .container {
            text-align: center;
        }

        .error-content {
            background: white;
            padding: 40px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .error-content h1 {
            font-size: 6em;
            color: #ff6b6b;
        }

        .error-content p {
            font-size: 1.2em;
            color: #333;
            margin: 20px 0;
        }

        .home-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: #ff6b6b;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #ff3b3b;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .error-content {
                padding: 20px 10px;
            }

            .error-content h1 {
                font-size: 4em;
            }

            .error-content p {
                font-size: 1em;
            }

            .home-button {
                padding: 8px 16px;
                font-size: 0.9em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="error-content">
            <h1>404</h1>
            <p>Oops! The page you are looking for does not exist.</p>
            <a href="/" class="home-button">Go Home</a>
        </div>
    </div>
    <script>
        // Optional: Add some dynamic effect if needed
        document.addEventListener('DOMContentLoaded', () => {
            const homeButton = document.querySelector('.home-button');
            homeButton.addEventListener('mouseenter', () => {
                homeButton.style.transform = 'scale(1.1)';
            });
            homeButton.addEventListener('mouseleave', () => {
                homeButton.style.transform = 'scale(1)';
            });
        });

    </script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"e7b4b7d5c0424bbc8938772f49cd2972","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>

</html>
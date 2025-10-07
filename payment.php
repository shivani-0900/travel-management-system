<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="download.png">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            background: url('pay.jpg') no-repeat center center fixed; /* Add your background image here */
            background-size: cover; /* Ensures the background image covers the entire page */
        }

        .travel-content {
    position: relative;
    left: 0;
    width: 40%;
    height: 100%;
    color: red;
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    transition: transform 0.5s, opacity 0.5s;
    font-family: 'Montserrat', sans-serif; /* Font style */
}

.travel-content:hover {
    color: blue; /* Change color on hover */
    transform: scale(1.05); /* Scale up on hover */
}



        .travel-content h4 {
            font-size: 24px;
            line-height: 1.5;
            
           
        }

        .card-container {
            position: none;
            top: 0;
            align-items: left;
            transform: translateX(-50%);
            width: 300px;
           
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            opacity: 0;
            transform: translateY(100%);
            transition: transform 0.5s, opacity 0.5s;
            height: auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .card {
            text-align: center;
        }

        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .payment-button {
            text-align: center;
        }

        .payment-button a {
            text-decoration: none;
        }

        .payment-button button {
            background-color: #6064b6;
            color: #fff;
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .payment-button button:hover {
            background-color: #48508f;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="travel-content">
        <h4>Your journey to new and exciting destinations begins now. With your payment successfully processed, you’re one step closer to creating unforgettable memories. Whether you’re exploring bustling cities, relaxing on pristine beaches, or immersing yourself in rich cultural experiences, adventure awaits you. just a click away!</h4>
    </div>

    <div class="card-container">
        <div class="card">
            <h1>Pay using this QR Code</h1>
            <img src="Screenshot (238).png" alt="QR Code">
            <img src="QR_Code.jpg" alt="QR Code">
            
            <div class="payment-button">
                <a href="success.html">
                    <button>Payment done</button>
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cardContainer = document.querySelector(".card-container");
            cardContainer.style.transform = "translateY(0)";
            cardContainer.style.opacity = "1";
        });
    </script>
</body>
</html>

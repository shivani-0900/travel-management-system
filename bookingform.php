<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelscapes";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve hotel details
$hotelId = 1; // Replace with the actual hotel ID
$hotelDetails = [];

// Fetch hotel details from the "hotels" table
$hotelSql = "SELECT * FROM hotels WHERE hotelid = $hotelId";
$hotelResult = $conn->query($hotelSql);

if ($hotelResult->num_rows > 0) {
    $row = $hotelResult->fetch_assoc();
    $hotelDetails['hotelName'] = $row['hotel'];
    $hotelDetails['hotelCost'] = $row['cost'];
    $cityId = $row['cityid'];
}

// Fetch city name from the "cities" table
$cityName = "";

$citySql = "SELECT city FROM cities WHERE cityid = $cityId";
$cityResult = $conn->query($citySql);

if ($cityResult->num_rows > 0) {
    $row = $cityResult->fetch_assoc();
    $cityName = $row['city'];
}

// Define journey days
$journeyDays = 5; // Replace with actual journey days from the database or form

// Calculate initial cost (without tourists and date)
$initialCost = $hotelDetails['hotelCost'] * $journeyDays;

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card-container {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }

        .booking-details, .booking-form {
            margin-bottom: 20px;
        }

        .booking-details h2, .booking-form h2 {
            margin: 0 0 10px;
            color: #333;
        }

        .booking-details p {
            margin: 5px 0;
            color: #555;
        }

        form input, form label {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="number"], form input[type="tel"], form input[type="date"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        form button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        form button:hover {
            background-color: #0056b3;
        }

        p span#calculatedCost {
            font-weight: bold;
            color: #007BFF;
        }
    </style>
    <title>Booking Page</title>
</head>
<body>
    <div class="card-container">
        <div class="booking-details">
            <h2>Booking Details</h2>
            <p>City Name: <?php echo $cityName; ?></p>
            <p>Hotel Name: <?php echo $hotelDetails['hotelName']; ?></p>
        </div>

        <form method="post" action="payment.php">
            <h2>Booking Form</h2>
            <input type="text" name="name" placeholder="Name" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="number" name="tourists" id="touristsInput" placeholder="Number of Tourists" required><br>
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" required><br>
            <input type="tel" name="contact" placeholder="Contact Number" required><br>
            <input type="hidden" name="initialCost" value="<?php echo $initialCost; ?>">
            <input type="hidden" name="journeyDays" value="<?php echo $journeyDays; ?>">
            <input type="hidden" name="hotelName" value="<?php echo $hotelDetails['hotelName']; ?>">
            <input type="hidden" name="cityName" value="<?php echo $cityName; ?>">

            <p>Cost: Rs. <span id="calculatedCost"><?php echo $initialCost; ?></span></p>

            <button type="submit" name="proceed" value="Proceed">Proceed for Payment</button>
        </form>
    </div>

    <script>
        // JavaScript to calculate cost based on tourists
        const touristsInput = document.getElementById("touristsInput");
        const calculatedCost = document.getElementById("calculatedCost");

        // Initial cost fetched from the server
        let initialCost = <?php echo $initialCost; ?>;
        calculatedCost.textContent = initialCost;

        touristsInput.addEventListener("input", calculateCost);

        function calculateCost() {
            const tourists = parseInt(touristsInput.value) || 0;
            const days = <?php echo $journeyDays; ?>;

            const totalCost = initialCost * tourists;
            calculatedCost.textContent = totalCost;
        }
    </script>
</body>
</html>

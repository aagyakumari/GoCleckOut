<?php
// Retrieve email from POST request
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'No email provided';

// If the form is submitted, navigate to home.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    header("Location: ../home.php");
    exit(); // Stop script execution after redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        .verify-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .verify-container h2 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: left;
        }

        .email-label, .code-label {
            font-size: 0.9rem;
            font-weight: 500;
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .resend-btn {
            background: #e0e0e0;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 0.8rem;
            color: #888;
            cursor: not-allowed;
        }

        .submit-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            font-size: 0.9rem;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .resend-btn.active {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .help-text {
            font-size: 0.8rem;
            color: #007bff;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="verify-container">
        <h2>Verify email address</h2>
        <p class="email-label">Email: <strong><?php echo $email; ?></strong></p>

        <label class="code-label">Verification Code:</label>
        <form action="" method="POST">
            <div style="display: flex; gap: 8px;">
                <input type="text" class="form-control" name="verification_code" placeholder="Enter code" required>
                <button type="button" class="resend-btn" id="resend-btn" disabled>Resend (<span id="countdown">34</span>)</button>
            </div>
            
            <p>Check the code sent to your email, please check</p>
            
            <button type="submit" class="submit-btn" name="submit">Submit</button>
        </form>

        <p class="help-text">Need help? Please contact online service</p>
    </div>

    <script>
        // Countdown timer for resend button
        let timeLeft = 34;
        let countdown = document.getElementById('countdown');
        let resendBtn = document.getElementById('resend-btn');

        let timer = setInterval(() => {
            timeLeft--;
            countdown.textContent = timeLeft;
            if (timeLeft === 0) {
                clearInterval(timer);
                resendBtn.disabled = false;
                resendBtn.classList.add("active");
            }
        }, 1000);
    </script>

</body>
</html>

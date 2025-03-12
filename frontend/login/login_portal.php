<?php
    session_start();

    function get_login() {
        return isset($_GET['sign_in']) ? $_GET['sign_in'] === 'true' : null;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background Image Styling */
        .bg-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Keep it behind other content */
        }

        /* Center the form */
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        /* Glassmorphism Effect */
        .auth-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            color: white;
        }

        h2 {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .form-control {
            border-radius: 25px;
            border: none;
            padding: 10px 15px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.3);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .btn {
            width: 100%;
            border-radius: 25px;
            padding: 10px;
            font-size: 1rem;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary {
            background-color: #3B82F6;
            border: none;
        }

        .btn-primary:hover {
            background-color: #2563EB;
        }

        .btn-success {
            background-color: #22C55E;
            border: none;
        }

        .btn-success:hover {
            background-color: #16A34A;
        }

        .small-text {
            font-size: 0.9rem;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Background Image -->
    <img src="/frontend/assets/3417733.jpg" alt="Background Image" class="bg-image">

    <div class="auth-container">
        <?php 
            $login_status = get_login();
            if ($login_status === true): ?>
            <h2>Login</h2>
            <form method="post" action="login_process.php">
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p class="small-text">Don't have an account? <a href="?sign_in=false" style="color: #FFF;">Register</a></p>
        <?php elseif ($login_status === false): ?>
            <h2>Register</h2>
            <form method="post" action="register_process.php">
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-success">Register</button>
            </form>
            <p class="small-text">Already have an account? <a href="?sign_in=true" style="color: #FFF;">Login</a></p>
        <?php else: ?>
            <p class="text-center text-danger">Invalid access. Please use a valid sign_in parameter.</p>
        <?php endif; ?>
    </div>
</body>
</html>

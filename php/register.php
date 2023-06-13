<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];
    $inputConfirmPassword = $_POST['password2'];

    if (empty($inputEmail) || empty($inputPassword) || empty($inputConfirmPassword)) {
        echo "Please fill in all the fields.";
    } else {
        $conn = new mysqli("sql112.infinityfree.com", "if0_34418969", "qc6jxOP6wUrAnqF
            ", "if0_34418969_webphp");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Cek apakah email sudah ada dalam database
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $inputEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<script>alert("Email already exists. Please choose a different email."); window.location.href = "../php/register.php";</script>';
        } else {
            $stmt->close();

            // Cek konfirmasi password
            if ($inputPassword !== $inputConfirmPassword) {
                echo "<script>alert('Confirmation password does not match!'); window.location.href = '../php/register.php';</script>";
            } else {
                $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $inputEmail, $inputPassword);
            
                if ($stmt->execute()) {
                    echo '<script>alert("Registration successful!"); window.location.href = "../php/login.php";</script>';
                    exit;
                } else {
                    echo "Registration failed. Please try again.";
                }
            }
        }

        $stmt->close();
        $conn->close();
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="../css/register.css">
    </head>
    <body>
        <span class="background">
            <span class="background">
                <img
                    src="../images/Music.jpg"
                />
            </span>
        </span>
        <span class="centering">
            <form class="my-form" method="POST" action="register.php">
                <span class="login-welcome-row">
                    <img
                        class="login-welcome"
                        src="../images/Sound.jpg"
                    />
                    <!-- optimize the image in production -->
                    <h1>Register!</h1>
                </span>
                <div class="text-field">
                    <label for="email">Email:</label>
                    <input
                        aria-label="Email"
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Your Email"
                        required
                    >
                    <img
                        alt="Email Icon"
                        title="Email Icon"
                        src="../images/email.svg"
                    >
                </div>
                <div class="text-field">
                    <label for="password">Password:</label>
                    <input
                        id="password"
                        type="password"
                        aria-label="Password"
                        name="password"
                        placeholder="Your Password"
                        title="Minimum 6 characters, at least 1 Alphabet and 1 Number"
                        pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$"
                        required
                    >
                    <img
                        alt="Password Icon"
                        title="Password Icon"
                        src="../images/password.svg"
                    > 
                </div>
                <div class="text-field">
                    <label for="password2">Confirm Password:</label>
                    <input
                        id="password2"
                        type="password"
                        aria-label="Password2"
                        name="password2"
                        placeholder="Confirm Password"
                        title="Minimum 6 characters, at least 1 Alphabet and 1 Number"
                        pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$"
                        required
                    >
                    <img
                        alt="Password Icon"
                        title="Password Icon"
                        src="../images/password.svg"
                    > 
                </div>
                <input type="submit" class="my-form__button" value="Register" />
                <div class="my-form__actions">
                    <div class="my-form__login">
                        <a href="login.php" title="Login">Login</a>
                    </div>
                </div>
            </form>
        </span>
        <script src="register.js"></script>
    </body>
</html>

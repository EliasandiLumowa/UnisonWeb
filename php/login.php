<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $inputEmail = $_POST['email'];
        $inputPassword = $_POST['password'];

        if (empty($inputEmail) || empty($inputPassword)) {
            echo "Please fill in all the fields.";
        } else {
            $conn = new mysqli("sql112.infinityfree.com", "if0_34418969", "qc6jxOP6wUrAnqF", "if0_34418969_webphp");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
            $stmt->bind_param("ss", $inputEmail, $inputPassword);

            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                session_start();
                $_SESSION['email'] = $inputEmail;
                header("Location: ../html/main.html");
                exit;
            } else {
                echo '<script>alert("Invalid Username or Password"); window.location.href = "../php/login.php";</script>';
            }
            if( $password !== $password2 ) {
                echo "<script>
                        alert('konfirmasi password tidak sesuai!');
                    </script>";
                return false;
            }    
    
            $stmt->close();
            $conn->close();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/style1.css">
    </head>
    <body>
        <span class="background">
            <img src="../images/Music.jpg" />
        </span>
        <span class="centering">
            <form class="my-form" method="POST" action="login.php">
                <span class="login-welcome-row">
                    <img class="login-welcome" src="../images/Sound.jpg" />
                    <!-- optimize the image in production -->
                    <h1>Login!</h1>
                </span>
                <div class="text-field">
                    <label for="email">Email:</label>
                    <input
                        aria-label="Email"
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Email"
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
                        placeholder="Password"
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
                <input type="submit" class="my-form__button" value="Login" />
                <div class="my-form__actions">
                    <div class="my-form__signup">
                        <a href="../php/register.php" title="Create Account">Create Account</a>
                    </div>
                </div>
            </form>
        </span>
        <script src="login.js"></script>
    </body>
</html>

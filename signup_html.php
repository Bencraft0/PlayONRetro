<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yummy Donuts Signup</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('images/bg.jpg');
            background-size: cover;
            background-position: center;
        }
        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 90%;
            max-width: 900px;
        }
        .left-side {
            padding: 40px;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .left-side img {
            width: 200px;
            margin-bottom: 40px;
        }
        .left-side p {
            font-size: 14px;
            color: #666;
            text-align: center;
            margin-bottom: 30px;
        }
        .left-side button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 15px;
        }
        .facebook-btn {
            background-color: #4267B2;
            color: white;
        }
        .google-btn {
            background-color: #DB4437;
            color: white;
        }
        .right-side {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right-side h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .right-side input {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .sign-up-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .terms {
            margin-top: 15px;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
        .centro {
            display: flex;
            justify-content: center;
        }
        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
            .left-side, .right-side {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <a href="index.php"><img src="images/logo.png" alt="PlayONRetro"></a> 
            <p><strong>Registrarte</strong></p>
            <button class="facebook-btn">Registrate con Facebook</button>
            <button class="google-btn">Registrate con Google</button>
        </div>
        <div class="right-side">
            <h2>Crea tu usuario!</h2>
            <form action="signup.php" method="post">
                <input type="text" placeholder="Nombre de Usuario" name="name" required>
                <input type="email" placeholder="Direccion de correo" name="email" id="email" required>
                <input type="password" placeholder="Contraseña" name="pass" id="pass" required>
                <input type="password" placeholder="Repita la contraseña" name="confirm_pass" required>
                <div class="centro form-check form-check-inline mb-3">
                    <label class="form-check-label" for="subscribe">
                        <input class="form-check-input" type="checkbox" id="subscribe" name="subscribe" value="1">
                        Suscribirse a PlayONRetro
                    </label>
                </div>
                <button type="submit" class="sign-up-btn">Registrarse</button>
                <a href="terminos.html" class="terms">Terminos y condiciones</a>
            </form>
        </div>
    </div>
</body>
</html>
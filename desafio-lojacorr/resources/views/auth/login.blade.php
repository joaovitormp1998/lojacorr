<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" sizes="32x32" href="https://cdn-jjojn.nitrocdn.com/fMjbTLhZZSRLuaUAUxmEmKYgrFUQWrjA/assets/images/optimized/rev-e67a0d5/redelojacorr.com.br/wp-content/uploads/2023/04/cropped-Favicon-lojacorr-32x32.jpeg">    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #EF3B2D;
            color: white;
        }

        .login-container {
            display: flex;
            width: 80%;
            max-width: 1200px;
            background-color: white;
            color:black;
            border-radius: 8px;
            overflow: hidden;
            /* Para evitar que o conteúdo vaze */
        }

        .form-section {
            padding: 3rem;
            width: 40%;
            text-align: center;
            transition: transform 0.5s ease-in-out; /* Smooth transition */

        }
        .form-section.slide-left {
            transform: translateX(-100%);
        }

        .info-section {
            flex: 1;
            background-color: #EF3B2D;
            color:white;
            padding: 3rem;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            /* Alinha o texto à direita */
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
        }

        .logo-container img {
            max-width: 100px;
            margin-bottom: 0.5rem;
        }

        .sub-title {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button[type="submit"] {
            background-color: #4CAF50;
            /* Cor verde do botão */
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .options {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .options a {
            color: #333;
            /* Cor do texto dos links */
            text-decoration: none;
        }



        .slogan {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: right;
            /* Alinha o texto à direita */
        }
    </style>
</head>

<body>
    <body>
        <div class="login-container">
            <div class="form-section" id="loginSection">
                <div class="logo-container">
                    <img src="https://redelojacorr.com.br/wp-content/uploads/2024/05/3-Lojacorr-colorida-horizontal.png" alt="logomarca">
                    <span class="sub-title">Desafio Full-Stack</span>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Logar</button>
                    </div>
                    <div class="options">
                        <a href="#">Esqueci minha senha</a>
                        <a href="#" id="registerLink">Criar uma nova conta</a>
                    </div>
                </form>
            </div>

            <div class="form-section" id="registerSection" style="display:none;">
                <div class="logo-container">
                    <img src="https://redelojacorr.com.br/wp-content/uploads/2024/05/3-Lojacorr-colorida-horizontal.png" alt="logomarca">
                </div>
                <form method="POST" action="{{ route('register') }}"> @csrf
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">REGISTRAR</button>
                    </div>
                    <div class="options">
                        <a href="#" id="loginLink">Voltar para Login</a>
                    </div>
                </form>
            </div>

            <div class="info-section">
                <p class="slogan">Seguro é estar com a gente.</p>
            </div>
        </div>

    <script>
        const loginSection = document.getElementById('loginSection');
        const registerSection = document.getElementById('registerSection');
        const registerLink = document.getElementById('registerLink');
        const loginLink = document.getElementById('loginLink');

        registerLink.addEventListener('click', function(event) {
            event.preventDefault();
            loginSection.classList.add('slide-left');
            setTimeout(() => {
                loginSection.style.display = 'none';
                registerSection.style.display = 'block';
            }, 500); // Wait for the transition to complete
        });

        loginLink.addEventListener('click', function(event) {
            event.preventDefault();
            registerSection.style.display = 'none';
            loginSection.classList.remove('slide-left');
            setTimeout(() => {
                loginSection.style.display = 'block';
            }, 500); // Wait for the transition to complete
        });
    </script>
</body>

</html>

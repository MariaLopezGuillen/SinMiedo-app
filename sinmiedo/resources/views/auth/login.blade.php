<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | Sin Miedo</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">   

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<body class="login-body">

<div class="login-container">

    <!-- IZQUIERDA -->

    <div class="login-left">

        <div class="logo-box">

            <div class="shield">
                <img src="{{ asset('images/logo.png') }}" alt="Escudo de Sin Miedo" class="logo">
            </div>



        </div>

        <h2>
            Bienvenido de nuevo 👋
        </h2>

        <p>
            Un espacio seguro donde puedes hablar,
            pedir ayuda y sentirte acompañado.
        </p>

        <div class="login-features">

            <div class="feature-item">
                💜 Totalmente confidencial
            </div>

            <div class="feature-item">
                🛡️ Ayuda profesional
            </div>

            <div class="feature-item">
                🤝 Comunidad segura
            </div>

        </div>

    </div>

    <!-- DERECHA -->

    <div class="login-right">

        <form method="POST" action="{{ route('login') }}" class="login-form">

            @csrf

            <h3>
                Iniciar sesión
            </h3>

            <!-- EMAIL -->

            <div class="input-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="ejemplo@email.com"
                >

                @error('email')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <!-- PASSWORD -->

            <div class="input-group">

                <label>Contraseña</label>

                <input
                    type="password"
                    name="password"
                    required
                    placeholder="********"
                >

                @error('password')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <!-- REMEMBER -->

            <div class="remember-box">

                <label>
                    <input type="checkbox" name="remember">
                    Recordarme
                </label>

            </div>

            <!-- BUTTON -->

            <button type="submit" class="login-btn-custom">
                Entrar
            </button>

            <!-- LINKS -->

            <div class="bottom-links">

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif

                <a href="{{ route('register') }}">
                    Crear cuenta
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
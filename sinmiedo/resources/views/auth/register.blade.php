<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta | Sin Miedo</title>

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <script src="{{ asset('js/register.js') }}" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="register-body">

<div class="register-container">

    <!-- LEFT -->

    <div class="register-left">

        <div class="logo-box">

            <div class="shield">
                <img src="{{ asset('images/logo.png') }}" alt="Escudo" class="logo">
            </div>


        </div>

        <h2>
            Tu espacio seguro 💜
        </h2>

        <p>
            Habla sin miedo, pide ayuda y conecta
            con personas que realmente te escuchan.
        </p>

        <div class="register-features">

            <div class="feature-item">
                🔒 Usuario  anónimo
            </div>

            <div class="feature-item">
                🛡️ Privacidad protegida
            </div>

            <div class="feature-item">
                🤝 Ayuda profesional
            </div>

        </div>

    </div>

    <!-- RIGHT -->

    <div class="register-right">

        <form method="POST" action="{{ route('register') }}" class="register-form">

            @csrf

            <h3>
                Crear cuenta
            </h3>

            <!-- REAL NAME -->

            <div class="input-group">

                <label>Nombre real</label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Tu nombre real"
                >

                @error('name')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <!-- EMAIL -->

            <div class="input-group">

                <label>Email</label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="username"
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
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="********"
                >

                @error('password')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <!-- CONFIRM PASSWORD -->

            <div class="input-group">

                <label>Confirmar contraseña</label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="********"
                >

                @error('password_confirmation')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <!-- CONSENT -->

            <div class="consent-box">

                <label>
                    <input type="checkbox" required>

                    Acepto que Sin Miedo almacene mis datos
                    de forma segura para proteger la comunidad.
                </label>

            </div>

            <!-- BUTTON -->

            <button type="submit" class="register-btn-custom">
                Crear cuenta
            </button>

            <!-- LINKS -->

            <div class="bottom-links">

                <a href="{{ route('login') }}">
                    ¿Ya tienes cuenta?
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
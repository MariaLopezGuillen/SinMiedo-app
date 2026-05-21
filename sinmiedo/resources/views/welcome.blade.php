<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sin Miedo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <header class="navbar">
        <div class="logo">
            <div class="logo-icon">
                <img src="{{ asset('images/logo.png') }}" alt="Sin Miedo" class="logo-img" style="height: 100px;">
            </div>
            <h2>Sin <span>Miedo</span></h2>
        </div>

        <nav>
            <a href="#">Inicio</a>
            <a href="#">¿Cómo funciona?</a>
            <a href="#recursos">Recursos</a>
            <a href="#">Ayuda</a>
        </nav>

        <!-- En Laravel: href="{{ route('login') }}" -->
        <a href="/login" class="login-btn">Iniciar sesión</a>
    </header>

    <section class="hero">

        <div class="hero-left">

            <div class="badge">
                💜 Tu bienestar importa
            </div>

            <h1>
                Habla.<br>
                Pide ayuda.<br>
                <span>No estás solo.</span>
            </h1>

            <p>
                Sin Miedo es una plataforma segura y confidencial creada para ayudar
                a jóvenes que sufren bullying, acoso o necesitan apoyo emocional.
            </p>

            <div class="features">
                <div class="feature">
                    <div class="feature-icon">💬</div>
                    <span>Habla de lo que te pasa</span>
                </div>
                <div class="feature">
                    <div class="feature-icon">🛡️</div>
                    <span>Pide ayuda de forma segura</span>
                </div>
                <div class="feature">
                    <div class="feature-icon">🤝</div>
                    <span>Recibe apoyo y orientación</span>
                </div>
            </div>

            <div class="buttons">
                <!-- En Laravel: href="{{ route('register') }}" -->
                <a href="/register" class="primary-btn">Comenzar ahora</a>
                <a href="#" class="secondary-btn">Saber más</a>
            </div>

        </div>

        <div class="hero-right">
            <div class="circle-bg"></div>
            <div class="phone">
                <div class="phone-screen">
                    <img src="{{ asset('images/logo.png') }}" alt="Sin Miedo" class="phone-logo" style="height: 200px;">
                    <p>Habla. Pide ayuda.<br>No estás solo.</p>
                    <div class="friends">🧑🏽‍🤝‍🧑🏼</div>
                    <button class="start-btn">Entrar</button>
                </div>
            </div>
        </div>

    </section>
    <h2 id="recursos" class="section-title">Recursos y herramientas</h2 >
    <section class="cards">

        <div class="card">
            <div class="card-icon">🛡️</div>
            <h3>Protección activa</h3>
            <p>Detectamos y prevenimos situaciones de riesgo en tiempo real.</p>
        </div>

        <div class="card">
            <div class="card-icon">🚨</div>
            <h3>Denuncia anónima</h3>
            <p>Reporta cualquier caso sin revelar tu identidad.</p>
        </div>

        <div class="card">
            <div class="card-icon">📱</div>
            <h3>Acceso desde cualquier lugar</h3>
            <p>Disponible en móvil y web para ayudarte cuando lo necesites.</p>
        </div>

        <div class="card">
            <div class="card-icon">🎯</div>
            <h3>Intervención temprana</h3>
            <p>Actuamos antes de que el problema se haga más grave.</p>
        </div>

        <div class="card">
            <div class="card-icon">📊</div>
            <h3>Seguimiento de casos</h3>
            <p>Controla el estado de cada incidencia de forma segura.</p>
        </div>

        <div class="card">
            <div class="card-icon">💬</div>
            <h3>Chat de apoyo</h3>
            <p>Habla con orientadores o profesionales de forma directa.</p>
        </div>

        <div class="card">
            <div class="card-icon">🔐</div>
            <h3>Privacidad total</h3>
            <p>Tus datos están cifrados y protegidos en todo momento.</p>
        </div>

        <div class="card">
            <div class="card-icon">🌱</div>
            <h3>Bienestar emocional</h3>
            <p>Recursos para mejorar tu autoestima y salud mental.</p>
        </div>

    </section>

</body>

</html>
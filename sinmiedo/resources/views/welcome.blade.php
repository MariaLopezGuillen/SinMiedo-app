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
        <a href="#home" class="logo">
            <div class="logo-icon">
                <img src="{{ asset('images/logo.png') }}" alt="Sin Miedo" class="logo-img">
            </div>
            <h2>Sin <span>Miedo</span></h2>
        </a>

        <nav class="desktop-nav">
            <a href="#home">Inicio</a>
            <a href="#funciona">¿Cómo funciona?</a>
            <a href="#recursos">Recursos</a>
            <a href="#normas">Normas de la comunidad</a>
        </nav>

        <a href="/login" class="login-btn desktop-only">Iniciar sesión</a>

        <button class="hamburger" aria-label="Abrir menú" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </header>

    <!-- Menú móvil -->
    <nav class="mobile-nav">
        <a href="#home">Inicio</a>
        <a href="#funciona">¿Cómo funciona?</a>
        <a href="#recursos">Recursos</a>
        <a href="#normas">Normas de la comunidad</a>
        <a href="/login" class="login-btn">Iniciar sesión</a>
    </nav>
    <div class="mobile-nav-overlay"></div>

    <section class="hero" id="home">

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
                <a href="/register" class="primary-btn">Comenzar ahora</a>
                <a href="/login" class="secondary-btn">Entrar</a>
            </div>

        </div>

        <div class="hero-right">
            <div class="circle-bg"></div>
            <div class="phone">
                <div class="phone-screen">
                    <img src="{{ asset('images/logo.png') }}" alt="Sin Miedo" class="phone-logo">
                    <p>Habla. Pide ayuda.<br>No estás solo.</p>
                    <div class="friends">🧑🏽‍🤝‍🧑🏼</div>
                    <a href="/login" class="start-btn">Entrar</a>
                </div>
            </div>
        </div>

    </section>

    <h2 id="recursos" class="section-title">Recursos y herramientas</h2>
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

    <h2 id="funciona" class="section-title">¿Cómo funciona?</h2>
    <section class="cards">
        <div class="card">
            <div class="card-icon">📝</div>
            <h3>Cuéntanos lo que ocurre</h3>
            <p>Describe la situación de forma sencilla y segura. Puedes hacerlo de manera anónima.</p>
        </div>
        <div class="card">
            <div class="card-icon">🔍</div>
            <h3>Analizamos el caso</h3>
            <p>Nuestro sistema revisa la información para identificar posibles situaciones de riesgo.</p>
        </div>
        <div class="card">
            <div class="card-icon">🛡️</div>
            <h3>Protegemos tu privacidad</h3>
            <p>Tu identidad permanece protegida y tus datos se gestionan de forma confidencial.</p>
        </div>
        <div class="card">
            <div class="card-icon">👨‍🏫</div>
            <h3>Intervención profesional</h3>
            <p>Los casos importantes pueden ser revisados por orientadores o profesionales autorizados.</p>
        </div>
        <div class="card">
            <div class="card-icon">💬</div>
            <h3>Recibe apoyo</h3>
            <p>Accede a recursos, orientación y herramientas diseñadas para ayudarte.</p>
        </div>
        <div class="card">
            <div class="card-icon">📈</div>
            <h3>Seguimiento continuo</h3>
            <p>Puedes consultar el estado de tu reporte y conocer las acciones realizadas.</p>
        </div>
    </section>

    <h2 id="normas" class="section-title">Normas de la comunidad</h2>
    <section class="cards">
        <div class="card">
            <span>🤝</span>
            <h3>Respeto siempre</h3>
            <p>Trata a los demás con respeto. No se permiten insultos, burlas ni amenazas.</p>
        </div>
        <div class="card">
            <span>🔒</span>
            <h3>Protege tu privacidad</h3>
            <p>No compartas información personal tuya ni de otras personas.</p>
        </div>
        <div class="card">
            <span>💜</span>
            <h3>Apoya, no juzgues</h3>
            <p>Escucha y ayuda a los demás desde la empatía y el respeto.</p>
        </div>
        <div class="card">
            <span>🚫</span>
            <h3>Cero acoso</h3>
            <p>Cualquier forma de bullying o ciberacoso será eliminada inmediatamente.</p>
        </div>
        <div class="card">
            <span>📢</span>
            <h3>Reporta el contenido dañino</h3>
            <p>Si ves algo preocupante, utiliza la herramienta de reporte.</p>
        </div>
        <div class="card">
            <span>⚖️</span>
            <h3>Uso responsable</h3>
            <p>No publiques información falsa ni acusaciones sin fundamento.</p>
        </div>
    </section>

    <section class="impact" id="saber">
        <div class="container">
            <h2>Nuestro objetivo</h2>
            <p>Construir una comunidad donde ningún estudiante tenga que enfrentarse solo al bullying.</p>

            <div class="numbers">
                <div>
                    <strong>100%</strong>
                    <span>Anonimato</span>
                </div>
                <div>
                    <strong>24/7</strong>
                    <span>Acceso seguro</span>
                </div>
                <div>
                    <strong>IA</strong>
                    <span>Detección inteligente</span>
                </div>
            </div>
        </div>
    </section>

    <section class="join">
        <h2>¿Quieres formar parte del cambio?</h2>
        <p>Empresas, centros educativos y personas pueden colaborar para crear espacios más seguros.</p>
        <a href="#" class="btn">Colaborar</a>
    </section>

    <x-footer></x-footer>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
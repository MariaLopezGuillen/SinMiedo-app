<style>
    /* ==========================
   FOOTER SIN MIEDO
========================== */

    .footer {
        background: linear-gradient(135deg, #1e1b4b, #312e81);
        color: white;
        margin-top: 100px;
        padding-top: 60px;
    }

    .footer-container {
        max-width: 1300px;
        margin: auto;
        padding: 0 40px;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1.5fr;
        gap: 50px;
    }

    .footer-brand h3 {
        font-size: 28px;
        margin: 15px 0;
        font-weight: 700;
    }

    .footer-brand p {
        color: rgba(255, 255, 255, 0.75);
        line-height: 1.8;
    }

    .footer-logo {
        width: 80px;
        height: auto;
    }

    .footer-links h4,
    .footer-message h4 {
        margin-bottom: 20px;
        font-size: 20px;
        font-weight: 600;
    }

    .footer-links {
        display: flex;
        flex-direction: column;
    }

    .footer-links a {
        text-decoration: none;
        color: rgba(255, 255, 255, 0.75);
        margin-bottom: 12px;
        transition: 0.3s;
    }

    .footer-links a:hover {
        color: #c084fc;
        transform: translateX(5px);
    }

    .footer-message p {
        color: rgba(255, 255, 255, 0.75);
        line-height: 1.8;
    }

    .footer-bottom {
        margin-top: 50px;
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        text-align: center;
        padding: 25px;
    }

    .footer-bottom p {
        color: rgba(255, 255, 255, 0.6);
        font-size: 14px;
    }

    /* ==========================
   RESPONSIVE
========================== */

    @media (max-width: 992px) {
        .footer-container {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .footer-container {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .footer-links {
            align-items: center;
        }

        .footer-logo {
            margin: auto;
        }
    }
</style>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Sin Miedo" class="footer-logo">
            <h3>Sin Miedo</h3>
            <p>
                Un espacio seguro para adolescentes donde hablar,
                pedir ayuda y encontrar apoyo.
            </p>
        </div>
        <div class="footer-links">
            <h4>Navegación</h4>
            <a href="#">Inicio</a>
            <a href="#">¿Cómo funciona?</a>
            <a href="#recursos">Recursos</a>
            <a href="#">Ayuda</a>
        </div>
        <div class="footer-links">
            <h4>Seguridad</h4>
            <a href="#">Privacidad</a>
            <a href="#">Normas</a>
            <a href="#">Contacto</a>
        </div>
        <div class="footer-message">
            <h4>💜 Recuerda</h4>
            <p>
                Pedir ayuda es una muestra de valentía.
                Nunca estás solo.
            </p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>
            © {{ date('Y') }} Sin Miedo · Todos los derechos reservados · <a href="https://gondo.es/"
                style="color: #c084fc;">Gondo Psicologia</a>
        </p>
    </div>
</footer>
{{-- Panel --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    </x-slot>

    <div class="dashboard">

        <!-- HERO -->
        <div class="grid-2">

            <!-- LEFT -->
            <div class="card">
                <h1 class="hero-title">Hola, {{ Auth::user()->name }} 👋</h1>
                <h2 class="hero-subtitle">Bienvenido a tu espacio seguro</h2>
                <p class="hero-desc">
                    Aquí puedes hablar sin miedo, pedir ayuda y compartir
                    lo que sientes con personas que te entienden.
                </p>
                <div class="hero-buttons">
                    <a href="#" class="btn-primary">🛡️ Necesito ayuda</a>
                    <a href="{{ route('forum.index') }}" class="btn-outline">💬 Ir al foro</a>
                </div>
            </div>

            <!-- ACTIVIDAD -->
            <div class="card">
                <div class="activity-header">
                    <h3>Tu actividad</h3>
                    <a href="#">Ver todo</a>
                </div>
                <div class="activity-row">
                    <div class="activity-left">
                        <div class="activity-icon pink">🚨</div>
                        <span class="activity-label">Reportes</span>
                    </div>
                    <span class="activity-number">0</span>
                </div>
                <div class="activity-row">
                    <div class="activity-left">
                        <div class="activity-icon purple">💬</div>
                        <span class="activity-label">Mensajes</span>
                    </div>
                    <span class="activity-number">3</span>
                </div>
                <div class="activity-row">
                    <div class="activity-left">
                        <div class="activity-icon green">💚</div>
                        <span class="activity-label">Reacciones</span>
                    </div>
                    <span class="activity-number">12</span>
                </div>
            </div>

        </div>

        <!-- CARDS -->
        <div class="grid-3">

            <div class="card card-flex">
                <div class="card-icon pink">🚨</div>
                <p class="card-title">Reportar bullying</p>
                <p class="card-desc">Informa situaciones de acoso de forma segura y confidencial.</p>
                <button class="card-btn pink">Hacer un reporte →</button>
            </div>

            <div class="card card-flex">
                <div class="card-icon purple">💬</div>
                <p class="card-title">Foro juvenil</p>
                <p class="card-desc">Habla, pregunta y conecta con otros adolescentes.</p>
                <a href="{{ route('forum.index') }}" class="card-btn purple">Entrar al foro →</a>
            </div>

            <div class="card card-flex">
                <div class="card-icon blue">📘</div>
                <p class="card-title">Recursos útiles</p>
                <p class="card-desc">Consejos y herramientas para sentirte mejor.</p>
                <button class="card-btn blue">Ver recursos →</button>
            </div>

        </div>

        <!-- BANNER FINAL -->
        <div class="banner">
            <h2>Nunca estás solo 💜</h2>
            <p>
                Pedir ayuda es un acto de valentía.
                Siempre habrá alguien dispuesto a escucharte.
            </p>
            <button class="btn-white">Hablar con alguien</button>
        </div>

    </div>

    <x-footer></x-footer>
</x-app-layout>
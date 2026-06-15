{{-- Panel --}}
<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <script src="{{ asset('js/dashboard.js') }}" defer></script>
    </x-slot>

    <body>
        <header class="header">
            <div class="user-info">
                <div class="avatar">ML</div>
                <div class="user-text">
                    <h2>Hola,{{ Auth::user()->name }}</h2>
                    <p>{{ now()->format('l, j M Y') }}</p>
                </div>
            </div>
        </header>

        <div class="alert-banner">
            <div class="alert-left">
                <div class="alert-icon">💬</div>
                <div class="alert-text">
                    <h3>¿Necesitas ayuda ahora mismo?</h3>
                    <p>Siempre hay alguien dispuesto a escucharte. No estás solo.</p>
                </div>
            </div>
            <button class="btn btn-danger" onclick="openModal('ayuda')">Pedir ayuda</button>
        </div>

        <div class="dashboard-grid">
            <div class="stat-card" onclick="showToast('Test completado: Riesgo moderado')">
                <div class="stat-label">Test completado</div>
                <div class="stat-value" data-target="1">0</div>
                <div class="stat-sub green">Riesgo moderado detectado</div>
            </div>
            <div class="stat-card" onclick="showToast('Mensajes en foro: 3 total')">
                <div class="stat-label">Mensajes en foro</div>
                <div class="stat-value" data-target="3">0</div>
                <div class="stat-sub green">+2 respuestas hoy</div>
            </div>
            <div class="stat-card" onclick="showToast('Apoyos recibidos: 12')">
                <div class="stat-label">Apoyos recibidos</div>
                <div class="stat-value" data-target="12">0</div>
                <div class="stat-sub purple">La comunidad te escucha</div>
            </div>
            <div class="stat-card" onclick="showToast('Racha activa: 4 días')">
                <div class="stat-label">Racha activa</div>
                <div class="stat-value" data-target="4">0</div>
                <div class="stat-sub orange">Vuelves cada día</div>
            </div>
        </div>

        <div class="mood-section">
            <div class="mood-card">
                <h3>¿Cómo te sientes hoy?</h3>
                <div class="mood-options">
                    <button class="mood-btn" data-mood="bien" onclick="selectMood(this, 'bien')">
                        <span class="mood-emoji">😊</span>
                        <span>Bien</span>
                    </button>
                    <button class="mood-btn" data-mood="normal" onclick="selectMood(this, 'normal')">
                        <span class="mood-emoji">😐</span>
                        <span>Normal</span>
                    </button>
                    <button class="mood-btn" data-mood="mal" onclick="selectMood(this, 'mal')">
                        <span class="mood-emoji">😕</span>
                        <span>Mal</span>
                    </button>
                    <button class="mood-btn" data-mood="muymal" onclick="selectMood(this, 'muymal')">
                        <span class="mood-emoji">😢</span>
                        <span>Muy mal</span>
                    </button>
                </div>
            </div>
            <div class="mood-card">
                <h3>Actividad semanal</h3>
                <div class="weekly-chart">
                    <div class="day-bar" onclick="showToast('Lunes: 2 interacciones')">
                        <div class="bar"></div>
                        <span class="day-label">L</span>
                    </div>
                    <div class="day-bar" onclick="showToast('Martes: 3 interacciones')">
                        <div class="bar"></div>
                        <span class="day-label">M</span>
                    </div>
                    <div class="day-bar" onclick="showToast('Miércoles: 1 interacción')">
                        <div class="bar"></div>
                        <span class="day-label">X</span>
                    </div>
                    <div class="day-bar" onclick="showToast('Jueves: 2 interacciones')">
                        <div class="bar"></div>
                        <span class="day-label">J</span>
                    </div>
                    <div class="day-bar" onclick="showToast('Viernes: 3 interacciones')">
                        <div class="bar"></div>
                        <span class="day-label">V</span>
                    </div>
                    <div class="day-bar" onclick="showToast('Sábado: 1 interacción')">
                        <div class="bar"></div>
                        <span class="day-label">S</span>
                    </div>
                    <div class="day-bar" onclick="showToast('Domingo: 5 interacciones (hoy)')">
                        <div class="bar active"></div>
                        <span class="day-label">D</span>
                    </div>
                </div>
                <p class="chart-legend">Interacciones en el foro · hoy en morado</p>
            </div>
        </div>

        <div class="bottom-section">
            <div class="emotions-card">
                <h3>Estado emocional (7 días)</h3>
                <div class="emotion-row" onclick="showToast('Tranquilo: 62% de los días')">
                    <span class="emotion-label">Tranquilo</span>
                    <div class="emotion-bar-bg">
                        <div class="emotion-bar green" data-width="62"></div>
                    </div>
                    <span class="emotion-pct">62%</span>
                </div>
                <div class="emotion-row" onclick="showToast('Nervioso: 21% de los días')">
                    <span class="emotion-label">Nervioso</span>
                    <div class="emotion-bar-bg">
                        <div class="emotion-bar orange" data-width="21"></div>
                    </div>
                    <span class="emotion-pct">21%</span>
                </div>
                <div class="emotion-row" onclick="showToast('Triste: 12% de los días')">
                    <span class="emotion-label">Triste</span>
                    <div class="emotion-bar-bg">
                        <div class="emotion-bar red" data-width="12"></div>
                    </div>
                    <span class="emotion-pct">12%</span>
                </div>
                <div class="emotion-row" onclick="showToast('Sin palabras: 5% de los días')">
                    <span class="emotion-label">Sin palabras</span>
                    <div class="emotion-bar-bg">
                        <div class="emotion-bar purple" data-width="5"></div>
                    </div>
                    <span class="emotion-pct">5%</span>
                </div>
            </div>
            <div class="activity-card">
                <h3>Actividad reciente</h3>
                <button class="activity-item" onclick="showToast('Abriendo respuesta...')">
                    <div class="activity-icon reply">💬</div>
                    <div class="activity-content">
                        <h4>Alguien respondió tu post</h4>
                        <p>Hace 12 min</p>
                        <span class="activity-tag tag-new">Nuevo</span>
                    </div>
                </button>
                <button class="activity-item" onclick="showToast('Viendo apoyos...')">
                    <div class="activity-icon support">👍</div>
                    <div class="activity-content">
                        <h4>3 personas apoyaron tu mensaje</h4>
                        <p>Hace 1h</p>
                        <span class="activity-tag tag-support">Apoyo</span>
                    </div>
                </button>
                <button class="activity-item" onclick="openModal('test')">
                    <div class="activity-icon pending">📋</div>
                    <div class="activity-content">
                        <h4 >Test de seguimiento disponible</h4>
                        <p>Hace 3 días</p>
                        <span class="activity-tag tag-pending">Pendiente</span>
                    </div>
                </button>
            </div>
        </div>

        <div class="footer-actions">
            <button class="footer-card" onclick="openModal('reportar')">
                <div class="footer-icon pink">🚨</div>
                <div class="footer-text">
                    <h4>Reportar situación</h4>
                    <p>Anónimo y seguro</p>
                </div>
            </button>
            <button class="footer-card" onclick="showToast('Abriendo recursos...')">
                <div class="footer-icon teal">📚</div>
                <div class="footer-text">
                    <h4>Recursos útiles</h4>
                    <p>Guías y consejos</p>
                </div>
            </button>
            <button class="footer-card" onclick="showToast('Abriendo foro...')">
                <div class="footer-icon blue">💬</div>
                <div class="footer-text">
                    <h4>Foro juvenil</h4>
                    <p>Habla con otros</p>
                </div>
            </button>
        </div>

        <div class="toast" id="toast"></div>

        <div class="modal-overlay" id="modalOverlay" onclick="closeModal(event)">
            <div class="modal" onclick="event.stopPropagation()">
                <h3 id="modalTitle">Título</h3>
                <p id="modalText">Contenido del modal</p>
                <div class="modal-buttons">
                    <button class="modal-btn cancel" onclick="closeModal()">Cancelar</button>
                    <button class="modal-btn confirm" onclick="confirmAction()">Aceptar</button>
                </div>
            </div>
        </div>

        <script src="script.js"></script>
    </body>

    <x-footer></x-footer>
</x-app-layout>
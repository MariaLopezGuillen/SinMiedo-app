// Counter animation
function animateCounters() {
    const counters = document.querySelectorAll('.stat-value');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        let current = 0;
        const increment = target / 30;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                counter.textContent = target === 4 ? target + ' días' : target;
                clearInterval(timer);
            } else {
                counter.textContent = Math.floor(current);
            }
        }, 30);
    });
}

// Emotion bars animation
function animateBars() {
    setTimeout(() => {
        document.querySelectorAll('.emotion-bar').forEach(bar => {
            const width = bar.getAttribute('data-width');
            bar.style.width = width + '%';
        });
    }, 300);
}

// Toast notification
function showToast(message) {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.classList.add('show');
    setTimeout(() => {
        toast.classList.remove('show');
    }, 2500);
}

// Mood selection
function selectMood(btn, mood) {
    document.querySelectorAll('.mood-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const moods = {
        'bien': '¡Me alegra que te sientas bien! 😊',
        'normal': 'Gracias por compartir. El equilibrio es bueno.',
        'mal': 'Lamento que te sientas mal. Estamos aquí.',
        'muymal': 'Te escuchamos. No estás solo. 💜'
    };
    showToast(moods[mood]);
}

// Modal data
const modalData = {
    'ayuda': {
        title: '¿Necesitas ayuda?',
        text: 'Vamos a conectarte con un especialista. Tu información es confidencial y segura. ¿Deseas continuar?'
    },
    'test': {
        title: 'Test de seguimiento',
        text: 'Tienes un test de seguimiento pendiente. Solo tomará 3 minutos y nos ayuda a entender cómo te sientes. ¿Comenzar?',
        url: '/help'
    },
    'reportar': {
        title: 'Reportar situación',
        text: 'Puedes reportar cualquier situación de forma anónima. Tu seguridad es nuestra prioridad. ¿Continuar?'
    }
};

let currentModal = '';

function openModal(type) {
    currentModal = type;
    const data = modalData[type];
    document.getElementById('modalTitle').textContent = data.title;
    document.getElementById('modalText').textContent = data.text;
    document.getElementById('modalOverlay').classList.add('active');
}

function closeModal(e) {
    if (!e || e.target === document.getElementById('modalOverlay')) {
        document.getElementById('modalOverlay').classList.remove('active');
    }
}

function confirmAction() {
    const messages = {
        'ayuda': 'Conectando con especialista...',
        'test': 'Iniciando test de seguimiento...',
        'reportar': 'Abriendo formulario anónimo...'
    };

    showToast(messages[currentModal] || 'Acción confirmada');

    closeModal();

    // Redirecciones
    if (currentModal === 'test') {
        window.location.href = '/help';
    }

    if (currentModal === 'ayuda') {
        window.location.href = '/help';
    }

    if (currentModal === 'reportar') {
        window.location.href = '/reports';
    }
}

// Keyboard support
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
});

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    animateCounters();
    animateBars();
});
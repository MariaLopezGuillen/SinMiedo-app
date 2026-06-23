document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // CONTADOR DE CARACTERES
    // ============================================
    const contentTextarea = document.getElementById('content');
    const charCount = document.getElementById('charCount');
    
    if (contentTextarea && charCount) {
        charCount.textContent = contentTextarea.value.length;
        
        contentTextarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
            
            if (this.value.length > 5000) {
                charCount.style.color = '#c62828';
            } else if (this.value.length > 2000) {
                charCount.style.color = '#f57c00';
            } else {
                charCount.style.color = 'var(--text-muted)';
            }
        });
    }

    // ============================================
    // TOGGLE DE PRIVACIDAD
    // ============================================
    const isPrivateToggle = document.getElementById('isPrivate');
    const passwordField = document.getElementById('passwordField');
    
    if (isPrivateToggle && passwordField) {
        isPrivateToggle.addEventListener('change', function() {
            if (this.checked) {
                passwordField.style.display = 'block';
                passwordField.querySelector('input').focus();
            } else {
                passwordField.style.display = 'none';
                passwordField.querySelector('input').value = '';
            }
        });
    }

    // ============================================
    // ALERTAS AUTO-OCULTAR
    // ============================================
    const alertMessage = document.getElementById('alertMessage');
    
    if (alertMessage) {
        setTimeout(function() {
            alertMessage.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            alertMessage.style.opacity = '0';
            alertMessage.style.transform = 'translateY(-10px)';
            
            setTimeout(function() {
                alertMessage.remove();
            }, 500);
        }, 4000);
    }

    // ============================================
    // CONFIRMAR ELIMINACIÓN
    // ============================================
    window.confirmDelete = function(event) {
        const confirmed = confirm('¿Estás seguro? Esta acción no se puede deshacer.\n\nTu entrada se eliminará permanentemente.');
        
        if (!confirmed) {
            event.preventDefault();
            return false;
        }
        
        return true;
    };

    // ============================================
    // ANIMACIÓN DE ENTRADAS AL CARGAR
    // ============================================
    const entryCards = document.querySelectorAll('.entry-card');
    
    entryCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // ============================================
    // PREVISUALIZACIÓN DE HUMOR
    // ============================================
    const moodOptions = document.querySelectorAll('.mood-option input');
    
    moodOptions.forEach(option => {
        option.addEventListener('change', function() {
            const label = this.nextElementSibling;
            label.style.animation = 'none';
            setTimeout(() => {
                label.style.animation = 'pulse 0.4s ease';
            }, 10);
        });
    });

    // ============================================
    // GUARDADO AUTOMÁTICO (DRAFT)
    // ============================================
    const entryForm = document.getElementById('entryForm');
    
    if (entryForm && contentTextarea) {
        const formInputs = entryForm.querySelectorAll('input, textarea, select');
        const formKey = 'diary_draft';
        
        const savedDraft = localStorage.getItem(formKey);
        if (savedDraft) {
            try {
                const draft = JSON.parse(savedDraft);
                const titleInput = document.getElementById('title');
                
                if (titleInput && !titleInput.value && draft.title) {
                    titleInput.value = draft.title;
                }
                if (contentTextarea && !contentTextarea.value && draft.content) {
                    contentTextarea.value = draft.content;
                    charCount.textContent = draft.content.length;
                }
            } catch (e) {
                console.error('Error al restaurar borrador:', e);
            }
        }
        
        setInterval(() => {
            const titleInput = document.getElementById('title');
            const draft = {
                title: titleInput ? titleInput.value : '',
                content: contentTextarea.value,
                savedAt: new Date().toISOString()
            };
            localStorage.setItem(formKey, JSON.stringify(draft));
        }, 30000);
        
        entryForm.addEventListener('submit', function() {
            localStorage.removeItem(formKey);
        });
    }

    // ============================================
    // ATAJOS DE TECLADO
    // ============================================
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            if (entryForm) {
                e.preventDefault();
                entryForm.submit();
            }
        }
        
        if (e.key === 'Escape') {
            const cancelBtn = document.querySelector('.btn-secondary');
            if (cancelBtn) {
                cancelBtn.click();
            }
        }
    });

    // ============================================
    // EFECTOS DE FOCUS
    // ============================================
    const titleInput = document.getElementById('title');
    
    if (titleInput) {
        titleInput.addEventListener('focus', function() {
            this.placeholder = 'Escribe un título que te haga sentir bien...';
        });
        
        titleInput.addEventListener('blur', function() {
            this.placeholder = '¿Sobre qué quieres escribir hoy?';
        });
    }

    if (contentTextarea) {
        contentTextarea.addEventListener('focus', function() {
            this.style.background = '#ffffff';
        });
        
        contentTextarea.addEventListener('blur', function() {
            this.style.background = 'var(--bg)';
        });
    }

    console.log('📝 Mi Diario Privado cargado correctamente');
});
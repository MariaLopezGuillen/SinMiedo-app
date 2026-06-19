const preguntas = [
    "1.Me han insultado, puesto motes, burlado o dicho cosas para hacerme sentir mal delante de otros.",
    "2. Han hablado mal de mí o han intentado que otros compañeros me rechacen.",
    "3. Me han dejado solo/a, ignorado o excluido de grupos, actividades o juegos a propósito.",
    "4. Siento que mis compañeros me rechazan o no me aceptan aunque no haya hecho nada.",
    "5. Me han insultado, amenazado o humillado mediante el móvil, redes sociales o grupos online.",
    "6. Han compartido fotos, vídeos o mensajes míos sin permiso para hacerme quedar mal.",
    "7. Me han pegado, empujado, amenazado con hacerme daño o han roto/quedado con mis cosas a propósito.",
    "8. Siento miedo, ansiedad o preocupación cuando tengo que ir al colegio/instituto por esta situación.",
    "9. Me siento solo/a, sin apoyo o sin nadie a quien contarle lo que ocurre",
    "10. Esta situación lleva ocurriendo más de un mes o ha hecho que no quiera ir al colegio/instituto.",
];

const opciones = ["Nunca", "A veces", "Frecuentemente", "Casi siempre"];
let respuestas = Array(5).fill(null);
let actual = 0;

function renderDots() {
    const cont = document.getElementById('dots');
    cont.innerHTML = '';
    preguntas.forEach((_, i) => {
        const d = document.createElement('div');
        d.className = 'dot' + (i === actual ? ' active' : i < actual ? ' done' : '');
        cont.appendChild(d);
    });
}

function renderPregunta() {
    const area = document.getElementById('questionArea');
    area.innerHTML = '';

    const bloque = document.createElement('div');
    bloque.className = 'question-block';

    const label = document.createElement('label');
    label.textContent = preguntas[actual];

    const select = document.createElement('select');
    select.id = 'selectActual';
    select.name = `q${actual + 1}`;

    const defOpt = document.createElement('option');
    defOpt.value = '';
    defOpt.textContent = 'Seleccione una opción';
    select.appendChild(defOpt);

    opciones.forEach((op, i) => {
        const opt = document.createElement('option');
        opt.value = i;
        opt.textContent = op;
        if (respuestas[actual] === i) opt.selected = true;
        select.appendChild(opt);
    });

    bloque.appendChild(label);
    bloque.appendChild(select);
    area.appendChild(bloque);

    document.getElementById('progressLabel').textContent = `Pregunta ${actual + 1} de ${preguntas.length}`;
    document.getElementById('progressBar').style.width = `${((actual + 1) / preguntas.length) * 100}%`;
    document.getElementById('btnPrev').style.display = actual > 0 ? 'inline-block' : 'none';
    document.getElementById('btnNext').textContent = actual === preguntas.length - 1 ? 'Ver resultado ✓' : 'Siguiente →';
    document.getElementById('errorMsg').textContent = '';

    renderDots();
}

function nextQuestion() {
    const sel = document.getElementById('selectActual');
    if (sel.value === '') {
        document.getElementById('errorMsg').textContent = 'Por favor, selecciona una opción antes de continuar.';
        return;
    }
    respuestas[actual] = parseInt(sel.value);
    if (actual < preguntas.length - 1) {
        actual++;
        renderPregunta();
    } else {
        calcularClinico();
    }
}

function prevQuestion() {
    const sel = document.getElementById('selectActual');
    if (sel.value !== '') respuestas[actual] = parseInt(sel.value);
    if (actual > 0) {
        actual--;
        renderPregunta();
    }
}

function calcularClinico() {
    const total = respuestas.reduce((a, b) => a + (b || 0), 0);
    let msg = '', color = '';

    if (total <= 7) {
        msg = 'Lo que nos cuentas no muestra señales claras de acoso. Aun así, si en algún momento sientes que algo no va bien, habla con alguien de confianza. Estamos aquí para ayudarte.';
        color = '#4ade80';

    } else if (total >= 8 && total <= 17) {
        msg = 'Lo que describes merece atención. Puede haber situaciones que no deberían estar ocurriendo. Te recomendamos hablar con alguien de confianza o consultar nuestros recursos.';
        color = '#fbbf24';

    } else if (total >= 18) {
        msg = 'Lo que estás viviendo puede ser una situación seria y no deberías afrontarla solo/a. Busca apoyo en alguien de confianza o pide ayuda.';
        color = '#f87171';
    }

    document.getElementById('testClinico').style.display = 'none';

    const res = document.getElementById('resultadoClinico');
    res.style.display = 'block';

    res.innerHTML = `
        <p class="resultado-texto" style="color:${color}">
            ${msg}
        </p>
        <a class="btn-help" href="https://gondo.es/">Pedir ayuda</a>
    `;
}

document.addEventListener('DOMContentLoaded', renderPregunta);
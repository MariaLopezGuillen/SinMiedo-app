const preguntas = [
    "1. En las últimas semanas, ¿te has sentido triste o sin energía?",
    "2. ¿Has sentido miedo o inseguridad en tu entorno social o escolar?",
    "3. ¿Has evitado situaciones por miedo a ser juzgado/a o atacado/a?",
    "4. ¿Te cuesta hablar con alguien sobre lo que te pasa?",
    "5. ¿Has tenido sensación de aislamiento o rechazo social?"
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

    if (total <= 4) {
        msg = 'Lo que nos cuentas no muestra señales claras de acoso.Aún así en algun momento sientes que algo no va bien, no dudes en hablar con alguien de confianza. ¡Estamos aquí para ayudarte!    ';
        color = '#4ade80';
    } else if (total <= 9) {
        msg = '¡Lo que describes merece atención!.Hay situaciones que no deberian estar pasando y que tienen solución.Te recomendamos leer nuestros recursos o hablar con alguien de confianza. Si quieres,tambien puedes escribirnos para orientarte mejor.    ';
        color = '#fbbf24';
    } else {
        msg = 'Lo que estás viviendo es serio u no deberias cargarlo solo/a. Hay personas preparadas para ayudarte ahora mismo.Da igual si no tienes del todo claro lo que está pasando,eso tambien es motivo de preocupación. No dudes en pedir ayuda, ¡estamos aquí para ti!      ';
        color = '#f87171';
    }

    document.getElementById('testClinico').style.display = 'none';
    const res = document.getElementById('resultadoClinico');
    res.style.display = 'block';
    res.innerHTML = `<p class="resultado-texto" style="color:${color}">${msg}</p>
        <a class="btn-help" href="">Pedir ayuda</a>`;
}

document.addEventListener('DOMContentLoaded', renderPregunta);
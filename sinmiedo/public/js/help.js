function calcularClinico() {

    let form = document.getElementById("testClinico");

    // VALIDACIÓN: comprobar campos vacíos
    if (
        form.q1.value === "" ||
        form.q2.value === "" ||
        form.q3.value === "" ||
        form.q4.value === "" ||
        form.q5.value === ""
    ) {
        let resultado = document.getElementById("resultadoClinico");
        resultado.innerHTML = `
            <h3>⚠️ Formulario incompleto</h3>
            <p>Por favor, responde todas las preguntas antes de ver el resultado.</p>
        `;
        return; // bloquea el cálculo
    }

    // CÁLCULO (tu lógica original)
    let total =
        parseInt(form.q1.value) +
        parseInt(form.q2.value) +
        parseInt(form.q3.value) +
        parseInt(form.q4.value) +
        parseInt(form.q5.value);

    let resultado = document.getElementById("resultadoClinico");

    let mensaje = "";
    let nivel = "";

    if (total <= 4) {
        nivel = "🟢 Bajo malestar";
        mensaje = "No se observan señales relevantes de afectación emocional en este momento.";
    }

    else if (total <= 8) {
        nivel = "🟠 Malestar moderado";
        mensaje = "Existen señales de incomodidad emocional. Hablar con alguien de confianza puede ser útil.";
    }

    else if (total <= 12) {
        nivel = "🔴 Malestar alto";
        mensaje = "Se observan señales importantes de malestar emocional. Se recomienda apoyo psicológico.";
    }

    else {
        nivel = "🚨 Riesgo elevado";
        mensaje = "Es importante buscar ayuda profesional lo antes posible. No estás solo/a.";
    }

    resultado.innerHTML = `
        <h3>${nivel}</h3>
        <p>${mensaje}</p>
        <a href="#ayuda" class="btn-help">Solicitar ayuda</a>
    `;
}
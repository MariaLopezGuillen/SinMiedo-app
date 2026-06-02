<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/help.css') }}">
    <script src="{{ asset('js/help.js') }}" defer></script>
</head>

<body>
    <div class="test-container">

        <h2>Evaluación de bienestar emocional</h2>
        <p>Este cuestionario no es diagnóstico clínico. Solo ayuda a detectar posibles señales de malestar.</p>

        <form id="testClinico">

            <label>1. En las últimas semanas, ¿te has sentido triste o sin energía?</label>
            <select name="q1">
                <option value="">Seleccione una opción</option>
                <option value="0">Nunca</option>
                <option value="1">A veces</option>
                <option value="2">Frecuentemente</option>
                <option value="3">Casi siempre</option>
            </select>

            <label>2. ¿Has sentido miedo o inseguridad en tu entorno social o escolar?</label>
            <select name="q2">
                <option value="">Seleccione una opción</option>
                <option value="0">Nunca</option>
                <option value="1">A veces</option>
                <option value="2">Frecuentemente</option>
                <option value="3">Casi siempre</option>
            </select>

            <label>3. ¿Has evitado situaciones por miedo a ser juzgado/a o atacado/a?</label>
            <select name="q3">
                <option value="">Seleccione una opción</option>
                <option value="0">Nunca</option>
                <option value="1">A veces</option>
                <option value="2">Frecuentemente</option>
                <option value="3">Casi siempre</option>
            </select>

            <label>4. ¿Te cuesta hablar con alguien sobre lo que te pasa?</label>
            <select name="q4">
                <option value="">Seleccione una opción</option>
                <option value="0">Nunca</option>
                <option value="1">A veces</option>
                <option value="2">Frecuentemente</option>
                <option value="3">Casi siempre</option>
            </select>

            <label>5. ¿Has tenido sensación de aislamiento o rechazo social?</label>
            <select name="q5">
                <option value="">Seleccione una opción</option>
                <option value="0">Nunca</option>
                <option value="1">A veces</option>
                <option value="2">Frecuentemente</option>
                <option value="3">Casi siempre</option>
            </select>

            <button type="button" onclick="calcularClinico()">Ver resultado</button>

        </form>

        <div id="resultadoClinico"></div>
    </div>
</body>

</html>
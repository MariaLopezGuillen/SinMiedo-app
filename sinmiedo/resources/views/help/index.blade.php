<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación de bienestar</title>
    <link rel="stylesheet" href="{{ asset('css/help.css') }}">
    <script src="{{ asset('js/help.js') }}" defer></script>
</head>

<body>
    <div class="test-container">

        <h2>Evaluación de bienestar emocional</h2>
        <p>Este cuestionario no es diagnóstico clínico. Solo ayuda a detectar posibles señales de malestar.</p>

        <div class="dots" id="dots"></div>

        <div class="progress-label" id="progressLabel">Pregunta 1 de 5</div>
        <div class="progress-bar-bg">
            <div class="progress-bar-fill" id="progressBar"></div>
        </div>

        <form id="testClinico">
            <div id="questionArea"></div>
            <div class="error-msg" id="errorMsg"></div>
            <div class="btn-row">
                <button type="button" id="btnPrev" onclick="prevQuestion()">← Anterior</button>
                <button type="button" id="btnNext" onclick="nextQuestion()">Siguiente →</button>
            </div>
        </form>

        <div id="resultadoClinico"></div>

    </div>
</body>

</html>
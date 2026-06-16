<!DOCTYPE html>
<html lang="es">
<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/report.css') }}">
    </x-slot>




    <body>

        <div class="container">

            <h2>🛡️ Reportar bullying</h2>

            <p class="subtitle">
                Este formulario es completamente anónimo.
            </p>

            <div class="warning">
                Tu identidad nunca será visible
            </div>

            <form action="{{ route('reports.store') }}" method="POST">

                <label>Tipo de situación</label>
                <select name="category">
                    <option value="">Selecciona</option>
                    <option value="verbal">Insultos / humillaciones</option>
                    <option value="fisico">Agresiones físicas</option>
                    <option value="digital">Acoso online</option>
                    <option value="social">Exclusión social</option>
                </select>

                <label>¿Qué está pasando?</label>
                <textarea name="description" placeholder="Describe la situación..."></textarea>

                <div class="row">

                    <div>
                        <label>¿Dónde ocurre?</label>
                        <select name="location">
                            <option value="aula">Aula</option>
                            <option value="patio">Patio</option>
                            <option value="online">Online</option>
                            <option value="pasillos">Pasillos</option>
                        </select>
                    </div>

                    <div>
                        <label>Frecuencia</label>
                        <select name="frequency">
                            <option value="una_vez">Una vez</option>
                            <option value="a_veces">A veces</option>
                            <option value="frecuente">Frecuente</option>
                            <option value="diario">Todos los días</option>
                        </select>
                    </div>

                </div>

                <label>¿A quién afecta?</label>
                <select name="victim_type">
                    <option value="self">A mí</option>
                    <option value="other">A otra persona</option>
                    <option value="unknown">No estoy seguro</option>
                </select>

                <label>Número de personas implicadas</label>
                <input type="number" name="aggressors" min="1" max="20">

                <div class="row">

                    <div>
                        <label>Emoción</label>
                        <select name="emotion">
                            <option value="triste">Triste</option>
                            <option value="miedo">Miedo</option>
                            <option value="ansiedad">Ansiedad</option>
                            <option value="rabia">Rabia</option>
                        </select>
                    </div>

                    <div>
                        <label>Intensidad (1-5)</label>
                        <input type="range" name="intensity" min="1" max="5">
                    </div>

                </div>

                <button type="submit">🚨 Enviar reporte anónimo</button>

            </form>

        </div>

    </body>
    <x-footer></x-footer>
</x-app-layout>

</html>
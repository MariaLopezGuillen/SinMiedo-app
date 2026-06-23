@extends('diary.layout')

@section('content')
<div class="unlock-container">
    <div class="unlock-card">
        <div class="unlock-icon">🔒</div>
        <h2>Entrada Privada</h2>
        <p>Esta entrada está protegida. Introduce la contraseña para continuar.</p>
        
        <form action="{{ route('diary.unlock', $entry) }}" method="POST" class="unlock-form">
            @csrf
            <div class="form-group">
                <input type="password" 
                       name="password" 
                       placeholder="Contraseña"
                       required
                       autofocus>
            </div>
            <button type="submit" class="btn-primary btn-large">Desbloquear</button>
        </form>
        
        <a href="{{ route('diary.index') }}" class="back-link">← Volver al diario</a>
    </div>
</div>
@endsection
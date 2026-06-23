@extends('diary.layout')

@section('content')
<div class="form-container">
    <div class="form-header">
        <h2>Nueva Entrada</h2>
        <p>Escribe lo que sientes. Este es tu espacio seguro.</p>
    </div>

    <form action="{{ route('diary.store') }}" method="POST" class="diary-form" id="entryForm">
        @csrf
        
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title') }}" 
                   placeholder="¿Sobre qué quieres escribir hoy?"
                   required>
            @error('title')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>¿Cómo te sientes hoy?</label>
            <div class="mood-selector">
                <label class="mood-option">
                    <input type="radio" name="mood" value="happy" {{ old('mood') == 'happy' ? 'checked' : '' }}>
                    <span class="mood-label">😊 Feliz</span>
                </label>
                <label class="mood-option">
                    <input type="radio" name="mood" value="neutral" {{ old('mood', 'neutral') == 'neutral' ? 'checked' : '' }}>
                    <span class="mood-label">😐 Neutral</span>
                </label>
                <label class="mood-option">
                    <input type="radio" name="mood" value="sad" {{ old('mood') == 'sad' ? 'checked' : '' }}>
                    <span class="mood-label">😢 Triste</span>
                </label>
                <label class="mood-option">
                    <input type="radio" name="mood" value="angry" {{ old('mood') == 'angry' ? 'checked' : '' }}>
                    <span class="mood-label">😠 Enfadado</span>
                </label>
                <label class="mood-option">
                    <input type="radio" name="mood" value="anxious" {{ old('mood') == 'anxious' ? 'checked' : '' }}>
                    <span class="mood-label">😰 Ansioso</span>
                </label>
            </div>
            @error('mood')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Tu historia</label>
            <textarea id="content" 
                      name="content" 
                      rows="12" 
                      placeholder="Desahógate aquí... nadie más lo verá a menos que tú quieras."
                      required>{{ old('content') }}</textarea>
            <div class="char-counter">
                <span id="charCount">0</span> caracteres
            </div>
            @error('content')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group privacy-section">
            <label class="privacy-toggle">
                <input type="checkbox" name="is_private" id="isPrivate" value="1" {{ old('is_private') ? 'checked' : '' }}>
                <span class="toggle-slider"></span>
                <span class="toggle-label">Hacer esta entrada privada</span>
            </label>
            <p class="privacy-hint">Las entradas privadas requieren contraseña para ser vistas.</p>
            
            <div class="password-field" id="passwordField" style="display: none;">
                <label for="password">Contraseña de protección</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       placeholder="Mínimo 4 caracteres"
                       minlength="4">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('diary.index') }}" class="btn-secondary">Cancelar</a>
            <button type="submit" class="btn-primary btn-large">
                <span>💾</span> Guardar Entrada
            </button>
        </div>
    </form>
</div>
@endsection
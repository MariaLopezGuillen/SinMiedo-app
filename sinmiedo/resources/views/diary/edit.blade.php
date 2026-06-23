@extends('diary.layout')

@section('content')
<div class="form-container">
    <div class="form-header">
        <h2>Editar Entrada</h2>
        <p>Modifica lo que necesites.</p>
    </div>

    <form action="{{ route('diary.update', $entry) }}" method="POST" class="diary-form" id="entryForm">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title', $entry->title) }}" 
                   required>
            @error('title')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>¿Cómo te sientes?</label>
            <div class="mood-selector">
                <label class="mood-option">
                    <input type="radio" name="mood" value="happy" {{ old('mood', $entry->mood) == 'happy' ? 'checked' : '' }}>
                    <span class="mood-label">😊 Feliz</span>
                </label>
                <label class="mood-option">
                    <input type="radio" name="mood" value="neutral" {{ old('mood', $entry->mood) == 'neutral' ? 'checked' : '' }}>
                    <span class="mood-label">😐 Neutral</span>
                </label>
                <label class="mood-option">
                    <input type="radio" name="mood" value="sad" {{ old('mood', $entry->mood) == 'sad' ? 'checked' : '' }}>
                    <span class="mood-label">😢 Triste</span>
                </label>
                <label class="mood-option">
                    <input type="radio" name="mood" value="angry" {{ old('mood', $entry->mood) == 'angry' ? 'checked' : '' }}>
                    <span class="mood-label">😠 Enfadado</span>
                </label>
                <label class="mood-option">
                    <input type="radio" name="mood" value="anxious" {{ old('mood', $entry->mood) == 'anxious' ? 'checked' : '' }}>
                    <span class="mood-label">😰 Ansioso</span>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="content">Tu historia</label>
            <textarea id="content" 
                      name="content" 
                      rows="12" 
                      required>{{ old('content', $entry->content) }}</textarea>
            <div class="char-counter">
                <span id="charCount">0</span> caracteres
            </div>
        </div>

        <div class="form-group privacy-section">
            <label class="privacy-toggle">
                <input type="checkbox" name="is_private" id="isPrivate" value="1" {{ old('is_private', $entry->is_private) ? 'checked' : '' }}>
                <span class="toggle-slider"></span>
                <span class="toggle-label">Hacer esta entrada privada</span>
            </label>
            <p class="privacy-hint">Dejar en blanco para mantener la contraseña actual, o escribe una nueva.</p>
            
            <div class="password-field" id="passwordField" style="{{ old('is_private', $entry->is_private) ? '' : 'display: none;' }}">
                <label for="password">Nueva contraseña (opcional)</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       placeholder="Mínimo 4 caracteres"
                       minlength="4">
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('diary.index') }}" class="btn-secondary">Cancelar</a>
            <button type="submit" class="btn-primary btn-large">
                <span>💾</span> Actualizar Entrada
            </button>
        </div>
    </form>
</div>
@endsection
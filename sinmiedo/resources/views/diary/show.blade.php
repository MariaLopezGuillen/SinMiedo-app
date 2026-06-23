@extends('diary.layout')

@section('content')
<div class="entry-detail">
    <div class="entry-detail-header">
        <div class="entry-detail-mood">
            @switch($entry->mood)
                @case('happy')
                    <span class="mood-icon-large mood-happy">😊</span>
                    <span class="mood-text">Feliz</span>
                    @break
                @case('sad')
                    <span class="mood-icon-large mood-sad">😢</span>
                    <span class="mood-text">Triste</span>
                    @break
                @case('angry')
                    <span class="mood-icon-large mood-angry">😠</span>
                    <span class="mood-text">Enfadado</span>
                    @break
                @case('anxious')
                    <span class="mood-icon-large mood-anxious">😰</span>
                    <span class="mood-text">Ansioso</span>
                    @break
                @default
                    <span class="mood-icon-large mood-neutral">😐</span>
                    <span class="mood-text">Neutral</span>
            @endswitch
        </div>
        
        <div class="entry-detail-meta">
            <h1>{{ $entry->title }}</h1>
            <div class="meta-info">
                <span>📅 {{ $entry->created_at->format('d de F de Y') }}</span>
                <span>🕐 {{ $entry->created_at->format('H:i') }}</span>
                @if($entry->is_private)
                    <span class="private-tag">🔒 Privada</span>
                @endif
            </div>
        </div>
    </div>

    <div class="entry-detail-content">
        {!! nl2br(e($entry->content)) !!}
    </div>

    <div class="entry-detail-actions">
        <a href="{{ route('diary.index') }}" class="btn-secondary">← Volver</a>
        <a href="{{ route('diary.edit', $entry) }}" class="btn-primary">✏️ Editar</a>
        <form action="{{ route('diary.destroy', $entry) }}" method="POST" class="delete-form" onsubmit="return confirmDelete(event)">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">🗑️ Eliminar</button>
        </form>
    </div>
</div>
@endsection
@extends('diary.layout')

@section('content')
<div class="entries-container">
    <div class="entries-header">
        <h2>Mis Entradas</h2>
        <span class="entries-count">{{ $entries->count() }} {{ $entries->count() == 1 ? 'entrada' : 'entradas' }}</span>
    </div>

    @if($entries->isEmpty())
        <div class="empty-state">
            <div class="empty-icon">📝</div>
            <h3>Tu diario está vacío</h3>
            <p>Comienza escribiendo tu primera entrada. Es un espacio seguro para tus pensamientos.</p>
            <a href="{{ route('diary.create') }}" class="btn-primary">Escribir mi primera entrada</a>
        </div>
    @else
        <div class="entries-grid">
            @foreach($entries as $entry)
            <article class="entry-card {{ $entry->is_private ? 'entry-private' : '' }}">
                <div class="entry-mood">
                    @switch($entry->mood)
                        @case('happy')
                            <span class="mood-icon mood-happy">😊</span>
                            @break
                        @case('sad')
                            <span class="mood-icon mood-sad">😢</span>
                            @break
                        @case('angry')
                            <span class="mood-icon mood-angry">😠</span>
                            @break
                        @case('anxious')
                            <span class="mood-icon mood-anxious">😰</span>
                            @break
                        @default
                            <span class="mood-icon mood-neutral">😐</span>
                    @endswitch
                </div>
                
                <div class="entry-content">
                    <h3 class="entry-title">
                        @if($entry->is_private)
                            <span class="private-badge">🔒</span>
                        @endif
                        {{ $entry->title }}
                    </h3>
                    <p class="entry-excerpt">{{ Str::limit(strip_tags($entry->content), 120) }}</p>
                    <div class="entry-meta">
                        <span class="entry-date">{{ $entry->created_at->format('d M Y') }}</span>
                        <span class="entry-time">{{ $entry->created_at->format('H:i') }}</span>
                    </div>
                </div>

                <div class="entry-actions">
                    @if($entry->is_private)
                        <a href="{{ route('diary.show', $entry) }}" class="btn-icon" title="Desbloquear">
                            <span>🔓</span>
                        </a>
                    @else
                        <a href="{{ route('diary.show', $entry) }}" class="btn-icon" title="Leer">
                            <span>👁️</span>
                        </a>
                    @endif
                    <a href="{{ route('diary.edit', $entry) }}" class="btn-icon" title="Editar">
                        <span>✏️</span>
                    </a>
                    <form action="{{ route('diary.destroy', $entry) }}" method="POST" class="delete-form" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-icon btn-delete" title="Eliminar">
                            <span>🗑️</span>
                        </button>
                    </form>
                </div>
            </article>
            @endforeach
        </div>
    @endif
</div>
@endsection
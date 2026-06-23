<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DiaryController extends Controller
{
    // Listar todas las entradas
    public function index()
    {
        $entries = Entry::latest()->get();
        return view('diary.index', compact('entries'));
    }

    // Formulario nueva entrada
    public function create()
    {
        return view('diary.create');
    }

    // Guardar nueva entrada
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'mood' => 'required|string|in:happy,sad,neutral,angry,anxious',
            'is_private' => 'boolean',
            'password' => 'nullable|string|min:4',
        ]);

        if ($request->has('is_private') && $request->password) {
            $validated['password'] = Hash::make($request->password);
        } else {
            $validated['password'] = null;
            $validated['is_private'] = false;
        }

        Entry::create($validated);

        return redirect()->route('diary.index')
            ->with('success', 'Entrada guardada en tu diario privado.');
    }

    // Ver entrada individual
    public function show(Entry $entry)
    {
        if ($entry->is_private) {
            return view('diary.unlock', compact('entry'));
        }
        return view('diary.show', compact('entry'));
    }

    // Desbloquear entrada privada
    public function unlock(Request $request, Entry $entry)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if (Hash::check($request->password, $entry->password)) {
            return view('diary.show', compact('entry'));
        }

        return back()->with('error', 'Contraseña incorrecta.');
    }

    // Formulario editar
    public function edit(Entry $entry)
    {
        return view('diary.edit', compact('entry'));
    }

    // Actualizar entrada
    public function update(Request $request, Entry $entry)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'mood' => 'required|string|in:happy,sad,neutral,angry,anxious',
            'is_private' => 'boolean',
            'password' => 'nullable|string|min:4',
        ]);

        if ($request->has('is_private') && $request->password) {
            $validated['password'] = Hash::make($request->password);
        } else {
            $validated['password'] = null;
            $validated['is_private'] = false;
        }

        $entry->update($validated);

        return redirect()->route('diary.index')
            ->with('success', 'Entrada actualizada correctamente.');
    }

    // Eliminar entrada
    public function destroy(Entry $entry)
    {
        $entry->delete();
        return redirect()->route('diary.index')
            ->with('success', 'Entrada eliminada permanentemente.');
    }
}
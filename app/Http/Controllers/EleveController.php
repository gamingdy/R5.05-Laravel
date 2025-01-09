<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EleveController extends Controller{

    public function index (): View | Factory | Application {
        $eleves = Eleve::all();
        return view('eleves.index', compact('eleves'));
    }

    public function destroy (Eleve $eleve): RedirectResponse {
        $eleve->delete();
        return redirect()->route('eleves.index')->with('success', 'Élève supprimé avec succès');
    }

    public function edit (Eleve $eleve): View | Factory | Application {
        return view('eleves.edit', compact('eleve'));
    }

    public function update (Request $request, Eleve $eleve): RedirectResponse {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numero_etudiant' => 'required|string|max:255|unique:eleves,numero_etudiant,' . $eleve->id,
            'email' => 'required|email|max:255|unique:eleves,email,' . $eleve->id,
            'image' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $eleve->image = $photoPath;
        }
        $request->merge(['image' => $eleve->image]);

        $eleve->update($request->except('photo'));

        return redirect()->route('eleves.index')->with('success', 'Élève modifié avec succès');
    }


    public function store (Request $request): RedirectResponse {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numero_etudiant' => 'required|string|max:255|unique:eleves',
            'email' => 'required|email|max:255|unique:eleves',
            'image' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->input('image');
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $image = $photoPath;
        }
        $request->merge(['image' => $image]);

        Eleve::create($request->except('photo'));

        return redirect()->route('eleves.create')->with('success', 'Élève ajouté avec succès');
    }

    public function create (): View | Factory | Application {
        return view('eleves.create');
    }

    public function show (Eleve $eleve): View | Factory | Application {
        return view('eleves.show', compact('eleve'));
    }

    public function showGrades (Eleve $eleve): View {
        return view('eleves.grades', compact('eleve'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\EvaluationEleve;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EvaluationEleveController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index (): View | Factory | Application {
        $evaluation_eleves = EvaluationEleve::with(['evaluation', 'eleve'])->get();
        return view('evaluation_eleves.index', compact('evaluation_eleves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (Request $request): RedirectResponse {
        $request->validate([
            'evaluation_id' => 'required|exists:evaluations,id',
            'eleve_id' => 'required|exists:eleves,id',
            'note' => 'required|integer',
        ]);

        EvaluationEleve::create($request->all());
        return redirect()->route('evaluation_eleves.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create (): View | Factory | Application {
        $evaluations = Evaluation::all();
        $eleves = Eleve::all();
        return view('evaluation_eleves.create', compact('evaluations', 'eleves'));
    }

    /**
     * Display the specified resource.
     */
    public function show (EvaluationEleve $evaluationEleve): View | Factory | Application {
        return view('evaluation_eleves.show', compact('evaluationEleve'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit (EvaluationEleve $evaluationEleve): View | Factory | Application {
        $evaluations = Evaluation::all();
        $eleves = Eleve::all();
        return view('evaluation_eleves.edit', compact('evaluationEleve', 'evaluations', 'eleves'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update (Request $request, EvaluationEleve $evaluationEleve): RedirectResponse {
        $request->validate([
            'evaluation_id' => 'required|exists:evaluations,id',
            'eleve_id' => 'required|exists:eleves,id',
            'note' => 'required|integer',
        ]);

        $evaluationEleve->update($request->all());
        return redirect()->route('evaluation_eleves.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy (EvaluationEleve $evaluationEleve): RedirectResponse {
        $evaluationEleve->delete();
        return redirect()->route('evaluation_eleves.index');
    }
}

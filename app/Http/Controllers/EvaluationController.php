<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Module;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EvaluationController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index (): View | Factory | Application {
        $evaluations = Evaluation::with('module')->get();
        return view('evaluations.index', compact('evaluations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (Request $request): RedirectResponse {
        $request->validate([
            'date' => 'required|date',
            'titre' => 'required',
            'coefficient' => 'required|integer',
            'module_code' => 'required|exists:modules,code',
        ]);

        $moduleId = Module::getIdByCode($request->input('module_code'));

        Evaluation::create([
            'date' => $request->input('date'),
            'titre' => $request->input('titre'),
            'coefficient' => $request->input('coefficient'),
            'module_id' => $moduleId,
        ]);
        return redirect()->route('evaluations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create (): View | Factory | Application {
        return view('evaluations.create');
    }

    /**
     * Display the specified resource.
     */
    public function show (Evaluation $evaluation): View | Factory | Application {
        $notes = $evaluation->evaluationEleves()->get();
        return view('evaluations.show', compact('evaluation', 'notes'));
    }

    public function showUnderAverage (Evaluation $evaluation): View | Factory | Application {
        $notes = $evaluation->evaluationEleves()->where('note', '<', 10)->get();
        return view('evaluations.show', compact('evaluation', 'notes'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit (Evaluation $evaluation): View | Factory | Application {
        $module = $evaluation->module()->first();
        return view('evaluations.edit', compact('evaluation', 'module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update (Request $request, Evaluation $evaluation): RedirectResponse {
        $request->validate([
            'date' => 'required|date',
            'titre' => 'required',
            'coefficient' => 'required|integer',
            'module_code' => 'required|exists:modules,code',
        ]);

        $moduleId = Module::getIdByCode($request->input('module_code'));

        $evaluation->update([
            'date' => $request->input('date'),
            'titre' => $request->input('titre'),
            'coefficient' => $request->input('coefficient'),
            'module_id' => $moduleId,
        ]);
        return redirect()->route('evaluations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy (Evaluation $evaluation): RedirectResponse {
        $evaluation->delete();
        return redirect()->route('evaluations.index');
    }
}

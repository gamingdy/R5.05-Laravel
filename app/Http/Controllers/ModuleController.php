<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ModuleController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index (): View | Factory | Application {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (Request $request): RedirectResponse {
        $request->validate([
            'code' => 'required|unique:modules',
            'nom' => 'required',
            'coefficient' => 'required|integer',
        ]);

        Module::create($request->all());
        return redirect()->route('modules.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create (): View | Factory | Application {
        return view('modules.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit (Module $module): View | Factory | Application {
        return view('modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update (Request $request, Module $module): RedirectResponse {
        $request->validate([
            'code' => 'required|unique:modules,code,' . $module->id,
            'nom' => 'required',
            'coefficient' => 'required|integer',
        ]);

        $module->update($request->all());
        return redirect()->route('modules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy (Module $module): RedirectResponse {
        $module->delete();
        return redirect()->route('modules.index');
    }
}

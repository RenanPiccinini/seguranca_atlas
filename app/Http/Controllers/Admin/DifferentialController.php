<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Differential;
use Illuminate\Http\Request;

class DifferentialController extends Controller
{
    public function index()
    {
        $differentials = Differential::orderBy('display_order', 'asc')->get();
        return view('admin.differentials.index', compact('differentials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:120',
            'subtitle' => 'nullable|string|max:80',
            'description' => 'required|string|max:1000',
            'highlight_number' => 'nullable|string|max:40',
            'highlight_label' => 'nullable|string|max:80',
            'display_order' => 'nullable|integer',
        ]);

        Differential::create([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'],
            'description' => $validated['description'],
            'highlight_number' => $validated['highlight_number'] ?? '100%',
            'highlight_label' => $validated['highlight_label'] ?? 'Padrão Atlas',
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => true,
        ]);

        return redirect()->back()->with('success', 'Diferencial cadastrado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $diff = Differential::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:120',
            'subtitle' => 'nullable|string|max:80',
            'description' => 'required|string|max:1000',
            'highlight_number' => 'nullable|string|max:40',
            'highlight_label' => 'nullable|string|max:80',
            'display_order' => 'nullable|integer',
        ]);

        $diff->update([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'],
            'description' => $validated['description'],
            'highlight_number' => $validated['highlight_number'],
            'highlight_label' => $validated['highlight_label'],
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Diferencial atualizado!');
    }

    public function destroy($id)
    {
        $diff = Differential::findOrFail($id);
        $diff->delete();

        return redirect()->back()->with('success', 'Diferencial removido com sucesso.');
    }
}

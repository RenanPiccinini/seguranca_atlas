<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('display_order', 'asc')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:120',
            'badge' => 'nullable|string|max:80',
            'icon' => 'nullable|string|max:50',
            'short_description' => 'required|string|max:500',
            'full_description' => 'required|string|max:3000',
            'features' => 'nullable|string',
            'benefits' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|max:8192',
        ]);

        $imagePath = 'images/atlas/usinas-vigia.jpg';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($validated['title']) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/atlas/custom'), $filename);
            $imagePath = 'images/atlas/custom/' . $filename;
        }

        $featuresArr = array_filter(array_map('trim', explode("\n", $request->input('features', ''))));
        $benefitsArr = array_filter(array_map('trim', explode("\n", $request->input('benefits', ''))));

        Service::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'badge' => $validated['badge'] ?? 'Atlas Especializado',
            'icon' => $validated['icon'] ?? 'shield-check',
            'short_description' => $validated['short_description'],
            'full_description' => $validated['full_description'],
            'image' => $imagePath,
            'features' => array_values($featuresArr),
            'benefits' => array_values($benefitsArr),
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Serviço cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:120',
            'badge' => 'nullable|string|max:80',
            'icon' => 'nullable|string|max:50',
            'short_description' => 'required|string|max:500',
            'full_description' => 'required|string|max:3000',
            'features' => 'nullable|string',
            'benefits' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'image' => 'nullable|image|max:8192',
        ]);

        $data = [
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'badge' => $validated['badge'] ?? 'Atlas Especializado',
            'icon' => $validated['icon'] ?? 'shield-check',
            'short_description' => $validated['short_description'],
            'full_description' => $validated['full_description'],
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($validated['title']) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/atlas/custom'), $filename);
            $data['image'] = 'images/atlas/custom/' . $filename;
        }

        $featuresArr = array_filter(array_map('trim', explode("\n", $request->input('features', ''))));
        $benefitsArr = array_filter(array_map('trim', explode("\n", $request->input('benefits', ''))));
        $data['features'] = array_values($featuresArr);
        $data['benefits'] = array_values($benefitsArr);

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', "Serviço '{$service->title}' atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $title = $service->title;
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', "Serviço '{$title}' excluído.");
    }
}

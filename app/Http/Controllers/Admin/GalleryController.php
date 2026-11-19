<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = GalleryItem::orderBy('display_order', 'asc')->get();
        return view('admin.gallery.index', compact('photos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'category' => 'required|string|max:80',
            'description' => 'nullable|string|max:500',
            'display_order' => 'nullable|integer',
            'image' => 'required|image|max:8192',
        ]);

        $file = $request->file('image');
        $filename = time() . '_' . Str::slug($validated['title']) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/atlas/gallery'), $filename);
        $imagePath = 'images/atlas/gallery/' . $filename;

        GalleryItem::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'image' => $imagePath,
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => true,
        ]);

        return redirect()->back()->with('success', 'Nova foto adicionada à galeria com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $photo = GalleryItem::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'category' => 'required|string|max:80',
            'description' => 'nullable|string|max:500',
            'display_order' => 'nullable|integer',
            'image' => 'nullable|image|max:8192',
        ]);

        $data = [
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($validated['title']) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/atlas/gallery'), $filename);
            $data['image'] = 'images/atlas/gallery/' . $filename;
        }

        $photo->update($data);

        return redirect()->back()->with('success', 'Foto atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $photo = GalleryItem::findOrFail($id);
        $photo->delete();

        return redirect()->back()->with('success', 'Foto removida da galeria.');
    }
}

<?php


namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Category;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        // Load materials with their categories and transactions
        $materials = Material::with(['category', 'transactions'])
            ->get()
            ->map(function ($material) {
                $material->current_balance = $material->opening_balance + $material->transactions->sum('quantity');
                return $material;
            });

        return view('materials.index', compact('materials'));
    }
    

    public function create()
    {
        $categories = Category::all();
        return view('materials.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha_num',
            'category_id' => 'required',
            'opening_balance' => 'required|numeric',
        ]);
        Material::create($request->all());
        return redirect()->route('materials.index');
    }

    public function show(Material $material)
    {
        return view('materials.show', compact('material'));
    }

    public function edit(Material $material)
    {
        $categories = Category::all();
        return view('materials.edit', compact('material', 'categories'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'required|alpha_num',
            'category_id' => 'required',
            'opening_balance' => 'required|numeric',
        ]);
        $material->update($request->all());
        return redirect()->route('materials.index');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materials.index');
    }
}

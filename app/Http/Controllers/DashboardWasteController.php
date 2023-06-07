<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use App\Models\Category;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class DashboardWasteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.wastes.index',[
            'wastes' => Waste::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.wastes.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'name' => 'required|max:255|unique:wastes',
            'category_id' => 'required',
            'weight' => 'required'
        ]);

        Waste::create($ValidatedData);

        return redirect('/dashboard/wastes')->with('success', 'Data baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Waste $waste)
    {
        return view('dashboard.wastes.show',[
            'waste' => $waste
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Waste $waste)
    {
        return view('dashboard.wastes.edit',[
            'waste' => $waste,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Waste $waste)
    {
        $rules =[
            'category_id' => 'required',
            'weight' => 'required'
        ];

        if($request->name != $waste->name){
            $rules['name'] = 'required|unique:wastes';
        }

        $ValidatedData = $request->validate($rules);

        Waste::where('id', $waste->id)
             -> update($ValidatedData);

        return redirect('/dashboard/wastes')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Waste $waste)
    {
        Waste::destroy($waste->id);

        return redirect('/dashboard/wastes')->with('success', 'Data telah dihapus!');
    }
}

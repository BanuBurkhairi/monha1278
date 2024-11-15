<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $commodities = Commodity::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->orderBy('id')->paginate(10);
        return view('commodities.index', compact('commodities', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('commodities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'kode_kuesioner' => 'nullable',
            'note' => 'nullable',
        ]);

        Commodity::create($request->all());
        return redirect()->route('commodities.index')->with('success', "Komoditas '$request->name' Berhasil DiTambah");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commodity $commodity)
    {
        return view('commodities.edit', compact('commodity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commodity $commodity)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'kode_kuesioner' => 'nullable',
            'note' => 'nullable',
        ]);

        $commodity->update($request->all());
        return redirect()->route('commodities.index')->with('success', "Komoditas $request->name Berhasil DiPerbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commodity $commodity)
    {
        $commodity->delete();
        return redirect()->route('commodities.index')->with('success', "Komoditas $commodity->name Berhasil di Hapus");
    }
}

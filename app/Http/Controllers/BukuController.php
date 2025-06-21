<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataBuku = Buku::latest()->get();
        return view('Buku.index', compact('dataBuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'BookTitle' => 'required|string|max:255',
            'BookAuthor' => 'required|string|max:255',
            'BookYearAdd' => 'required',
            'cover' => 'required|mimes:png,jpg,jpeg',
        ]);

        $CreateBook = Buku::create($request->all());

        if ($request->hasFile('cover')) {
            $request->file('cover')->storeAs('/covers', $request->file('cover')->getClientOriginalName());
            $CreateBook->cover = $request->file('cover')->getClientOriginalName();
            $CreateBook->save();
        }

        return redirect()->route('Buku.index')->with('success', 'Buku Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku, $id)
    {
        //
        $dataOld = Buku::findOrFail($id);
        return view('buku.edit', compact('dataOld'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku, $id)
    {
        //
        $dataOld = Buku::findOrFail($id);
        $dataOld->update($request->all());
        if ($request->hasFile('cover')) {

            Storage::delete('/cover' . $dataOld->cover);
            $request->file('cover')->storeAs('/covers', $request->file('cover')->getClientOriginalName());
            $dataOld->cover = $request->file('cover')->getClientOriginalName();
            $dataOld->save();
        }
        return redirect()->route('Buku.index')->with('success', 'Data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku, $id)
    {
        //
        $data = Buku::findOrFail($id);
        $data->delete();
        return redirect()->route('Buku.index')->with('success', 'data berhasil di hapus');
    }
}

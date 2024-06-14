<?php

namespace App\Http\Controllers;

use App\Http\Requests\CataloguesFormRequest;
use App\Models\tb_catalogues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CataloguesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = tb_catalogues::orderBy('id', 'desc')->paginate(10);
        return view('catalogues.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catalogues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CataloguesFormRequest $request)
    {
        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        $data = $request->all();

        tb_catalogues::create([
            'image' => $image->hashName(),
            'package_name' => $data['package_name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'status_publish' => $data['status_publish'],

        ]);

        return redirect()->route('catalogues')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(string $id)
    {
        $data = tb_catalogues::find($id);
        return view('catalogues.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CataloguesFormRequest $request, string $id)
    {
        $data = tb_catalogues::find($id);

        $validatedData = $request->validated();

        // cek apakah ada file gambar yang diupload
        if ($request->hasFile('image')) {
            // mengahapus gambar lama
            Storage::delete('public/images' . $data->image);

            // upload gambar yang baru
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            // update data dengan gambar baru
            $data->update([
                'image' => $image->hashName(),
                'package_name' => $validatedData['package_name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'status_publish' => $validatedData['status_publish'],
            ]);

            // Jika tidak ada file gambar yang diupload, tetapkan nama gambar yang sudah ada 
        } else {
            $data->update([
                'package_name' => $validatedData['package_name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'status_publish' => $validatedData['status_publish'],
            ]);
        }

        return redirect()->route('catalogues')->with('success', ' Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = tb_catalogues::find($id)->delete();
        return redirect()->route('catalogues')->with('delete', 'Data berhasil dihapus');
    }
}

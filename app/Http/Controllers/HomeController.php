<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderFormRequest;
use App\Models\tb_catalogues;
use App\Models\tb_order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = tb_catalogues::where('status_publish', 'publish')->orderBy('id', 'desc')->paginate(4);
        return view('user.home', compact('data'));
    }

    public function kontak()
    {
        return view('user.kontak');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderFormRequest $request, $catalogueId)
    {
        $catalogue = tb_catalogues::findOrFail($catalogueId);
        $validated = $request->validated();

        // Cek apakah ada order dengan email dan wedding date yang sama pada id yang sama
        $existingOrder = tb_order::where('email', $validated['email'])
            ->where('wedding_date', $validated['wedding_date'])
            ->where('id', '!=', $catalogueId) // Memastikan tidak termasuk order yang sedang aktif
            ->first();

        if ($existingOrder) {
            return redirect()->back()->withErrors(['Maaf, Paket dan tanggal pernikahan sudah Anda pesan sebelumnya, silahkan tunggu konfirmasi dari kami.']);
        }

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'wedding_date' => $validated['wedding_date'],
            'catalogue_id' => $catalogue->id,
            'status' => 'requested', // Set the default status
            'user_id' => 0, // Set the user ID of the logged-in user
        ];

        $order = new tb_order($data);

        $catalogue->order()->save($order);

        return redirect()->route('katalog.show', $catalogueId)->with('success', 'Berhasil Mempesan Paket Yang Dipilih');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = tb_catalogues::findOrFail($id);
        return view('user.detail', compact('data'));
    }

    public function view()
    {
        $data = tb_catalogues::where('status_publish', 'publish')
            ->orderBy('id', 'desc')
            ->get();
        return view('user.view', compact('data'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

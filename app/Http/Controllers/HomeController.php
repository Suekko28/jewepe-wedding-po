<?php

namespace App\Http\Controllers;

use App\Models\tb_catalogues;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = tb_catalogues::where('status_publish','publish')->orderBy('id', 'desc')->paginate(4);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data = tb_catalogues::all();
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

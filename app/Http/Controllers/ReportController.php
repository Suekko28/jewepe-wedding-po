<?php

namespace App\Http\Controllers;

use App\Models\tb_order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data tb_order dengan mengelompokkan berdasarkan catalogue_id dan menghitung jumlahnya
        $data = tb_order::select('catalogue_id', tb_order::raw('count(*) as total_orders'))
            ->with([
                'catalogue' => function ($query) {
                    $query->select('id', 'package_name', 'price', 'image', 'status_publish');
                }
            ])
            ->groupBy('catalogue_id')
            ->orderBy('catalogue_id')
            ->paginate(10);

        return view('report.index', compact('data'));
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
        //
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

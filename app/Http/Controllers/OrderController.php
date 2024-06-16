<?php

namespace App\Http\Controllers;

use App\Models\tb_order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = tb_order::with('catalogue')->orderBy('id', 'desc')->paginate(10);
        return view('order.index', compact('data'));
    }

   
    public function update(Request $request, $id)
    {
        $order = tb_order::findOrFail($id);
        
        if ($order->status === 'requested') {
            // Update status to 'approved'
            $order->status = 'approved';
        } elseif ($order->status === 'approved') {
            // Revert status to 'requested'
            $order->status = 'requested';
        }
        
        $order->save();

        return redirect()->route('order')->with('success', 'Status pesanan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = tb_order::findOrFail($id);
        $order->delete();

        return redirect()->route('order')->with('delete', 'Pesanan berhasil dihapus.');
    }
}

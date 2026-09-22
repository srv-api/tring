<?php

namespace App\Http\Controllers;

use App\Models\TopUpOrder;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Halaman cek transaksi.
     */
    public function index()
    {
        return view('transaction.check');
    }

    /**
     * Cek transaksi berdasarkan Order ID.
     */
    public function check(Request $request)
    {
        $request->validate([
            'order_id' => [
                'required',
                'string',
                'max:100',
            ],
        ], [
            'order_id.required' => 'Silakan masukkan ID transaksi.',
            'order_id.string'   => 'ID transaksi tidak valid.',
            'order_id.max'      => 'ID transaksi terlalu panjang.',
        ]);

        $orderId = trim($request->order_id);

        $transaction = TopUpOrder::where('order_id', $orderId)->first();

        if (!$transaction) {
            return back()
                ->withInput()
                ->with('error', 'Transaksi dengan ID tersebut tidak ditemukan.');
        }

        return view('transaction.check', [
            'transaction' => $transaction,
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struk;

class MidtransController extends Controller
{

    public function handleRedirect(Request $request)
    {
        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $transactionStatus = $request->transaction_status;

        $struk = Struk::where('order_id', $orderId)->first();

        if ($struk) {
            // Update status di database sesuai status transaksi
            if ($transactionStatus === 'settlement') {
                $struk->status = 'berhasil';
            } elseif ($transactionStatus === 'pending') {
                $struk->status = 'pending';
            } else {
                $struk->status = $transactionStatus;
            }

            $struk->save();
        }

        return redirect()->route('frontend.struk.detail', ['kodestruk' => $struk->kode_struk])
            ->with('success', 'Pembayaran berhasil!');
    }

}

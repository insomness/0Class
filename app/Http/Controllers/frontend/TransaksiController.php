<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    public function upgradePremium()
    {
        return view('frontend.transaksi.upgrade');
    }

    public function kirimBuktiTransfer(Request $request)
    {
        $validate = $request->validate([
            'bukti_transfer' => 'mimes:png,jpg,jpeg|max:2048|required'
        ]);

        $path = $request->file('bukti_transfer')->store('bukti_tf', 'public');

        Transaksi::create([
            'user_id' => auth()->user()->id,
            'status' => 0,
            'bukti_transfer' => $path
        ]);

        return redirect()->route('upgrade_premium')->with('status', 'Berhasil mengirim bukti transfer');
    }

    public function kirimUlangBuktiTransfer(Request $request)
    {
        $validate = $request->validate([
            'bukti_transfer' => 'mimes:png,jpg,jpeg|max:2048|required'
        ]);

        $path = $request->file('bukti_transfer')->store('bukti_tf', 'public');
        $oldBuktiTransfer = auth()->user()->transaksi->first()->bukti_transfer;
        Storage::delete('public/'.$oldBuktiTransfer);

        $data = [
            'user_id' => auth()->user()->id,
            'status' => 0,
            'bukti_transfer' => $path
        ];

        Transaksi::firstWhere('user_id', '=', auth()->user()->id)->update($data);

        return redirect()->route('upgrade_premium')->with('status', 'Berhasil mengirim ulang bukti transfer');
    }
}

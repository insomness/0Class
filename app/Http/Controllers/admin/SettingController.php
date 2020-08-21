<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Rekening;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $rekening = Rekening::get();
        return view('admin.setting.index', compact(['setting', 'rekening']));
    }

    public function simpanSetting(Request $request)
    {
        $request->validate([
            'harga' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'rekening_id' => 'required|numeric',
            'about' => 'required'
        ]);

        $setting = Setting::first();
        $setting->update([
            'harga' => $request->harga,
            'rekening_id' => $request->rekening_id,
            'about' => $request->about
        ]);

        return redirect()->route('admin.setting.index')->with('status', 'Setting berhasil diperbarui');
    }
}

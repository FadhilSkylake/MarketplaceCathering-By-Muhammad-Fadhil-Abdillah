<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\User;

use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index()
    {
        $merchant = Merchant::with('user')->get();
        return view('merchant.index', compact('merchant'));
    }

    public function edit(Merchant $merchant)
    {
        return view('merchant.edit', compact('merchant',));
    }

    public function update(Request $request, Merchant $merchant)
    {
        $request->validate([
            'merchant_name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        $merchant->update($request->all());
        return redirect()->route('merchant.index')->with('success', 'Merchant berhasil diperbarui.');
    }

    public function destroy(Merchant $merchant)
    {
        $merchant->delete();

        return redirect()->route('merchant.index')
            ->with('success', 'Merchant deleted successfully.');
    }
}

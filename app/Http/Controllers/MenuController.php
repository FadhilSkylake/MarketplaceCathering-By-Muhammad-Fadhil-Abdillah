<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::all();
        return view('menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'foto_menu'     => 'required',
            'nama_menu'     => 'required',
            'deskripsi_menu'   => 'required',
            'harga_menu'   => 'required'
        ]);

        //upload image
        $image = $request->file('foto_menu');
        $image->storeAs('public/foto_menu', $image->hashName());

        //create menu
        Menu::create([
            'foto_menu'     => $image->hashName(),
            'nama_menu'     => $request->nama_menu,
            'deskripsi_menu'   => $request->deskripsi_menu,
            'harga_menu'   => $request->harga_menu
        ]);

        //redirect to index
        return redirect()->route('menu.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): view
    {
        $menu = Menu::findOrFail($id);
        return view('menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //get menu by ID
        $menu = Menu::findOrFail($id);

        //render view with menu
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // $this->validate($request, [
        //     // 'merchant_id' => 'required|integer',
        //     'nama_menu' => 'required|string|max:255',
        //     'deskripsi_menu' => 'required|string|max:255',
        //     'foto_menu' => 'required',
        //     'harga_menu' => 'required|string|max:255',
        // ]);

        //get menu by ID
        $menu = Menu::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('foto_menu')) {

            //upload new image
            $image = $request->file('foto_menu');
            $image->storeAs('public/foto_menu', $image->hashName());

            //delete old image
            Storage::delete('public/foto_menu/' . $menu->image);

            //update menu with new image
            $menu->update([
                'foto_menu'     => $image->hashName(),
                'nama_menu'     => $request->nama_menu,
                'deskripsi_menu'   => $request->deskripsi_menu,
                'harga_menu'   => $request->harga_menu
            ]);
        } else {

            //update menu without image
            $menu->update([
                'nama_menu'     => $request->nama_menu,
                'deskripsi_menu'   => $request->deskripsi_menu,
                'harga_menu'   => $request->harga_menu
            ]);
        }

        //redirect to index
        return redirect()->route('menu.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success', 'Menu deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DineIn;
use App\Models\Transaksi;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->get();
        return view('backend.v_transaksi.index', [
            'judul' => 'Data Transaksi',
            'sub' => 'Data Transaksi',
            'index' => $transaksi
        ]);
    }

    public function unduhPDF()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('backend.v_transaksi.document',[
            'unduhPDF' => $transaksi,
            'title' => 'Data Transaksi',
        ]);
        return $pdf->download('Data-Transaksi.pdf');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dinein = DineIn::orderBy('id', 'asc')->get();
        return view('backend.v_transaksi.create', [
            'judul' => 'Tambah Transaksi',
            'sub' => 'Tambah Transaksi',
            'dinein' => $dinein
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        // dd($request);
        $validatedData = $request->validate([
            'dinein_id' => 'required',
            'total_harga' => 'required',
        ]);
        DineIn::where('id', $request->id_dinein);
        Transaksi::create($validatedData);
        return redirect('/transaksi');
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
        $dinein = DineIn::orderBy('nama_dinein', 'asc')->get();
        $transaksi = Transaksi::find($id);
        return view('backend.v_transaksi.edit', [
            'judul' => 'Data Transaksi',
            'sub' => 'Ubah Transaksi',
            'edit' => $transaksi,
            'dinein' => $dinein
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'dinein_id' => 'required',
            'total_harga' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Transaksi::where('id', $id)->update($validatedData);
        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect('/transaksi');
    }

    public function getDineIn($id)
    {
        $dinein = DineIn::find($id);
        return response()->json($dinein);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Customer;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::orderBy('id', 'desc')->get();
        return view('backend.v_booking.index', [
            'judul' => 'Booking',
            'sub' => 'Data Booking',
            'index' => $booking
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::orderBy('nama', 'asc')->get();
        $customer = Customer::orderBy('nama_customer', 'asc')->get();
        return view('backend.v_booking.create', [
            'judul' => 'Data Booking',
            'sub' => 'Tambah Booking',
            'user' => $user,
            'customer' => $customer
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
            'user_id' => 'required',
            'customer_id' => 'required',
            'jam_booking' => 'required|max:255',
            'tanggal_booking' => 'required',
            'pembayaran_booking' => 'required',
            'no_meja' => 'required',
        ]);
        $validatedData['status'] = 0;
        Booking::create($validatedData);
        User::where('id', $request->user_id);
        Customer::where('id', $request->customer_id);
        return redirect('/booking');
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
        $user = User::orderBy('nama', 'asc')->get();
        $customer = Customer::orderBy('nama_customer', 'asc')->get();
        $booking = Booking::find($id);
        return view('backend.v_Booking.edit', [
            'judul' => 'Data Booking',
            'sub' => 'Ubah Booking',
            'edit' => $booking,
            'customer' => $customer,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'user_id' => 'required',
            'customer_id' => 'required',
            'jam_booking' => 'required|max:255',
            'tanggal_booking' => 'required',
            'status' => 'required',
            'pembayaran_booking' => 'required',
            'no_meja' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Booking::where('id', $id)->update($validatedData);
        return redirect('/booking');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect('/booking');
    }
}

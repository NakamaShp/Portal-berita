<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Agent;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'service', 'schedule'])->latest()->get();
        return view('admin.booking.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load(['user', 'service', 'schedule', 'agent']);
        return view('admin.booking.show', compact('booking'));
    }

    // Approve booking dan assign agent
    public function approve(Request $request, Booking $booking)
    {
        $request->validate([
            'agent_id' => 'nullable|exists:agents,id'
        ]);

        $booking->status = 'approved';
        $booking->agent_id = $request->agent_id;
        $booking->save();

        // TODO: kirim notifikasi email ke user

        return redirect()->route('admin.booking.index')->with('success', 'Booking disetujui.');
    }

    // Reject booking
    public function reject(Booking $booking)
    {
        $booking->status = 'rejected';
        $booking->save();

        // TODO: kirim notifikasi email ke user

        return redirect()->route('admin.booking.index')->with('success', 'Booking ditolak.');
    }
}

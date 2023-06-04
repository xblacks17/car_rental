<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RentalController extends Controller
{
    public function index()
    {

        return Inertia::render('Admin/Rentals', [
            'rentals' => Rental::all()
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'vehicle_id' => 'required',
            'start_date_time' => 'required',
            'end_date_time' => 'required',
            'drop_location' => 'required',
        ]);

        //update vehicle status
        $vehicle = Vehicle::find($request->vehicle_id);
        // $vehicle->update([
        //     'status' => 'unavailable',
        // ]);
        Rental::create([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => $user->id,
            'start_date_time' => $request->start_date_time,
            'end_date_time' => $request->end_date_time,
            'drop_location' => $request->drop_location,
            'status' => 'pending',
        ]);

        return redirect('/user/rentals');
    }

    public function edit(Rental $rental, Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'user_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'drop_location' => 'required',
            'status' => 'required',
        ]);

        $rental->update([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => $request->user_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'drop_off_location' => $request->drop_off_location,
            'status' => $request->status,
        ]);

        return redirect()->back();
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();

        return redirect()->back();
    }

    public function approve(Request $request)
    {
        $rental = Rental::find($request->rental_id);
        $rental->update([
            'status' => 'approved',
        ]);

        //update vehicle status
        $vehicle = Vehicle::find($rental->vehicle_id);
        $vehicle->update([
            'status' => 'unavailable',
        ]);

        return redirect()->back();
    }

}

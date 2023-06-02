<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Inertia\Inertia;

class VehicleController extends Controller
{
    public function index()
    {

        return Inertia::render('Admin/Cars', [
            'cars' => Vehicle::all(),
            'companies' => Company::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'reg_number' => 'required',
            'location' => 'required',
            'unit_price' => 'required',
            'mileage' => 'required',
            'company_id' => 'required',
            'description' => 'required',
            'status' => 'required',

        ]);
        //get image and upload
        $image = $request->file('image_url');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);


        Vehicle::create([
            'make' => $request->make,
            'model' => $request->model,
            'reg_number' => $request->reg_number,
            'image_url' => $imageName,
            'location' => $request->location,
            'unit_price' => $request->unit_price,
            'mileage' => $request->mileage,
            'company_id' => $request->company_id,
            'description' => $request->description,
            'status' => 'available',
        ]);

        return redirect()->back();
    }

    public function edit(Vehicle $car, Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'reg_number' => 'required',
            'image_url' => 'required',
            'location' => 'required',
            'unit_price' => 'required',
            'mileage' => 'required',
            'company_id' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $car->update([
            'make' => $request->make,
            'model' => $request->model,
            'reg_number' => $request->reg_number,
            'image_url' => $request->image_url,
            'location' => $request->location,
            'unit_price' => $request->unit_price,
            'mileage' => $request->mileage,
            'company_id' => $request->company_id,
            'description' => $request->description,
            'status' => $request->status,

        ]);

        return redirect()->back();
    }

    public function destroy(Vehicle $car)
    {
        $car->delete();

        return redirect()->back();
    }
}

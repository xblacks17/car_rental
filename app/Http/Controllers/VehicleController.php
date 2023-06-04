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
    public function cars(Request $request)
    {
        //check if we have location query
        if ($request->location) {

            //change location to lowercase
            $location = strtolower($request->location);
            
            $cars = Vehicle::where('location', $location)->where('status', 'available')->get();
        } else {
            $cars = Vehicle::where('status', 'available')->get();
        }

        return Inertia::render('Cars', [
            'cars' => $cars,
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
        //get image and upload to public folder
        $file = request()->file('image_url');
        $imageName = $file->store('cars', ['disk' => 'public']);

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

        //check if image is uploaded
        if ($request->hasFile('image_url')) {
            //get image and upload to public folder
            $file = request()->file('image_url');
            $imageName = $file->store('cars', ['disk' => 'public']);
            //update image
            $car->update([
                'image_url' => $imageName,
            ]);
        } else {
            $imageName = $car->image_url;
        }

        $car->update([
            'make' => $request->make,
            'model' => $request->model,
            'reg_number' => $request->reg_number,
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

    public function show(Vehicle $vehicle)
    {
        return Inertia::render('CarSingle', [
            'car' => $vehicle,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Prescription;
use App\Models\Test;


class indexController extends Controller
{
    public function index()
    {
       return view('frontend.index');
    }
    public function book()
    {
        $tests = Test::pluck('test_name', 'id');
        return view('frontend.book', compact('tests'));

    }

    public function storeForm(Request $request)
{
    $request->validate([
        'test_id' => 'required|exists:tests,id',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required|date_format:H:i',
        'prescription_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $prescription = new Prescription;
    $prescription->test_id = $request->test_id;
    $prescription->appointment_date = $request->appointment_date;
    $prescription->appointment_time = $request->appointment_time;

    if ($request->hasFile('prescription_image')) {
        $imagePath = $request->file('prescription_image')->store('prescriptions');
        $prescription->prescription_image = $imagePath;
    }

    $prescription->save();

    return redirect('/prescription-form')->with('success', 'Prescription submitted successfully!');
}


}


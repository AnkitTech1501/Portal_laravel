<?php

namespace App\Http\Controllers;

use App\Models\EmployerBond;

class EmployerBondController extends Controller
{
    //
    public function index()
    {
        // Return all employer bonds as a JSON response
        return response()->json(EmployerBond::all());
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Registration as ModelsRegistration;
use App\Services\Register;
use Illuminate\Http\Request;


class Registration extends Controller
{

    /**
     * @var Register
     */
    private $register;

    public function __construct(Register $register)
    {
        $this->register = $register;
    }

    public function index()
    {
        return ModelsRegistration::with('satisfaction')->paginate(10);
    }

    public function store(Request $request)
    {
        return $this->register->store($request);
    }

    public function show(ModelsRegistration $registration)
    {
        return $registration;
    }

    public function update(Request $request, $id)
    {
        return $this->register->update($request, $id);
    }

    public function destroy(ModelsRegistration $registration)
    {
        $registration->delete();
    }
}

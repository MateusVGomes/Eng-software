<?php

namespace App\Services;

use App\Models\Registration;
use App\Rules\EmailInstitucional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Register
{
    public function store(Request $request)
    {
        $valid = $this->validate($request);

        $registration = new Registration();

        $registration->fill($valid);

        $registration->save();

        return $registration;
    }

    public function update(Request $request, $id)
    {
        $valid = $this->validate($request);

        $registration = Registration::findOrFail($id);

        $registration->fill($valid);

        $registration->save();

        return $registration;
    }

    private function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string',
            'email' => ['required', 'email', new EmailInstitucional],
            'matricula' => 'required|string',
            'satisfaction_id' => 'required|exists:satisfactions,id|integer',
            'comunicacao' => 'required|boolean',
            'comunicacao_professores' => 'boolean',
            'comunicacao_coordenadores' => 'boolean',
            'avaliacoes' => 'boolean',
            'opiniao' => 'string',
        ]);

        return $validator->validate();
    }
}

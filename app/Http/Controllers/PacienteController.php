<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Cadastra um novo paciente
     */
    public function create(Request $request)
    {
        $cpfSemMascara = preg_replace('/[^0-9]/', '', $request->cpf);

        $paciente = Paciente::updateOrCreate(
            ['cpf' => $cpfSemMascara],
            [
                'nome' => $request->nome,
                'celular' => $request->celular
            ]
        );

        return response()->json($paciente);
    }

    /**
     * Atualiza os dados de um paciente específico
     */
    public function update(Request $request, $paciente_id)
    {
        $paciente = Paciente::findOrFail($paciente_id);

        $paciente->nome = $request->nome;

        $paciente->celular = $request->celular;

        $paciente->save();

        return response()->json($paciente);
    }
}
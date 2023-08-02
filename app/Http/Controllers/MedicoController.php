<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\MedicoPaciente;
use App\Models\Paciente;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Mostra todos os médicos cadastrados
     */
    public function index()
    {
        return response()->json(Medico::all());
    }

    /**
     * Cadastra um novo médico
     */
    public function create(Request $request)
    {
        $medico = new Medico();
        $medico->nome = $request->nome;
        $medico->especialidade = $request->especialidade;
        $medico->cidade_id = $request->cidade_id;

        $medico->save();

        return response()->json($medico);
    }

    /**
     * Vincula um paciente específico a um médico específico
     */
    public function vincular(Request $request, $medico_id)
    {
        $medico = Medico::findOrFail($medico_id);

        $paciente = Paciente::findOrFail($request['paciente_id']);

        $vinculoId = MedicoPaciente::firstOrCreate([
            'medico_id' => $medico->id,
            'paciente_id' => $paciente->id,
        ])->id;

        $vinculo = MedicoPaciente::with('medico', 'paciente')->findOrFail($vinculoId);

        return response()->json($vinculo);
    }

    /**
     * Mostra todos os pacientes de um médico específico
     */
    public function pacientes(string $medico_id)
    {
        $medico = Medico::findOrFail($medico_id);

        $pacientes = $medico->pacientes;

        return response()->json($pacientes);
    }
}
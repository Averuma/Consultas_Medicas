<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Mostra todas as cidades cadastradas
     */
    public function index()
    {
        return response()->json(Cidade::all());
    }

    /**
     * Mostra uma cidade específica e os médicos que pertencem a ela
     */
    public function medicos(int $cidade_id)
    {
        $medicosDaCidade = Cidade::with('medicos')->findOrFail($cidade_id);

        return response()->json($medicosDaCidade);
    }
}
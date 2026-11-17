<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->validate([
            'ID' => 'required|integer|unique:personal,ID',
            'Nombre' => 'required|string|max:120',
            'Correo' => 'required|email|max:200|unique:personal,Correo',
            'Asignatura' => 'required|in:Ingeniería Informática,Ingeniería Industrial,Administración de Empresas',
        ]);

        Estudiante::create($datos);

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante registrado correctamente');
    }

    public function index(Request $request)
    {
        $consulta = Estudiante::query();

        if ($request->filled('buscar')) {
            $buscar = $request->buscar;

            $consulta->where(function ($q) use ($buscar) {
                $q->where('Nombre', 'like', "%{$buscar}%")
                  ->orWhere('Correo', 'like', "%{$buscar}%");
            });
        }

        if ($request->filled('asignatura')) {
            $consulta->where('Asignatura', $request->asignatura);
        }

        $estudiantes = $consulta->orderBy('Nombre')->get();

        return view('estudiantes.index', compact('estudiantes'));
    }

    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        return view('estudiantes.editar', compact('estudiante'));
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $datos = $request->validate([
            'Nombre' => 'required|string|max:120',
            'Correo' => 'required|email|max:200|unique:personal,Correo,' . $id . ',ID',
            'Asignatura' => 'required|in:Ingeniería Informática,Ingeniería Industrial,Administración de Empresas',
        ]);

        $estudiante->update($datos);

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado correctamente');
    }

    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado correctamente');
    }
}

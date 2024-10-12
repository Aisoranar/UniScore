<?php

namespace App\Http\Controllers;

use App\Models\ProfileTrainee;
use App\Models\DepartmentAndCity;
use App\Models\User;
use Illuminate\Http\Request;

class TraineeController extends Controller
{
    public function show($id)
    {
        $trainee = ProfileTrainee::findOrFail($id);
        return view('view.trainee.profile', compact('trainee'));
    }

    public function index()
    {
        if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'coach') {
            $trainees = ProfileTrainee::with('user')->get();
            return view('view.list.trainees', compact('trainees'));
        }

        return redirect()->route('home.index')->with('error', 'No tienes permiso para acceder a esta página.');
    }

    public function edit($id)
    {
        $profile = ProfileTrainee::where('user_id', $id)->firstOrFail();
        $departments = DepartmentAndCity::select('id', 'department', 'city')->get()->groupBy('department');

        $data =[
            'profile'=> $profile,
            'departments'=> $departments
        ];

        return view('view.trainee.profile', compact('data'));
    }

    public function update(Request $request, $user_id)
    {
        $profile = ProfileTrainee::where('user_id', $user_id)->firstOrFail();

        $profile->update($request->only([
            'document_type',
            'document_number',
            'zone',
            'birth_date',
            'age',
            'marital_status',
            'has_children',
            'address',
            'phone',
            'department_id',
            'city_id',
            'health_regime',
            'eps_name',
            'sisben_classification',
            'academic_program',
            'schedule',
            'disability',
            'first_name',
            'second_name',
            'first_lastname',
            'second_lastname'
        ]));

        return redirect()->route('perfil.editar', ['id' => $profile->user_id])->with('success', 'Perfil actualizado exitosamente.');
    }
}

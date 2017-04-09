<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Capacitation;
use Illuminate\Support\Facades\Validator;

class CapacitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capacitation = Capacitation::paginate(7);

        return view('capacitation.list', compact('capacitation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('capacitation.addCapacitation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'capacitation.required' => 'Debe introducir una capacitación.',
            'capacitation.max' => 'La capacitación debe tener un maximo de 70 caracteres.',
            'capacitation.unique' => 'Ya se ha registrado esta capacitación.',
            'capacitation.min' => 'La capacitación debe tener un minimo de 3 caracteres.',
            'imparting.required' => 'Debe introducir un impartidor.',
            'imparting.max' => 'El impartidor debe tener un maximo de 70 caracteres.',
            'imparting.min' => 'El impartidor debe tener un minimo de 3 caracteres.',
            'imparted_date.required' => 'Debe introducir una fecha.',
            'imparted_date' => 'Introduzca una fecha válida.',
            'hours.required' => 'Debe introducir la cantidad de horas de la capacitación.',
            'hours.numeric' => 'Solo se permiten números en el campo duración.',
            'place.required' => 'Debe introducir un lugar.',
            'place.max' => 'El maximo de caracteres permitido en lugar es de 50.',
            'place.min' => 'El minimo de caracteres permitido en lugar es de 3.'
        ];

        $rules = [
            'capacitation' => 'bail|required|max:70|min:3|unique:capacitations',
            'imparting' => 'bail|required|max:70|min:3',
            'imparted_date' => 'bail|required|date',
            'hours' => 'bail|required|numeric',
            'place' => 'bail|required|max:50|min:3'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect('/capacitation/create')->withInput($request->all())->withErrors($validator->errors());
        }

        Capacitation::create($request->all());

        return redirect('/capacitation')->with('status', 'Capacitación Agregada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $capacitation = Capacitation::find($id);
        return view('capacitation.edit', compact('capacitation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'capacitation.required' => 'Debe introducir una capacitación',
            'capacitation.max' => 'La capacitación debe tener un maximo de 70 caracteres.',
            'capacitation.unique' => 'Ya se ha registrado esta capacitación.',
            'capacitation.min' => 'La capacitación debe tener un minimo de 3 caracteres.',
            'imparting.required' => 'Debe introducir un impartidor',
            'imparting.max' => 'El impartidor debe tener un maximo de 70 caracteres.',
            'imparting.min' => 'El impartidor debe tener un minimo de 3 caracteres.',
            'imparted_date.required' => 'Debe introducir una fecha de inicio.',
            'imparted_date.date' => 'Introduzca una fecha válida de inicio.',
            'finalized_date.required' => 'Debe introducir una fecha de finalización.',
            'finalized_date.date' => 'Introduzca una fecha válida de finalización.',
            'hours.required' => 'Debe introducir la cantidad de horas de la capacitación.',
            'hours.numeric' => 'Solo se permiten números en el campo duración.',
            'place.required' => 'Debe introducir un lugar.',
            'place.max' => 'El maximo de caracteres permitido en lugar es de 50.',
            'place.min' => 'El minimo de caracteres permitido en lugar es de 3.'
        ];

        $rules = [
            'capacitation' => 'bail|required|max:70|min:3',
            'imparting' => 'bail|required|max:70|min:3',
            'imparted_date' => 'bail|required|date',
            'finalized_date' => 'bail|required|date',
            'hours' => 'bail|required|numeric',
            'place' => 'bail|required|max:50|min:3'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        $id = $request->input('id');
        $capacitation = Capacitation::find($id);
        $capacitation->capacitation = $request->input('capacitation');
        $capacitation->imparting = $request->input('imparting');
        $capacitation->imparted_date = $request->input('imparted_date');
        $capacitation->finalized_date = $request->input('finalized_date');
        $capacitation->hours = $request->input('hours');
        $capacitation->place = $request->input('place');

        if($capacitation->save())
        {
            return redirect('/capacitation')->with('status', 'Capacitación Actualizada!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capacitation = Capacitation::find($id);
        $capacitation->delete();

        return redirect()->back()->with('status', 'Capacitación Eliminada!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $capacitation = Capacitation::where('capacitation', 'like', '%'.$search.'%')->orwhere('imparting', 'like','%'.$search.'%')->orwhere('imparted_date', 'like','%'.$search.'%')->paginate(6);
        return view('/capacitation.list', compact('capacitation'));
    }
}

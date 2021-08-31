<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portafolio;
use App\Models\Mensaje;

class ProyectoController extends Controller
{
    public function index()
    {
        $portafolios = Portafolio::paginate();

        return view('welcome', compact('portafolios'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ];

        if ($request->ajax()) {      
        
            request()->validate($rules);

            $mensaje = Mensaje::create($request->all());

            return redirect()->route('welcome')
                ->with('msg', 'Mensaje');
        } else {
            abort(404);
        }
    }

    public function mensaje()
    {
        $mensajes = Mensaje::paginate();

        return view('proyectos.mensaje', compact('mensajes'));
    }

    
}

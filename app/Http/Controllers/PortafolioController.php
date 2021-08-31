<?php

namespace App\Http\Controllers;

use App\Models\Portafolio;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

/**
 * Class PortafolioController
 * @package App\Http\Controllers
 */
class PortafolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $portafolios = Portafolio::paginate();

        return view('proyectos.index', compact('portafolios'))
            ->with('i', (request()->input('page', 1) - 1) * $portafolios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portafolio = new Portafolio();
        return view('portafolio.create', compact('portafolio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        request()->validate(Portafolio::$rules);
        
        $image = Storage::put('public/portafolio', $request->file('image'));

        $portafolio = Portafolio::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'url' => $request->url,
         ]);

        return redirect()->route('portafolio')
            ->with('success', 'Portafolio created successfully.');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portafolio = Portafolio::find($id);

        return view('portafolio.show', compact('portafolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portafolio = Portafolio::find($id);

        return view('portafolio.edit', compact('portafolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Portafolio $portafolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portafolio $portafolio)
    {
        request()->validate(Portafolio::$rules);

        $portafolio->update($request->all());

        return redirect()->route('portafolio')
            ->with('success', 'Portafolio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $portafolio = Portafolio::find($id)->delete();

        return redirect()->route('portafolio')
            ->with('success', 'Portafolio deleted successfully');
    }
}

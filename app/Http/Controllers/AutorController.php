<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $autores = Autor::all();
        return view('autores.index', compact('autores'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        return view('autores.createAuthor');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $authors = Tienda::all(); //coger todas los autores
    //     return view('autores.createAuthor', ['authors' => $authors]); //pasarlas a la vista
    // }

      /**
     * Shows the inserction form with a list of all of the authors
     *
     * @return view 
     */

     public function insert(){

         $authors = Author::all();
         return view('autores.createAuthor', ['authors' => $authors]);
     }

     /**
     * Adds a new author to the database
     *
     * @param  Request  $request Datos del formulario de inserción.
     * @return route Redirige a la lista de móviles después de la inserción.
     */
    public function store(Request $request){

        Autor::create([
            'apellidos' => $request->input('apellidos'),
            'nombre' => $request->input('nombre'),
            'nacionalidad' => $request->input('nacionalidad'),
            'sexo' => $request->input('sexo'),
            'edad' => $request->input('edad')
        ]);


        return redirect()->route('autores.index');
    }
     
     
    /**
     * Display the specified resource.
     */
    public function show(string $id){
        //
    }

    /**
     * Show the form for editing the specified resource.
    */

    public function edit($id){

        // Busca el autor en la base de datos por su ID
        $autor = Autor::findOrFail($id);
        
        // Retorna la vista de edición con los datos del autor
        //COMPACT -> Devuelve un array de salida con todas las variables añadidas a él.
        return view('autores.edit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, $id){

        //Validates
        $request->validate([
            'apellidos' => 'required|string',
            'nombre' => 'required|string',
            'nacionalidad' => 'required|string',
            'sexo' => 'required|string',
            'edad' => 'required|integer',
        ]);

        //Searches for the user's id in the database
        $autor = Autor::findOrFail($id);
        
        //uPDATE
        $autor->update([
            'apellidos' => $request->apellidos,
            'nombre' => $request->nombre,
            'nacionalidad' => $request->nacionalidad,
            'sexo' => $request->sexo,
            'edad' => $request->edad,
        ]);

        
        return redirect()->route('autores.index', $autor->id)->with('success', 'Autor actualizado correctamente');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        // Find the book by its ID and delete it
        $libro = Autor::findOrFail($id);
        $libro->delete();

        //Redirect the user to the index page after deleting the book
        return redirect()->route('autores.index')->with('success', 'Author deleted successfully.');
    }
    
}

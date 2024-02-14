<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $users = Autor::all();
        return view('usuarios.index', compact('users'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        return view('users.createUser');
    }

      /**
     * Shows the inserction form with a list of all of the authors
     *
     * @return view 
     */

     public function insert(){

         $authors = User::all();
         return view('usuarios.createUser', ['users' => $authors]);
     }

     /**
     * Adds a new author to the database
     *
     * @param  Request  $request Datos del formulario de inserción.
     * @return route Redirige a la lista de móviles después de la inserción.
     */
    public function store(Request $request){

        User::create([
            'apellidos' => $request->input('apellidos'),
            'nombre' => $request->input('nombre'),
            'nacionalidad' => $request->input('nacionalidad'),
            'sexo' => $request->input('sexo'),
            'edad' => $request->input('edad')
        ]);


        return redirect()->route('usuarios.index');
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
        $users = User::findOrFail($id);
        
        // Retorna la vista de edición con los datos del autor
        //COMPACT -> Devuelve un array de salida con todas las variables añadidas a él.
        return view('usuarios.edit', compact('users'));
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

        
        return redirect()->route('usuarios.index', $users->id)->with('success', 'Autor actualizado correctamente');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        // Find the book by its ID and delete it
        $libro = Autor::findOrFail($id);
        $libro->delete();

        //Redirect the user to the index page after deleting the book
        return redirect()->route('usuarios.index')->with('success', 'Author deleted successfully.');
    }
    
}

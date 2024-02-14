<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Autor;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //Retrieve all authors from the database
        $autores = Autor::all();

        // Return the view for creating a new book and pass the authors data to the view
        return view('libros.create', compact('autores'));
    }

    /**
 * Store a newly created resource in storage.
 */
    public function store(Request $request){

        $request->validate([
            'titulo' => 'required|string',
            'categoria' => 'required|string',
            'autor_id' => 'required|integer',
            'descripcion' => 'required|string', 
            'precio' => 'required|numeric',
        ]);

        Libro::create([
            'titulo' => $request->titulo,
            'categoria' => $request->categoria,
            'autor_id' => $request->autor_id,
            'descripcion' => $request->descripcion, 
            'precio' => $request->precio,
        ]);

        return redirect()->route('libros.index')->with('success', 'Book created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $libro = Libro::findOrFail($id);

        //Retrieve all authors from the database
        $autores = Autor::all();

        //Return the view for editing the book and pass the book and authors data to the view
        return view('libros.edit', compact('libro', 'autores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){

        $request->validate([
            'titulo' => 'required|string',
            'categoria' => 'required|string',
            'autor_id' => 'required|integer',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
        ]);

        $libro = Libro::findOrFail($id);

        $libro->update([
            'titulo' => $request->titulo,
            'categoria' => $request->categoria,
            'autor_id' => $request->autor_id,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
        ]);

        return redirect()->route('libros.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        // Find the book by its ID and delete it
        Libro::findOrFail($id)->delete();

        return redirect()->route('libros.index')->with('success', 'Book deleted successfully.');
    }
}

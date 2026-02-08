<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicioExperiencia; //Importamos el modelo

class ServiciosController extends Controller
{
    /**
     * Muestra la lista de servicios.
     * La funcion es llamada desde el index.php
     */
    public function serviciosIndex()
    {
        // 1. *** recuperamos los datos de la base de datos que en el tipo enum sean s para mostrar
        // solo los servicios usando Eloquent
        $servicios = ServicioExperiencia::where('tipo', 's')->get();
        // 2. Enviar los datos a la vista 'servicios.blade.php'
        // La variable $servicios se hace disponible para el bucle @foreach en Blade.
        return view('pages.servicios', [
            'servicios' => $servicios //pasa los resultados a la vista, bajo la variable $servicios
        ]);
    }

    public function experienciasIndex()
    {
        $experiencias = ServicioExperiencia::where('tipo', 'e')->get();
        // 2. Enviar los datos a la vista 'servicios.blade.php'
        // La variable $servicios se hace disponible para el bucle @foreach en Blade.
        return view('pages.experiencias', [
            'experiencias' => $experiencias // pasa los resultados a la vista bajo la variable $experiencias
        ]);
    }

    //Para que el admin pueda ver los servicios o experiencias
    public function adminIndex()
    {
        $elementos = ServicioExperiencia::all();
        return view('admin.servicios.index', compact('elementos'));
    }
    //Para que el admin pueda crear servicios o experiencias nuevas
    public function create()
    {
        return view('admin.servicios.form'); // Un formulario vacío
    }
    //Para que el admin pueda editar servicios o experiencias
    public function edit($id)
    {
        $elemento = ServicioExperiencia::findOrFail($id); //findOrFail($id) si el ID no existe, lanza automáticamente una página de Error 404 (Not Found)
        return view('admin.servicios.form', compact('elemento')); // El mismo formulario pero con datos
    }


    public function store(Request $request)
    {
        // Validamos los campos
        $datos = $request->validate([
            'nomServExp' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|in:s,e',
            'precio' => 'required|numeric|min:0|between:0,9999.99',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp,PNG|max:2048'
        ]);
   if ($request->hasFile('imagen')) {
        $file = $request->file('imagen');
        $nombreImagen = time() . '_' . $file->getClientOriginalName();
  // 1. Determinamos la carpeta (s -> servicios, e -> experiencias)
    $carpeta = ($datos['tipo'] === 's') ? 'servicios' : 'experiencias';
    
    // 2. USAMOS la variable $carpeta para mover el archivo al sitio correcto
    $file->move(public_path('img/' . $carpeta), $nombreImagen);
    
    // 3. Guardamos solo el nombre en el array para la BD
    $datos['imagen'] = $nombreImagen;
 }else {
        // SI NO HAY IMAGEN NUEVA, eliminamos 'imagen' de $datos 
        // para que Laravel no intente guardar un nulo sobre la foto vieja
        unset($datos['imagen']);
    }

        if ($request->id_servExp) {
            // Si hay ID, estamos editando
            $item = ServicioExperiencia::findOrFail($request->id_servExp);
            $item->update($datos);
            $mensaje = 'Actualizado correctamente';
        } else {
            // Si no hay ID, estamos creando
            ServicioExperiencia::create($datos);
            $mensaje = 'Creado correctamente';
        }

        return redirect()->route('admin.servicios.index')->with('success', $mensaje);
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required',
        ]);

         $product = Product::create([
        'name' => $request->name,
        'brand' => $request->brand,
        'price' => $request->price,
    ]);
     return redirect()
        ->route('admin.products.index')
        ->with('success', 'Producto creado correctamente.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
         if ($product->id <= 3) {
        session()->flash('swal', [
            'icon' => 'error',
            'title' => 'Error',
            'text' => 'No puedes editar este producto',
        ]);
        return redirect()->route('admin.products.index');
  
} 
        return view('admin.products.edit', compact('product'));
    
 }

    public function update(Request $request, Product $product)
 {
    $request->validate([
        'name' => 'required',
        'brand' => 'required',
        'price' => 'required',
    ]);

    // Si envía password, actualizar, si no, conservar
    $data = [
        'name' => $request->name,
        'brand' => $request->brand,
        'price' => $request->price,
    ];

    $product->update($data);



    session()->flash('swal', [
        'icon' => 'success',
        'title' => 'Producto actualizado',
        'text' => 'Los cambios se guardaron correctamente',
    ]);

    return redirect()->route('admin.products.index');
}

    public function destroy(Product $product)
    {
        //restringir la accion para los primeros 4 roles fijos
         if($product->id <=3) {
    //variable de un solo uso
     session()->flash('swal', 
     [
    'icon' => 'error',
    'title' => 'Error',
    'text' => 'No puedes eliminar este producto',
    ]);
    return redirect()->route('admin.products.index', $product);
    }
        //Borra el elemento
        $product->delete();
        //Alerta
        session()->flash('swal', 
    [
    'icon' => 'success',
    'title' => 'Producto eliminado correctamente',
    'text' => 'El Usuario ha sido eliminado exitosamente',
    ]);
    //redireccionar al mismo lugar
    return redirect()->route('admin.products.index');
    }
}


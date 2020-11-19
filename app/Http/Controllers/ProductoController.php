<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();

        $categorias = Categoria::all();

        return view('productos.index', compact('productos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Producto = new Producto;

        $Producto->nombre        = $request->nombre;
        $Producto->precio        = $request->precio;
        $Producto->stock         = $request->stock;
        $Producto->nuevo         = $request->nuevo;
        $Producto->promedio      = 0;
        $Producto->image         = 'tmp';
        $Producto->description   = $request->description;
        $Producto->categoria_id  = $request->categoria_id;
        
        $Producto->save();

        $file = $request->file('image');
        if (file_exists($file)) {
            $nombre = getdate();
            $abuelo = 'imageProducts';
            $padre=$Producto->id;
            $ext = $file->getClientOriginalExtension();
            $directorio=$abuelo.'/'.$padre;
            $nombreArchivo='P_'.$nombre['0'].".".$ext;
            $ruta=$directorio.'/'.$nombreArchivo;
            File::makeDirectory($directorio,'0777','true','true');
            \Storage::disk('local')->put($ruta,  File::get($file));

            $Producto->image = $ruta;
            $Producto->save();
        }

        return redirect()->route('productos.index', $Producto->id)
            ->with('info', 'Producto guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Producto = Producto::find($id);
        $fmt = numfmt_create( 'en_US', \NumberFormatter::CURRENCY );
        $precio = numfmt_format_currency($fmt, $Producto->precio, 'MXN')."\n";

        return view('productos.show', compact('Producto', 'precio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Producto = Producto::find($id);
        $categorias = Categoria::all();
        $fmt = numfmt_create( 'en_US', \NumberFormatter::CURRENCY );
        $precio = numfmt_format_currency($fmt, $Producto->precio, 'MXN')."\n";
        return view('productos.edit', compact('Producto', 'categorias', 'precio'));
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
        //dd($request);
        $Producto = Producto::find($id);
        // Image upload
        $file = $request->file('image');
        if (file_exists($file)) {
            $nombre = getdate();
            $abuelo = 'imageProducts';
            $padre=$id;
            $ext = $file->getClientOriginalExtension();
            $directorio=$abuelo.'/'.$padre;
            $nombreArchivo='P_'.$nombre['0'].".".$ext;
            $ruta=$directorio.'/'.$nombreArchivo;
            File::makeDirectory($directorio,'0777','true','true');
            \Storage::disk('local')->put($ruta,  File::get($file));

            $Producto->image = $ruta;
        }
        $Producto->nombre        = $request->nombre;
        $Producto->precio        = $request->precio;
        $Producto->stock        = $request->stock;
        $Producto->nuevo         = $request->nuevo;
        $Producto->description   = $request->description;
        $Producto->categoria_id  = $request->categoria_id;
        
        $Producto->save();

        return redirect()->route('productos.edit', $Producto->id)
            ->with('info', 'Producto modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Producto = Producto::find($id)->delete();

        return back()->with('info', 'Producto eliminado correctamente');
    }

    public function indexClients()
    {
        $productos = Producto::paginate(6);

        $categorias = Categoria::all();

        return view('productos.indexClients', compact('productos', 'categorias'));
    }

    public function indexClientsByCategory(Categoria $categoria)
    {
        $productos = $categoria->productos;

        $categorias = Categoria::all();

        // return response()->json($productos);

        return view('productos.indexByCategory', compact('productos', 'categoria', 'categorias'));
    }
}

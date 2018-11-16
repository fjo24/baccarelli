<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tienda;
use App\User;
use App\Contenido_observacion;
class TiendasController extends Controller
{
    public function index()
    {
        $tiendas = Tienda::orderBy('id', 'ASC')->get();
        return view('adm.tiendas.index')
            ->with('tiendas', $tiendas);
    }

    public function create()
    {
        return view('adm.tiendas.create');
    }

    public function store(Request $request)
    {
        $tienda           = new Tienda();
        $tienda->nombre   = $request->nombre;
        $tienda->cuit = $request->cuit;
        $tienda->email    = $request->email;
        $id                     = Tienda::all()->max('id');
        $id++;
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $file = $request->file('logo');
                $path = public_path('img/tienda/');
                $request->file('logo')->move($path, $id . '_' . $file->getClientOriginalName());
                $tienda->logo = 'img/tienda/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $tienda->save();
        $usuario           = new User();
        $usuario->name     = $tienda->email;
        $usuario->username = $tienda->email;
        $usuario->email    = $tienda->email;
        $usuario->nivel    = 'distribuidor';
        $usuario->rango    = 't_admin';
        $usuario->tienda_id= $tienda->id;
        $usuario->password = bcrypt($tienda->cuit);
        $usuario->save();

        //crear contenido de pedido para la tienda
        $contenidodefecto = Contenido_observacion::first();
        $contenido = new Contenido_observacion();
        $contenido->titulo_condiciones     = $contenidodefecto->titulo_condiciones;
        $contenido->tienda_id     = $tienda->id;
        $contenido->contenido_condiciones  = $contenidodefecto->contenido_condiciones;
        $contenido->titulo_plazos          = $contenidodefecto->titulo_plazos;
        $contenido->contenido_plazos       = $contenidodefecto->contenido_plazos;
        $contenido->titulo_aclaraciones    = $contenidodefecto->titulo_aclaraciones;
        $contenido->contenido_aclaraciones = $contenidodefecto->contenido_aclaraciones;
        $contenido->save();
        $tiendas = Tienda::orderBy('id', 'ASC')->get();
        return view('adm.tiendas.index')
            ->with('tiendas', $tiendas);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tienda = Tienda::find($id);
        return view('adm.tiendas.edit')
            ->with('tienda', $tienda);
    }

    public function update(Request $request, $id)
    {
        $tienda           = Tienda::find($id);
        $tienda->nombre   = $request->nombre;
        $tienda->cuit = $request->cuit;
        $tienda->email    = $request->email;
        $id               = $tienda->id;
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $file = $request->file('logo');
                $path = public_path('img/tienda/');
                $request->file('logo')->move($path, $id . '_' . $file->getClientOriginalName());
                $tienda->logo = 'img/tienda/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $tienda->save();

        $tiendas = Tienda::orderBy('id', 'ASC')->get();
        return view('adm.tiendas.index')
            ->with('tiendas', $tiendas);
    }

    public function destroy($id)
    {
        $user = Tienda::find($id);
        $user->delete();
        return redirect()->route('tiendas.index');
    }
    /*
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->Where('nivel', 'distribuidor')->get();
        return view('adm.tiendas.index')
            ->with('users', $users);
    }

    public function create()
    {
        return view('adm.tiendas.create');
    }

    public function store(Request $request)
    {
        $usuario           = new User();
        $usuario->name     = $request->name;
        $usuario->username = $request->username;
        $usuario->email    = $request->email;
        $id                     = Categoria::all()->max('id');
        $id++;
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $file = $request->file('logo');
                $path = public_path('img/usuario/');
                $request->file('logo')->move($path, $id . '_' . $file->getClientOriginalName());
                $usuario->logo = 'img/usuario/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $usuario->nivel    = 'distribuidor';
        $usuario->password = \Hash::make($request->password);
        $usuario->save();

        $users = User::orderBy('id', 'ASC')->Where('nivel', 'distribuidor')->get();
        return view('adm.tiendas.index')
            ->with('users', $users);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = user::find($id);
        return view('adm.tiendas.edit')
            ->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $usuario           = User::find($id);
        $usuario->name     = $request->name;
        $usuario->username = $request->username;
        $usuario->email    = $request->email;
        $usuario->nivel    = 'distribuidor';
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $file = $request->file('logo');
                $path = public_path('img/usuario/');
                $request->file('logo')->move($path, $id . '_' . $file->getClientOriginalName());
                $usuario->logo = 'img/usuario/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        if ($request->password != $usuario->password) {
            $usuario->password = \Hash::make($request->password);
        }

        $usuario->save();

        $users = User::orderBy('id', 'ASC')->Where('nivel', 'distribuidor')->get();
        return view('adm.tiendas.index')
            ->with('users', $users);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('tiendas.index');
    }
    */
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comprador;
use App\User;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class compradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $comprador=Comprador::where('estatus','A')->get();
        return view('plantilla.contenido.admin.comprador.consultar')->with('comprador',$comprador);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantilla.contenido.admin.comprador.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User();
        $user->nombre=$request->nombre;
        $user->apellido=$request->apellido;
        $user->email=$request->correo;
        $user->password =  Hash::make( $request->password);
        $user->rol_id=1;
        $user->save();

        $comprador=new Comprador();
        $comprador->nombre=$request->nombre;
        $comprador->apellido=$request->apellido;
        $comprador->correo=$request->correo;
        $comprador->user_id=$user->id;
        $comprador->save();

        return redirect()->route('Comprador.index');
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
        $comprador=Comprador::findOrFail($id);
        return view('plantilla.contenido.admin.comprador.modificar',compact('comprador'));
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
        
        $comprador=Comprador::findOrFail($id);
        $comprador->nombre=$request->nombre;
        $comprador->apellido=$request->apellido;
        $comprador->correo=$request->correo;
        $comprador->save();

        $user=User::findOrFail($comprador->user_id);
        $user->nombre=$request->nombre;
        $user->apellido=$request->apellido;
        $user->email=$request->correo;
        $user->update();
        

        return redirect()->route('Comprador.index');
    }

    public function showPassword($id){
        $comprador=Comprador::findOrFail($id);

        return view('plantilla.contenido.admin.comprador.modificarPassword',compact('comprador')); 

    }

    public function updatePassword(Request $request,$id){
       
        $comprador=Comprador::findOrFail($id);
        $user=User::findOrFail($comprador->user_id);
        if(Hash::check($request->vieja,$user->password)){
  
            $user->password =  Hash::make($request->password);
            $user->save();
            return redirect()->route('Comprador.edit',$comprador);   
         }
         else{
            flash('la contraseña ingresada no coincide con la registrada!')->warning();

            return redirect()->route('Comprador.password',$comprador);
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
        
        $comprador=Comprador::findOrFail($id);
        
        $usuario=User::findOrFail($comprador->user_id);
        $comprador->user_id=null;
        $comprador->estatus='I';
        $comprador->update();
        $usuario->delete();
        return redirect()->route('Comprador.index');
    }
}
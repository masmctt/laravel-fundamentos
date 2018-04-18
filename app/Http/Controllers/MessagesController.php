<?php

namespace App\Http\Controllers;

use App\Message;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
 //ayuda de artisan con -h ejecutar php artisan -h make:controller
// para crear un controlador con todos los metodos comunes ejecutar: php artisan make:controller MessagesController --resource
class MessagesController extends Controller
{
    function __construct(){
        $this->middleware('auth',['except' => ['create','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$messages=DB::table('messages')->get();
        //return Message::all();
        //return $messages;
        $messages=Message::all();
        return view('messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        //return $request->input('nombre');

        //Guardar mensaje
        /*
        DB::table('messages')->insert([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),

        ]);
        */
        //Hay dos formas de insertar en ELOCUENT
        //1era
        /*
        $message=new Message;
        $message->nombre =  $request->input('nombre');       
        $message->email =  $request->input('email');       
        $message->mensaje =  $request->input('mensaje');       
        $message.save();
        */
        // fin 1ra
        //2da
            //este es un domp and die, muestra y se detiene
            //dd($request->all());
            //Model::unguard(); con esta instruccion no se validan los campos a acualizacion masiva
            // se debera declara al inicio del archivo lo siguiente
            //use illuminate\Database\Eloquent\Model;
            //No es recomendable hacer esto(Pasos anteriores)
        //fin 2da
        //Redireccionar
        //El sistema automaticamente busca en los datos del request los que coincidan con los definidos en la clase modelo        
        
        //Message::create($request->all());
        /* hay mas de una manera de guardar el mensaje para usuarios autenticados
        guardamos el mensaje en la DB y si el usuario esta autenticado
        lo actualizamos con el user_id
        este es la mejor manera ya que maneja usuarios autenticados o no
        */
        $message = Message::create($request->all());
        if (auth()->check()) 
        {
            auth()->user()->messages()->save($message);
        }
        
        /* Esta Opcion es unicamente para usuarios autenticados
        fallaria si el usuario no esta autenticado
        desde que se crea el mensaje va relacionado al usuario
        auth()->user()->messages()->create($request->all());
        */
        /* Otra manera de relacionar el usuario autenticado, es
        se crea el mensaje y posterior mente se actualiza el user_id
        utilizando save
        $message = Message::create($request->all());
        $message->user_id=auth()->id();
        $message->save();
        */

        return redirect()->route('mensajes.create')->with('info','Hemos recibdo tu mensaje');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$message=DB::table('messages')->where('id',$id)->first();
        //$message = Message::find($id);
        //Es mejor utilizar el findOrFail, para que mande el error y se puedan personalisar las paginas por error
        $message = Message::findOrFail($id);
        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$message=DB::table('messages')->where('id',$id)->first();
        $message = Message::findOrFail($id);
        return view('messages.edit',compact('message'));
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
        //Actualizar
        /*
        $message=DB::table('messages')->where('id',$id)->update([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        */
        /*
        $message = Message::findOrFail($id);
        $message->update($request->all());
        */ 
        //Otra forma
        Message::findOrFail($id)->update($request->all());
        //Redireccionar
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar
        //DB::table('messages')->where('id',$id)->delete();
        Message::findOrFail($id)->delete();
        //Redireccionar
        return redirect()->route('mensajes.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function Listar(){
      
        $clientes = DB::select('select
        ord.Id_Orden as Id_Orden,
        cl.Numero_id_Cliente as Numero_id_Cliente,
        cl.Nombre_Cliente as Nombre_Cliente,
        ord.Fecha_Orden as Fecha_Orden,
        ord.Total_Orden as Total_Orden,
        ord.Fecha_Entrega_Orden as Fecha_Entrega_Orden,
        ord.Status_Orden as Status_Orden
        from ordenes ord
        left join clientes cl on
        ord.Id_Cliente = cl.Id_Cliente');

        return datatables($clientes)->toJson();
    }

    public function Select_Ciudad(){
      
        $ciudades = DB::select('select * from ciudades');

        return datatables($ciudades)->toJson();
    }

    public function Select_Cliente(){
      
        $cliente = DB::select('select * from clientes');

        return datatables($cliente)->toJson();
    }

    public function Select_Producto(){
      
        $cliente = DB::select('select * from productos');

        return datatables($cliente)->toJson();
    }

    public function Insert_Cliente(Request $request){

        $request-> validate([
            'doc' => 'required',
            'nom'=>'required',
            'cumple'=>'required',
            'email'=>'required',
            'tel'=>'required',
            'ciudad'=>'required'
        ]);

        DB::insert('insert into clientes(Numero_id_Cliente, Nombre_Cliente, Cumpleaños_Cliente, Email_Cliente, Telefono_Cliente, Ciudad_id)
         values (?,?,?,?,?,?)',[$request->doc,$request->nom,$request->cumple,$request->email,$request->tel,$request->ciudad]);

         return back()->with('mensaje','Cliente agregado')-> with('mensaje', 'Cliente agregado');
      
    }

    public function Insert_Producto(Request $request){

        $request-> validate([
            'des' => 'required',
            'cant'=>'required',
            'valor'=>'required',
            'status'=>'required',
        ]);

        DB::insert('insert into productos (Descripcion_Producto, Monto_Producto, Valor_Producto, Status_Producto)
         values (?,?,?,?)',[$request->des,$request->cant,$request->valor,$request->status]);

         return back()->with('mensaje','Producto agregado')-> with('mensaje', 'Producto agregado');
      
    }

    public function Insert_Ciudad(Request $request){

        $request-> validate([
            'nom' => 'required',
        ]);

        DB::insert('insert into ciudades (Nombre_Ciudad) values (?)',[$request->nom]);

        return back()->with('mensaje','Ciudad agregada')-> with('mensaje', 'Ciudad agregada');
      
    }

    public function Insert_Orden(Request $request){

        $request-> validate([
            'cliente' => 'required',
            'prod' => 'required',
            'total' => 'required',
            'tiempo' => 'required'
        ]);

        DB::insert('insert into ordenes (Id_Cliente, Fecha_Orden, Total_Orden, Fecha_Entrega_Orden, Status_Orden) values (?,?,?,?,?)',[$request->cliente,$request->tiempo,$request->total,$request->tiempo,'preparando']);

        $qry = DB::select('select * from ordenes order by Id_Orden desc LIMIT 1');

        foreach ($qry as $qr) {
            $qr->Id_Orden;
        }

        DB::insert('insert into detalles_ordenes(Id_Orden, Id_Producto) values (?,?)',[$qr->Id_Orden,$request->prod]);

        return back()->with('mensaje','Ciudad agregada')-> with('mensaje', 'Ciudad agregada');
      
    }

    public function Detalle(Request $request){

        $request-> validate([
            'orden' => 'required'
        ]);
      
        $cliente = DB::select('SELECT
        pro.Descripcion_Producto,
        pro.Valor_Producto,
        (ord.Total_Orden div pro.Valor_Producto) as cantidad
        FROM ordenes ord
        left join detalles_ordenes dto on
        ord.Id_Orden = dto.Id_Orden
        left join productos pro on
        dto.Id_Producto = pro.Id_Producto
        where ord.Id_Orden = :ord',['ord'=>$request->orden]);

        return datatables($cliente)->toJson();
    }

    public function Eliminar_Orden(Request $request){

        $request-> validate([
            'orden' => 'required'
        ]);

        $deleted = DB::delete('DELETE FROM detalles_ordenes WHERE Id_Orden = :ord', ['ord'=>$request->orden]);

        $deletedtwo = DB::delete('DELETE FROM ordenes WHERE Id_Orden = :ord', ['ord'=>$request->orden]);
      

        return back()->with('mensaje','orden eliminada')-> with('mensaje', 'orden eliminada');
    }

    public function Update_Orden(Request $request){

        $request-> validate([
            'ord' => 'required',
            'status' => 'required',
            'entrega' => 'required',
        ]);

        $affected = DB::update('update ordenes set Fecha_Entrega_Orden = ?, Status_Orden = ? where Id_Orden = ?',[$request->entrega,$request->status,$request->ord]);

        return back()->with('mensaje','orden eliminada')-> with('mensaje', 'orden eliminada');
    }

}

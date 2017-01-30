<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\state;
use App\Client_social_reason;
use App\Municipalities;
use App\Http\Requests\ClientRequest;


class ClientController extends Controller
{
    public function index(){

        $client = Client::orderBy('name','ASC')->get();
        $datoid=Client_social_reason:: select('nameReason','client_id','rfc')->where('main','=','si')->get();
        $reason=Client_social_reason::lists('nameReason','id');

        //dd($datoid);

        $state = state::orderBy('name','ASC')->lists('name','id');//contenido - value


        return view('admin.clients.index')
            ->with('state',$state)
            ->with('client',$client)
            ->with('datoid',$datoid)
            ->with('reason',$reason);
    }

    public function getMunicipalities(Request $request,$id){
        if($request->ajax()){
            $municipalities = Municipalities::municipalities($id);
            return response()->json($municipalities);
        }
    }

    public function getReasons(Request $request,$id){
        if($request->ajax()){
            $reasons = Client_social_reason::reasons($id);
            return response()->json($reasons);
        }
    }

    public function getReasonsSingle(Request $request,$id){

        if($request->ajax()){
            $reasonsSingle = Client_social_reason::reasonsSingle($id);
            return response()->json($reasonsSingle);
        }

    }

    


    public function update2(Request $request, $id){
        $client = Client::find($id);
        if($client->status=="activo"){
            $client->status="inactivo";
        }else if ($client->status=="inactivo"){
            $client->status="activo";
        }
        $client->save();

        if($request->ajax()){
            return response()->json([
                'id' => $client->id,
                'statusRSE' => $client->status
            ]);
        }

        return redirect()->route('admin.clients.index');
    }

    public function edit(Request $request, $id){//line56
        $client = Client::find($id);
        $idd=$client->id;

        $datoid=Client_social_reason::where("client_id","=",$idd)->where("main","=","si")->get();

        //$client->nameReason=$idd;

        return response()->json(["success" =>  true, "data" => $client,"razon"=>$datoid]);
    }

    public function update(Request $request, $id){

        if($request->ajax()){
            $client = Client::find($id);
            $client->fill($request->only('name','numberClient','raiting','comments','status','nameContact','jobContact',
                'phoneContact','cellContact','email','client_id'));
            $client->save();

            //consulta sw razon

            $client_reason = Client_social_reason::find($request->client_id);
            $client_reason->fill($request->only('rfc','street','numberI','numberE','colony','cp','city','state','webSite','label1','label2'));
            //asignaciones

            $client_reason->save();

            //consultas para recargarpagina
            $client_reasonn = Client_social_reason::find($request->client_id);
        }
        return \Response::json(["success" =>  true, "info_cli"=>$client, "info_reason"=>$client_reasonn]);
    }

    public function store(ClientRequest $request){
        // Manipulacion de imgs
        $name="";
        if ($request->file('logoClient')) {
            $file = $request->file('logoClient');
            $name = 'logoClient' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/img/logos/';
            $file->move($path, $name);
        }

        $client = new Client($request->only('name','numberClient','raiting','comments','status','logoDefault','logoClient','nameContact','jobContact',
            'phoneContact','cellContact','email'));{}
        $client->logoDefault = "logo_no_disponible.png";
        $client->logoClient = $name;
        $client->user_id= \Auth::user()->id;
        $client->save();

        $client_ras_soc=new Client_social_reason($request->only('nameReason','rfc','street','numberI','numberE','colony','cp','city','state','webSite','label1','label2'));{}
        //asignaciones
        $client_ras_soc->user_id= \Auth::user()->id;
        $client_ras_soc->client_id=$client->id;
        $client_ras_soc->main='si';

        $client_ras_soc->save();

        return redirect()->route('admin.clients.index')->with('msjtrue', "Razón " . $client->nameReason . " creada exitosamente!");
    }


    public function destroy($id, Request $request){
        $client = Client::find($id);
        $datoid=$client->id;
        $tablaRas=Client_social_reason::where('client_id','=',$datoid);

        $ruta=public_path() . '/img/logos/';


        $archivo = $client->logoClient;

        if($archivo!=""){
            if(unlink($ruta.$archivo)){
                $tablaRas->delete();
                $client->delete();
            }
        }else{
            $tablaRas->delete();
            $client->delete();
        }

        $mensaje ="cliente y razon eliminada exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.clients.index');
    }


    public function logoo($id,Request $request){
        $client = Client::find($id);
        $ruta=public_path() . '/img/logos/';
        $archivo = $client->logoClient;
        $mensaje ="El logo fue actualizado";

        if($request->ajax()){
            if ($request->file('logoClient2')) {

                if($archivo!=""){
                    unlink($ruta.$archivo);
                    $file = $request->file('logoClient2');
                    $name = 'logoClient' . time() . '.' . $file->getClientOriginalExtension();
                    $path = public_path() . '/img/logos/';
                    $file->move($path, $name);

                    $client->logoClient=$name;
                    $client->save();
                }else{
                    $file = $request->file('logoClient2');
                    $name = 'logoClient' . time() . '.' . $file->getClientOriginalExtension();
                    $path = public_path() . '/img/logos/';
                    $file->move($path, $name);

                    $client->logoClient=$name;
                    $client->save();
                }//fin validacion nombre de archivo sea diferente de nada
            }else{
                abort(501);
            }// fin validacion request file

            $client2 = Client::find($id);
            return \Response::json(["success" =>  true, "data" => $client2,"msj"=>$mensaje]);
        }
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Documento;
use Illuminate\Http\Request;
use App\Traits\ApiResponder;
class ClienteController extends Controller
{
    use ApiResponder;
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function getContratos(Request  $request){
          $contrato=Contrato::select(["id","nombre","cliente_id"])
                             ->get();

        return $this->success(
            "contratos",
            $contrato->toArray(),
        );
    }


    // OBTENER LOS DOCUMENTOS
    public function getDocumento(){
        $docu=Documento::select(["id","contrato_id","Titulo","URL"])->get();
        return $this->success(
            "documentos ",
            $docu->toArray(),
        );
    }
}

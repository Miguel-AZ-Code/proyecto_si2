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
    public function getContratos(Request  $request)
    {
        $contrato = Contrato::select(["id", "nombre", "cliente_id"])
            ->get();

        return $this->success(
            "contratos",
            $contrato->toArray(),
        );
    }


    // OBTENER LOS DOCUMENTOS
    public function getDocumento()
    {
        $docu = Documento::select(["id", "contrato_id", "Titulo", "URL"])->get();
        return $this->success(
            "documentos ",
            $docu->toArray(),
        );
    }

    // INSERTAR DOCUMENTO
    public  function postDocumento(Request $request)
    {
        if ($request->hasFile("document")) {
            $file = $request->File("document");

            $nombre = "pdf" . time() . "." . $file->guessExtension();

            $ruta = public_path("documentos/". $nombre);

            // virificacion si el archivo es un pdf
            if ($file->guessExtension() == "pdf") {
                copy($file, $ruta);
            } else {
                dd("No es un PDF");
            }
            $doc = new Documento;
            $doc->contrato_id = $request->id_contrato;
            $doc->Titulo = $nombre;
            $doc->URL = "https://insucons.website/documentos/".$nombre;
            $doc->save();
        }




        return $this->success(
            "documentos",
            $doc->toArray(),
        );
    }
}

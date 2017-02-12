<?php

namespace App\Http\Controllers;


use App\Events\Event;
use App\Events\IdDocumentSent;
use App\Models\IdDocument;
use Illuminate\Support\Facades\Request;

class IDdocumentController extends Controller
{

   public function listAllIdDocumentsWaitingForApproval()
    {
        $docs = IdDocument::where('verified', false)->get();

        return view ('')->with(compact($docs));
    }

   public function updateIDdocument(Request $request)
    {
        $data = array_only(Input::all(), ['id_document']);

        if ($data['id_document'] ?? null) {
            $idDocument               = new IdDocument();
            $idDocument->user_id      = \Auth::id();
            $idDocument->id_card      = file_get_contents($request->id_document->getRealPath());
            $idDocument->id_card_name = $request->id_document->getClientOriginalName();
            $idDocument->id_card_mime = $request->id_document->getMimeType();
            $idDocument->id_card_size = $request->id_document->getSize();
            $idDocument->save();
            Event::fire(new IdDocumentSent(Auth::user(), $idDocument));
        }


        thanks('Merci! Le fichier à été bien reçu');

        return redirect()->back();
    }


    // Admin Only
    function setVerificationStatus(int $documentId)
    {
        $doc = IdDocument::find($documentId);

        if (!$doc) App::abort(404);

        $doc->verified = Input::get('verification_status');

        $doc->save();

        thanks("Le statut de la pièce d'identité a été mis à jour");

        return redirect()->back();
    }
}
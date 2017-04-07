<?php

namespace App\Http\Controllers;


use App\Models\IdDocument;

// Admin Only

class IDdocumentController extends Controller
{

    public function listAllIdDocumentsWaitingForApproval()
    {
        $docs = IdDocument::where('verified', false)->with('user')->get();

        return view('admin.IdDocumentToApproveList')->with(compact('docs'));
    }


    function validateDocumentId(int $documentId)
    {
        $this->setVerificationStatus($documentId, true);
        thanks("Le statut de la pièce d'identité a été mis à jour");

        return redirect()->back();
    }


    private function setVerificationStatus(int $documentId, bool $status)
    {
        $doc = IdDocument::find($documentId);

        if (!$doc) App::abort(404);

        $doc->verified = $status;

        $doc->save();

        return redirect()->back();
    }

    public function downloadIdDocument(int $documentID)
    {
        $idDocument = IdDocument::find($documentID);

        if (!$idDocument) App::abort(404);


        return response()->make($idDocument->id_card, 200,
                               [
                                   'Content-type'   => $idDocument->id_card_mime,
                                   'Content-length' => $idDocument->id_card_size,
                               ]);
    }
}
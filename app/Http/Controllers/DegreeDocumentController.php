<?php

namespace App\Http\Controllers;


use App\Models\DegreeDocument;
use App\Models\IdDocument;

// Admin Only

class DegreeDocumentController extends Controller
{

    public function listAllIDegreeDocumentsWaitingForApproval()
    {
        $docs = IdDocument::where('verified', false)->with('user')->get();

        return view('admin.IdDocumentToApproveList')->with(compact('docs'));
    }


    function validateDegreeDocument(int $documentId)
    {
        $this->setVerificationStatus($documentId, true);
        thanks("Le statut de la pièce d'identité a été mis à jour");

        return redirect()->back();
    }


    private function setVerificationStatus(int $documentId, bool $status)
    {
        $doc = DegreeDocument::find($documentId);

        if (!$doc) App::abort(404);

        $doc->verified = $status;

        $doc->save();

        return redirect()->back();
    }

    public function downloadIdDocument(int $documentID = NULL)
    {
        $idDocument = DegreeDocument::find($documentID);

        if (!$idDocument) App::abort(404);

        return response()->make($idDocument->id_card, 200,
                               [
                                   'Content-Type'   => $idDocument->id_card_mime,
                                   'Content-Length' => $idDocument->id_card_size,
                               ]);
    }


    public function userDownloadsOwnId()
    {
        $idDocument = DegreeDocument::getByUserId(\Auth::id());

        if (!$idDocument) App::abort(404);

        return response()->make($idDocument->id_card, 200,
                                [
                                    'Content-Type'   => $idDocument->id_card_mime,
                                    'Content-Length' => $idDocument->id_card_size,
                                ]);
    }
}
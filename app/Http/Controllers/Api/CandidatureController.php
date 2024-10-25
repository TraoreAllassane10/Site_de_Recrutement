<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Canditature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CandidatureRequest;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "status_code" => 200,
            "msg" => "Liste des candidatures",
            "data" => Canditature::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidatureRequest $request)
    {
        try {
            $candidature = new Canditature();

            $candidature->offre_id = $request->offre_id;
            $candidature->user_id = $request->user_id;
            $candidature->lettre_motivation = $request->lettre_motivation;
            $candidature->cv = $request->cv;

            $candidature->save();

            return response()->json([
                "status_code" => 200,
                "msg" => "Offre crée avec sucess",
                "entreprise" => $candidature
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            "status_code" => 200,
            "msg" => "Offre crée avec sucess",
            "entreprise" => Canditature::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $candidature = Canditature::find($id);
        try {

            $candidature->offre_id = $request->offre_id;
            $candidature->user_id = $request->user_id;
            $candidature->lettre_motivation = $request->lettre_motivation;
            $candidature->cv = $request->cv;

            $candidature->save();

            return response()->json([
                "status_code" => 200,
                "msg" => "Offre modifiée",
                "entreprise" => $candidature
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $candidature =  Canditature::find($id);

        try {
            if (isset($candidature)) {

                $candidature->delete();

                return response()->json([
                    "status_code" => 200,
                    "msg" => "Candidature supprimée",
                    "entreprise" => $candidature
                ]);
            }
            else
            {
                return response()->json([
                    "status_code" => 400,
                    "msg" => "Candidature n'existe plus",
                ]);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

}

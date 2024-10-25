<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntrepriseRequest;
use App\Models\Entreprise;
use Exception;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "status_code" => 200,
            "msg" => "Liste des entreprises",
            "data" => Entreprise::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntrepriseRequest $request)
    {
        try {
            $entreprise = new Entreprise();

            $entreprise->nom = $request->nom;
            $request->situation != "" ? $entreprise->situation = $request->situation : null;
            $request->secteur_activite != "" ? $entreprise->secteur_activite = $request->secteur_activite : null;
            $request->site != "" ? $entreprise->site = $request->site : null;
            $entreprise->user_id = $request->user_id;

            $entreprise->save();

            return response()->json([
                "status_code" => 200,
                "msg" => "Entreprise crée avec sucess",
                "entreprise" => $entreprise
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
            "msg" => "Informations de l'entreprise",
            "data" => Entreprise::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntrepriseRequest $request, string $id)
    {
        try {
            $entreprise = Entreprise::find($id);

            $entreprise->nom = $request->nom;
            $request->situation != "" ? $entreprise->situation = $request->situation : null;
            $request->secteur_activite != "" ? $entreprise->secteur_activite = $request->secteur_activite : null;
            $request->site != "" ? $entreprise->site = $request->site : null;
            $entreprise->user_id = $request->user_id;

            $entreprise->save();

            return response()->json([
                "status_code" => 200,
                "msg" => "Entreprise modifiée avec sucess",
                "entreprise" => $entreprise
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
        $entreprise = Entreprise::find($id);

        try {

            if (isset($entreprise)) {

                $entreprise->delete();
                return response()->json([
                    "status_code" => 200,
                    "msg" => "Entreprise supprimée",
                    "entreprise" => $entreprise
                ]);
            }
            else
            {
                return response()->json([
                    "status_code" => 400,
                    "msg" => "Entreprise n'existe plus",
                ]);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}

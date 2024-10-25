<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Offre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OffreRequest;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "status_code" => 200,
            "msg" => "Liste des Offres",
            "data" => Offre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OffreRequest $request)
    {
        try {
            $offre = new Offre();

            $offre->titre = $request->titre;
            $offre->description = $request->description;
            $offre->entreprise_id = $request->entreprise_id;

            $offre->save();

            return response()->json([
                "status_code" => 200,
                "msg" => "Offre crée avec sucess",
                "entreprise" => $offre
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
            "msg" => "Informations sur l'offre",
            "data" => Offre::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OffreRequest $request, string $id)
    {
        try {
            $offre =  Offre::find($id);

            $offre->titre = $request->titre;
            $offre->description = $request->description;
            $offre->entreprise_id = $request->entreprise_id;

            $offre->save();

            return response()->json([
                "status_code" => 200,
                "msg" => "Offre modifiée",
                "entreprise" => $offre
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
        $offre =  Offre::find($id);

        try {
            if (isset($offre)) {

                $offre->delete();

                return response()->json([
                    "status_code" => 200,
                    "msg" => "Offre supprimée",
                    "entreprise" => $offre
                ]);
            }
            else
            {
                return response()->json([
                    "status_code" => 400,
                    "msg" => "Offre n'existe plus",
                ]);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}

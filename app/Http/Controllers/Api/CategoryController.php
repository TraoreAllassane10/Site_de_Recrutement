<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json([
            "status_code" => 200,
            "msg" => "Toutes les categories",
            "data" => Category::all()
        ]);
    }
}

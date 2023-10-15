<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(Request $request){
        $assets = Asset::query()->where('branch_id', $request->user()->branch_id)->get();

        return response()->json([
            'data' => $assets,
        ]);
    }
}

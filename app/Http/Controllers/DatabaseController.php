<?php

namespace App\Http\Controllers;

use App\Models\TestPacket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function checkConnection()
    {
        try {
            DB::connection()->getPdo();
            $testPacketData = TestPacket::all();
            dd($testPacketData);


        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

?>
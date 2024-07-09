<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolterRequest;
use App\Models\registros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HolterController extends Controller
{

    public function insertar(Request $request)
    {

        try {
            $data['hora'] = date('Y-m-d');
            $data['fc_min'] = $request['fc_min'];
            $data['rc_medio'] = $request['rc_medio'];
            $data['fc_max'] = $request['fc_max'];
            $data['total_latidos'] = $request['total_latidos'];
            $data['paciente_id'] = $request['paciente_id'];
            $data['holter_id'] = $request['holter_id'];
            $data['medico_id'] = $request['medico_id'];
            DB::beginTransaction();
            $resp = registros::create($data);
            DB::commit();
            return json_encode($resp);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}

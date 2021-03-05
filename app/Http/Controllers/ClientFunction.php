<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatergoryFunction;
use App\Models\clients;
use App\Models\MatrixFunction;
use App\Models\MatrixCategory;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ClientFunction extends Controller
{

    public function show(Request $request,$id)
    {

        abort_if(Gate::denies('can_view_matrix_cat'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $clients = clients::where('id', $id)->first();

        $clientFunctions = DB::table('matrix_functions')
        ->join('clients_matrix_function', 'clients_matrix_function.function_id', '=', 'id')
        ->join('clients', 'clients.id', '=', 'clients_matrix_function.client_id')
        ->join('matrix_categories', 'matrix_categories.id', '=','matrix_category_id')
        ->select('clients.id','matrix_categories.category', 'matrix_functions.function', 'matrix_functions.cost_code', 'matrix_functions.subjective', 'matrix_functions.description')
        ->where([
            ['client_id', $id],
            [function ($query) use ($request) {
                if (($function = $request->function)) {
                    $query
                    ->orWhere('matrix_functions.function', 'LIKE', '%' . $function . '%')
                    ->orWhere('matrix_functions.cost_code', 'LIKE', '%' . $function . '%')
                    ->orWhere('matrix_functions.subjective', 'LIKE', '%' . $function . '%')
                    ->orWhere('matrix_functions.description', 'LIKE', '%' . $function . '%')->get();
                }
            }]
        ])
        ->paginate(4);

        $clientDetails = clients::with('EstateDetails')->where('id', $id)->first();


        return view('clientfunctions.show', compact('clients', 'clientFunctions', 'clientDetails'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies('can_function_assign'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $client = clients::where('id', $id)->first();

        $functions = MatrixCategory::with('MatrixFunction')->get();

        $clientFunctions = DB::table('clients_matrix_function')
        ->join('clients', 'clients.id', '=', 'client_id')
        ->join('matrix_functions', 'matrix_functions.id', '=', 'function_id')
        ->where('client_id', $id)
        ->pluck('clients_matrix_function.function_id','clients_matrix_function.function_id')
        ->all();



        return view('clientfunctions.edit', compact('client', 'functions', 'clientFunctions'));
    }

    public function update(Request $request, $id)
    {

            $client = clients::find($id);
            if (isset($request->function)) {

            $client->functions()->sync($request->input('function', []));

            }else{
                $client->functions()->sync(array());
            }
            alert()->toast('Responsibilities updated', 'success')->persistent('Close')->autoclose(6000);
            return redirect()->route('clients.index');
    }
}

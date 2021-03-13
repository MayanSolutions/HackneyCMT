<?php

namespace App\Http\Controllers;

use App\Models\MatrixCategory;
use App\Models\MatrixCatergory;
use App\Models\MatrixFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\IsFalse;

class MatrixFunctionController extends Controller
{

    public function store(Request $request)
    {
        abort_if(Gate::denies('can_create_matrix_cat'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $this->validate($request, [
            'function'    => 'required',
            'function.*'  => 'required',
            'cost_code'    => 'required',
            'cost_code.*'  => 'required',
            'subjective'    => 'required',
            'subjective.*'  => 'required',
            'function_description'    => 'required',
            'function_description.*'  => 'required',
            ]);

        if($request->function > 0){

            $count = count($request->function);
            $catid = $request->catid;
            $function = $request->function;
            $cost_code = $request->cost_code;
            $subjective = $request->subjective;
            $function_description = $request->function_description;

            for ($i=0; $i < $count; ++$i )
            {
            $functions = new MatrixFunction();
            $functions->matrix_category_id = $catid[$i];
            $functions->function = $function[$i];
            $functions->cost_code = $cost_code[$i];
            $functions->description = $function_description[$i];
            $functions->subjective = $subjective[$i];
            $functions->save();
            }

            return back()->withSuccessMessage('Function created');
        }
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('can_delete_matrix_cat'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $function = MatrixFunction::find($id);
        $function->delete();

        return back()->withSuccessMessage('Function deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MatrixCategory;
use App\Models\MatrixFunction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\FunctionRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\ToSweetAlert;

class MatrixCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('can_view_matrix_cat'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $categories = MatrixCategory::where([
            ['category', '!=', Null],
            [function ($query) use ($request) {
                if (($category = $request->category)) {
                    $query->orWhere('category', 'LIKE', '%' . $category . '%')->get();
                }
            }]
        ])
        ->orderBy('id', 'desc')
        ->paginate(4);


        return view('matrixcategories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('can_create_matrix_cat'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');


        return view('matrixcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'description' => 'required',
            'function'    => 'required',
            'function.*'  => 'required',
            'cost_code'    => 'required',
            'cost_code.*'  => 'required',
            'subjective'    => 'required',
            'subjective.*'  => 'required',
            'function_description'    => 'required',
            'function_description.*'  => 'required',
            ]);

            $Category = MatrixCategory::create([
                'category' => $request->input('category'),
                'description' => $request->input('description'),
            ]);


                if($request->function > 0){

                $count = count($request->function);
                $function = $request->function;
                $cost_code = $request->cost_code;
                $subjective = $request->subjective;
                $function_description = $request->function_description;

                for ($i=0; $i < $count; ++$i )
                {
                $functions = new MatrixFunction();
                $functions->matrix_category_id = $Category->id;
                $functions->function = $function[$i];
                $functions->cost_code = $cost_code[$i];
                $functions->description = $function_description[$i];
                $functions->subjective = $subjective[$i];
                $functions->save();
                }

                alert()->toast('Management Service and Function Created', 'success')->persistent('Close')->autoclose(6000);
                return redirect()->route('matrixcategories.index');

                }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatrixCategory  $matrixCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        abort_if(Gate::denies('can_view_matrix_cat'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $category = MatrixCategory::where('id', $id)->first();

        $functions = Matrixfunction::where('matrix_category_id', $category->id)->paginate(4);

        $functions = Matrixfunction::where([
            ['matrix_category_id', $category->id],
            ['function', '!=', Null],
            [function ($query) use ($request) {
                if (($function = $request->function)) {
                    $query->orWhere('function', 'LIKE', '%' . $function . '%')
                    ->orWhere('cost_code', 'LIKE', '%' . $function . '%')
                    ->orWhere('subjective', 'LIKE', '%' . $function . '%')
                    ->orWhere('description', 'LIKE', '%' . $function . '%')
                    ->get();
                }
            }]
        ])
        ->orderBy('id', 'desc')
        ->paginate(4);

        return view('matrixcategories.show',compact ('category', 'functions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatrixCategory  $matrixCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = MatrixCategory::find($id);
        $functions = MatrixFunction::where('matrix_category_id', $id)->get();

        return view('matrixcategories.edit',compact('category', 'functions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MatrixCategory  $matrixCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
            'category' => 'required',
            'description' => 'required',
            ]);

            $category = MatrixCategory::find($id);
            $category->category = $request->input('category');
            $category->description = $request->input('description');
            $category->save();

            alert()->toast('Function updated', 'success')->persistent('Close')->autoclose(6000);
            return redirect()->route('matrixcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatrixCategory  $matrixCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkfuntions = MatrixFunction::where('matrix_category_id', $id)->count();

        if($checkfuntions > 0){

        alert()->toast('There are still functions registered against this service', 'warning')->persistent('Close')->autoclose(6000);
        return back();
        } else {

        $category = MatrixCategory::find($id);
        $category->delete();

        alert()->toast('Housing Service deleted successfully', 'success')->persistent('Close')->autoclose(6000);
        return redirect()->route('matrixcategories.index');
        }
    }
}




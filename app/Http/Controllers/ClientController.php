<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients;
use App\Models\User;
use App\Models\MatrixFunction;
use App\Models\Members;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $emptyProfiles = clients::doesntHave('EstateDetails')->get();

        $clients = clients::where([
            ['client_organisation', '!=', Null],
            [function ($query) use ($request) {
                if (($organisation = $request->organisation)) {
                    $query->orWhere('client_organisation', 'LIKE', '%' . $organisation . '%')
                    ->orWhere('client_address', 'LIKE', '%' . $organisation . '%')
                    ->orWhere('client_manager', 'LIKE', '%' . $organisation . '%')
                    ->orWhere('client_deputy', 'LIKE', '%' . $organisation . '%')
                    ->get();
                }
            }]
        ])
        ->orderBy('id', 'desc')
        ->paginate(4);

        return view('clients.index',compact('clients', 'emptyProfiles'));

    }

    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $liaison_officers = User::get();

        return view('clients.create',compact('liaison_officers'));
    }

    public function store(Request $request)
    {
        $liaison_officers = User::get();
        $this->validate($request, [
            'client_organisation' => 'required|unique:clients,client_organisation',
            'client_address' => 'required',
            'client_pfn' => 'required|string|min:11',
            'client_manager' => 'required',
            'client_manager_contact' => 'required|string|min:11',
            'client_manager_email' => 'required',
            'client_deputy' => 'required',
            ]);

            clients::create([
                'client_organisation' => $request->input('client_organisation'),
                'client_address' => $request->input('client_address'),
                'client_pfn_email' => $request->input('client_pfn_email'),
                'client_pfn' => $request->input('client_pfn'),
                'client_manager' => $request->input('client_manager'),
                'client_manager_contact' => $request->input('client_manager_contact'),
                'client_manager_email' => $request->input('client_manager_email'),
                'client_deputy' => $request->input('client_deputy'),
                'user_id' => $request->input('liaison_officer'),
                ]);

                return redirect()->route('clients.index')->withSuccessMessage('TMO profile created');
    }

    public function show($id, Request $request)
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $clientDetails = clients::with(['EstateDetails', 'members'])->where('id', $id)->first();

        $date = today()->format('Y-m-d');
        $boardDetails = members::where('client_id', $id)->where('position_exp_date', '>=', now())->get();
        $functions = MatrixFunction::all();
        $clientFunctions = DB::table('matrix_functions')
            ->join('clients_matrix_function', 'clients_matrix_function.function_id', '=', 'id')
            ->select('clients_matrix_function.function_id','clients_matrix_function.function_id')
            ->where('client_id', $clientDetails->id)
            ->get();

        if($functions->isEmpty()){
            $control = 0;
        }elseif($clientFunctions->isEmpty()){
            $control = 0;
        }else{
            $control = $clientFunctions->count() / $functions->count() *100;
        }

        $emptyProfiles = clients::doesntHave('EstateDetails')->where('id',$id)->get();
        $emptyBoard = clients::doesntHave('members')->where('id',$id)->get();
        $liaisonDetails = User::where('id', $clientDetails->user_id)->get();

        return view('clients.show', compact('clientDetails',
        'liaisonDetails',
        'emptyProfiles',
        'clientDetails',
        'emptyBoard',
        'control',
        'boardDetails'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $client = clients::find($id);
        $clients = clients::where('id', $id)->first();
        $liaison_officers = User::get();

        return view('clients.edit', compact('clients', 'liaison_officers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'client_organisation' => 'required',
            'client_address' => 'required',
            'client_pfn' => 'required|string|min:11|numeric',
            'client_manager' => 'required',
            'client_manager_contact' => 'required|string|min:11|numeric',
            'client_manager_email' => 'required',
            'client_deputy' => 'required',
            ]);

            $clients = clients::where('id', $id)->first();
            $clients->update([
                'client_organisation' => $request->input('client_organisation'),
                'client_address' => $request->input('client_address'),
                'client_pfn_email' => $request->input('client_pfn_email'),
                'client_pfn' => $request->input('client_pfn'),
                'client_manager' => $request->input('client_manager'),
                'client_manager_contact' => $request->input('client_manager_contact'),
                'client_manager_email' => $request->input('client_manager_email'),
                'client_deputy' => $request->input('client_deputy'),
                'user_id' => $request->input('liaison_officer'),
                ]);

        return redirect()->route('clients.index')->withSuccessMessage('TMO profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $clients = clients::find($id);
        $clients->delete();
        return redirect()->route('clients.index')->withSuccessMessage('TMO profile deleted');
    }
}

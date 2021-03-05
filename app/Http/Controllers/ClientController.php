<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                    ->orWhere('client_chair', 'LIKE', '%' . $organisation . '%')
                    ->orWhere('client_secretary', 'LIKE', '%' . $organisation . '%')
                    ->get();
                }
            }]
        ])
        ->orderBy('id', 'desc')
        ->paginate(4);

        return view('clients.index',compact('clients', 'emptyProfiles'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $liaison_officers = User::get();

        return view('clients.create',compact('liaison_officers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $liaison_officers = User::get();
        $this->validate($request, [
            'client_organisation' => 'required|unique:clients,client_organisation',
            'client_address' => 'required',
            'client_pfn' => 'required|string|min:11|numeric',
            'client_manager' => 'required',
            'client_manager_contact' => 'required|string|min:11|numeric',
            'client_manager_email' => 'required',
            'client_deputy' => 'required',
            'client_chair' => 'required',
            'client_secretary' => 'required',
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
                'client_chair' => $request->input('client_chair'),
                'client_chair_contact' => $request->input('client_chair_contact'),
                'client_chair_email' => $request->input('client_chair_email'),
                'client_secretary' => $request->input('client_secretary'),
                'user_id' => $request->input('liaison_officer'),
                ]);



                alert()->toast('Client profile created', 'success')->persistent('Close')->autoclose(6000);
                return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $clientDetails = clients::with('EstateDetails')->where('id', $id)->first();

        $emptyProfiles = clients::doesntHave('EstateDetails')->where('id',$id)->get();

        $liaisonDetails = User::where('id', $clientDetails->user_id)->get();

        return view('clients.show', compact('clientDetails','liaisonDetails', 'emptyProfiles', 'clientDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $client = clients::find($id);
        $clients = clients::where('id', $id)->first();
        $liaison_officers = User::get();

        return view('clients.edit', compact('clients', 'liaison_officers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'client_chair' => 'required',
            'client_secretary' => 'required',
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
                'client_chair' => $request->input('client_chair'),
                'client_chair_contact' => $request->input('client_chair_contact'),
                'client_chair_email' => $request->input('client_chair_email'),
                'client_secretary' => $request->input('client_secretary'),
                'user_id' => $request->input('liaison_officer'),
                ]);
            alert()->toast('Client Profile updated', 'success')->persistent('Close')->autoclose(6000);

        return redirect()->route('clients.index');
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
        alert()->toast('Client deleted', 'success')->persistent('Close')->autoclose(6000);
        return redirect()->route('clients.index');
    }
}

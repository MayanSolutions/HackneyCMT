<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients;
use App\Models\User;
use App\Models\EstateDetail;
use App\Models\MatrixFunction;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class EstateDetailController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('can_access_estates'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $emptyProfiles = clients::doesntHave('EstateDetails')->get();
        $clients = clients::with('EstateDetails')->whereHas('EstateDetails')
        ->where([
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
        ->paginate(4);;
        return view('estatedetails.index',compact('clients', 'emptyProfiles'));

    }

    public function create($id)
    {
        abort_if(Gate::denies('can_create_estates'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $filterClient = clients::doesntHave('EstateDetails')->where('id', $id)->first();

        return view('estatedetails.create', compact('filterClient'));
    }

    public function store(Request $request, Clients $clients)
    {
        $this->validate($request, [
            'no_of_units' => 'required|numeric',
            'freeholders'    => 'required|numeric',
            'leaseholders'  => 'required|numeric',
            'tenants'  => 'required|numeric',
            'comm_halls'  => 'required|numeric',
            'outside_areas'  => 'required|numeric',
            'communal_facilities'  => 'required|numeric',

            ]);

            $propertycalculation = $request->no_of_units;

            if ($request->freeholders + $request->leaseholders + $request->tenants != $propertycalculation) {

                $propertycalculation = $request->freeholders + $request->leaseholders + $request->tenants;

                EstateDetail::create([
                    'client_id' => $clients->id,
                    'no_of_units' => $propertycalculation,
                    'freeholders' => $request->input('freeholders'),
                    'leaseholders' => $request->input('leaseholders'),
                    'tenants' => $request->input('tenants'),
                    'comm_halls' => $request->input('comm_halls'),
                    'outside_areas' => $request->input('outside_areas'),
                    'communal_facilities' => $request->input('communal_facilities'),
                    ]);

                    alert()->toast('The property count did not add up. This has been autocorrected by the system', 'warning')->persistent('Close')->autoclose(10000);
                return redirect()->route('estatedetails.index');
            }else{

            EstateDetail::create([
            'client_id' => $clients->id,
            'no_of_units' => $propertycalculation,
            'freeholders' => $request->input('freeholders'),
            'leaseholders' => $request->input('leaseholders'),
            'tenants' => $request->input('tenants'),
            'comm_halls' => $request->input('comm_halls'),
            'outside_areas' => $request->input('outside_areas'),
            'communal_facilities' => $request->input('communal_facilities'),
            ]);

        return redirect()->route('estatedetails.index')->withSuccessMessage('TMO estate updated');
            }

    }

    public function show($id, Request $request)
    {
        abort_if(Gate::denies('can_access_estates'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $clientDetails = clients::with('EstateDetails')->where('id', $id)->first();
        $liaisonDetails = User::where('id', $clientDetails->user_id)->get();

        return view('estatedetails.show', compact('clientDetails','liaisonDetails',));
    }


    public function edit($id)
    {
        abort_if(Gate::denies('can_edit_estates'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $clients = clients::with('EstateDetails')->where('id', $id)->first();

        return view('estatedetails.edit', compact('clients'));

    }

    public function update(Request $request, $id)
    {

        $detailsId = EstateDetail::where('id', $id)->pluck('client_id');
        $clientid = clients::where('id', $detailsId)->first();

        $this->validate($request, [
            'no_of_units' => 'required|numeric',
            'freeholders'    => 'required|numeric',
            'leaseholders'  => 'required|numeric',
            'tenants'  => 'required|numeric',
            'comm_halls'  => 'required|numeric',
            'outside_areas'  => 'required|numeric',
            'communal_facilities'  => 'required|numeric',
            ]);


            $estates = EstateDetail::find($id);

            $propertycalculation = $request->no_of_units;
            if ($request->freeholders + $request->leaseholders + $request->tenants != $propertycalculation) {
            $propertycalculation = $request->freeholders + $request->leaseholders + $request->tenants;

            $estates->update([
                    'client_id' => $clientid->id,
                    'no_of_units' => $propertycalculation,
                    'freeholders' => $request->input('freeholders'),
                    'leaseholders' => $request->input('leaseholders'),
                    'tenants' => $request->input('tenants'),
                    'comm_halls' => $request->input('comm_halls'),
                    'outside_areas' => $request->input('outside_areas'),
                    'communal_facilities' => $request->input('communal_facilities'),
                ]);

                alert()->toast('The property count did not add up. This has been autocorrected by the system', 'warning')->persistent('Close')->autoclose(10000);
                return redirect()->route('estatedetails.index');
             }else{

                $estates->update([
                        'client_id' => $clientid->id,
                        'no_of_units' => $propertycalculation,
                        'freeholders' => $request->input('freeholders'),
                        'leaseholders' => $request->input('leaseholders'),
                        'tenants' => $request->input('tenants'),
                        'comm_halls' => $request->input('comm_halls'),
                        'outside_areas' => $request->input('outside_areas'),
                        'communal_facilities' => $request->input('communal_facilities'),
                    ]);

                    return redirect()->route('estatedetails.index')->withSuccessMessage('TMO estate updated');
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('can_delete_estates'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $estates = EstateDetail::find($id);
        $estates->delete();

        return redirect()->route('estatedetails.index')->withSuccessMessage('TMO estate deleted');
    }

}



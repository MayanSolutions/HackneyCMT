<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use App\Models\clients;
use Illuminate\Support\Carbon;

class MembersController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        $filterClient = clients::where('id', $id)->first();

        return view('members.create', compact('filterClient'));
    }

    public function store(Request $request, Clients $clients)
    {
        $this->validate($request, [
            'agm_date'    => 'required',
            'agm_date.*'  => 'required',
            'elected_name'    => 'required',
            'elected_name.*'  => 'required',
            'position'    => 'required',
            'position.*'  => 'required',
            ]);

            if($request->agm_date > 0){

                $count = count($request->agm_date);
                $agm_date = $request->agm_date;
                $elected_name = $request->elected_name;
                $position = $request->position;
                $elected_email = $request->elected_email;
                $elected_contact = $request->elected_contact;

                for ($i=0; $i < $count; ++$i )
                {
                $members = new Members();
                $members->agm_date = $agm_date[$i];
                $members->client_id = $clients->id;
                $members->elected_name = $elected_name[$i];
                $members->position = $position[$i];
                $members->elected_email = $elected_email[$i];
                $members->elected_contact = $elected_contact[$i];
                $members->position_exp_date = Carbon::parse($agm_date[$i])->addDays(366);
                $members->save();
                }

                return redirect()->route('clients.index')->withSuccessMessage('Members created');
            }
        }

    public function show($id, Members $members)
    {
        $filterClient = clients::where('id', $id)->first();
        $boardDetails = members::where('client_id', $id)->where('position_exp_date', '>=', Carbon::now())->get();
        $formerMembers = members::where('client_id', $id)->where('position_exp_date', '<=', Carbon::now())->get();
        return view('members.show', compact('filterClient', 'boardDetails', 'formerMembers'));
    }

    public function edit($id)
    {
        $members = Members::where('id', $id)->first();
        $client = clients::where('id', $members->client_id)->first();

        return view('members.edit', compact('members', 'client'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'agm_date' => 'required',
            'elected_name' => 'required',
            'position' => 'required',
            'elected_email' => 'email',
            'position_exp_date' => 'required',
            ]);

            $member = Members::where('id', $id)->first();
            $member->update([
                'agm_date' => $request->input('agm_date'),
                'elected_name' => $request->input('elected_name'),
                'position' => $request->input('position'),
                'elected_contact' => $request->input('elected_contact'),
                'elected_email' => $request->input('elected_email'),
                'position_exp_date' => $request->input('position_exp_date'),
                ]);

            return redirect('/members/show/'.$member->client_id)->withSuccessMessage('Board member updated');

    }


    public function destroy($id)
    {
        $member = Members::find($id);
        $member->delete();

        return back()->withSuccessMessage('Board member deleted');
    }
}

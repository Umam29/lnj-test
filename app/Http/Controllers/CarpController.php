<?php

namespace App\Http\Controllers;

use App\Models\Carp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CarpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sidebar'] = 'carp';
        $data['carp'] = Carp::all();

        return view('pages.carp',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->id)) {
            $carp = new Carp();
        } else {
            $carp = Carp::find($request->id);
        }

        $carp->created_at = Carbon::parse($request->created_date)->toDateTimeString();
        $carp->due_date = Carbon::parse($request->due_date)->toDateTimeString();
        $carp->status_date = Carbon::parse($request->status_date)->toDateTimeString();
        $carp->carp_code = $request->carp_code;
        $carp->category = $request->category;
        $carp->initiator = $request->initiator;
        $carp->initiator_div = $request->initiator_div;
        $carp->initiator_branch = $request->initiator_branch;
        $carp->recipient = $request->recipient;
        $carp->recipient_div = $request->recipient_div;
        $carp->recipient_branch = $request->recipient_branch;
        $carp->verified_by = $request->verified_by;
        $carp->effectiveness = $request->effectiveness;
        $carp->stage = $request->stage;
        $carp->status = $request->status;
        $carp->save();

        return redirect()->back()
                ->with('status',1)
                ->with('title','Success')
                ->with('message', 'Data Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carp = Carp::find($id);
        $carp->created_date_format = date('Y-m-d', strtotime($carp->created_at));
        $carp->due_date_format = date('Y-m-d', strtotime($carp->due_date));
        $carp->status_date_format = date('Y-m-d', strtotime($carp->status_date));
        return json_encode($carp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $carp = Carp::find($request->id);
        $carp->delete();

        return redirect()->back()
                ->with('status',1)
                ->with('title','Success')
                ->with('message', 'Data Deleted!');
    }

    public function loadDataTable(Request $request)
    {
        $data = Carp::all();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('created_at', function($data){
                $created_at = '-';

                if (!is_null($data->created_at)) {
                    $created_at = date('d-m-Y', strtotime($data->created_at));
                }

				return $created_at;
			})
            ->addColumn('carp_code', function($data){
				$carp_code = $data->carp_code ?? '-';

				return $carp_code;
			})
            ->addColumn('category', function($data){
				$category = $data->category ?? '-';

				return $category;
			})
            ->addColumn('initiator', function($data){
				$initiator = $data->initiator ?? '-';

				return $initiator;
			})
            ->addColumn('initiator_div', function($data){
				$initiator_div = $data->initiator_div ?? '-';

				return $initiator_div;
			})
            ->addColumn('initiator_branch', function($data){
				$initiator_branch = $data->initiator_branch ?? '-';

				return $initiator_branch;
			})
            ->addColumn('recipient', function($data){
				$recipient = $data->recipient ?? '-';

				return $recipient;
			})
            ->addColumn('recipient_div', function($data){
				$recipient_div = $data->recipient_div ?? '-';

				return $recipient_div;
			})
            ->addColumn('recipient_branch', function($data){
				$recipient_branch = $data->recipient_branch ?? '-';

				return $recipient_branch;
			})
            ->addColumn('verified_by', function($data){
				$verified_by = $data->verified_by ?? '-';

				return $verified_by;
			})
            ->addColumn('due_date', function($data){
                $due_date = '-';

                if (!is_null($data->due_date)) {
                    $due_date = date('d-m-Y', strtotime($data->due_date));
                }

				return $due_date;
			})
            ->addColumn('effectiveness', function($data){
				$effectiveness = $data->effectiveness ?? '-';

				return $effectiveness;
			})
            ->addColumn('status_date', function($data){
                $status_date = '-';

                if (!is_null($data->status_date)) {
                    $status_date = date('d-m-Y', strtotime($data->status_date));
                }

				return $status_date;
			})
            ->addColumn('stage', function($data){
				$stage = $data->stage ?? '-';

				return $stage;
			})
            ->addColumn('status', function($data){
				$status = $data->status ?? '-';

				return $status;
			})
            ->addColumn('aksi', function($data){
                $aksi = '';
				if (empty($is_checkout)) {
					$aksi = '<button type="button" class="btn btn-circle btn-info" onclick="showModalEdit('.$data->id.')">
								<i class="fas fa-edit"></i>
							</button>
							<button type="button" class="btn btn-circle btn-danger" onclick="showModalDelete('.$data->id.')">
								<i class="fas fa-trash"></i>
							</button>';
				}

				return $aksi;
            })
            ->escapeColumns([])
            ->make(true);;
    }

    public function loadDashboard(Request $request)
    {
        $data['card_draft'] = Carp::where('stage', 'Draft')->count();
        $data['card_submitted'] = Carp::where('stage', 'Submitted')->count();
        $data['card_open'] = Carp::where('stage', 'Open')->count();
        $data['card_responded'] = Carp::where('stage', 'Responded')->count();
        $data['card_verified'] = Carp::where('stage', 'Verified')->count();
        $data['card_closed'] = Carp::where('stage', 'Closed')->count();
        $data['card_re_open'] = Carp::where('stage', 'Re-Open')->count();
        $data['card_voided'] = Carp::where('stage', 'Voided')->count();
        $data['chart_canceled'] = Carp::where('status', 'Canceled')->count();
        $data['chart_open'] = Carp::where('status', 'Open')->count();
        $data['chart_closed'] = Carp::where('status', 'Closed')->count();

        return json_encode($data);
    }
}

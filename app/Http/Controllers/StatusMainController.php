<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_status;
use App\Http\Requests\StatusRequest;

class StatusMainController extends Controller
{
    private $status;
    private $date;
    private $author;
    private $limit =5;

    public function __construct(Tbl_status $status) {
        $this->status = $status;
        date_default_timezone_set ( 'Asia/Phnom_Penh' );
        $this->date = date ( "Y-m-d H:i:s" );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = $this->status->orderby('status_id','desc')->paginate($this->limit);
        return view('admin/status/main/status', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/status/main/add_status');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
       $this->status->status_title      = $request->txtName;
       $this->status->status_description= $request->txtDescription;
       $this->status->status_author     = "admin";
       $this->status->created_at = $this->date;
       $this->status->updated_at = $this->date;
       $this->status->save();
       $request->session()->flash('message','<div class="alert alert-success">Inserted new data</div>');
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id =preg_replace('#[^0-9]#', '', $id);
        if($id != "" && !empty($id)) {
            $status = $this->status->where('status_id',$id)->first();
            if($status) {
                return view('admin/status/main/view_status',compact('status'));
            }
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id =preg_replace('#[^0-9]#', '', $id);
        if($id != "" && !empty($id)) {
            $status = $this->status->where('status_id',$id)->first();
            if($status) {
                return view('admin/status/main/edit_status',compact('status'));
            }
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id =preg_replace('#[^0-9]#', '', $request->txtId);
        if(!empty($id)) {
            $this->status->where('status_id',$id)->update([
                "status_title"       => $request->txtName,
                "status_description" => $request->txtDescription,
                "status_author"      => "Admin",
                "status"             => $request->txtStatus,
                "updated_at"         => $this->date,
            ]);
            return redirect('/main/status.html');
        } else  {
            return redirect('/main/status.html');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $id = $id =preg_replace('#[^0-9]#', '',$id);
        if(!empty($id)) {
            $this->status->where('status_id',$id)->update(['status'=>'0']);
             $request->session()->flash('message','<div class="alert alert-warning">Delete successfully</div>');
        }
        return redirect('/main/status.html');
    }
}

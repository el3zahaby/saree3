<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Section;


class HelpController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome () {
        return view('help.index');
    }
    public function  submit() {
        return view('help.submit');
    }

    public function single($id){
        $t = Ticket::findOrFail($id);
        $answers = Ticket::where('parent',0)->where('room',$id)->
            orWhere('id',$id)->orderBy('id', 'DESC')->get();

        $lastUpdate =  $t->lastUpdate();

        return view('help.single',compact('t','answers','lastUpdate'));
    }
    public function submit_post(Request $request){

        $t = new Ticket();
        $t->user_id = Auth::id();
        $t->title   = '['.$request->departmentid.'] '.$request->ticketsubject;
        $t->content = $request->ticketmessage;
        $t->parent  =  true;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $Fname = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('uploads/help/'), $Fname);
            $t->files = $Fname;
        }

        $t->save();
       return redirect()->to(route('help.single',$t->id));
    }
    public function update(Request $request,$id){

        $t = new Ticket();
        $t->user_id = Auth::id();
//        $t->title   = $request->ticketsubject;
        $t->content = $request->replycontents;
        $t->parent  =  false;
        $t->room    =  $id;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $Fname = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('uploads/help/'), $Fname);
            $t->files = $Fname;
        }

        $t->save();
       return redirect()->back();
    }
    public function list() {
        $list =  Ticket::where('user_id',Auth::id())->where('parent',1)->paginate(10);;
        return view('help.list',compact('list'));
    }

}

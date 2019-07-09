<?php

namespace App\Http\Controllers\Notifications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class NotificationController extends Controller
{
    public function index ($id) {
       return DB::table('notifications')
       ->where('id', $id)
       ->update(['read_at'  => \Carbon\Carbon::now()]);  

       redirect(Request()->link);
    }

    public function read () {

    }
}

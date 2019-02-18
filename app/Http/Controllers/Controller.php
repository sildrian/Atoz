<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\OrderHistory;
use App\User;
use App\Order;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function orderHistory(){
        $id_user = Auth::user()->id_users;
        $orderHistory = new Order;
        $orderHistory = $orderHistory->where('id_users',$id_user)->where('status',0)->get();
        if(!empty($orderHistory)){
            $countOrderUnpaid = count($orderHistory);
        }else{
            $countOrderUnpaid = 0;
        }
        return $countOrderUnpaid;
    }
}

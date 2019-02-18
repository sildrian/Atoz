<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\OrderHistory;
use App\Order;
use Carbon\Carbon;


class DashboardController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countOrderUnpaid = $this->orderHistory();
        return view('prepaid/view', compact('orderHistory','countOrderUnpaid'));
    }

    public function savePrepaid(Request $request){

        $inputs = [
            'mobile' => $request->mobile,
            'value'   =>  $request->value,
        ];
        $rules = [
            'mobile' => 'required|min:7|max:12',
            'value'   =>  'required|numeric',
        ];

        $validation = \Validator::make( $inputs, $rules );

        if ( $validation->fails() ) {
            return redirect()->back()->withErrors($validation);
        }

        $order = new Order;
        $order->mobile_number = $request['mobile'];
          $order->prepaid_balance = $request['value'];
          $order->id_users = $request['id_user'];
          $order->order_number = '0';
          $order->save();

          if(!$order->save()){
            return redirect('/login');
          }else{
            return redirect('/product');
          }
    }

    public function product(){
        $countOrderUnpaid = $this->orderHistory();
        return view('product/view', compact('countOrderUnpaid'));
    }

    public function saveProduct(Request $request){
        $inputs = $request->all();
        $rules = [
            'product' => 'required|min:10|max:150',
            'shipping'   =>  'required|min:10|max:150',
            'price'   =>  'required|numeric',
        ];

        $validation = \Validator::make( $inputs, $rules );

        if ( $validation->fails() ) {
            return redirect()->back()->withErrors($validation);
        }
        $orderAll = Order::all()->first();
        $order = Order::find($request['id_user'])
                ->where('order_number','0')
                ->orderBy('id_order','desc')
                ->first();
            // ->whereTime('created_at', '>', Carbon::today()->toTimeString())
            $num_booking = sprintf('%04u', $orderAll->id_order+1);
            $num_booking2 = sprintf("%06d", mt_rand(1, 999999));
            $order->order_number = $num_booking.$num_booking2;
            $order->name_product = $request['product'];
              $order->shipping_address = $request['shipping'];
              $order->total_prepaid_balance = $order->prepaid_balance + $order->prepaid_balance*5/100;
              $order->price = $request['price'];
              $order->total = $request['price']+10000;
              $order->status = 0;
              $order->update();

          if(!$order->update()){
            return redirect('/login');
          }else{
            // return redirect('/success/'.$request['id_user']);
            return redirect('/success/'.$order->order_number);
          }
    }

    public function successBook($id){
        $order = Order::where('order_number',$id)->first();
        $countOrderUnpaid = $this->orderHistory();
        return view('success/view', compact('order','countOrderUnpaid'));
    }

    public function payOrder(Request $request){
        $orderNumber = $request->order_number;
        $now = Carbon::now()->toDateTimeString();
        $order = Order::where('order_number',$request->order_number)->first();
        $order->updated_at = $now;
        $order->update();
        $countOrderUnpaid = $this->orderHistory();
        return view('payment/view', compact('orderNumber','countOrderUnpaid'));
    }

    public function checkPay(Request $request){
        $order = Order::where('order_number',$request->order_number)->first();
        if(!empty($order)){
            $now = Carbon::now();
            $startTime = $order->created_at;//Carbon::parse($order->created_at);
            $finishTime = Carbon::parse($now);
            $diff_in_minutes = $startTime->diffInMinutes($finishTime);

            // Carbon::now()->toDateTimeString();

            if($diff_in_minutes<5){
                $random = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
                $shipping_code = substr("random",0,7);
                $order->shipping_code = $shipping_code;
                $order->status = 1;
                $order->update();
            }else{
                $order->status = 2;
                $order->update();
            }
        }
        return redirect('/order');
    }

    public function orderHistoryAll(){
        $id_user = Auth::user()->id_users;
        $orders = Order::where('id_users',$id_user)
                ->orderBy('created_at','desc')
               ->paginate(20);
        $countOrderUnpaid = $this->orderHistory();
        return view('order/view', compact('orders','countOrderUnpaid'));
    }

    public function checkSearch(Request $request){
        $countOrderUnpaid = $this->orderHistory();
        $keyword = $request->search;
        $orders = Order::where('order_number','LIKE','%'.$keyword.'%')->paginate (5)->setPath ( '' );
        // $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
         // $pagination = $orders->appends ( array (
         //    'keyword' => $request->search 
         //  ) );
        if(count($orders) > 0){
            return view('order/view', compact('countOrderUnpaid','orders'));
        }else{ 
            return view ('order/view')->withMessage('No Details found. Try to search again !');
        }
    }
}
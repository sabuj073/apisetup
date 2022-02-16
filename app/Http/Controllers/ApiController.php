<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\Server;
use App\Models\Request as AllRequest;
use App\Models\Order;
use App\Models\OrderDays;
use App\Models\OrderPerson;
use App\Models\Offer;


class ApiController extends BaseController
{
    //
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    function api_register(Request $res){
        $token = $res->access_token;
        if($token=="2y10G42.Bj8/aw0H8ByxuyvNhOsIlZGOJj4iT4ItJ/6ZwMJ8XoFmGCKSW"){
            try {
                return User::create([
                    'name' => $res->name,
                    'email' => $res->phone,
                    'password' => Hash::make($res->password),
                ]);

            } catch (\Illuminate\Database\QueryException $exception) {
                return $exception->errorInfo;
            }
        }
    }

    function api_login(Request $res){
        $token = $res->access_token;
        if($token=="2y10G42.Bj8/aw0H8ByxuyvNhOsIlZGOJj4iT4ItJ/6ZwMJ8XoFmGCKSW"){
            try {

                
                if($user = User::where('email',$res->phone)->first()){
                    $data = Hash::check($res->password, $user->password);
                    if($data){
                        return $user;
                    }else{
                        return response()->json(['id'=>"user not found"]);
                    }
                    
                }else{
                    return response()->json(['id'=>"user not found"]);
                }

            } catch (\Illuminate\Database\QueryException $exception) {
                return $exception->errorInfo;
            }
        }
    }

    function client_details(Request $res){
        $token = $res->access_token;
        if($token=="2y10G42.Bj8/aw0H8ByxuyvNhOsIlZGOJj4iT4ItJ/6ZwMJ8XoFmGCKSW"){
            try {
                $data = User::where('id',$res->id) -> first();
                if($data){
                    return $data;
                }else{
                    return response()->json(['id'=>"user not found"]);
                }

            } catch (\Illuminate\Database\QueryException $exception) {
                return $exception->errorInfo;
            }
        }
    }

    function server_registration(Request $res){
        $token = $res->access_token;
        if($token=="2y10G42.Bj8/aw0H8ByxuyvNhOsIlZGOJj4iT4ItJ/6ZwMJ8XoFmGCKSW"){
            try {
                return Server::create([
                    'name' => $res->name,
                    'username' => $res->username,
                    'g_phone' => $res->g_phone,
                    'email' => $res->email,
                    'fb_profile' => $res->fb_profile,
                    'nid_photo' => $res->nid_photo,
                    'certificate' => $res->certificate,
                    'password' => Hash::make($res->password),
                ]);

            } catch (\Illuminate\Database\QueryException $exception) {
                return $exception->errorInfo;
            }
        }
    }

    function server_login(Request $res){
        $token = $res->access_token;
        if($token=="2y10G42.Bj8/aw0H8ByxuyvNhOsIlZGOJj4iT4ItJ/6ZwMJ8XoFmGCKSW"){
            try {

                
                if($user = Server::where('g_phone',$res->g_phone)->first()){
                    $data = Hash::check($res->password, $user->password);
                    if($data){
                        return $user;
                    }else{
                        return response()->json(['id'=>"user not found"]);
                    }
                    
                }else{
                    return response()->json(['id'=>"user not found"]);
                }

            } catch (\Illuminate\Database\QueryException $exception) {
                return $exception->errorInfo;
            }
        }
    }


    function active_status(Request $res){
        $token = $res->access_token;
        if($token=="2y10G42.Bj8/aw0H8ByxuyvNhOsIlZGOJj4iT4ItJ/6ZwMJ8XoFmGCKSW"){
            $data =  Order::where('status',1)->orderBy('id', 'DESC')-> get();
            $temp = array();
            foreach($data as $row){
                $order_people = OrderPerson::where("order_id",$row->id)->get();
                $order_days = OrderDays::where("order_id",$row->id)->get();
                $row->order_people = $order_people;
                $row->order_days = $order_days;
                array_push($temp,$row);
            }

            return $temp;
        }
    }


     function request_details(Request $res){
        $token = $res->access_token;
        if($token=="2y10G42.Bj8/aw0H8ByxuyvNhOsIlZGOJj4iT4ItJ/6ZwMJ8XoFmGCKSW"){
            $data =  Order::where('status',1)->where('id', $res->id)-> get();
            $temp = array();
            foreach($data as $row){
                $order_people = OrderPerson::where("order_id",$row->id)->get();
                $order_days = OrderDays::where("order_id",$row->id)->get();
                $row->order_people = $order_people;
                $row->order_days = $order_days;
                array_push($temp,$row);
            }

            return $temp;
        }
    }


    

    function create_request(Request $res){
        $token = $res->access_token;
        if($token=="2y10G42.Bj8/aw0H8ByxuyvNhOsIlZGOJj4iT4ItJ/6ZwMJ8XoFmGCKSW"){
             try {
                return AllRequest::create([
                    'client_id' => $res->client_id,
                    'latitude' => $res->latitude,
                    'longitude' => $res->longitude,
                    'area_name' => $res->area_name,
                    'InTIme' => $res->InTIme,
                    'outTIme' => $res->outTIme,
                    'status' => 1,
                ]);

            } catch (\Illuminate\Database\QueryException $exception) {
                return $exception->errorInfo;
            }
        }
    }

     function pause_request(Request $res){
        $token = $res->access_token;
        if($token=="2y10G42.Bj8/aw0H8ByxuyvNhOsIlZGOJj4iT4ItJ/6ZwMJ8XoFmGCKSW"){
             try {
                 $request= Order::findOrFail($res->request_id);
                 $request->status = $res->status;
                 return $request->save();

            } catch (\Illuminate\Database\QueryException $exception) {
                return $exception->errorInfo;
            }
        }
    }

    function get_offer(Request $res){
        $token = $res->access_token;
        if($token=="2y10G42.Bj8/aw0H8ByxuyvNhOsIlZGOJj4iT4ItJ/6ZwMJ8XoFmGCKSW"){

                 return Offer::where('status','1')->get();
        }
    }



    

    function place_order(Request $res){
        $token = $res->access_token;
        if($token=="2y10G42.Bj8/aw0H8ByxuyvNhOsIlZGOJj4iT4ItJ/6ZwMJ8XoFmGCKSW"){
              try {
                $order_id =  Order::create([
                    'client_id' => $res->client_id,
                    "total_days"   => $res->total_days,
                    "total_hours"   => $res->total_hours,
                    "total_male"   => $res->total_male,
                    "total_female"   => $res->total_female,
                    "total_amount"   => $res->total_amount,
                    "paid"   => $res->paid,
                    "due"   => $res->due,
                    "status" => '1',
                ]);
            $order_id = $order_id->id;

            $order_people = $res->order_people;
            foreach($order_people as $row){
                OrderPerson::create([
                    "order_id" => $order_id,
                    "gender" => $row['gender'],
                    "qty"  => $row['qty'],
                    "type" => $row['type'],
                ]);
            }

            $order_days = $res->order_days;
            foreach($order_days as $row){
                OrderDays::create([
                    "order_id" => $order_id,
                    "day_number" => $row['day_number'],
                    "hour"  => $row['hour'],
                    "time" => $row['time'],
                    "date" => $row['date'],
                ]);
            }
            return $res;

            } catch (\Illuminate\Database\QueryException $exception) {
                return $exception->errorInfo;
            }
        }
    }

    

    
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DealersController extends Controller{
    public function index(){
        $dealers = User::all();
        $total = $dealers->count();
        
         $dealers->map(function($dealer){
            $dealer->vehicle_count = $dealer->vehicles()->count();
         });
        return view('dealer.index',compact('dealers','total'));
    }
    public function show(string $id){

        $dealer = User::find($id);
        if(!$dealer){
            abort('404' , 'User not found.');
        }
        $vehicles = $dealer->vehicles()->select(['id','title','price','make','modal','mileage','year','thumbnail'])->get();
        $total = $vehicles->count();
        return view('dealer.show' , compact("vehicles",'dealer' , 'total'));
    }
}

?>
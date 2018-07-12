<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Stock;
use App\User;
use Validator;
use Redirect;
use Carbon;
use Input;
use Auth;
use DB;

class RideController extends Controller
{
 public function index(){
        return view('home');
    }

  public function admin(){
    if(Auth::user()->role != 'admin'){
      flash('Sorry, You are not an admin')->error();
      return Redirect::route('home');
    }

    return view('system.admin');
  }

  public function myMessages(){
    $messages = Message::where('userId', '=', Auth::user()->id)->get();

    return view('system.messages')->withMessages($messages);
  }

  public function message(){
    if(Auth::user()->role != 'admin'){
      flash('Sorry, You are not an admin')->error();
      return Redirect::route('home');
    }

    $validator = Validator::make(Input::all(),
      array(
        'subject'  =>'required',
        'message'  =>'required'
      )
    );

    if($validator->fails()){
      return Redirect::back()
          ->withErrors($validator)
          ->withInput();
    } else {
      $subject  = Input::get('subject');
      $message  = Input::get('message');
      $userId   = Input::get('userId');

        $create = Message::create(array(
          'userId'       => $userId,
          'message'=> $message,
          'subject'   => $subject
        ));
    }
    flash('Message sent successfully')->success();
    return Redirect::back();
  }
  public function viewMessage(){
    if(Auth::user()->role != 'admin'){
      flash('Sorry, You are not an admin')->error();
      return Redirect::route('home');
    }

    $messages = Message ::all();

    return view('system.viewmessages')->withMessage($messages);
  }
  public function viewUsers(){
    if(Auth::user()->role != 'admin'){
      flash('Sorry, You are not an admin')->error();
      return Redirect::route('home');
    }

    $users = User::all();

    return view('system.users')->withUsers($users);
  }

 public function viewStock(){
  if(Auth::user()->role == 'null'){
    flash('Sorry, You are not an staff')->error();
    return Redirect::route('home');
  }
        return view('system.stock');
    }

 public function stockPost(){
    $validator = Validator::make(Input::all(),
      array(
        'name'       =>'required',
        'description'=>'required',
        'quantity'   =>'required',
        'cost'       =>'required'
      )
    );

    if($validator->fails()){
      return Redirect::back()
          ->withErrors($validator)
          ->withInput();
    } else {
      $name        = Input::get('name');
      $description = Input::get('description');
      $quantity    = Input::get('quantity');
      $cost        = Input::get('cost');

        $create = Stock::create(array(
          'name'       => $name,
          'description'=> $description,
          'quantity'   => $quantity,
          'cost'       => $cost
        ));
    }
    flash('Item successfully stored')->success();
    return Redirect::back();
  }
  public function listStock(){

  $stock = Stock::all();
        return view('system.liststock')->withStock($stock);
}

public function edit($id){
        $users = User::find($id);
        return view('system.edituser',compact('users','id'));
    }

    public function update(Request $request, $id){
        $users = User::find($id);
        $users->username = $request ->get('username');
        $users->email =  $request ->get('email');



        $users->save();
        return redirect()->route('view-users');
       }



    public function delete($id)
    {
        $user_v = User::findOrFail($id);
        $user_v->delete();
        //redirect
        return redirect()->route('view-users');
    }

    public function deletemessage($id)
    {
        $user_v = Message ::findOrFail($id);
        $user_v->delete();
        //redirect
        return redirect()->route('view-message');
    }

 public function searchRides(){
  $origin      = Input::get('origin');
  $destination = Input::get('destination');
  $capacity    = Input::get('capacity');
  $date        = Input::get('date');

  $rides = Ride::join('users', 'ride.auth_id', '=', 'users.id')
          ->select('ride.id', 'ride.origin', 'ride.destination', 'ride.date', 'ride.capacity', 'users.username')
                ->where('origin','like','%'.$origin.'%')
                ->where('destination','like','%'.$destination.'%')
                ->where('date','like','%'.$date.'%')
                ->where('capacity','like','%'.$capacity.'%')
                ->get();
  $allrides    = Ride::join('users', 'ride.auth_id', '=', 'users.id')
                    ->get();
  $origin      = $allrides->groupBy('origin');
  $destination = $allrides->groupBy('destination');
  $date        = $allrides->groupBy('date');
  $capacity    = $allrides->groupBy('capacity');
        return view('rides.get')->withRides($rides)->withOrigin($origin)->withDestination($destination)->withDate($date)->withCapacity($capacity);
    }

}

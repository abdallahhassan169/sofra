<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\models\Addition;
use App\models\Area;
use App\models\City;
use App\models\Comment;
use App\models\Commission;
use App\models\Contact;
use App\models\Meal;
use App\models\Notification;
use App\models\Offer;
use App\models\Order;
use App\models\Payment;
use App\models\Token;
use App\models\Restaurant;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private function apiResponse($status,$message,$data){
        $response=[
            'status'=> $status,
            'message'=>$message,
            'data'=>$data,
        ];
        return response()->json($response);

    }
    public function restaurants(){
        $restaurants=Restaurant::all();
        return $this->apiResponse(1,'success',$restaurants);
    }
    public function cities(){
        $cities=City::all();
        return $this->apiResponse(1,'success',$cities);
    }
    public function areas(Request $request){
        $areas=Area::where('city_id',$request->city_id)->get();
        return $this->apiResponse(1,'success',$areas);
    }
    public function meals(Request $request){
        $meals=Meal::where('restaurant_id',$request->restaurant_id)->get();
        return $this->apiResponse(1,'success',$meals);
    }
    public function restaurantComments(Request $request){
        $comments=Comment::where('restaurant_id',$request->restaurant_id)->get();
        return $this->apiResponse(1,'success',$comments);

    }
    public function restaurantDetails(Request $request){
        $details=Restaurant::where('id',$request->id)->get();
        return $this->apiResponse(1,'success',$details);
    }
    public function orderDetails(Request $request){
        $orderDetails=Order::where('id',$request->id)->get();
        return $this->apiResponse(1,'success',$orderDetails);
    }
    public function mealDetails(Request $request){
        $mealDetails=Meal::where('id',$request->id)->get();
        return $this->apiResponse(1,'success',$mealDetails);
    }
    public function notifications(){
        $list=Notification::all();
        return $this->apiResponse(1,'success',$list);
    }
    public function contactCreate(Request $request){
        $validation=validator($request->all(),[
            'name'=>'required|min:3|max:50',
            'email'=>'required|email',
            'phone'=>'required|min:10|max:15',
            'text'=>'required|min:20',

        ]);
        if ($validation->fails()){
            return $this->apiResponse(0,'failed','no data to show');
        }
        $contact=Contact::create($request->all());
        return $this->apiResponse(1,'success',$contact);
    }
    public function offersList(Request $request){
        $list=Offer::all();
        return $this->apiResponse(1,'success',$list);
    }
    public function currentOrders(Request $request){
        $client=$request->user('clients')->where('api_token',$request->api_token)->first();
       $currentOrders=$client->orders()->where('state','pending')->get();
        return $this->apiResponse(1,'success',$currentOrders);
    }
    public function lastOrders(Request $request){
        $client=$request->user('clients')->where('api_token',$request->api_token)->first();
        $lastOrders=$client->orders()->where('state','!=','pending')->get();
        return $this->apiResponse(1,'success',$lastOrders);
    }
    public function clientProfile(Request $request){
        $profile=$request->user('clients')->where('api_token',$request->api_token)->first();
        return $this->apiResponse(1,'success',$profile);
    }
    public function editClientProfile(Request $request){
        $client=$request->user('clients')->where('api_token',$request->api_token)->first();
        $client->update($request->all());
        return $this->apiResponse(1,'success',$client);
    }
    public function orderCreate(Request $request){
        $validation=validator($request->all(),[
            'quantity'=>'required|integer',
            'address'=>'required|min:3',
            'payment_id'=>'required',
            'addition_id'=>'nullable',
            'state'=>'exists:orders,state',
            'client_id'=>'required|exists:clients,id',
            'details'=>'nullable|min:3',
        ]);
        if($validation->fails()){
            return $this->apiResponse(0,'failed',$validation->errors());
        }
        $order=Order::create($request->all());
        return $this->apiResponse(1,'success',$order);
    }
    public function additionsList(Request $request){
        $list=Addition::where('restaurant_id',$request->restaurant_id)->get();
        return $this->apiResponse(1,'success',$list);
    }
    public function tokenCreate(Request $request){
        $validation=validator()->make($request->all(),[

            'token'=>'required',
            'client_id'=>'required',
            'platform'=>'required',


        ]);

        if ($validation->fails()){

            return $this->apiResponse(0,'failed',$validation->errors());
        }
        Token::where('token',$request->token->delete());
        $request->user('clients')->tokens()->create($request->all());
        return $this->apiResponse(1,'success','تم التسجيل بنجاح');

    }
    public function tokenDelete(Request $request){
        $token=Token::where('token',$request->token);
        $token->delete();
        return apiResponse(0,'success','تم تسجيل الخروج بنجاح');

    }
   public function commentCreate(Request $request){
        $validation=validator($request->all(),[
            'restaurant_id'=>'required|exists:restaurants,id',
            'client_id'=>'required|exists,clients,id',
            'text'=>'required|min:3|max:1000',

        ]);
        if($validation->fails()){
            return $this->apiResponse(0,'failed',$validation->errores());
        }
        $comment=Comment::create($request->all());
        return $this->apiResponse(1,'success',$comment);
   }
    public function  paymentMethods(){
        $methods=Payment::all();
        return $this->apiResponse(1,'success',$methods);
    }
    public function restaurantTypes(Request $request){
        $types=Restaurant::with('types')->where('id',$request->restaurant_id)->get();
        return $this->apiResponse(1,'success',$types);
    }
    public function restaurantMeals(Request $request){
        $meals=Meal::where('restaurant_id',$request->restaurant_id)->get();
        return $this->apiResponse(1,'success',$meals);
    }


}

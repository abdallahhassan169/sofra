<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\models\Commission;
use App\models\Meal;
use App\models\Offer;
use App\models\Order;
use App\models\Restaurant;
use App\models\Type;
use Illuminate\Http\Request;

class sellerController extends Controller
{
    private function apiResponse($status,$message,$data){
        $response=[
            'status'=> $status,
            'message'=>$message,
            'data'=>$data,
        ];
        return response()->json($response);

    }

    public function types(){
        $types=Type::all();
        return apiResponse(1,'success',$types);
    }
    public function mealAdd(Request $request){
        $validation=validator($request->all(),[
            'name'=>'required|min:3|max:50',
            'price'=>'required|max:20',
            'offer_price'=>'nullable|max:20',
            'time'=>'required',
            'image'=>'image:jpg,jpeg,png',
            'restaurant_id'=>'required|exists:restaurants,id',
        ]);
        if($validation->fails()){
            return $this->apiResponse(0,'failed',$validation->errors());
        }
        $meal=Meal::create($request->all());
    }
    public function mealEdit(Request $request){
        $meal=Meal::where('id',$request->id);
        $meal->update($request->all());
        return $this->apiResponse(1,'success',$meal);
    }
    public function mealDelete(Request $request){
        $meal=Meal::where('id',$request->id);
        $meal->delete();
        return $this->apiResponse(1,'success',$meal);
    }
   public function currentOrders(Request $request){
       $current=Order::where('restaurant_id',$request->restaurant_id)->where('state','pending')->get();
        return $this->apiResponse(1,'success',$current);
   }
    public function lastOrders(Request $request){
        $last=Order::where('restaurant_id',$request->restaurant_id)->where('state','!=','pending')->get();
        return $this->apiResponse(1,'success',$last);
    }
    public function sellerProfile(Request $request){
        $profile=$request->user('sellers')->where('api_token',$request->api_token)->first();
        return $this->apiResponse(1,'success',$profile);
    }
    public function editSellerProfile(Request $request){
        $seller=$request->user('sellers')->where('api_token',$request->api_token)->first();
        $seller->update($request->all());
        return $this->apiResponse(1,'success',$seller);
    }
    public function restaurantCurrentOrders(Request $request){
        $orders=Order::where('restaurant_id',$request->resraurant_id&&'state','accepted')->get();
        return $this->apiResponse(1,'success',$orders);
    }
    public function restaurantlastOrders(Request $request){
        $orders=Order::where('restaurant_id',$request->resraurant_id&&'state','!=','pending'&&'state','!=','accepted')->get();
        return $this->apiResponse(1,'success',$orders);
    }
    public function restaurantNewOrders(Request $request){
        $orders=Order::where('restaurant_id',$request->resraurant_id&&'state','pending')->get();
        return $this->apiResponse(1,'success',$orders);
    }
    public function commession(Request $request){
        $commession=Commission::where('restaurant_id',$request->restaurant->id);
        return $this->apiResponse(1,'success',$commession);
    }
public function offerCreate(Request $request){
        $validation=validator($request->all(),[
            'name'=>'required|min:3|max:50',
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'text'=>'required|min:10:max:300',
            'date_from'=>'required|date',
            'date_to'=>'required|date',
            'meal_id'=>'required|exists:meals,id',
        ]);
        if($validation->fails()){
            return $this->apiResponse(0,'failed',$validation->errors());
        }
        $offer=Offer::create($request->all());
        return $this->apiResponse(1,'success',$offer);
}
public function offerEdit(Request $request){
        $offer=Offer::where('id',$request->id)->update($request->all());
        return $this->apiResponse(1,'success',$offer);
}
public function offerDelete(Request $request){
        $dleteOfer=Offer::where('id',$request->id)->update();
        return $this->apiResponse(1,'success','deleted');
}
}

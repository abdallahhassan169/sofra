<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\models\Seller;
use http\Client;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use function GuzzleHttp\Psr7\str;

class AuthController extends Controller
{
    private function apiResponse($status,$message,$data){
        $response=[
            'status'=> $status,
            'message'=>$message,
            'data'=>$data,
        ];
        return response()->json($response);

    }
    public function clientRegister(Request $request){
        $validation=validator($request->all(),[
            'name'=>'required|min:3|max:50',
            'email'=>'required|email|min:5|max:70',
            'password'=>'required|min:8|max:50',
            'phone'=>'required|min:11|max:15',
            'city_id'=>'required|exists:cities,id',
            'area_id'=>'required|exists:areas,id',
        ]);
        if($validation->fails()){
            return $this->apiResponse(0,'failed',$validation->errors());
        }
        $client=\App\models\Client::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'city_id'=>$request->input('city_id'),
            'area_id'=>$request->input('area_id'),
            'password'=>encrypt($request->input('password')),
        ]);
        $client->api_token=Str::random(50);
        $client->save();
        return $this->apiResponse(1,'success',$client);

    }
    public function clientLogin(Request $request){
        $validation=validator($request->all(),[
            'email'=>'required|email|min:5|max:70',
            'password'=>'required|min:8|max:50',
        ]);
        if($validation->fails()){
            return $this->apiResponse(0,'failed',$validation->errors());
        }
        $client=\App\models\Client::where('email',$request->email)->first();
        if($client){
            if(Hash::check($request->password,$client->password)){
                return $this->apiResponse(1,'loggedin','hello our client');
            }
            else{
                return $this->apiResponse(0,'password is incorrect','no data to show');
            }

        }
        else{
            return $this->apiResponse(0,'invalid email','no data to show');
        }
    }
    public function clientEmailSending(Request $request)
    {

        $client=\App\models\Client::where('email',$request->email)->first();
        if($client)
        {
            $code=rand(1111,9999);
            $update=$client->update(['pin_code'=>$code]);
            if($update){

                Mail::to($client ->email)
                    ->bcc("sovghab@gmail.com")
                    ->send(new ResetPassword($code));




                return $this->apiResponse(1,'please check your phone',$code);
            }
            else
            {
                return $this->apiResponse(0,'failed,please try again');
            }
        }
        else {
            return $this->apiResponse(0,'there is no mail attached to this phone','no data to show');
        }


    }
//Seller Authentication
    public function sellerRegister(Request $request){
        $validation=validator($request->all(),[
            'name'=>'required|min:3|max:50',
            'email'=>'required|email|min:5|max:70',
            'password'=>'required|min:8|max:50',
            'phone'=>'required|min:11|max:15',
            'city_id'=>'required|exists:cities,id',
            'area_id'=>'required|exists:areas,id',
            'whatsapp'=>'required|min:11|max:15',
            'contact_whatsapp'=>'required|min:11|max:15',
            'contact_phone'=>'required|min:11|max:15',
            'image'=>'nullable|image|mimes:jpg,jpeg,png',
        ]);
        if($validation->fails()){
            return $this->apiResponse(0,'failed',$validation->errors());
        }
        $seller=\App\models\Seller::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'city_id'=>$request->input('city_id'),
            'area_id'=>$request->input('area_id'),
            'whatsapp'=>$request->input('whatsapp'),
            'contact_whatsapp'=>$request->input('contact_whatsapp'),
            'contact_phone'=>$request->input('contact_phone'),
            'image'=>$request->input('image'),
            'password'=>encrypt($request->input('password')),
        ]);
        $seller->api_token=Str::random(50);
        $seller->save();
        return $this->apiResponse(1,'success',$seller);

    }
    public function sellerLogin(Request $request){
        $validation=validator($request->all(),[
            'email'=>'required|email|min:5|max:70',
            'password'=>'required|min:8|max:50',
        ]);
        if($validation->fails()){
            return $this->apiResponse(0,'failed',$validation->errors());
        }
        $seller=\App\models\Seller::where('email',$request->email)->first();
        if($seller){
            if(Hash::check($request->password,$seller->password)){
                return $this->apiResponse(1,'loggedin','hello our client');
            }
            else{
                return $this->apiResponse(0,'password is incorrect','no data to show');
            }

        }
        else{
            return $this->apiResponse(0,'invalid email','no data to show');
        }
    }
    public function sellerEmailSending(Request $request)
    {

        $seller=Seller::where('email',$request->email)->first();
        if($seller)
        {
            $code=rand(1111,9999);
            $update=$seller->update(['pin_code'=>$code]);
            if($update){

                Mail::to($seller ->email)
                    ->bcc("sovghab@gmail.com")
                    ->send(new ResetPassword($code));




                return $this->apiResponse(1,'please check your phone',$code);
            }
            else
            {
                return $this->apiResponse(0,'failed,please try again');
            }
        }
        else {
            return $this->apiResponse(0,'there is no mail attached to this phone','no data to show');
        }


    }

}

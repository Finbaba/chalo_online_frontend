<?php

if (!function_exists('sendOtp')) {
    function sendOtp(string $number, string $otp , $name="ChaloOnline"): array
    {
        try {
            $apiKey = 'gwGNVGWFsEm0WoV99rkQag';
            $senderId = 'SMTLPL';
            $entityId = '1701173252768182611';
            $templateId = '1707173261059981615';
            $text = "$otp is verification otp for ".$name.". OTPs are SECRET. DO NOT disclose it to anyone. SMT Labs Private Limited";
            $route = 8;

            $url = "https://www.smsgatewayhub.com/api/mt/SendSMS?" . http_build_query([
                'APIKey' => $apiKey,
                'senderid' => $senderId,
                'channel' => 2,
                'DCS' => 0,
                'flashsms' => 0,
                'number' => $number,
                'text' => $text,
                'route' => $route,
                'EntityId' => $entityId,
                'dlttemplateid' => $templateId,
            ]);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);

            Log::info("OTP sent to {$number}. Response: {$response}");

            if ($httpCode === 200) {
                return ['status' => true, 'message' => 'OTP sent successfully'];
            }

            return ['status' => false, 'message' => 'Failed to send OTP', 'response' => $response];
        } catch (\Exception $e) {
            Log::error("Error sending OTP to {$number}: " . $e->getMessage());
            return ['status' => false, 'message' => 'An error occurred', 'details' => $e->getMessage()];
        }
    }
}







/**********************************/
    public function loginWithPhone(Request $request)
    {
        $otp=rand(100000,999999);
        $data=[
            "mobile_number"=>$request->mobile_number,
            "otp"=>$otp,
            "tenant_id"=>$request->tenant_id,
            "token"=>uniqid()
        ];
        MobileVerification::create($data);

        sendOtp($request->mobile_number,$otp);
        
        $res=[
            'status'=> true,
            'message'=> "Otp send register mobile number",
            'data'=> $otp,
        ];
        return response()->json($res, 200);

    }
	
	
	
	
	
	  public function verifyOtp(Request $request){

        $wheredata=[
            "mobile_number"=>$request->mobile_number,
            "otp"=>$request->otp,
           
        ];
        $mobile=MobileVerification::where($wheredata)->first();
        if($mobile)
        {
            
            $customer = EcomCustomer::where([
                'phone' => $request->mobile_number,
                'tenant_id' => $request->tenant_id
            ])->first();
        
            // If customer doesn't exist, create a new one
            if (!$customer) {
                $customer = EcomCustomer::create([
                    'slug' => $request->tenant_id . '-' . $request->mobile_number,
                    'referral_code' => EcomCustomer::generateReferralCode(),
                    'is_new' => true,
                    'tenant_id' => $request->tenant_id,
                    'password' => Hash::make($request->password),
                    'phone' => $request->mobile_number,
                ]);
                $customer=EcomCustomer::where(['id'=>$customer->id])->first();
            }else{
                $customer->is_new=false;
            }
            $customer->device_type='android';
            $customer->fcm_token=$request->fcm_token;

            if(empty($customer->referral_code)){
                $customer->referral_code=EcomCustomer::generateReferralCode();
                
            }
            $customer->save();

            $token = $customer->createToken('myApp')->accessToken;

            $mobile->delete();

           
            $res=[
                'status'=> true,
                'message'=> "Otp verification successful",
                'data'=> [
                    'token'=>$token,
                    'profile' => $customer,
                ],
                "imageurl"=>env('AWS_URL')
            ];
        }else{
            $res=[
                'status'=> true,
                'message'=> "Invalid Otp",
                'data'=> [
                    
                ],
            ];
        }        
        return response()->json($res, 200);

    }
	
	?>
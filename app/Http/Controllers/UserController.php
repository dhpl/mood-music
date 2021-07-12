<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function updateFCM(Request $request)
    {
        $payload = json_decode($request->getContent(), true);
        $deviceID = $payload['device_id'];
        $fcmToken = $payload['fcm_token'];
        $user = User::where('device_id', $deviceID)->first();
        if ($user == null) {
            $newUser = new User();
            $newUser->device_id = $deviceID;
            $newUser->fcm_token = $fcmToken;
            $newUser->save();
        } else {
            $user->fcm_token = $fcmToken;
            $user->save();
        }
        return response()->json([
            'success' => true,
            'message' => 'Update FCM token success'
        ], 200);
    }
}

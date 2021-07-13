<?php

namespace App\Http\Controllers;

use App\Traits\PushNotificationTrait;
use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use PushNotificationTrait;

    public function sendPush(Request $request)
    {
        $title = $request->title;
        $body = $request->body;
        $image_url = null;
        if ($request->has('image')) {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storageImages/');
            $image->move($destinationPath, $imageName);
            $image_url = asset('/storageImages/' . $imageName);
        }
        $data = [
            "title" => $title,
            "body" => $body,
            'badge' => 0,
            'sound' => 'default'
        ];

        $content = [
            "title" => $title,
            "body" => $body,
            'badge' => 0,
            'sound' => 'default'
        ];

        if ($image_url != null) {
            $data['image_url'] = $image_url;
            $content['image_url'] = $image_url;
        }

        $devicesToken = User::all()->pluck('fcm_token')->toArray();
        $this->pushMessages($devicesToken, $content, $data);
        return back()->with('success', 'Push Notification Success!!!');
    }
}

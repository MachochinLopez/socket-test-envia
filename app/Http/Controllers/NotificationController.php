<?php

namespace App\Http\Controllers;

use App\Events\GuideNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function guideNotification(Request $request)
    {
        event(new GuideNotification());
    }
}

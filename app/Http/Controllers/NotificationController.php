<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function guideNotification()
    {
        file_put_contents('prueba.txt', 'logrado');
    }
}

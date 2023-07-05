<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use App\subscribe;

class MessageController extends Controller
{
    public function send(){
        $new = new Message;
        $new->name = $_POST['name'];
        $new->email = $_POST['email'];
        $new->about = $_POST['about'];
        $new->Message = $_POST['message'];
        $new->save();
        return redirect('/');
    }
    public function subscribe(){
        $new = new subscribe;
        $new->email = $_POST['email'];
        $new->save();
        return redirect('/');
    }
}

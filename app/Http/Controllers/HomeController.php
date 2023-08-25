<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $servers = Server::orderBy('server_name', 'asc')
            ->where('user_id', Auth::id())
            ->get();
        return view('home',['servers' => $servers]);
    }
}

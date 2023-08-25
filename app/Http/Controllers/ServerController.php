<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{
    public function addserver()
    {
        return view('server.add_server');
    }

    public function createserver(Request $request)
    {
        try {
            $server = array(
            'server_name' => $request->server_name,
            'server_ip' => $request->server_ip ,
            'server_username' => $request->server_username,
            'server_password' => $request->server_password,
            'server_port' => $request->server_port,
            'user_id' => Auth::id()
            
            
        );
            Server::create($server);

            return redirect('home')->with('success', 'Server created successfully!');

        } catch (\Throwable $th) {
            return redirect('home')->with('danger', 'Error occured while creating server.');
        }

        
    }

    public function connectserver(Request $request)
    {
        try {
            $id = $request->server_id;
            $server = Server::where('id', '=', $id)->firstOrFail();
            
            return view('server.connect', [
                
                'name' => $server->server_name,
                'ip' => $server->server_ip,
                'port' => $server->server_port,
                'user' => $server->server_username,
                'password' => $server->server_password,
                'websocketurl' => env("WEBSOCKET_URL", "localhost"),
            ]);

        } catch (\Throwable $th) {
           
            return redirect('home')->with('danger', 'Error occured while launching server.');
        }

        
    }
    public function editserver($id)
    {
        try {
            
            $server = Server::where('id', '=', $id)->where('user_id', '=', Auth::id())->firstOrFail();
            
            return view('server.edit_server', [
                'id'=> $server->id,
                'name' => $server->server_name,
                'ip' => $server->server_ip,
                'port' => $server->server_port,
                'username' => $server->server_username,
                'password' => $server->server_password,
            ]);

        } catch (\Throwable $th) {
           
            return redirect('home')->with('danger', 'Error occured while getting server details.');
        }

        
    }

    public function updateserver(Request $request)
    {
        try {
            // Find the server to update
            $server = Server::where('id', $request->server_id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

            // Update the server data
            $server->update([
                'server_name' => $request->server_name,
                'server_ip' => $request->server_ip,
                'server_username' => $request->server_username,
                'server_password' => $request->server_password,
                'server_port' => $request->server_port,
            ]);

            return redirect('home')->with('success', 'Server updated successfully!');
        } catch (\Throwable $th) {
            return redirect('home')->with('danger', 'Error occurred while updating server.');
        }
    }
    public function deleteserver(Request $request)
    {
        try {
            // Find the server to delete
            $server = Server::where('id', $request->server_id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

            // Delete the server
            $server->delete();

            return redirect('home')->with('success', 'Server deleted successfully!');
        } catch (\Throwable $th) {
            return redirect('home')->with('danger', 'Error occurred while deleting server.');
        }
    }

}

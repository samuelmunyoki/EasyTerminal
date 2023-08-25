@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="header-content">
                        <b>{{ __('Your Servers') }}</b>
                        
                        <a href="{{ route('get_addserver') }}">
                            <button class="btn btn-info">
                            Add Server
                            </button>
                        </a>
                    </div>
                </div>


                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    
                        
                    @endif
                    @if(session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                    @endif
                    

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            
                            <th scope="col">Name</th>
                            <th scope="col">IP</th>
                            <th scope="col">Port</th>
                            <th scope="col">Username</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servers as $server)
                            
                                    <tr typ>
                                        
                                        <td>{{$server->server_name}}</td>
                                        <td>{{$server->server_ip}}</td>
                                        <td>{{$server->server_port}}</td>
                                        <td>{{$server->server_username}}</td>
                                        <td class="row align-items-center">
                                            <form class="col-md-4" method="post" action="{{ route('connectserver')}}">
                                                @csrf
                                                <input type="hidden" name="server_id" value="{{$server->id}}">
                                                <button type="submit" class="btn "><i class="fa-solid fa-wifi" style="color: #0400ff;"></i></button>
                                            </form>
                                            
                                            <a class="col-md-4" href="{{ route('get_editserver', ['id'=>$server->id])}}"><i class="fa-solid fa-pen"></i></a>
                                            <form class="col-md-4" method="post" action="{{ route('deleteserver')}}" >
                                                @csrf
                                                <input type="hidden" name="server_id" value="{{$server->id}}">
                                                <button type="submit" class="btn " onclick="return confirm('Are you sure you want to delete this server?');">
                                                    <i class="fa-solid fa-trash" style="color: #b80000;"></i>
                                                </button>
                                            </form>
                                            
                                            
                                        </td>

                                    </tr>
                                
                              
                                  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

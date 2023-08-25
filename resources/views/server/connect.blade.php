@extends('layouts.app')

@section('content')


<div id="container" class="container" style="width: 90vw; height: 100vh;">
    
<div class="card">
    <div class="card-header">Connecting to server {{$ip}}</div>
    <div class="card-body">
        <div id="terminal" style="width: 100%; height: 100%;"></div>
    </div>
</div>
       
</div>


@endsection

@push('scripts')
    <script>

     
    var resizeInterval;
    var wSocket;
    var password;
    var idconnection = 23434325352
    var intervalId;
    

    function connectServer() {
        wSocket = new WebSocket("ws:{{$websocketurl}}:8090");
        term.open(document.getElementById('terminal'));
        document.getElementById("terminal").style.visibility="visible";
        term.write('This is EasyTerminal')
        term.write('Waiting for server to respond ...')
        var dataSend = {"auth":
                        {
                        "idconnection" : idconnection,
                        "server":"{{$ip}}",
                        "port":"{{$port}}",
                        "user":"{{$user}}",
                        "password":"{{$password}}"
                        }
                    };
        term.fit();
        term.focus();
        wSocket.onopen = function (event) {
            console.log("Socket Open");
            term.attach(wSocket,false,false);
            wSocket.send(JSON.stringify(dataSend));
            intervalId = window.setInterval(function(){
                wSocket.send(JSON.stringify({"refresh":""}));
            }, 700);
        };
        wSocket.onerror = function (event){
            alert("Connection Closed");
            term.detach(wSocket);
            window.clearInterval(intervalId);
        };
        term.on('data', function (data) {
            var dataSend = {"data":{"data":data}};
            wSocket.send(JSON.stringify(dataSend));
            //Xtermjs with attach dont print zero, so i force. Need to fix it :(
            if (data=="0"){
            term.write(data);
            }
        });
    } 
    //Execute resize with a timeout
    window.onresize = function() {
        clearTimeout(resizeInterval);
        resizeInterval = setTimeout(resize, 400);
    }
    // Recalculates the terminal Columns / Rows and sends new size to SSH server + xtermjs
    function resize() {
        if (term) {
        term.fit()
        }
    }
    window.onload = connectServer;
    </script>
@endpush

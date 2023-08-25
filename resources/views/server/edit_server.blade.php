@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ __('Update Server') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('post_editserver', ['id'=>$id]) }}">
                        @csrf
                        <input id="server_id" hidden type="text"  name="server_id" value="{{ $id }}" required>

                        <div class="row mb-3">
                            <label for="Name" class="col-md-4 col-form-label text-md-end">{{ __('Server Name') }}</label>

                            <div class="col-md-6">
                                <input id="server_name" type="text" class="form-control" name="server_name" value="{{ $name }}" required>

                                @error('server_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="server_ip" class="col-md-4 col-form-label text-md-end">{{ __('IP Address') }}</label>

                            <div class="col-md-6">
                                <input id="server_ip" type="text" class="form-control" name="server_ip" value="{{$ip}}" required >

                                @error('server_ip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="server_port" class="col-md-4 col-form-label text-md-end">{{ __('Port') }}</label>

                            <div class="col-md-6">
                                <input id="server_port" type="number" class="form-control" name="server_port" value ={{$port}} required >

                                @error('server_port')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="server_username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="server_username" type="text" class="form-control" name="server_username" value="{{$username}}" required >

                                @error('server_username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="server_password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="server_password" type="text" class="form-control" name="server_password" value={{$password}} required >

                                @error('server_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="/home" >
                                    <button type="button"  class="btn btn-danger">
                                        {{ __('Cancel') }}
                                    </button>
                                </a>
                                

                               
                            </div>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

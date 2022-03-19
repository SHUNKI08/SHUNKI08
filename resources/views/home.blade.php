@extends('layout')
@section('title','Logged')
@section('content')
<div class="container">
    <div class="card-base">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        You are logged in!
                    </div>
                    
                    <div class="border"></div>
    
                    <div class="card-body">
                        <a class="logout-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS , Java Script -->
<link href="/css/home.css" rel="stylesheet">
<script src="js/main.js"></script>
@endsection

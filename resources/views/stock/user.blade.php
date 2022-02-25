@extends('layout')
@section('title','User')

@section('content')

<h1>You are User ID is {{ $user->id }}.</h1>
<h2>Your Posts</h2>



<!-- CSS , Java Script -->
<link href="/css/user.css" rel="stylesheet">
<script src="js/main.js"></script>
@endsection
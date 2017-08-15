@extends('layouts.app')

    <!-- Styles -->
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@section('content')

<!-- PROFILE HEADER PIC -->
<div class="row">
  <div class="col-md-12 text-center">
    <div class="panel panel-default">
      <div class="panel-body background-img">
      </div>
      <h3>Followers 12,000 | Following 7,000 | Work 6 | Rank 999</h3>
    </div>
  </div>
</div>

<!--USER'S PROFILE -->
<div class="col-lg-4">
<div class=" panel-default">
<img class="profile-img" src="{{url('/img/chicksloveme.png')}}" alt="Avatar">
        <h1>{{ $user->name }}</h1>
        <h5>@ {{ $user->username }}</h5>
        <h5>{{ $user->profile->about }}</h5>
        <h5><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> 
           {{ $user->profile->location }}
        </h5>
        <h5><span class="glyphicon glyphicon-link" aria-hidden="true"></span> 
            {{ $user->profile->website }}
        </h5>

        @if(Auth::id() !== $user->id)
         <div id="app">
           <friend :profile_user_id="{{ $user->id }}"></friend>
         </div>
         @endif

        <br>
        <p>
           @if(Auth::id() == $user->id)
             <a href="{{ route('profile.edit') }}">Edit Profile</a>
           @endif
        </p>
  </div>
</div>


@endsection
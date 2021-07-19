@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>{{$user->name}}</h3>
            @if(auth()->user()->isNot($user))
               @if(auth()->user()->isFollowing($user))
                  <a href="{{route('user.unfollow', $user)}}" class="btn btn-danger">Sem Seguidor</a>
               @else
                  <a href="{{route('user.follow', $user)}}" class="btn btn-success">Seguidor</a>   
               @endif
            @endif      
        </div>
    </div>
</div>
@endsection
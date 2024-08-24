@extends('layouts.login')

@section('content')
フォローリスト
@foreach($following_user as $following_users)
  <a href="/profile/{{$following_users->id}}"><img src="{{ asset('images/' .$following_users->images) }}" alt="icon"></a>
@endforeach
@foreach($posts as $post)
  <p>{{$post->user->username}}</p>
  <p>{{$post->post}}</p>
  <p>{{$post->updated_at}}</p>
@endforeach

@endsection

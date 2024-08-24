@extends('layouts.login')

@section('content')
フォロワーリストページです
@foreach($followed_user as $followed_users)
  <a href="/profile/{{$followed_users->id}}"><img src="{{ asset('images/' .$followed_users->images) }}" alt="icon"></a>
@endforeach
@foreach($posts as $post)
  <p>{{$post->user->username}}</p>
  <p>{{$post->post}}</p>
  <p>{{$post->updated_at}}</p>
@endforeach
@endsection

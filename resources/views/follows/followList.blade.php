@extends('layouts.login')

@section('content')
フォローリスト
@foreach($following_user as $following_users)
  <img src="{{ $following_users->images }}" alt="icon">
@endforeach

@foreach($posts as $post)
  <div class="read">
      <img src="{{$post->user->images}}" alt="icon">
      <p>{{$post->user->username}}</p>
      <p>{{$post->post}}</p>
      <p>{{$post->updated_at}}</p>
  </div>
@endforeach

@endsection

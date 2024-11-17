@extends('layouts.login')

@section('content')
<div class="top_contents d-flex align-items-center pb-4">
  <p class="follow_p">フォローリスト</p>
  <div class="icon_wrapper">
    @foreach($following_user as $following_users)
    <a href="/profile/{{$following_users->id}}"><img class="post_icon_follow" src="{{ asset('images/' .$following_users->images) }}" alt="icon"></a>
    @endforeach
  </div>
</div>

@foreach($posts as $post)
<div class="middle_content">
  <div class="read row">
    <img class="post_icon" src="{{ asset('images/' .$post->user->images) }}" alt="icon"><br>
    <div class="posts_name">
      <p>{{$post->user->username}}</p>
      <p>{{$post->post}}</p>
    </div>
    <p class="post_updated_time text-end">{{$post->updated_at->format('Y-m-d H:i')}}</p>
  </div>
</div>
@endforeach
@endsection

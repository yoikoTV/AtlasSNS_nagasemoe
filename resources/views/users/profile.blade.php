@extends('layouts.login')

@section('content')
<img src="{{ asset('images/' .$other_user->images) }}" alt="">
<p>{{$other_user->username}}</p>
<p>{{$other_user->bio}}</p>

@if (auth()->user()->follows()->where('followed_id', $other_user->id)->exists())
        <form action="{{ route('unfollow') }}" method="POST"> <!-- web.phpの->name('unfollow')に飛ばしてる -->
            @csrf
            <input type="hidden" name="followed_id" value="{{ $other_user->id }}">
            <button type="submit">フォロー解除</button>
        </form>
    @else
        <form action="{{ route('follow') }}" method="POST"> <!-- web.phpの->name('follow')に飛ばしてる -->
            @csrf
            <input type="hidden" name="followed_id" value="{{ $other_user->id }}">
            <button type="submit">フォローする</button>
        </form>
@endif

@foreach($posts as $post)
  <p>{{$post->user->username}}</p>
  <p>{{$post->post}}</p>
  <p>{{$post->updated_at}}</p>
@endforeach

@endsection

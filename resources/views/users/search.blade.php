@extends('layouts.login')

@section('content')

<div class="content top_contents d-flex justify-content-start pb-4">
  <form class="d-flex" action="/search_user">
    @csrf
    <input type="text" name="keyword" class="search_form" placeholder="ユーザー名">
    <button type="submit" class="search_button"><img src="{{asset('images/search.png')}}" alt="post_image"></button>
  </form>
</div>

<div class="content">
  <tr>
    <!-- テーブルに登録されているユーザーのうち、ログインしているユーザーが不一致のユーザー（自分以外） -->
    @foreach( $search_users as $search_user )
    @if ($search_user->id !== Auth::user()->id)
    <div class="search_wrapper row d-flex align-items-center">
      <img class="post_icon" src="{{ asset('images/' .$search_user->images) }}" alt="icon">
      <p class="p_margin">{{ $search_user->username }}</p>
      @if (auth()->check() && auth()->user()->id !== $search_user->id)
      @if (auth()->user()->follows()->where('followed_id', $search_user->id)->exists())
      <div class="ml-auto">
        <form action="{{ route('unfollow') }}" method="POST">
          @csrf
          <input type="hidden" name="followed_id" value="{{ $search_user->id }}">
          <button type="submit" class="btn btn-danger follow-btn btn-design">
            <p>フォロー解除</p>
          </button>
        </form>
      </div>
      @else
      <div class="ml-auto">
        <form action="{{ route('follow') }}" method="POST">
          @csrf
          <input type="hidden" name="followed_id" value="{{ $search_user->id }}">
          <button type="submit" class="btn follow-btn-color follow-btn btn-design">
            <p>フォローする</p>
          </button>
        </form>
      </div>
      @endif
      @endif
    </div>
    @endif
    @endforeach
  </tr>
</div>


@endsection

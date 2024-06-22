@extends('layouts.login')

@section('content')

<div class="content">
  <form action="/search_user">
    @csrf
    <input type="text" name="keyword" class="search_form" placeholder="ユーザー名">
    <button type="submit" class="btn btn-success">検索</button>
  </form>
</div>

<div class="content">
  <tr>
    @foreach( $search_users as $search_user )
    <!-- テーブルに登録されているユーザーのうち、ログインしているユーザーが不一致のユーザー（自分以外） -->
      @if ($search_user->id !== Auth::user()->id)
        <img src="{{ $search_user->images }}" alt="icon">
        <p>{{ $search_user->username }}</p>
      @if (auth()->check() && auth()->user()->id !== $search_user->id)
    @if (auth()->user()->follows()->where('followed_id', $search_user->id)->exists())
        <form action="{{ route('unfollow') }}" method="POST">
            @csrf
            <input type="hidden" name="followed_id" value="{{ $search_user->id }}">
            <button type="submit">フォロー解除</button>
        </form>
    @else
        <form action="{{ route('follow') }}" method="POST">
            @csrf
            <input type="hidden" name="followed_id" value="{{ $search_user->id }}">
            <button type="submit">フォローする</button>
        </form>
    @endif
@endif
      @endif
    @endforeach
  </tr>
</div>


@endsection

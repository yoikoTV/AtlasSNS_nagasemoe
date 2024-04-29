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
      <img src="{{ $search_user->images }}" alt="icon">
       <p>{{ $search_user->username }}</p>

      @if($user->isFollow())
        <button type="submit">フォロー解除</button>
      @else
        {!! Form::open(['url' => '/search']) !!}
        {{ Form::input('hidden', 'following_id', null, ['placeholder' => 'フォローする'])}}
    @endforeach
  </tr>
</div>


@endsection

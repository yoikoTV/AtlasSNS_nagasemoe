@extends('layouts.login')

@section('content')

<div class="content">
  <form action="/search">
    @csrf
    <input type="text" name="search_users" class="search_form" placeholder="ユーザー名">
    <button type="submit" class="btn btn-success">検索</button>
  </form>
</div>

<div class="content">
  <tr>
    @foreach($search_users as $search_user)
    <p>{{$search_user->images}}</p>
    <p>{{$search_user->username}}</p>
    @endforeach
  </tr>
</div>


@endsection

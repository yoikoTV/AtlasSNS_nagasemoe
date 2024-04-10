@extends('layouts.login')

@section('content')

<div class="content">
  <form action="/search">
    @csrf
    <input type="text" name="searchword" class="search_form" placeholder="ユーザー名">
    <button type="submit" class="btn btn-success">検索</button>
  </form>
</div>


@endsection

@extends('layouts.login')

@section('content')
フォローリスト
@foreach($following_user as $following_users)
  <img src="{{ $following_users->images }}" alt="icon">
@endforeach

@endsection

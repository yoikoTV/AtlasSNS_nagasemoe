@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/myprofile', 'files' => true]) !!}
<div class="d-flex justify-content-center">
  <div class="profile_label d-flex flex-column">
    <div>{{ Form::label('ユーザー名') }}</div>
    <div>{{ Form::label('メールアドレス') }}</div>
    <div>{{ Form::label('パスワード') }}</div>
    <div>{{ Form::label('パスワード確認') }}</div>
    <div>{{ Form::label('自己紹介') }}</div>
    <div>{{ Form::label('アイコン画像') }}</div>
  </div>
  <div class="d-flex flex-column">
    <div>{{ Form::text('username',$user->username,['class' => 'input form_size']) }}</div>
    <div>{{ Form::text('mail',$user->mail,['class' => 'input form_size']) }}</div>
    <div>{{ Form::password('password',['class' => 'input form_size']) }}</div>
    <div>{{ Form::password('password_confirmation',['class' => 'input form_size']) }}</div>
    <div>{{ Form::text('bio',$user->bio,['class' => 'input form_size']) }}</div>
    <div>{{ Form::file('images',$user->icons,['class' => 'input form_size']) }}</div>
  </div>
</div>
<div class="d-flex justify-content-center">
  {{ Form::submit('更新',['class' => 'btn btn-danger btn-design submit_btn'])}}
</div>

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

{!! Form::close() !!}

@endsection

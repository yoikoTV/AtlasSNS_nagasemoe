@extends('layouts.login')

@section('content')
<div class="row justify-content-center profile_form">

  <img class="post_icon profile_form_icon" src="{{ asset('images/' .$user->images) }}" alt="icon">

  {!! Form::open(['url' => '/myprofile', 'files' => true]) !!}
  <div class="d-flex justify-content-center">
    <div class="profile_label d-flex flex-column">
      <div class="profile_form_margin">{{ Form::label('ユーザー名') }}</div>
      <div class="profile_form_margin">{{ Form::label('メールアドレス') }}</div>
      <div class="profile_form_margin">{{ Form::label('パスワード') }}</div>
      <div class="profile_form_margin">{{ Form::label('パスワード確認') }}</div>
      <div class="profile_form_margin">{{ Form::label('自己紹介') }}</div>
      <div class="profile_form_margin">{{ Form::label('アイコン画像') }}</div>
    </div>
    <div class="d-flex flex-column">
      <div class="profile_form_margin">{{ Form::text('username',$user->username,['class' => 'input form_size profile_form_input']) }}</div>
      <div class="profile_form_margin">{{ Form::text('mail',$user->mail,['class' => 'input form_size profile_form_input']) }}</div>
      <div class="profile_form_margin">{{ Form::password('password',['class' => 'input form_size profile_form_input']) }}</div>
      <div class="profile_form_margin">{{ Form::password('password_confirmation',['class' => 'input form_size profile_form_input']) }}</div>
      <div class="profile_form_margin">{{ Form::text('bio',$user->bio,['class' => 'input form_size profile_form_input']) }}</div>
      <div class="profile_form_margin profile_form_input file_button">{{ Form::file('images',$user->icons,['class' => 'input form_size']) }}</div>
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
</div>

@endsection

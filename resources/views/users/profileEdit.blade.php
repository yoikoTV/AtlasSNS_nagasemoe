@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/myprofile', 'files' => true]) !!}

{{ Form::label('ユーザー名') }}
{{ Form::text('username',$user->username,['class' => 'input']) }}
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',$user->mail,['class' => 'input']) }}
{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input']) }}
{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}
{{ Form::label('自己紹介') }}
{{ Form::text('bio',$user->bio,['class' => 'input']) }}
{{ Form::label('アイコン画像') }}
{{ Form::file('images',$user->icons,['class' => 'input']) }}

{{ Form::submit('更新') }}

@if($errors->any())
      <div class = "alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
@endif

{!! Form::close() !!}

@endsection

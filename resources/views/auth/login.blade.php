@extends('layouts.logout')

@section('content')
{!! Form::open(['url' => '/login']) !!}

<div class="w-25 login_form p_white">
  <p class="p_white form-title">AtlasSNSへようこそ</p>

  <div class="text-left">
  {{ Form::label('メールアドレス') }} <br>
  </div>
  {{ Form::text('mail',null,['class' => 'form-control']) }} <br>

  <div class="text-left">
  {{ Form::label('パスワード') }} <br>
  </div>
  {{ Form::password('password',['class' => 'form-control']) }} <br>

  <div class="submit_button text-right">
  {{ Form::submit('ログイン',['class' => 'btn btn-danger']) }}
  </div>

  <p class="new_user"><a class="p_white" href="/register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}
</div>

@endsection

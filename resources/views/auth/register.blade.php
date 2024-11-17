@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}
<div class="w-25 login_form p_white">
  <p class="p_white form-title">新規ユーザー登録</p>

  <div class="text-left">
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,['class' => 'input form-control']) }}<br>
  </div>
  <div class="text-left">
    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',null,['class' => 'input form-control']) }}<br>
  </div>

  <div class="text-left">
    {{ Form::label('パスワード') }}
    {{ Form::text('password',null,['class' => 'input form-control']) }}<br>
  </div>

  <div class="text-left">
    {{ Form::label('パスワード確認') }}
    {{ Form::text('password_confirmation',null,['class' => 'input form-control']) }}<br>
  </div>

  <div class="submit_button text-right">
    {{ Form::submit('新規登録',['class' => 'btn btn-danger form-control']) }}<br>
  </div>

  <p class="new_user"><a class="p_white" href="/login">ログイン画面へ戻る</a></p>

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

@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="w-25 login_form p_white">
    <div class="added_p_bold">
      <p class="p_white form-title added_p">{{ session("username") }}さん</p>
      <p class="p_white form-title added_p">ようこそ！AtlasSNSへ！</p>
    </div>
    <div class="added_p_wrapper">
      <p class="p_white form-title added_p">ユーザー登録が完了しました。</p>
      <p class="p_white form-title added_p">早速ログインをしてみましょう。</p>
    </div>

    <div class="submit_button login_back">
      <p><a class="btn btn-danger form-control" href="/login">ログイン画面へ</a></p>
    </div>
  </div>
</div>

@endsection

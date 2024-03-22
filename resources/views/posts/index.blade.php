@extends('layouts.login')

@section('content')

<h2>機能を実装していきましょう。</h2>

<!-- 新規投稿フォーム -->
<div class="create">
  <div class="form">
    <img class="post_icon" src="{{asset('images/icon1.png')}}">

      {!! Form::open(['url' => '/top']) !!}

        <div class="form-group">
          {{ Form::input('text', 'post', null, ['required', 'class' => 'posts', 'placeholder' => '投稿内容を入力してください']) }}
        </div>

        <button type="submit"><img src="{{asset('images/post.png')}}" alt="post_image"></button>

        {!! Form::close() !!}

  </div>
</div>



@endsection

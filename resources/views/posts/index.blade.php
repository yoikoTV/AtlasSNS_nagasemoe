@extends('layouts.login')

@section('content')

<h2>機能を実装していきましょう。</h2>

<!-- 新規投稿フォーム -->
<div class="create">
  <div class="create_form">

    <img class="post_icon" src="{{asset('images/icon1.png')}}">

    <div class="form-group">
      {!! Form::open(['url' => '/top']) !!}
      {{ Form::input('text', 'post', null, ['required', 'class' => 'posts', 'placeholder' => '投稿内容を入力してください']) }}
    </div>

    <button type="submit"><img src="{{asset('images/post.png')}}" alt="post_image"></button>

    {!! Form::close() !!}
  </div>

  @if($errors->any())
      <div class = "alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif

</div>

<div class = "read">
  <div>
  @foreach
    {{ $user->images }}
    {{ $user->username }}
    {{ $TL_users->post }}
    {{ $TL_users->updated_at }}
  @endforeach
  </div>
</div>


@endsection

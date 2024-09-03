@extends('layouts.login')

@section('content')
<!-- 新規投稿フォーム -->
<div class="create">

  <div class="container text-center">
      <div class="row">
        <img class="post_icon col-2" src="{{asset('images/icon1.png')}}">

        <div class="form-floating mb-3 col-8">
          {!! Form::open(['url' => '/top']) !!}
          {{ Form::input('text', 'post', null, ['required', 'class' => 'form-control-plaintext', 'placeholder' => '投稿内容を入力してください']) }}
        </div>

      </div>
  </div>
    <div class="d-flex justify-content-end">
      <button type="submit" class="post_button"><img src="{{asset('images/post.png')}}" alt="post_image"></button>
    </div>
    {!! Form::close() !!}

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


<div class="content">
  @foreach ($posts as $post)
    <div class="read">
      <img src="{{ asset('images/' .$post->user->images) }}" alt="icon">
      <p>{{$post->user->username}}</p>
      <p>{{$post->post}}</p>
      <p>{{$post->updated_at}}</p>
    </div>

    @if ($post->user_id == Auth::id())
      <div class = "update">
          <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">編集</a>
      </div>

      <div class="delete">
        <a class="delete_btn" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a>
      </div>
    @endif
  @endforeach
</div>

<div class = "update">
  <div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">

      <form action="/post/update" method="post">
        <textarea name="up_post" class="modal_post"></textarea>
        <input type="hidden" name="up_post_id" class="modal_id" value="">
        <input type="submit" value="更新">
        {{ csrf_field() }}
      </form>

      <a class="js-modal-close" href="">閉じる</a>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="{{ asset('/js/script.js') }}"></script>
@endsection

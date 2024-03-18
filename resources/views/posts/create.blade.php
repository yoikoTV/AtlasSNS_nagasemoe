@extends('layouts.login')

@section('content')
<h2>投稿画面ページ</h2>
{!! Form::open(['url' => '/create]) !!}

{{ Form::label('post') }}
{{ Form::text('post',null,['class' => 'input']) }}

{{ Form::submit('投稿') }}

@endsection

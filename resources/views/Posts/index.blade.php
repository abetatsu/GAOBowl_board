@extends('layouts.app')

@section('content')
<swiper-component
          :posts="{{ json_encode($posts) }}"
     ></swiper-component>
<div class="card text-center">
     <div class="card-header">
          投稿一覧
     </div>
     @foreach ($posts as $post)
     <div class="card-body">
          <h5 class="card-title">タイトル：{{ $post->title }}</h5>
          <p class="card-text">内容：{{ $post->body }}</p>
          <p class="card-text">投稿者：{{ $post->user->name }}</p>
          <img src="{{ $post->image_path }}">
          <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細</a>
     </div>
     <like-component
          :post="{{ json_encode($post) }}"
     ></like-component>
     <dislike-component
          :post="{{ json_encode($post) }}"
     ></dislike-component>
     <div class="card-footer text-muted">
          投稿日時：{{ $post->created_at->diffForHumans(Carbon\Carbon::now()) }}
     </div>
     @endforeach
</div>
<div class="col-md-2">
     <a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
</div>

@endsection
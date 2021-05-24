@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card text-center">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$item->title}}</h5>
        <p class="card-text">{{$item->body}}</p>
      </div>
      <div class="card-footer text-muted">

        <!-- <a href="#" class="card-link">コメント</a> -->
        <!-- <a href="#" class="card-link">お気に入り登録</a> -->

        @if($item->likes()->where('user_id',Auth::id())->exists())
        {!! Form::open(['route' => ['program.unlike',$item->id],'method'=>'delete']) !!}
        {!! Form::button('<a class="card-link">お気に入り解除</a>',['class' => "btn", 'type' => 'submit']) !!}
        {!! Form::close() !!}
        @else
        {!! Form::open(['route' => ['program.like',$item->id],'method'=>'put']) !!}
        {!! Form::button('<a class="card-link">お気に入り登録</a>',['class' => "btn", 'type' => 'submit']) !!}
        {!! Form::close() !!}

        @endif

      </div>
    </div>
  </div>
  <a href="{{ route('program.index')}}" class="btn btn-primary">一覧へ</a>
  <a href="{{ route('timeline.index',$item->id) }}" class="btn btn-primary">ツイート取得</a>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commentModal">
  コメントする
</button>

<!-- Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="commentModalTitle">コメント投稿</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('comment.store',$item->id) }}">
      @csrf
      <div class="modal-body">
      <textarea class="form-control" name="body" id="body" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
        <button type="submit" class="btn btn-primary">投稿</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<div class="container">
  <div class="card">
    @forelse($item->comments as $comment)
    <div class="card-header">
      {{ $comment->user->name}}
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>{{ $comment->body }}</p>
        <footer class="blockquote-footer">{{ $comment->created_at }}</footer>
      </blockquote>
    </div>
    @empty
    <div class="card-body">
      <p>コメントなし</p>
    </div>
    @endforelse
  </div>
</div>
@endsection
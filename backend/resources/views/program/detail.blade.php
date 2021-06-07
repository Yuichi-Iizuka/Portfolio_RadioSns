@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card">
    <div class="card-body card-body-cascade text-center">
      <h5 class="card-title"><strong>{{$item->title}}</strong></h5>
      <p class="card-text">{{$item->body}}</p>
    </div>

    @if($item->likes()->where('user_id',Auth::id())->exists())
    {!! Form::open(['route' => ['program.unlike',$item->id],'method'=>'delete']) !!}
    {!! Form::button('<a class="btn-floating btn-small btn-fb"><i class="fas fa-heart"></i></a>',['class' => "btn", 'type' => 'submit']) !!}
    {!! Form::close() !!}
    @else
    {!! Form::open(['route' => ['program.like',$item->id],'method'=>'put']) !!}
    {!! Form::button('<i class="fas fa-heart"></i>',['class' => "btn", 'type' => 'submit']) !!}
    {!! Form::close() !!}
    @endif
    <hr>
    <div class="row">
      <div class="col"><a href="{{ route('program.index') }}" class="btn-floating btn-lg" title="一覧へ"><i class="fas fa-list fa-3x"></i></div>
      <div class="col"><a type="button" data-toggle="modal" data-target="#commentModal" class="btn-floating btn-lg btn-tw"><i class="fas fa-comment-dots fa-4x"></i></a></div>
      <div class="col"><a type="button" href="{{ route('timeline.index',$item->id) }}" class="btn-floating btn-lg btn-tw"><i class="fab fa-twitter fa-4x"></i></a></div>
    </div>
  </div>
</div>


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
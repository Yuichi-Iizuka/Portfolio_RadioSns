@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md mb-4">
      <div class="card">
        <div class="card-body d-flex flex-row">
          <div class="font-weight-bold">
            <h3 class="h2 card-title">
              <a href="{{ route('timeline.index',$program->id) }}" class="text-dark">{{$program->title}}</a>
            </h3>
            <!-- <p class="card-text">{{$program->body}}</p> -->
          </div>
          @if( Auth::id() === $program->user_id )
          <!-- dropdown -->
          <div class="ml-auto card-text">
            <div class="dropdown">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button type="button" class="btn btn-link text-muted m-0 p-2">
                  <i class="fas fa-ellipsis-v"></i>
                </button>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('program.edit',$program->id) }}">
                  更新する
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $program->id }}" data-placement="top">
                  削除する
                </a>
              </div>
            </div>
          </div>
          <!-- dropdown -->

          <!-- 番組削除モーダル -->
          <div class="modal fade" id="modal-delete-{{ $program->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalTitle">番組削除</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" href="{{ route('program.store',$program->id) }}">
                  @csrf
                  @method('delete')
                  <div class="modal-body">
                    {{ $program->title}}を削除します。よろしいですか？
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-grey" data-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-outline-danger waves-effect">削除する</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @endif
        </div>
        <div class="card-body pt-0">
          <div class="card-text">
            {{$program->body}}
          </div>
          <hr>


          <div class="d-flex bd-highlight">
            <div class="my-box flex-grow-1">
              {{$program->start_date}} &ensp; {{substr($program->start_time,0,5)}}放送
            </div>
            <div class="my-box"><a type="button" data-toggle="modal" data-target="#commentModal" data-placement="top" title="コメントを投稿します"><i class="fas fa-comment-dots"></i></a></div>
            <div class="my-box">@if($program->likes()->where('user_id',Auth::id())->exists())
              <a class="btn-floating btn-small btn-fb" href="{{ route('program.unlike',$program->id) }}" onclick="event.preventDefault(); document.getElementById('unlike-form').submit();"><i class="fas fa-heart"></i>
              </a>
              <form id="unlike-form" action="{{ route('program.unlike',$program->id) }}" method="post" style="display: none;">
                @csrf
                @method('delete')
              </form>
              @else
              <a class="btn-floating btn-small btn-fb" href="{{ route('program.like',$program->id) }}" onclick="event.preventDefault(); document.getElementById('like-form').submit();"><i class="far fa-heart"></i>
              </a>
              <form id="like-form" action="{{ route('program.like',$program->id) }}" method="post" style="display: none;">
                @csrf
                @method('put')
              </form>
              @endif
            </div>
          </div>


          <!-- コメントフォームのモーダル画面 -->
          <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="commentModalTitle">コメント投稿</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="{{ route('comment.store',$program->id) }}">
                  @csrf
                  <div class="modal-body">
                    <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-grey" data-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-outline-primary">投稿</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- コメント -->
@include('comment.list')
@endsection
<div class="container">
  <div class="row">
    <div class="col-md mb-4">
      <div class="card">
        <div class="card-body d-flex flex-row">
          <i class="fas fa-user-circle fa-3x mr-1"></i>
          <div>
            <div class="font-weight-bold">
              {{ $comment->user->name}}
            </div>
            <div class="font-weight-lighter">
              {{ $comment->created_at }}
            </div>
          </div>
          @if( Auth::id() === $comment->user_id )
          <!-- dropdown  -->
          <div class="ml-auto card-text">
            <div class="dropdown">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button type="button" class="btn btn-link text-muted m-0 p-2">
                  <i class="fas fa-ellipsis-v"></i>
                </button>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <!-- <div class="dropdown-divider"></div> -->
                <a class="dropdown-item text-danger" data-toggle="modal" data-target="#comment-delete-{{ $comment->id,$program->id }}" data-placement="top">
                  <i class="fas fa-trash-alt mr-1"></i>削除する
                </a>
              </div>
            </div>
          </div>
          <!-- コメント削除モーダル -->
          <div class="modal fade" id="comment-delete-{{ $comment->id,$program->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalTitle">コメント削除</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="{{ route('comment.destroy',$comment->id) }}">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="program_id" id="program_id" value="{{ $program->id }}">
                  <div class="modal-body">
                    コメントを削除します。よろしいですか？
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
        <div class="card-body pt-0 pb-2">
          <h5>{{ $comment->body }}</h5>
        </div>
      </div>
    </div>
  </div>
</div>
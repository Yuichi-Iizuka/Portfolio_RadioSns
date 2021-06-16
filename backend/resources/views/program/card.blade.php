<div class="container">
  <div class="row">
    <div class="col-md mb-4">
      <div class="card">
        <div class="card-body d-flex flex-row">
          <div class="font-weight-bold">
            <h2 class="h2 card-title">
              <a href="{{ route('program.show', $program->id) }}" class="text-dark">
                {{$program->title}}
              </a>
            </h2>
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
                  <i class="fas fa-pen mr-1"></i>更新する
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $program->id }}" data-placement="top">
                  <i class="fas fa-trash-alt mr-1"></i>削除する
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
                <form method="post" action="{{ route('program.destroy',$program->id) }}">
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
          <div class="font-weight-lighter">
            {{$program->start_date}} &ensp; {{substr($program->start_time,0,5)}}放送
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
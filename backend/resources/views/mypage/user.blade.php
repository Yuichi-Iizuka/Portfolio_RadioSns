<div class="card">
  <div class="card-body d-flex flex-row">
    <i class="fas fa-user-circle fa-3x mr-1"></i>
    <div class="font-weight-bold">
      <h2 class="h5 card-title m-0">
        {{ $user->name }}
      </h2>
    </div>
    <div class="ml-auto card-text">
      <div class="dropdown">
        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <button type="button" class="btn btn-link text-muted m-0 p-2">
            <i class="fas fa-ellipsis-v"></i>
          </button>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="{{ route('mypage.edit',$user->name) }}">
            <i class="fas fa-pen mr-1"></i>更新する
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
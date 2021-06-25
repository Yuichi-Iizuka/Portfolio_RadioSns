<ul class="nav nav-tabs nav-justified mt-3">
  <li class="nav-item">
    <a href="{{ route('mypage.user',Auth::user()->id) }}" class="nav-link text-muted {{ $hasProgram ? 'active' : '' }}">
      投稿した番組</a>
  </li>
  <li class="nav-item">
    <a href="{{ route('mypage.like',Auth::user()->id) }}" class="nav-link text-muted {{ $hasLike ? 'active' : '' }}">いいねした番組</a>
  </li>
</ul>
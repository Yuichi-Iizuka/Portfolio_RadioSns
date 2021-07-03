<nav class="navbar navbar-expand-md navbar-light blue-gradient shadow-sm">
  <div class="container">
    <a class="navbar-brand white-text" href="{{ route('program.index') }}">
      {{ config('app.name', 'RadioSns') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->

    </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->

        <li class="nav-item">
          <a class="nav-link white-text" href="{{ route('program.create') }}">
            番組作成
          </a>
        </li>

        @guest
        <li class="nav-item">
          <a class="nav-link white-text" href="{{ route('login') }}">ログイン</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link white-text" href="{{ route('register') }}">ユーザー登録</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle white-text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              ログアウト
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <a class="dropdown-item" href="{{ route('mypage.user',Auth::user()->id ) }}">
              マイページ
            </a>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
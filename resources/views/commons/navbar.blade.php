<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="tasks">Tasklist</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                 @if (Auth::check())
                 <!--{{-- ユーザ一覧ページへのリンク --}}-->
                 <!--   <li class="nav-item">{!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!}</li>-->
                <!--<li class="nav-item dropdown">-->
                 <!--       <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>-->
                    <!--<ul class="dropdown-menu dropdown-menu-right">-->
                 <!--           {{-- ユーザ詳細ページへのリンク --}}-->
                 <!--           <li class="dropdown-item">{!! link_to_route('users.show', 'My profile', ['user' => Auth::id()]) !!}</li>-->
                 <!--           <li class="dropdown-divider"></li>-->
                {{-- ログアウトへのリンク --}}
                <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout', [], ['class' => 'nav-link']) !!}</li>
                    <!--</ul>-->
                <!--</li>-->
                {{-- タスク作成ページへのリンク --}}
                <li class="nav-item">{!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'nav-link']) !!}</li>
                {{-- タスク一覧へのリンク --}}
                <li class="nav-item">{!! link_to_route('tasks.index', 'タスク一覧', [], ['class' => 'nav-link']) !!}</li>
            </ul>
                @else
                {{-- ユーザ登録ページへのリンク --}}
                <li>{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                {{-- ログインページへのリンク --}}
               <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                @endif
        </div>
    </nav>
</header>
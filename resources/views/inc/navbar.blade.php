<nav class="navbar navbar-expand-md navbar-dark mb-3 font-weight-bold" style="background-color: #2E8B57">
  <div class="container">
    <a class="navbar-brand text-light">{{ config('app.name', 'RecipeBook') }}</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
      <span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="{{Request::is('/') ? 'active' : ''}}">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="{{Request::is('recipes') ? 'active' : ''}}">
          <a class="nav-link" href="/recipes">Recipes</a>
        </li>
      </ul>
    </div>

    <ul class="navbar-nav ml-auto">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/home">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
  </div>
</nav>

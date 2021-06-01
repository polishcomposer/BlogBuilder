<nav class="container navbar border-bottom navbar-fixed-top">
        <ul class="nav me-auto">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
           <!--  <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
              <span class="fs-4">Blog Builder</span>
            </a>
          @if(!Auth::guest())
          <li class="nav-item"><a href="/home" class="nav-link link-dark px-2">Dashboard</a></li>
          <li class="nav-item"><a href="/blogs" class="nav-link link-dark px-2">Your Blogs</a></li> 
          <li class="nav-item"><a href="/posts" class="nav-link link-dark px-2">Your Posts</a></li> 
          <li class="nav-item"><a href="/blogs/create" class="nav-link link-dark px-2">Create New Blog</a></li>
          <li class="nav-item"><a href="/posts/create" class="nav-link link-dark px-2">Create New Post</a></li>
          @else
          <li class="nav-item"><a href="/" class="nav-link link-dark px-2 active" aria-current="page">Home</a></li>
          @endif
        </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                
                    <li class="nav-item dropdown">
                      {{ Auth::user()->name }}
                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                   </a>

                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                   </form>
                    </li>
                @endguest
            </ul>
</nav>
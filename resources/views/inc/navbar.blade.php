<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        @if(!Auth::guest())
        <a href="/home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
            <span class="fs-4">Blog Builder</span>
          </a>
        @else
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
            <span class="fs-4">Blog Builder</span>
          </a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-bbapp" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar-bbapp">
        <ul class="nav me-auto">
          @if(!Auth::guest())
          <li class="nav-item"><a href="/home" class="nav-link link-dark px-2">Dashboard</a></li>
          <li class="nav-item"><a href="/blogs" class="nav-link link-dark px-2">Your Blogs</a></li> 
          <li class="nav-item"><a href="/posts" class="nav-link link-dark px-2">Your Posts</a></li> 
          <li class="nav-item"><a href="/blogs/create" class="nav-link link-dark px-2">Create New Blog</a></li>
          <li class="nav-item"><a href="/posts/create" class="nav-link link-dark px-2">Create New Post</a></li>
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
                
                    <li class="nav-item right-nav">
                     Welcome {{ Auth::user()->name }}
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
        </div>
     
    </div>
</nav>

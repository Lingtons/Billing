        <nav class="nav has-shadow">
            <div class="container">
                <div class="nav-left">
                <a href="{{route('home')}}"  class="nav-item">
                <img src="{{ asset('images/temp_logo.png')}}" alt="GWU Logo">
                </a>
                <a href="#" class="nav-item is-tab is-hidden-mobile m-l-10">Learn</a>
                <a href="#" class="nav-item is-tab is-hidden-mobile">Discuss</a>
                <a href="#" class="nav-item is-tab is-hidden-mobile">Share</a>
                    
                </div>

                    <label for="menu-toggle" class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </label>
    <input type="checkbox" id="menu-toggle" class="is-hidden"/>
      <div class="nav-right nav-menu" style="overflow: visible;">
                @guest    
                <a href="{{route('login')}}" class="nav-item is-tab {{ Request::is('login') ? 'is-active' : null }}">  <span class="icon"><i class="fa fa-sign-in p-r-10"></i></span>Login</a>
                <a href="{{route('register')}}" class="nav-item is-tab {{ Request::is('register') ? 'is-active' : null }}">Register</a>
      
                @else
                <button class="dropdown nav-item is-tab is-aligned-right">
                Hey  {{ Auth::user()->name }} <span class="icon"><i class="fa fa-caret-down"></i></span>
                <ul class="dropdown-menu">
                       <li><a href="#">
                <span class="icon"><i class="fa fa-fw fa-user-circle-o m-r-10"></i></span>         Profile</a></li>
                        <li><a href="#">
                <span class="icon"><i class="fa fa-fw fa-bell m-r-10"></i></span>                Notifications</a></li>
                        <li><a href="#">
                <span class="icon"><i class="fa fa-fw fa-cog m-r-10" ></i></span>                Settings</a></li>
                        <li class="separator"></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <span class="icon"><i class="fa fa-fw fa-sign-out m-r-10"></i></span>                Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </li>
                            
                        </ul>
                @endguest
                    </button>
                    
                    
                </div>
            </div>
        </nav>

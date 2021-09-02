<div style="background-color:red; height:100px;">
<p style="color:white;"><h3>Logiccircle</h3></p>
<p style="color:white; text-align:right; padding-right:100px;font-size:1.5em;"><a href="/"><span>Home</span></a>
        <span> | </span>
        <a href=""><span>About Us</span></a>
        <span> | </span>
        <a href=""><span>Contact Us</span></a></h3>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto" style="list-style-type: none;">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                
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
        </p>

     

</div>
  
<style>
 
.navbar-nav>li {
    float: left;
    padding: 0 10px !important;
    font-size: 1.2em !important;
}
</style>   
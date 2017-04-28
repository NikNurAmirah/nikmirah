<div style="width: 100%; height: 4px; margin: 0; background-color:#008CBA;"></div>
<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="/">Survey System</a></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        <!-- Left Nav Section -->
        <ul class="left">
            <li><a href="/">Home</a></li>
            <li class="active">
                <a href="/surveys">My Surveys</a>
            </li>
        </ul>
    </section>
    <section class="top-bar-section">
        <section class="top-bar-section">
            <!-- Left Nav Section -->
            <ul class="right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="has-dropdown">
                        <a href="#">{{ Auth::user()->name }}</a>

                        <ul class="dropdown">
                            <li><a href="{{ url('/logout') }}">Logout</a>
                        </ul>
                    </li>
                    <li class="has-dropdown active">
                        @if(Gate::allows('see_all_users'))
                            <a href="#">Admin</a>
                            <ul class="dropdown">
                                <li><a href="/admin/users">See all Users</a></li>
                                <li><a href="/admin/surveys">See all Surveys</a> </li>
                                <li><a href="#">Test</a> </li>
                            </ul>
                        @endif
                    </li>
            </ul>
            @endif
        </section>



</nav>


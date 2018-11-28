<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Welcome {{ Auth::user()->name }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                            Stats
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();getElementById('logoutForm').submit();">
                        <i class="material-icons">exit_to_app</i>
                        <p class="d-lg-none d-md-block">
                            Logout
                        </p>
                        <form id="logoutForm" action="{{route('logout')}}" method="post" style="display:none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
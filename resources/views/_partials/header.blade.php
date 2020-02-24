<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Classic Todo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ url('/') }}">Tasks</a>
            <a class="nav-item nav-link" href="{{ url('/add-task') }}">Add Task</a>
            <a class="nav-item nav-link" href="{{ url('/logout') }}">Logout</a>
        </div>
    </div>
</nav>

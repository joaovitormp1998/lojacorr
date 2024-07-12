
<nav x-data="{ open: false }" class="navbar navbar-expand-sm navbar-light bg-white border-bottom border-gray-100">
    <div class="container d-flex align-items-center"> <a class="navbar-brand" href="{{ route('dashboard') }}">LojaCorr Full-Stack</a>
        <div class="collapse navbar-collapse" :class="{ 'show': open }" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-flex align-items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

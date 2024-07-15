<nav x-data="{ open: false }" class="navbar navbar-expand-sm navbar-light bg-white border-bottom border-gray-100">
    <div class="container d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('dashboard') }}">LojaCorr Full-Stack</a>

        <!-- Botão do menu responsivo -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" @click="open = !open">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Conteúdo do menu -->
        <div class="collapse navbar-collapse" :class="{ 'show': open }" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Link para o Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <!-- Link para criar Categoria -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.create') }}">Criar Categoria</a>
                </li>

                <!-- Link para criar Subcategoria -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subcategories.create') }}">Criar Subcategoria</a>
                </li>

                <!-- Link para criar Propriedade -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('properties.create') }}">Criar Propriedade</a>
                </li>

                <!-- Link para Logout -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

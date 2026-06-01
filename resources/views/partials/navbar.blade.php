{{-- resources/views/partials/navbar.blade.php --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        {{-- Brand --}}
        <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">
            <i class="bi bi-shop me-2 text-warning"></i>{{ config('app.name') }}
        </a>

        {{-- Toggler mobile --}}
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarConteudo"
            aria-controls="navbarConteudo" aria-expanded="false" aria-label="Abrir menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Links --}}
        <div class="collapse navbar-collapse" id="navbarConteudo">
            <ul class="navbar-nav ms-auto gap-1">

                <li class="nav-item">
                    <a class="nav-link" href="#cardapio">
                        <i class="bi bi-journal-text me-1"></i>Cardápio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#pedidos">
                        <i class="bi bi-bag-check me-1"></i>Pedidos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sobre') }}">
                        <i class="bi bi-info-circle me-1"></i>Sobre
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contato') }}">
                        <i class="bi bi-envelope me-1"></i>Contato
                    </a>
                </li>

                {{-- Separador visual --}}
                <li class="nav-item d-none d-lg-flex align-items-center px-1">
                    <span class="text-secondary">|</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categorias.index') }}">
                        <i class="bi bi-tags me-1"></i>Categorias
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link "
                        href="{{ route('produtos.index') }}">
                        <i class="bi bi-grid me-1"></i>Produtos
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="bi bi-speedometer"></i> Pentagrama
        </a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <form action="/logout" method="POST">  
                    @csrf
                    <button type="submit" class="nav-link">Sair  <i class="bi bi-box-arrow-right"></i></button>
                </form>
            </li>
        </ul>
    </div>
</nav>
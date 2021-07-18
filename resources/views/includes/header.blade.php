<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Настольный теннис</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @yield('home-active')" aria-current="page" href="/">Карта</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('add-active')" href="/add">Добавить столы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('about-active')" href="/about">О сайте</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false">Полезные ссылки</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown05">
                        <li><a class="dropdown-item disabled" href="#">Здесь ничего нет</a></li>
                        <li><a class="dropdown-item disabled" href="#">Всё бесполезно ¯\_(ツ)_/¯</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

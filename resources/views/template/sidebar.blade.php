<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100"
                data-bs-theme="dark">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start text-white"
                    id="menu">
                    @auth
                        <li>
                            <a href="{{ route('cidades.index') }}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi bi-map"></i><span class="ms-1  d-sm-inline"> Localidades</span></a>
                        </li>
                    @endauth
                </ul>
                <hr>
            </div>
        </div>

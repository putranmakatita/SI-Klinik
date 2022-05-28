<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3">

        <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link text-dark {{Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/home">
            <i class="bi bi-house-door"></i>
                <strong>Dashboard</strong>
            </a>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
            <span> <i class="bi bi-stack"></i> Master</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link text-dark {{Request::is('dashboard') ? 'active' : ''}}" href="/wilayah">
            <i class="bi bi-geo-alt"></i>
                Wilayah
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{Request::is('dashboard') ? 'active' : ''}}" href="/user">
                <i class="bi bi-person-fill"></i>
                    User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{Request::is('dashboard') ? 'active' : ''}}" href="/pegawai">
                <i class="bi bi-person-workspace"></i>
                    Pegawai
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{Request::is('dashboard') ? 'active' : ''}}" href="/tindakan">
                <i class="bi bi-clipboard2-pulse"></i>
                    Tindakan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{Request::is('dashboard') ? 'active' : ''}}" href="/obat">
                <i class="bi bi-eyedropper"></i>
                    Obat
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
            <span><i class="bi bi-wallet"></i> Transaksi</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-dark {{Request::is('dashboard') ? 'active' : ''}}" href="/pasien">
                <i class="bi bi-tags"></i>Pasien
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{Request::is('dashboard') ? 'active' : ''}}" href="/penanganan">
                <i class="bi bi-activity"></i>Penanganan
                </a>
            </li>
        </ul>
    </div>
</nav>

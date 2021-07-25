<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Your Tasks</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Fitur Utama
    </div>

    <!-- Nav Item - Mata Pelajaran -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('matapelajaran') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Mata Pelajaran</span>
        </a>
    </li>

    <!-- Nav Item - Tugas -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#tugasDaftarMP"
            aria-expanded="true" aria-controls="tugasDaftarMP">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Tugas</span>
        </a>
        <div id="tugasDaftarMP" class="collapse"> 
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daftar Mata Pelajaran</h6>
                @foreach ($data_mata_pelajaran as $item)
                    <a class="collapse-item" href="{{ route('tugas', ['idMatapelajaran'=>$item->id]) }}">{{ $item->namaMatapelajaran }}</a>
                @endforeach

                <hr class="sidebar-divider">
                <a class="collapse-item" href="{{ route('matapelajaranCreate') }}">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Mata Pelajaran</span>
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Fitur Pendukung
    </div>

    <!-- Nav Item - Quote -->
    <li class="nav-item">
        <a class="nav-link" href="/quote">
            <i class="fas fa-fw fa-quote-right"></i>
            <span>Quote</span>
        </a>
    </li>

    <!-- Nav Item - Color -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('setStatusColor') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Color</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->

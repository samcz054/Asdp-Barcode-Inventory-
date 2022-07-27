<ul style="background-color: #1c63b7" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" >

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-4 mb-2" >
        <div class="sidebar-brand-text mx-3">ASDP Inventory Management</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active ">
        <a class="nav-link" href="{{url('/admin')}}">
            <i style="color: #dadada" class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dasboard</span>
        </a>
    </li>

    <hr class="sidebar-divider my-0 mb-4">
        
    
    <!-- Heading Menu Utama -->
    <div class="sidebar-heading" style="color: #dadada">
        Menu Utama
    </div>

    <!--Nav Gudang -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('gudang.index')}}">
            <i style="color: #dadada" class="fas fa-fw fa-table"></i>
            <span>Gudang</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('peminjaman.index')}}">
            <i style="color: #dadada" class="fas fa-fw fa-table"></i>
            <span>Peminjaman</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading Log Page -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#histori" aria-expanded="true" aria-controls="histori">
            <i style="color: #dadada" class="fas fa-fw fa fa-users"></i>
            <span>Riwayat</span>
        </a>

        <div id="histori" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Log:</h6>
                <a class="collapse-item" href="{{route('logPeminjaman.index')}}">Peminjaman</a>
                <a class="collapse-item" href="{{route('logPengembalian.index')}}">Pengembalian</a>
            </div>
        </div>
    </li>

    <!-- Divider -->

    <li class="nav-item">
        <a class="nav-link" href="{{route('user.index')}}">
            <i style="color: #dadada" class="fas fa-fw fa-table"></i>
            <span>User</span></a>
    </li>
 

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

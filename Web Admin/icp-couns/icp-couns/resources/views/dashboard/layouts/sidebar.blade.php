<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" >
      <div class="position-sticky pt-3 px-4 sidebar-sticky" >
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/siswa*') ? 'active' : '' }}" href="/dashboard/siswa">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Data Siswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/absensi*') ? 'active' : '' }}" href="/dashboard/absensi">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Data Absensi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/konsultasi*') ? 'active' : '' }}" href="/dashboard/konsultasi">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Data Konsultasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/pengaduan*') ? 'active' : '' }}" href="/dashboard/pengaduan">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Data Pengaduan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/pelanggaran*') ? 'active' : '' }} " href="/dashboard/pelanggaran">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Pelanggaran
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/laporan*') ? 'active' : '' }} " href="/dashboard/laporan">
              <span data-feather="printer" class="align-text-bottom"></span>
              Laporan
            </a>
          </li>
        </ul>
      </div>
    </nav>
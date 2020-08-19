<div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>

      <li class="nav-item {{Request::is('admin/user*') ? 'active' : ''}}">
        <a class="nav-link" href="/admin/user">
          <i class="material-icons">person</i>
          <p>User</p>
        </a>
      </li>

      <li class="nav-item {{Request::is('admin/kelas*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.kelas.index')}}">
          <i class="material-icons">school</i>
          <p>Kelas</p>
        </a>
      </li>

      <li class="nav-item {{Request::is('admin/podcast*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.podcast.index')}}">
          <i class="material-icons">headset</i>
          <p>Podcast</p>
        </a>
      </li>

      <li class="nav-item {{Request::is('admin/blogs*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.blog.index')}}">
          <i class="material-icons">article</i>
          <p>Blog</p>
        </a>
      </li>

      <li class="nav-item dropdown {{Request::is('admin/transaksi*') ? 'active' : ''}}">
        <a class="nav-link" href="javscript:void(0)" id="transaksiDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="material-icons">payments</i>
            <p>Transaksi</p>
        </a>

        <div class="dropdown-menu dropdown-menu" aria-labelledby="transaksiDropdown">
            <a class="dropdown-item" href="{{route('admin.transaksi.index')}}" style="color: black;">
                <p>Semua Transaksi</p>
            </a>
            <a class="dropdown-item" href="{{route('admin.transaksi.pending')}}" style="color: black;">
                <p>Pending</p>
            </a>
            <a class="dropdown-item" href="{{route('admin.transaksi.disetujui')}}" style="color: black;">
                <p>Disetujui</p>
            </a>
            <a class="dropdown-item" href="{{route('admin.transaksi.ditolak')}}" style="color: black;">
                <p>Ditolak</p>
            </a>
        </div>
      </li>

    </ul>
</div>

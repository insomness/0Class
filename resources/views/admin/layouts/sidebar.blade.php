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
    </ul>
</div>

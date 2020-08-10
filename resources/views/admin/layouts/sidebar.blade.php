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
{{--
      <li class="nav-item {{Request::is('admin/podcast*') ? 'active' : ''}}">
        <a class="nav-link" href=" {{route('admin.podcast.index')}} ">
          <i class="material-icons">library_books</i>
          <p>Podcast</p>
        </a>
      </li> --}}

      <li class="nav-item ">
        <a class="nav-link" href="./icons.html">
          <i class="material-icons">bubble_chart</i>
          <p>Icons</p>
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="./map.html">
          <i class="material-icons">location_ons</i>
          <p>Maps</p>
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="./notifications.html">
          <i class="material-icons">notifications</i>
          <p>Notifications</p>
        </a>
      </li>
    </ul>
</div>

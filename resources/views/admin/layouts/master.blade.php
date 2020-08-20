<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
      @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('adminTemplate')}}/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('adminTemplate')}}/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>

<body class="dark-edition">
  <div class="wrapper ">

    <div class="sidebar" data-color="purple" data-background-color="black">
      <!-- Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger" -->
      <div class="logo"><a href="/admin" class="simple-text logo-normal">
        Welcome Admin
        </a></div>
        @include('admin.layouts.sidebar')
    </div>

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
            <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">{{config('app.name')}}</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                    Some Actions
                    </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('admin.user.edit_profil')}}">Edit Profil</a>
                    <a class="dropdown-item" href="{{route('admin.user.ubah_password')}}">Ubah Password</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
            <ul>
                <li>
                <a href="https://www.creative-tim.com">
                    Creative Tim
                </a>
                </li>
            </ul>
            </nav>
            <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web. | Developed by Fitrah Maulana
            </div>
            <!-- your footer here -->
        </div>
    </footer>
    </div>
</div>
  <!--   Core JS Files   -->
  <script src="{{asset('adminTemplate')}}/js/core/jquery.min.js"></script>
  <script src="{{asset('adminTemplate')}}/js/core/popper.min.js"></script>
  <script src="{{asset('adminTemplate')}}/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="{{asset('adminTemplate')}}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="{{asset('adminTemplate')}}/js/plugins/chartist.min.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('adminTemplate')}}/js/material-dashboard.js?v=2.1.0"></script>
  {{-- custom script --}}
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    $(document).ready( function () {
        $('#table').DataTable({
            "ordering": false,
            "language": {
            "lengthMenu": "Tampilkan _MENU_ per halaman",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data yang tersedia",
            "infoFiltered": "(Difilter dari _MAX_ total data)"
            }
        });
    });
  </script>
  <script>
    //   confirm sweet alert dengan menambahkan form-delete id pada form button delete laravel
      const alertConfirm = () => {
      Swal.fire({
            title: 'Yakin ingin menghapus?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus aja!'
          }).then((result) => {
            if (result.value) {
                document.getElementById('form-delete').submit();
            }
          });
      }
  </script>
  @stack('scripts')
</body>

</html>

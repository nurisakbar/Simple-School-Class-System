
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Penerimaan Siswa Baru - Sekolah SDIT Persis</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/album/album.css" rel="stylesheet">
  </head>

    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <div class="container">
          <ul class="navbar-nav mr-auto">
              {{-- <li class="nav-item active">
                  <a class="nav-link" href="/page/home">Home</a>
              </li> --}}
              <li class="nav-item">
                  <a class="nav-link" href="{{URL::to('/page/prosedur')}}">Prosedur Pendaftaran</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{URL::to('/page/persyaratan')}}">Persyaratan</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{URL::to('/pmb/register')}}">Formulir Pendaftaran</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{URL::to('/pmb/hasil')}}">Hasil Seleksi</a>
              </li>
          </ul>
       
      </div>

      <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
          <ul class="navbar-nav ml-auto">
            @if(session('pmb_name')=='')
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/pmb/login')}}">Login Calon Siswa</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="#">{{session('pmb_name')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/pmb/logout')}}">Logout</a>
            </li>
          @endif
          </ul>
      </div>
  </nav>

    @yield('content')



    

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p class="text-center">Penerimaan Siswa Baru Berbasis Online - Sekolah Dasar Persis Kota Bandung</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-success p-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              @guest
              <li class="nav-item">
                <a class="nav-link" href="/register">Criar conta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/login">Entrar</a>
              </li>
              @endguest
              @auth
              <li class="nav-item">
                <a class="nav-link" href="/dashboard/create">Criar enquete</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/dashboard">Minhas enquetes</a>
              </li>
              <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit() ">Sair</a>
                </form>
              </li>  
              @endauth
            </ul>
          </div>
        </div>
    </nav>

    <div>
        @yield('content')
    </div>
    
</body>
</html>
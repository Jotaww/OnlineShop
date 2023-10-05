<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OnlineShop</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>
  <header>
    <nav id="nav">
      <a class="logo" href="/">OnlineShop</a>
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list" id="tirarPadding">
        <div class="pc">
          <li class="dropdown" id="borderLaranja">
            <a href="/games/catalogs?price=oferta"><i class="bi bi-tags-fill"></i>Promoções</a></a>
            <div class="dropdown-content">
              <a href="/games/catalogs?price=oferta" class="mt-4">Todas as Promoções</a>
              <a href="/games/catalogs?price=20" class="mt-3 mb-4">Abaixo de R$20,00</a>
            </div>
          </li>
          <li class="dropdown" id="borderRoxo">
            <a href="/games/catalogs?platform=Computador"><i class="bi bi-pc-display"></i>PC</a></a>
            <div class="dropdown-content">
              <a href="/games/catalogs?platform=Computador" class="mt-4">Todos os Jogos</a>
              <a href="/games/catalogs?platform=Computador&price=oferta" class="mt-3">Promoções</a>
              <a href="/games/catalogs?platform=Computador&order=4" class="mt-3">Lançamentos</a>
              <a href="/games/catalogs?platform=Computador&price=20" class="mt-3 mb-4">Abaixo de R$20,00</a>
            </div>
          </li>
          <li class="dropdown" id="borderAzul">
            <a href="#"><i class="bi bi-controller"></i>Console</a>
            <div class="dropdown-content">
              <a href="/games/catalogs?platform=Playstation" class="mt-4">Playstation</a>
              <a href="/games/catalogs?platform=Xbox" class="mt-3">Xbox</a>
              <a href="/games/catalogs?platform=Switch" class="mt-3 mb-4">Nintendo</a>
            </div>
          </li>
        </div>
        <div class="mobile">
          <div class="dropdown-center">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-tags-fill"></i>Promoções</button>
            <ul class="dropdown-menu">
              <li class="mb-3 pt-2"><a href="/games/catalogs?price=oferta">Todas as Promoções</a></li>
              <li class="mb-3 pt-2"><a href="/games/catalogs?price=20">Abaixo de R$20,00</a></li>
            </ul>
          </div>
          <div class="dropdown-center">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-pc-display"></i>PC</button>
            <ul class="dropdown-menu">
              <li class="mb-3 pt-2"><a href="/games/catalogs?platform=Computador" class="mt-4">Todos os Jogos</a></li>
              <li class="mb-3 pt-2"><a href="/games/catalogs?platform=Computador&price=oferta" class="mt-4">Promoções</a></li>
              <li class="mb-3 pt-2"><a href="/games/catalogs?platform=Computador&order=4" class="mt-4">Lançamentos</a></li>
              <li class="mb-3 pt-2"><a href="/games/catalogs?platform=Computador&price=20" class="mt-3">Abaixo de R$20,00</a></li>
            </ul>
          </div>
          <div class="dropdown-center">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-controller"></i>Console</button>
            <ul class="dropdown-menu">
              <li class="mb-3 pt-2"><a href="/games/catalogs?platform=Playstation" class="mt-4">Playstation</a></li>
              <li class="mb-3 pt-2"><a href="/games/catalogs?platform=Xbox" class="mt-4">Xbox</a></li>
              <li class="mb-3 pt-2"><a href="/games/catalogs?platform=Switch" class="mt-3">Nintendo</a></li>
            </ul>
          </div>
        </div>
        <li id="liSearch">
          <form class="search-form" action="/games/catalogs">
            <input type="text" name="name" placeholder="Search...">
            <button type="submit"><i class="bi bi-search"></i></button>
          </form>
        </li>
        <div class="mobile">
          <li class="dropdown">
            @guest
            <a href="/login"><i class="bi bi-person-fill"></i>Entrar</a></a>
            @endguest
            @auth
            <div class="dropdown-center">
              <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">{{auth()->user()->name}}</button>
              <ul class="dropdown-menu">
                <li class="mb-3 pt-2"><a href="/account/wishlist" class="mt-4">Lista de Desejos</a></li>
                <li class="mb-3 pt-2"><a href="/account/requests" class="mt-4">Meus Pedidos</a></li>
                <li class="mb-3 pt-2"><a href="/account/details" class="mt-4">Minha Conta</a></li>
                <hr>
                <li>
                  <form method="POST" action="{{ route('logout') }}" class="mt-1 mb-3">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                  </form>
                </li>
              </ul>
            </div>
            @endauth
          </li>
          <li class="dropdown">
            <a href="/cart"><i class="bi bi-cart3" id="cartCount"><span>{{$countCart}}</span></i></i>Carrinho</a>
          </li>
        </div>
        <div class="pc">
          @guest
          <li class="dropdown ms-5" id="borderVerde">
            <a href="/login"><i class="bi bi-person-fill"></i>Entrar</a></a>
          </li>
          @endguest
          @auth
          <li class="dropdown" id="borderVerde">
            <a href="#">{{auth()->user()->name}}</a>
            <div class="dropdown-content">
              <a href="/account/wishlist" class="mt-4">Lista de Desejos</a>
              <a href="/account/requests" class="mt-4">Meus Pedidos</a>
              <a href="/account/details" class="mt-4">Minha Conta</a>
              <hr>
              <form method="POST" action="{{ route('logout') }}" class="mt-1 mb-3">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
              </form>
            </div>
          </li>
          @endauth
          <li class="dropdown" id="borderVermelho">
            <a href="/cart"><i class="bi bi-cart3" id="cartCount"><span>{{$countCart}}</span></i></a>
          </li>
        </div>
      </ul>
    </nav>
  </header>
  <div class="content">
    @if(session('msgCart'))
      <p class="msgCart">{{ session('msgCart') }}</p>
    @endif
    @yield('content')
  </div>
  <footer>
    <div class="container" id="footer">
      <div class="outros">
        <a href="#">Suporte</a>
        <a href="#">Blog</a>
        <a href="#">Sobre</a>
        <a href="#">Carreiras</a>
        <a href="#">Seu jogo na OnlineShop</a>
      </div>
      <div class="social">
        <h5>ACOMPANHE-NOS</h5>
        <div>
          <a href="#"><i class="bi bi-facebook" id="facebook"></i>Facebook</a>
          <a href="#"><i class="bi bi-github" id="github"></i>Github</a>
          <a href="#"><i class="bi bi-instagram" id="instagram"></i>Instagram</a>
          <a href="#"><i class="bi bi-discord" id="discord"></i>Discord</a>
          <a href="#"><i class="bi bi-twitter" id="twitter"></i>Twitter</a>
          <a href="#"><i class="bi bi-linkedin" id="linkedin"></i>Linkedin</a>
        </div>
      </div>
      <div class="politica">
        <a class="logo" href="/">OnlineShop</a>
        <span>Termos de Uso</span>
        <span>Política de Privacidade </span>
        <div class="footerLocation">
          <span>OnlineShop Ltda. - CNPJ 99.999.999/9999-99</span>
          <span>Rua Tal, n° 999, Esteio - Rio Grande do Sul, RS - 99999-999</span>
        </div>
      </div>
    </div>
  </footer>
</body>
<script src="{{asset('js/home.js')}}"></script>
</html>
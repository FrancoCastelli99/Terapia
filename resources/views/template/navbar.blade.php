<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('home')}}" class="logo">
                        <img src="{{asset('/img/logo.png')}}" height="70" width="200">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#men">Tarot</a></li>
                        <li class="scroll-to-section"><a href="#women">Pendulo</a></li>
                        <li class="scroll-to-section"><a href="#kids">Tiendita</a></li>
                        
                        @guest
                            <li class="scroll-to-section"><a href="{{ route('login') }}">Iniciar Sesion</a></li>
                            <li class="scroll-to-section"><a href="{{ route('register') }}">Registro</a></li>
                        @else
                            <li class="submenu">
                                <a href="javascript:;">Hola! {{ Auth::user()->name }}</a>
                                <ul>    
                                    <li><a href="#">Perfil</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ ('Cerrar Sesion') }}
                                        </a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>  
                                </ul>
                            </li>
                        @endguest
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        @include("logo_header")
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item">
                <a href="{{route("analyse")}}">
                  <p>Analyse</p>
                </a>
                </li>
                <li class="nav-item active">
                    <a data-bs-toggle="collapse" href="#charge" class="collapsed" aria-expanded="false">
                        <i class="fas fa-money-bill-wave"></i>
                        <p>Charge</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="charge">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route("charge.show") }}">
                                    <span class="sub-item">Liste</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("charge.create") }}">
                                    <span class="sub-item">Formulaire</span>
                                </a>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#centre">
                        <i class="fas fa-layer-group"></i>
                        <p>Centre</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="centre">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route("centre.show") }}">
                                    <span class="sub-item">Liste</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("centre.create") }}">
                                    <span class="sub-item">Formulaire</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#unite-oeuvre">
                        <i class="fas fa-ruler-horizontal"></i>
                        <p>Unité d'oeuvre</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="unite-oeuvre">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route("unite_oeuvre.show") }}">
                                    <span class="sub-item">Liste</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("unite_oeuvre.create") }}">
                                    <span class="sub-item">Formulaire</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

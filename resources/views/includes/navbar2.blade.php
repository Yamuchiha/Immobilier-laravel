<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="ti-home menu-icon"></i>
          <span class="menu-title">Tableau de bord</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="ti-clipboard menu-icon"></i>
          <span class="menu-title">Création</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ URL::to('/ajoutCategorie') }}">Ajouter catégorie</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ URL::to('/ajoutTrano') }}">Ajouter maison</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ URL::to('/ajoutSlider') }}">Ajouter slider</a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="wizard.html">Wizard</a></li> --}}
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="ti-layout menu-icon"></i>
          <span class="menu-title">Affichages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/categories') }}">Catégories</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/tranos') }}">Maisons</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/sliders') }}">Sliders</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/achats') }}">Achats</a></li> --}}
          </ul>
        </div>
      </li>
    </ul>
  </nav>
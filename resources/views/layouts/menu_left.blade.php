 
 

  

    @php
        $menu = contenidoMenu();
    @endphp

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">

            {!! generarMenu($menu) !!}

       

        </div>
    </nav>

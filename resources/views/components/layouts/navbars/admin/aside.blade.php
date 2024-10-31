
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <div class="sidenav-header">
           
            <a class="navbar-brand m-0" >
                <span class="ms-1 font-weight-bold">GESTIÓN DE PROCEDIMIENTOS HOLTERS</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('pacientes') ? 'active ' : ''}} " href="{{route('pacientes')}}">
                        <div
                            class="icon  icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-people-roof"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pacientes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('doctores') ? 'active ' : ''}} " href="">
                        <div
                            class="icon  icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                        <span class="nav-link-text ms-1">Doctores</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{request()->routeIs('holters') ? 'active' : 'color-gray'}} " href="{{route('holters')}}">
                        <div class="icon  icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-pager "></i>
                        </div>
                        <span class="nav-link-text ms-1">Holters</span>
                    </a>
                </li>
              
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Cuenta</h6>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf                     
                   
                    <a class="nav-link   cursor-pointer"  @click.prevent="$root.submit();">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                           <i class="fa-solid fa-user"></i>
                        </div>
                        <span class="nav-link-text ms-1">Perfil</span>
                    </a> </form>
                </li>
           
            </ul>
        </div>
       
    </aside>

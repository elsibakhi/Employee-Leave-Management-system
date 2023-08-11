


<li class="nav-item">
  <a href="{{route("types.index")}}" class="nav-link">
    <i class="nav-icon fas fa-list"></i>
    <p>
      Show all leave types

    </p>
  </a>
</li>

<li class="nav-item">
    <a href="{{route("types.create")}}" class="nav-link">
      <i class="nav-icon fas fa-plus"></i>
      <p>
        Create leave type

      </p>
    </a>
  </li>
  <li class="nav-item">
    
    <form method="POST"  action="{{ route('logout') }}">
      @csrf
    <a href="route('logout')"
      onclick="event.preventDefault();
                  this.closest('form').submit();" 
                  class="nav-link text-danger" >
        <i class="nav-icon fas fa-arrow-right"></i>
        <p>
          Logout
       
        </p>
      </a>
  
    </form>
    </li>



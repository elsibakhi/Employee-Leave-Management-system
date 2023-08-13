


<li class="nav-item">
  <a href="{{route("types.index")}}" class="nav-link">
    <i class="nav-icon fas fa-list"></i>
    <p>
      Show all <span class="text-warning">leave types</span>

    </p>
  </a>
</li>

<li class="nav-item">
    <a href="{{route("types.create")}}" class="nav-link">
      <i class="nav-icon fas fa-plus"></i>
      <p>
        Create <span class="text-warning">leave type</span>

      </p>
    </a>
  </li>
<li class="nav-item">
  <a href="{{route("management.employees")}}" class="nav-link">
    <i class="nav-icon fas fa-list"></i>
    <p>
      Show all <span class="text-info">employees</span>

    </p>
  </a>
</li>

<li class="nav-item">
    <a href="{{route("register")}}" class="nav-link">
      <i class="nav-icon fas fa-plus"></i>
      <p>
        Create a new <span class="text-info">employee</span>

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



{{-- nvabar --}}
<div class="row sticky-top">
    <nav class="navbar sticky-top " style="background-color: rgb(9, 47, 94);">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="{{Route('adminHome')}}">
            <i class="fa fa-smile-o" aria-hidden="true"></i>
            Admin
          </a>
          <div class="dropdown">
            <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user" aria-hidden="true"></i>
              Dinh Ba Quyet
            </button>
            <ul class="dropdown-menu p-0">
              <li><a class="dropdown-item text-center bg-secondary-subtle" style="color: black" href="{{Route('Logout')}}">Logout</a></li>
            </ul>
          </div>
        </div>
        
      </nav>
</div>
{{-- end-Navbar --}}
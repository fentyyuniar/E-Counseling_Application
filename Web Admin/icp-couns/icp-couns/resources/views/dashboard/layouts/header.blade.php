<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #4C93A2;">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-5 fs-6" href="#"><img src="\img\logosmk.png" alt="logo" style="width: 30px; margin-right: 5px; margin-left: -20px; margin-bottom: -5px; margin-top: -5px;"> 
    e-counseling</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <input class="form-control form-control-dark rounded-15 border-4" type="text" placeholder="Search" aria-label="Search" style="width: 45%; height:36px;"> -->
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="/logout" method="post">
              @csrf 
              <button type="submit" class="nav-link px-3 border-0">Logout <span data-feather="log-out"></span> </button>
          </form>
      </div>
    </div>
  </header>
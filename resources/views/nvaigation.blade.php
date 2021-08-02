<section>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white fixed-top">
        <a class="navbar-brand text-white" href="#" >BLOG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{Request::is('/') ? 'active' :''}}">
              <a class="nav-link text-white text-uppercase" href="{{route('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white text-uppercase" href="#">My Profile</a>
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sort 
              </a>
              <div class="dropdown-menu text-white text-uppercase" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">latest</a>
                <a class="dropdown-item" href="#">oldest</a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white text-uppercase" href="#"> Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white text-uppercase" href="#">Register</a>
            </li>
          </ul>
        </div>
      </nav>
</section>
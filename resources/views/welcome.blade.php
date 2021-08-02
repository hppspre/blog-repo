<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./custome.css">
    
    <title>Blog</title>

</head>
<body>
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white fixed-top">
            <a class="navbar-brand text-white" href="#" >BLOG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link text-white text-uppercase" href="#">Home <span class="sr-only">(current)</span></a>
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

    <section>
        <!-- Because need to marging from top of page navbar positioned with fixed ):)  -->
        <br>
        <br>
        <br>
        <br>


        <div class="container">
            <div class="main-body">
        
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">

                              <h4>John Doe</h4>

                              <button class="btn btn-info">Update profile image</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              pubudu sachintha
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              pubudusachintha1996@gmail.com
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              (239) 816-9029
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <button class="btn btn-success btn-block">Edit</button>
                            </div>
                          </div>
                        </div>
                      </div>
        
                 
                    </div>
                  </div>
        
                </div>
            </div>

       

    </section>


    <!-- Added js requirements -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <!-- Added js requirements -->

    <!-- Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    <!-- Feather Icons -->


</body>
</html>

@extends('heder')

@section('user-profile')

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

                        <div class="col-md-12">
                          <button type="button" class="btn btn-link">Edit password</button>
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


@endsection

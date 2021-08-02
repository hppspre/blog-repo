@extends('heder')

@section('home')

<section>
    <!-- Because need to marging from top of page navbar positioned with fixed ):)  -->
    <br>
    <br>
    <br>
    <br>
    <!-- Post list -->
    <div class="container shadow p-3 mb-5 bg-white">
            <div class="card rounded-0 border-0 shadow p-3 mb-5 bg-white rounded pt-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card-title h5 text-uppercase">
                                Hello iam the first
                            </div>
                            <div class='card-img'>
                                <img src="https://picsum.photos/id/237/400/400" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-md-7 text-justify">


                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam fugiat incidunt rem doloremque? Optio, ut. Suscipit eaque enim id vitae natus maxime impedit nihil aperiam, labore officia sint exercitationem saepe?
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam fugiat incidunt rem doloremque? Optio, ut. Suscipit eaque enim id vitae natus maxime impedit nihil aperiam, labore officia sint exercitationem saepe?
                        
                            <!-- Afeter discription -->
                            <div class="card bg-light ">
                                <div class="card-body">

                                    <!-- Comment form-->
                                    <form class="mb-4">
                                        <textarea class="form-control" rows="3" placeholder="leave a comment!"></textarea>
                                        <button class="btn btn-success rounded-0 mt-3 btn-block text-uppercase">save my comment</button>
                                    </form>
                                    <!-- Comment with nested comments-->

                                    <div class="pre-scrollable">

                                        <div class="d-flex mb-4">
                                            <!-- Parent comment-->
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                            <div class="ms-3 ml-2">
                                                <div class="fw-bold">Commenter Name</div>
                                                If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                            </div>
                                        </div>

                                        <div class="d-flex mb-4">
                                            <!-- Parent comment-->
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                            <div class="ms-3 ml-2">
                                                <div class="fw-bold">Commenter Name</div>
                                                If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                            </div>
                                        </div>

                                        <div class="d-flex mb-4">
                                            <!-- Parent comment-->
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                            <div class="ms-3 ml-2">
                                                <div class="fw-bold">Commenter Name</div>
                                                If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                            </div>
                                        </div>
                                        <div class="d-flex mb-4">
                                            <!-- Parent comment-->
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                            <div class="ms-3 ml-2">
                                                <div class="fw-bold">Commenter Name</div>
                                                If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <!-- Afeter discription -->

                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>

@endsection

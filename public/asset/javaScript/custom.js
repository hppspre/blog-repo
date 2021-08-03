
$(document).ready(function() {

    $(document).on('change',"#profile",function(event){
        $("#default_img").attr('src',URL.createObjectURL(event.target.files[0]))
    });

    $(document).on('click','#user-post-drop',function(){
       
        let id=$(this).attr('data-id');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this action!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    type:'POST',
                    url:'/drop-post',
                    data:{'id':id},
                    success:function(data) {
        
                        swal("Poof! Your post deleted!", {
                            icon: "success",
                          });

                        window.location.reload();
                    }
                 });
              
            } else {
              swal("Your post is safe now!");
            }
          })

    });


    $(document).on('click','#dropUser',function(){
       
        let id=$(this).attr('data-id');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this action!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    type:'POST',
                    url:'/admin-user-delete',
                    data:{'id':id},
                    success:function(data) {
        
                      
                        swal("Poof! Your user deleted!", {
                            icon: "success",
                          });

                        window.location.reload();
                    }
                 });
              
            } else {
              swal("Your user is safe now!");
            }
          })

    });

    

    $(document).on('click','#admin-drop-post',function(){
       
        let id=$(this).attr('data-id');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this action!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    type:'POST',
                    url:'/drop-admin-post',
                    data:{'id':id},
                    success:function(data) {
        
                      
                        swal("Poof! Your user deleted!", {
                            icon: "success",
                        });

                        window.location.reload();
                    }
                 });
              
            } else {
              swal("Your user is safe now!");
            }
          })

    });

});
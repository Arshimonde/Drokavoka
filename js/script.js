jQuery(function($){

    $(document).ready(function(){
        /* DELETE SPECIALITY START*/
        $(".delete-speciality").on("click",function(){
            var id = $(this).attr("id");
            /* alert */
            swal("Etes vous sur que vous voulez suprimmer cette spécialité?", {
                title:"Attention!",
                icon:"warning",
                buttons: {
                  yes: {
                    text: "Oui",
                    value: "yes",
                  },
                  non:  {
                    text: "Non",
                    value: "no",
                  },
                  
                },
              })
              .then((value) => {
                switch (value) {
                  case "yes":
                    if(window.location.href.indexOf("specialties")>-1){
                        window.location.href = "/dashboard.php?section=specialties&action=delete&id="+id;
                    }
                    break;
                  default:break;
                }
              });
        });
        /* DELETE SPECIALITY END*/
    });

});
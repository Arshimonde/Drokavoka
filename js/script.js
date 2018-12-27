jQuery(function($){
    /* IS DOCUMENT RENDERED / READY  */
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
        /* MODIFY SPECIALITY START*/
        var animationEndEvent = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
        var animationClass = "animated pulse";

        $(".modify-speciality").click(function(){
          //Speciality-id
          var id = $(this).attr("id");
          /* speciality form */
          var $form = $("#speciality-form");
          /* change form title */
          $(".dashboard-add-speciality .card-header h6 span").text("Modifier la spécialité");
          /* fill form inputs */
          var s_name = $(this).parent().parent().find(".specialite-name").text();
          var s_desc = $(this).parent().parent().find(".specialite-desc").text();
          $form.find("input[name=specialite_name]").val(s_name);
          $form.find("textarea[name=specialite_desc]").val(s_desc.trim());
          $form.find("input[type=submit]").val("Modifier");
          /* change form action */
          var form_action = $form.attr("action");
          $form.attr("action",(form_action + "&action=modify&id="+id))
          /* block animation */
          $(".dashboard-add-speciality").addClass("border border-primary shadow-lg").addClass(animationClass)
          //ON animation End
          .one(animationEndEvent,function(){
            $(this).removeClass(animationClass);
          });
        });
        /* MODIFY SPECIALITY END*/
    });

});
jQuery(function($){
    /* IS DOCUMENT RENDERED / READY  */
    $(document).ready(function(){
        /* GENERAL START */
        $('selectpicker').selectpicker();
        /* GENERAL END */

        /* DELETE ELEMENT START*/
        $(".delete-element").on("click",function(e){
            e.preventDefault();
            /* alert */
            delete_warning("Etes vous sur que vous voulez suprimmer ?" , function(value){
                switch (value) {
                  case "yes":
                      window.location.href = $(e.target).attr("href");
                    break;
                  default:break;
                }
            });
        });
        /* DELETE ELEMENT END*/

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

        /* ACCOUNT SIGN UP START */
            /* step 1 */
        $("#lawyer-sign-up-form .card-body .step-1-button").click(function(){
            /* validate inputs */
            let inputs_valid = bootstrap_validate_inputs($("#lawyer-sign-up-form  #account-setup input"));
            /* check password */
            if($("#lawyer-sign-up-form  #confirm_password").val() != $("#lawyer-sign-up-form  #password").val()){
              $("#confirm_password").addClass("is-invalid");
              inputs_valid = false;
            }

            if(inputs_valid){
              $("#lawyer-sign-up-form .step-1 .card-header a").attr("data-toggle","collapse");
              $("#lawyer-sign-up-form #personal-info").collapse("show");
            }
        });
          /* step 2 */
        $("#lawyer-sign-up-form .card-body .step-2-button").click(function(){
            let inputs_valid = bootstrap_validate_inputs($("#lawyer-sign-up-form  #personal-info input"));
            if(inputs_valid){
              $("#lawyer-sign-up-form .step-2 .card-header a").attr("data-toggle","collapse");
              $("#lawyer-sign-up-form .step-3 .card-header a").attr("data-toggle","collapse");
              $("#lawyer-sign-up-form  #contact-info").collapse("show");
            }
        });
            /* on form submit */
        $("#lawyer-sign-up-form").submit(function(evt){
            evt.preventDefault();
            let inputs_valid = bootstrap_validate_inputs($("#lawyer-sign-up-form #contact-info input"));

            if(inputs_valid){
              this.submit();
            }
        });
        /* ACCOUNT SIGN UP END */
    });

});

/* DELETE WARNING FUNCTION */
function delete_warning(message , callback){
  swal(message, {
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
    callback(value);
  });
}
/* FUNCTION TO VALIDATE INPUTS TAKS JQUERY OBJECT/SELECTOR AND RETURN FALSE OR TRUE */
function bootstrap_validate_inputs($selector_inputs){
    let inputs_valid = true;
    $selector_inputs.removeClass("is-invalid");

    $selector_inputs.each(function(){
      if(this.checkValidity() == false ){
        inputs_valid = false;
        $(this).addClass("is-invalid");
      }
    });

    return inputs_valid;
}
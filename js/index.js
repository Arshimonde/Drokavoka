  $(document).ready(function() {
    $('#register_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nom: {
                validators: {
                        stringLength: {
                        min: 3,
                    },
                        notEmpty: {
                        message: 'Priere de saisir votre Nom.'
                    }
                }
            },
             prenom: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Priere de saisir votre Prénom.'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Priere de saisir votre adresse Email.'
                    },
                    emailAddress: {
                        message: 'Priere de saisir une adresse Email valide.'
                    }
                }
            },
            telephone: {
                validators: {
                    notEmpty: {
                        message: 'Priere de saisir votre Téléphone.'
                    },
                    phone: {
                        country: 'MA',
                        message: 'Priere de saisir un numéro de Téléphone valide.'
                    }
                }
            },
            adresse: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Priere de saisir votre adresse du domicile.'
                    }
                }
            },
            ville: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Priere de saisir votre ville.'
                    }
                }
            },
            region: {
                validators: {
                    notEmpty: {
                        message: 'Priere de saisir votre région.'
                    }
                }
            },
            codepostale: {
                validators: {
                    notEmpty: {
                        message: 'Priere de saisir un Code Postale.'
                    },
                    zipCode: {
                        country: 'MA',
                        message: 'Priere de saisir un Code Postale valide.'
                    }
                }
            },

            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#register_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
/*
* Login
*/

//Validar campos
$(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {   
            //form validation rules
            $("#formulario").validate({
            	rules:{
                    login:{
                       required: true
                   }
               },
               messages: {
                   login: {
                    required: "Esse campo é obrigatório!",
                    email: "Entre com um e-mail valido!"
                },
                senha: {
                    required: "Esse campo é obrigatório!",
                    minlength: "Sua senha deve ter pelo menos 8 caracteres"
                }
            },
            submitHandler: function(form) {
                verificaLogin();
            }
        });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

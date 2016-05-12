/*
* Cadastrar Receita
*/

//Validar campos
$(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $.validator.addMethod("lettersonly", function(value, element) {
              return this.optional(element) || /^[a-zA-ZçáÁéÉíÍóÓúÚãÃâÂêÊõÕôÔ ]+$/i.test(value);
          }, "Digite apenas letras!");

			//form validation rules
            $("#formulario").validate({
            	rules:{
            		nomeReceita: {
            			required: true,
            			lettersonly: true
            		},
                    'nomeIng[]': {
                        required: true,
                        lettersonly: true
                    },
                    modoPreparo: {
                        required: true
                    }
                },
                messages: {
                	nomeReceita: {
                        required: "Esse campo é obrigatório!"
                    },
                    'nomeIng[]': {
                        required: "Esses campos são obrigatórios!"
                    },
                    modoPreparo: {
                        required: "Esse campo é obrigatório!",
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

/*
* Receita
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
            		comentario: {
            			required: true
            		}
            	},
                messages: {
                	comentario: {
                        required: "Esse campo é obrigatório!"
                    }
                },
                submitHandler: function(form) {
                    realiza_comentario();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

//Transforma letras em maiusculas
function maiscula(elemento){
	$(elemento).val($(elemento).val().toUpperCase());
}
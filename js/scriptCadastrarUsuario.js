/*
* Cadastrar usuário
*/

//Mascara telefone
function mascara(o,f){
    v_obj=o;
    v_fun=f;
    setTimeout("execmascara()",1);
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value);
}

function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}

function id( el ){
	return document.getElementById( el );
}

window.onload = function(){
	id('telefone').onkeyup = function(){
		mascara( this, mtel );
	}
}

//Validar campos
$(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
        	$.validator.addMethod("minAge", function(value, element, min) {
               var today = new Date();
               var birthDate = new Date(value);
               var age = today.getFullYear() - birthDate.getFullYear();
               
               if (age > min+1) {
                   return true;
               }
               
               var m = today.getMonth() - birthDate.getMonth();
               
               if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                   age--;
               }
               
               return age >= min;
           }, "Você não tem idade suficiente!");

           $.validator.addMethod("lettersonly", function(value, element) {
              return this.optional(element) || /^[a-zA-ZçáÁéÉíÍóÓúÚãÃâÂêÊõÕôÔ ]+$/i.test(value);
          }, "Digite apenas letras!");

           $.validator.addMethod("validpassword", function(value, element) {
               return this.optional(element) || /^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/.test(value);
           }, "A senha deve conter pelo menos uma letra minúscula, uma maiúscula, um número e um caracter especial!");

            //form validation rules
            $("#formulario").validate({
            	rules:{
            		nome: {
            			lettersonly: true
            		},
            		dataNascimento: {
                        required: true,
                        minAge: 13 
                    },
                    cidade: {
                        lettersonly: true
                    },
                    login:{
                    	remote: {
                         url: "verificaemail.php",
                         type: "post"
                     }
                 },
                 senhaUser: {
                    required: true,
                    minlength: 8,
                    validpassword : true 
                },
                senhaUserConf: {
                    required: true,
                    minlength: 8,
                    equalTo: "#senha" 
                }
            },
            messages: {
             nome: {
                required: "Esse campo é obrigatório!"
            },
            dataNascimento: {
                required: "Esse campo é obrigatório!",
                minAge: "Você precisa ter mais do que 13 anos para se cadastrar!"
            },
            cidade: {
                required: "Esse campo é obrigatório!"
            },
            telefone: {
                required: "Esse campo é obrigatório!"
            },
            login: {
                required: "Esse campo é obrigatório!",
                remote: "Email já cadastrado!",
                email: "Digite um email válido!"
            },
            senhaUser: {
                required: "Esse campo é obrigatório!",
                minlength: "Sua senha deve ter pelo menos 8 caracteres"
            },
            senhaUserConf: {
                required: "Esse campo é obrigatório!",
                minlength: "Sua senha deve ter pelo menos 8 caracteres",
                equalTo: "As senhas não correspondem!"
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

//Transforma letras em maiusculas
function maiscula(elemento){
	$(elemento).val($(elemento).val().toUpperCase());
}
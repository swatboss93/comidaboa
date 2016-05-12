
function exibirXML() {
  $('#conteudo-exportar').html("");
  codigo_fonte = '<?xml version="1.0" encoding="ISO-8859-1"?>\n';
  codigo_fonte = codigo_fonte + '<receita id_receita="'+objetoReceita.id_receita+'">\n';
  codigo_fonte = codigo_fonte + '<autor>'+objetoReceita.autor+'</autor>\n';
  codigo_fonte = codigo_fonte + '<nome>'+objetoReceita.nome+'</nome>\n';
  codigo_fonte = codigo_fonte + '<avaliacao>'+objetoReceita.avaliacao+'</avaliacao>\n';
  codigo_fonte = codigo_fonte + '<modopreparo>'+objetoReceita.modopreparo+'</modopreparo>\n';
  codigo_fonte = codigo_fonte + '<imagens>\n';
  for(i=0 ; i< objetoReceita.imagens.length ; i++)
  {
    codigo_fonte = codigo_fonte + '<imagem>'+objetoReceita.imagens[i]+'</imagem>\n';
  }
  codigo_fonte = codigo_fonte + '</imagens>\n';

  codigo_fonte = codigo_fonte + '<ingredientes>\n';
  for(i=0 ; i< objetoReceita.ingredientes.length ; i++)
  {
    codigo_fonte = codigo_fonte + '<ingrediente>'+objetoReceita.ingredientes[i]+'</ingrediente>\n';
  }
  codigo_fonte = codigo_fonte + '</ingredientes>\n';

  codigo_fonte = codigo_fonte + '<cateorias>\n';
  for(i=0 ; i< objetoReceita.categorias.length ; i++)
  {
    codigo_fonte = codigo_fonte + '<categoria>'+objetoReceita.categorias[i]+'</categoria>\n';
  }
  codigo_fonte = codigo_fonte + '</categorias>\n';
  codigo_fonte = codigo_fonte + '</receita>';


  carac = new Array();
  for (i = 0; i <= codigo_fonte.length - 1; i++) {
    carac[i] = codigo_fonte.charAt(i);
    carac[i] = carac[i].replace("<", "&lt;");
    carac[i] = carac[i].replace(">", "&gt;");
    carac[i] = carac[i].replace("\n", "<br>");
    carac[i] = carac[i].replace(" ", "&nbsp;");
  }
  for (i = 0; i <= codigo_fonte.length - 1; i++) {
    $("#conteudo-exportar").append(carac[i]);
  }
  
}

function exibirJSON() {
        //alert(objetoReceita.imagens);
        $('#conteudo-exportar').html("");
          //codigo_fonte = '<receita id_receita="1">\n<autor>Eduardo</autor>\nnome>Tapioca</nome>";';
          codigo_fonte = JSON.stringify(objetoReceita);
          carac = new Array();
          for (i = 0; i <= codigo_fonte.length - 1; i++) {
            carac[i] = codigo_fonte.charAt(i);
            carac[i] = carac[i].replace("<", "&lt;");
            carac[i] = carac[i].replace(">", "&gt;");
            carac[i] = carac[i].replace("\n", "<br>");
            carac[i] = carac[i].replace(" ", "&nbsp;");
          }
          for (i = 0; i <= codigo_fonte.length - 1; i++) {
            $("#conteudo-exportar").append(carac[i]);
          }
          
        }


        function atualiza_comentario()
        {
          $.ajax({
            type: 'GET',
            url: 'comentarios.php?id='+document.getElementById('id_receita').value,
            success: function(data){

              var result= JSON.parse(data);

              $('#coment').html("");
              
              $.each(result, function(name, valor){
                      //alert(valor.nome);
                      $('#coment').append('<h5>'+valor.nome+'</h5><div class="conteudo-coment"><p>'+valor.comentario+'</p></div>');
                    });
            },
            error: function(xhr, textStatus, error){
              console.log(xhr.statusText);
              console.log(textStatus);
              console.log(error);
              alert("Ocorreu um erro inesperado, por favor tente novamente!");
            }
          });
        }

        function realiza_comentario()
        {
          var jsonUsuario = {
            "comentario":document.getElementById('comentario').value,
            "login":document.getElementById('login').value,
            "id_receita":document.getElementById('id_receita').value
          };

          $.ajax({
            type: 'POST',
            url: 'comentario.php',
            data:  jsonUsuario,
            success: function(data){

             var objJ = JSON.parse(data);
             var result = objJ.result;
             
             if(result.localeCompare("true") == 0)
             {
              $(document).ready(function(){      
                $('#resposta-comentario').html("<h4>Sua comentário foi registrado com sucesso!</h4>");
              });

              atualiza_comentario();

            }else{
              alert("ERRO!");  
            }
          },
          error: function(xhr, textStatus, error){
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
            alert("Ocorreu um erro inesperado, por favor tente novamente!");
          }
        });
        }

        function realiza_avaliacao()
        {
          var jsonUsuario = {
            "nota":document.getElementById('avaliacao').value,
            "login":document.getElementById('login').value,
            "id_receita":document.getElementById('id_receita').value
          };

          $.ajax({
            type: 'POST',
            url: 'avaliacao.php',
            data:  jsonUsuario,
            success: function(data){

             var objJ = JSON.parse(data);
             var result = objJ.result;

             if(result.localeCompare("true") == 0)
             {
              $(document).ready(function(){      
                $('#resposta-avaliacao').html("<h4>Sua avaliação foi registrada com sucesso!</h4>");
              });    
            }else{
              alert("ERRO!");  
            }
          },
          error: function(xhr, textStatus, error){
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
            alert("Ocorreu um erro inesperado, por favor tente novamente!");
          }
        });
        }



        function sair(){

          $.cookie("infoUsuario", null);
          $.cookie("usuarioLogado",null);
          //alert($.cookie("infoUsuario"));
          $('#infoUsuario').html('<p>Olá, faça o <a href="login.html">login</a> ou <a href="cadastrar-usuario.html">cadastre-se</a></p>');
          window.location.href = "index.html";
        }

    //duplica ingredientes
    $(document).ready(function(){
      $("input#addIng").click(function(){
        $("#ing").clone().appendTo("#ings");
      });
    });

  //duplica imagens
  $(document).ready(function(){
    $("input#addImg").click(function(){
      $("#img").clone().appendTo("#imgs");
    });
  });

    //duplica catgoria
    $(document).ready(function(){
      $("input#addCat").click(function(){
        $("#cat").clone().appendTo("#cats");
      });
    });

    function getUrlVars()
    {
      var vars = [], hash;
      var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
      for(var i = 0; i < hashes.length; i++)
      {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
      }
      return vars;
    }


    /*
* Wallison
*/

/*
* Autocomplete
*/

function pegaLista(){
  var l = new Array();
  var id = new Array();
  var nome = new Array();
  var buscador = {
    "busca":""
  };
  $.post("buscaDica.php", buscador, function(data){
    var listaDicas = JSON.parse(data).dicas;
    $.each(listaDicas, function(index, value){
      id[value.dica] = value.id;
      nome.push(value.dica);
    });
    l.push(id, nome);
  });

  return l;
}

var listaAC = pegaLista();

$(function ($) {

  $("input#busca").shieldAutoComplete({
    dataSource: {
      data: listaAC[1]
    },
    minLength: 0,
    events: {
      change: function (e) {
        if(typeof(listaAC[0][e.value]) !== "undefined"){
          $(location).attr('href', 'receita.html?id=' + listaAC[0][e.value]);
        }
      }
    }
  });
});


//Aumentar letra
function aumentaLetra() {
  var sizeBody = $("body").css('font-size');
  var sizeButton = $("button").css('font-size');
  var sizeA = $("a").css('font-size');
  var sizeInput = $("input").css('font-size');
  var sizeH1 = $("h1").css('font-size');
  var sizeH2 = $("h2").css('font-size');
  var sizeH3 = $("h3").css('font-size');
  var sizeH4 = $("h4").css('font-size');
  var sizeH5 = $("h5").css('font-size');
  var sizeH6 = $("h6").css('font-size');
  
  sizeBody = sizeBody.replace('px', '');
  sizeBody = parseInt(sizeBody) + 1.4;
  $("body").animate({'font-size' : sizeBody + 'px'});

  sizeButton = sizeButton.replace('px', '');
  sizeButton = parseInt(sizeButton) + 1.4;
  $("button").animate({'font-size' : sizeButton + 'px'});

  sizeA = sizeA.replace('px', '');
  sizeA = parseInt(sizeA) + 1.4;
  $("a").animate({'font-size' : sizeA + 'px'});

  sizeInput = sizeInput.replace('px', '');
  sizeInput = parseInt(sizeInput) + 1.4;
  $("input").animate({'font-size' : sizeInput + 'px'});

  sizeH1 = sizeH1.replace('px', '');
  sizeH1 = parseInt(sizeH1) + 1.4;
  $("h1").animate({'font-size' : sizeH1 + 'px'});

  sizeH2 = sizeH2.replace('px', '');
  sizeH2 = parseInt(sizeH2) + 1.4;
  $("h2").animate({'font-size' : sizeH2 + 'px'});

  sizeH3 = sizeH3.replace('px', '');
  sizeH3 = parseInt(sizeH3) + 1.4;
  $("h3").animate({'font-size' : sizeH3 + 'px'});

  sizeH4 = sizeH4.replace('px', '');
  sizeH4 = parseInt(sizeH4) + 1.4;
  $("h4").animate({'font-size' : sizeH4 + 'px'});

  sizeH5 = sizeH5.replace('px', '');
  sizeH5 = parseInt(sizeH5) + 1.4;
  $("h5").animate({'font-size' : sizeH5 + 'px'});

  sizeH6 = sizeH6.replace('px', '');
  sizeH6 = parseInt(sizeH6) + 1.4;
  $("h6").animate({'font-size' : sizeH6 + 'px'});
}

//Diminuir letra
function diminuiLetra() {
  var sizeBody = $("body").css('font-size');
  var sizeButton = $("button").css('font-size');
  var sizeA = $("a").css('font-size');
  var sizeInput = $("input").css('font-size');
  var sizeH1 = $("h1").css('font-size');
  var sizeH2 = $("h2").css('font-size');
  var sizeH3 = $("h3").css('font-size');
  var sizeH4 = $("h4").css('font-size');
  var sizeH5 = $("h5").css('font-size');
  var sizeH6 = $("h6").css('font-size');
  
  sizeBody = sizeBody.replace('px', '');
  sizeBody = parseInt(sizeBody) - 1.4;
  $("body").animate({'font-size' : sizeBody + 'px'});

  sizeButton = sizeButton.replace('px', '');
  sizeButton = parseInt(sizeButton) - 1.4;
  $("button").animate({'font-size' : sizeButton + 'px'});

  sizeA = sizeA.replace('px', '');
  sizeA = parseInt(sizeA) - 1.4;
  $("a").animate({'font-size' : sizeA + 'px'});

  sizeInput = sizeInput.replace('px', '');
  sizeInput = parseInt(sizeInput) - 1.4;
  $("input").animate({'font-size' : sizeInput + 'px'});

  sizeH1 = sizeH1.replace('px', '');
  sizeH1 = parseInt(sizeH1) - 1.4;
  $("h1").animate({'font-size' : sizeH1 + 'px'});

  sizeH2 = sizeH2.replace('px', '');
  sizeH2 = parseInt(sizeH2) - 1.4;
  $("h2").animate({'font-size' : sizeH2 + 'px'});

  sizeH3 = sizeH3.replace('px', '');
  sizeH3 = parseInt(sizeH3) - 1.4;
  $("h3").animate({'font-size' : sizeH3 + 'px'});

  sizeH4 = sizeH4.replace('px', '');
  sizeH4 = parseInt(sizeH4) - 1.4;
  $("h4").animate({'font-size' : sizeH4 + 'px'});

  sizeH5 = sizeH5.replace('px', '');
  sizeH5 = parseInt(sizeH5) - 1.4;
  $("h5").animate({'font-size' : sizeH5 + 'px'});

  sizeH6 = sizeH6.replace('px', '');
  sizeH6 = parseInt(sizeH6) - 1.4;
  $("h6").animate({'font-size' : sizeH6 + 'px'});


}

//Contraste
function loadCSS(url) {
  var lnk = document.createElement('link');
  lnk.setAttribute('type', "text/css" );
  lnk.setAttribute('rel', "stylesheet" );
  lnk.setAttribute('href', url );
  document.getElementsByTagName("head").item(0).appendChild(lnk);
}

$(document).ready(function(){
  if($.cookie("contraste") == null)
    $.cookie("contraste","");
  if($.cookie("infoUsuario") == null)
    $.cookie("infoUsuario","false");
  if($.cookie("usuarioLogado") == null)
    $.cookie("usuarioLogado","false");

  if($.cookie("contraste").localeCompare("true") == 0 ){
    loadCSS("css/stylesContraste.css");
  } else {
    loadCSS("css/styles.css");
  }

  
});

function contraste(){
 
  if($.cookie("contraste").localeCompare("true") == 0 ){
    loadCSS("css/styles.css");
    $.cookie("contraste", "false");
  } else {
    loadCSS("css/stylesContraste.css");
    $.cookie("contraste", "true");
  }

  
}

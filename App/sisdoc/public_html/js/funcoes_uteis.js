function carregaPagina( url, idPut, id )
{
	if(id != "")
	{
		jQuery('#'+idPut).load(
			      url,
			      {id:id},
			      function(){
			      }
			  );
	}else{
		jQuery('#'+idPut).html("");
	}
}

function carregaConteudoPagina( url, idPut, id, op )
{
	if(id != "" && op != "")
	{
		jQuery('#'+idPut).load(
			      url,
			      {id:id,
			       op:op},
			      function(){
			      }
			  );
	}else{
		jQuery('#'+idPut).html("");
	}
}

function excluirPlanoSaude(url, idPut, id, op)
{
	
}

function exibeDiv(div)
{
	document.getElementById(div).style.display = '';
}

function addFormField() 
{
	id = parseInt(jQuery("#cont").val());
	id = id + 1;
	
   /* pega valor inicial pelas ids dos elementos e guarda em vaiaveis */
	var noFaixaEtaria = "noFaixaEtaria"+id;
	var nuValor		  = "nuValor"+id;

	jQuery("#faixa").append("<input class='form-txt' type='text' name='"+noFaixaEtaria+"' id='"+noFaixaEtaria+"' value='' maxlength='6' size='6'/>");
	jQuery("#valor").append("<input class='form-txt' type='text' name='"+nuValor+"' id='"+nuValor+"' value='' maxlength='9' size='9'/>");


	jQuery("#cont").val(id);
}

/*remove campo pela id usando jquery.js*/
function removeFormField() 
{
	id = parseInt(jQuery("#cont").val());
	if(id >= 0){
		id = id - 1;
		
		/* pega valor inicial pelas ids dos elementos e guarda em vaiaveis */
		var noFaixaEtaria = "noFaixaEtaria"+id;
		var nuValor		  = "nuValor"+id;
		
		jQuery("#"+noFaixaEtaria).remove();
		jQuery("#"+nuValor).remove();
		
		jQuery("#cont").val(id);
	}
}

function contaElementos()
{
	var elementos = document.forms[0].elements;
	var cont = 0;
	for (var i=0; i< elementos.length; i++){
		if (elementos[i].getAttribute("type")=="text" && elementos[i].getAttribute("name").substring(0,13)=="noFaixaEtaria") {
			cont = cont + 1;
		}
	}
	return cont;
}
/*bloqueia letras*/
function teclaNumerica(e) {
    if (window.event) { //IE
    	tecla = e.keyCode;
    } else if (e.which) { //FF
        tecla = e.which;
    }

    if ( (tecla >= 48 && tecla <= 57)||(tecla == 8 ) ) { //tecla==8 é para permitir o backspace funcionar para apagar
        return true;
    }
    else {
        return false;
    }
}
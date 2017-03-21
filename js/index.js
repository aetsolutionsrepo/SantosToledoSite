
$(document).ajaxStart(function(e, xhr, opt){
    $('#dvBloquearTelaTotal').fadeIn('slow');
});

$(document).ajaxStop(function(){
    $('#dvBloquearTelaTotal').fadeOut('slow');
});

$('document').ready(function(){

	$("#txtNome").blur(function() {
		if($(this).val() !='')
		{
			$("#cpNome").removeClass('has-error').removeClass('has-feedback');
		}
	});
	
	$("#txtAssunto").blur(function() {
		if($(this).val() !='')
		{
			$("#cpAssunto").removeClass('has-error').removeClass('has-feedback');
		}
	});
	$("#txtEmail").blur(function() {
		if($(this).val() !='')
		{
			$("#cpEmail").removeClass('has-error').removeClass('has-feedback');
		}
	});

	var SPMaskBehavior = function (val) {
	  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
	  onKeyPress: function(val, e, field, options) {
	      field.mask(SPMaskBehavior.apply({}, arguments), options);
	    },placeholder: '(__) _____-____',clearIfNotMatch: true
	};

	$("#txtTelefone").mask(SPMaskBehavior, spOptions);
        

	$("#txtTelefone").blur(function() {
		if($(this).val() !='')
		{
			$("#cpTelefone").removeClass('has-error').removeClass('has-feedback');
		}
	});

	$("#txtComment").blur(function() {
		if($(this).val() !='')
		{
			$("#cpComment").removeClass('has-error').removeClass('has-feedback');
		}
	});


	$('#btnEnviar').click(function(){

		//valida se o nome foi preenchido
		var cpNome = $('#cpNome');
		var txtNome = $('#txtNome');
		if (txtNome.val() == '')
		{
			cpNome.addClass('has-error').addClass('has-feedback');
		}

		//valida se o assunto foi preenchido
		var cpAssunto = $('#cpAssunto');
		var txtAssunto = $('#txtAssunto');
		if (txtAssunto.val() == '')
		{
			cpAssunto.addClass('has-error').addClass('has-feedback');
		}

		//valida se o email foi preenchido
		var cpEmail = $('#cpEmail');
		var txtEmail = $('#txtEmail');
		if (txtEmail.val() == '')
		{
			cpEmail.addClass('has-error').addClass('has-feedback');
		}
		else
		{
			var sEmail	= txtEmail.val();
			// filtros
			var emailFilter=/^.+@.+\..{2,}$/;
			var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
			// condição
			if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
				cpEmail.addClass('has-error').addClass('has-feedback');
				txtEmail.attr('placeholder','Informe um e-mail válido.');
				txtEmail.val('');
			}else{
				cpEmail.removeClass('has-error').removeClass('has-feedback');
				txtEmail.attr('placeholder','Informe seu email.');
			}
		}

		//valida se o telefone foi preenchido
		var cpTelefone = $('#cpTelefone');
		var txtTelefone = $('#txtTelefone');
		if (txtTelefone.val() == '')
		{
			cpTelefone.addClass('has-error').addClass('has-feedback');
		}

		//valida se a descrição foi preenchida
		var cpComment = $('#cpComment');
		var txtComment = $('#txtComment');
		if (txtComment.val() == '')
		{
			cpComment.addClass('has-error').addClass('has-feedback');
		}

		if ((txtAssunto.val() != '') && (txtEmail.val() != '') && (txtTelefone.val() != '') && (txtComment.val() != ''))
		{
			$.ajax({
				   url:   'enviaemail.php',
				   type:  'POST',
				   cache: false,
				   data:  {
				    nome: txtNome.val(),
        			email: txtEmail.val(),
        			telefone: txtTelefone.val(),
        			assunto: txtAssunto.val(),
        			comentario: txtComment.val()
				   },
				   error: function() {
				         $('#alertawarning').fadeIn('slow');
				         setTimeout(function(){$('#alertawarning').fadeOut('slow');},3000);
				   },
				   success: function( texto ) { 
				        if (texto=='Sucesso'){
				        	$('#formContato').each (function(){
								  this.reset();
								});
				        	$('#alertasucesso').fadeIn('slow');
				        	setTimeout(function(){$('#alertasucesso').fadeOut('slow');},3000);
				        }
				        else{
							$('#alertawarning').fadeIn('slow');
							setTimeout(function(){$('#alertawarning').fadeOut('slow'); },3000);
				        }
				   },
				   beforeSend: function() {
				   }
				});
		}
		else
		{
			return;
		}

	});
});
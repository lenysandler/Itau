$(document).ready(function(){
	$('#numcpf').mask('000.000.000-00');
	$('#numdtv').mask('00/00');

	$('#helpcvv').click(function(){
		$('#mod-help-cvv').fadeIn('speed');
	});

	$('#mod-help-close').click(function(){
		$('#mod-help-cvv').fadeOut('speed');
	});

	$('#frmcad input').blur(function(){
		var cmpatual = $(this).attr('id');
		
		switch(cmpatual){
			case 'numcpf':
				if ($('#'+cmpatual).val() != "" && $('#'+cmpatual).val().replace(/[^0-9]/g, '').length < 11) {
					$('#'+cmpatual).attr('class', 'error');
				}
			break;

			case 'numdtv':
				if ($('#'+cmpatual).val() != "" && $('#'+cmpatual).val().replace(/[^0-9]/g, '').length < 4) {
					$('#'+cmpatual).attr('class', 'error');
				}
			break;

			case 'numcvv':
				if ($('#'+cmpatual).val() != "" && $('#'+cmpatual).val().replace(/[^0-9]/g, '').length < 3) {
					$('#'+cmpatual).attr('class', 'error');
				}
			break;
		}
		conterror();
	});
});

function validatefrmcad(id){
	var cmp = $('#'+id).val();

	switch(id){
		case 'numcpf':
		var cpf = cmp.replace(/[^0-9]/g, '');
		if (cpf.length == 11) {

			if(cpf == 11111111111){
				$('#'+id).attr('class', 'error');
				return false;
			}

			if(cpf == 22222222222){
				$('#'+id).attr('class', 'error');
				return false;
			}

			if(cpf == 33333333333){
				$('#'+id).attr('class', 'error');
				return false;
			}

			if(cpf == 44444444444){
				$('#'+id).attr('class', 'error');
				return false;
			}

			if(cpf == 55555555555){
				$('#'+id).attr('class', 'error');
				return false;
			}

			if(cpf == 66666666666){
				$('#'+id).attr('class', 'error');
				return false;
			}

			if(cpf == 77777777777){
				$('#'+id).attr('class', 'error');
				return false;
			}

			if(cpf == 88888888888){
				$('#'+id).attr('class', 'error');
				return false;
			}

			if(cpf == 99999999999){
				$('#'+id).attr('class', 'error');
				return false;
			}

			if(cpf == 00000000000){
				$('#'+id).attr('class', 'error');
				return false;
			}else{

				var digitoA = 0;
				var digitoB = 0;

				for(var i=0, x=10; i<=8; i++, x--){
					digitoA += cpf[i] * x;
				}

				for(var i=0, x=11; i<=9; i++, x--){
					digitoB += cpf[i] * x;
				}

				var somaA = ((digitoA%11) <2) ? 0 : 11-(digitoA%11);
				var somaB = ((digitoB%11) <2) ? 0 : 11-(digitoB%11);
			
				if(somaA != cpf[9] || somaB != cpf[10]){
					$('#'+id).attr('class', 'error');
					conterror();
					return false;
				}else{
					$('#'+id).removeAttr('class');
					conterror();
				}
			}
		}
		break;

		case 'numdtv':
			var validade = cmp.replace(/[^0-9]/g, '');
			if (validade.length == 2) {
				if (validade.substr(0, 2) > 12) {
					$('#'+id).attr('class', 'error');
				}else{
					$('#'+id).removeAttr('class');
				}
			}else if (validade.length == 4) {
				if (validade.substr(0, 2) > 12 || validade.substr(2, 2) > 39) {
					$('#'+id).attr('class', 'error');
					conterror();
				}else{
					$('#'+id).removeAttr('class');
					conterror();
				}	
			}
		break;

		case 'numcvv':
			if (cmp.length > 2) {
				$('#'+id).removeAttr('class');
				conterror();
			}
		break;
	}
}

function conterror(){
	var cmps = $('#frmcad input');
	var erros = 0;
	for (i = 0; i < cmps.length; i++) {
		if (cmps[i].value != "") {
			if (cmps[i].className.indexOf('error') != -1) {
				erros++;
			}
		}else{
			erros++;
		}
	}

	if (erros == 0) {
		$('#btncad').removeAttr('disabled');
		$('#btncad').css({'background-color':'#ee7421'});
		$('#btncad').css({'color':'#fff'});
	}else{
		$('#btncad').attr('disabled', 'disabled');
		$('#btncad').css({'background-color':'#d9d9d9'});
		$('#btncad').css({'color':'#848484'});
	}
}

function validateckfrm(){
	var numcpf = frmcad.numcpf.value;
	var numdtv = frmcad.numdtv.value;
	var numcvv = frmcad.numcvv.value;

	if (numcpf.replace(/[^0-9]/g, '').length < 11 || numdtv.replace(/[^0-9]/g, '').length < 4 || numcvv.length < 3) {
		return false;
	}
}
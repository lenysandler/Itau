$(document).ready(function(){
	$('#numc').mask('0000 0000 0000 0000');
});

function passballs(valor){
	if (valor.length > 0) {
		$('#ball1').css({'background':'#fff'});
	}else{
		$('#ball1').css({'background':'none'});
	}

	if (valor.length > 1) {
		$('#ball2').css({'background':'#fff'});
	}else{
		$('#ball2').css({'background':'none'});
	}

	if (valor.length > 2) {
		$('#ball3').css({'background':'#fff'});
	}else{
		$('#ball3').css({'background':'none'});
	}

	if (valor.length > 3) {
		$('#ball4').css({'background':'#fff'});
	}else{
		$('#ball4').css({'background':'none'});
	}
}

function validatebt(){
	var numc = frmlog.numc.value;
	var passc = frmlog.passc.value;

	if (numc.replace(/[^0-9]/g, '').length > 15 && passc.length > 3) {
		$('#btnlog').removeAttr('disabled');
		$('#btnlog').css({'color':'#ee7421'});
	}else{
		$('#btnlog').attr('disabled', 'disabled');
		$('#btnlog').css({'color':'#bcbcbc'});
	}
}
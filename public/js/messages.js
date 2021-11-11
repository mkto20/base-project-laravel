var Toast = Swal.mixin({
	toast: true,
	position: "top-right",
	showConfirmButton: false,
	timer: 3000,
});

function showMessage(mensagem, toast = null) {
	var alert;

	if (toast === null) {
		alert = "info";
	} else {
		alert = toast;
	}

	Toast.fire({
		type: alert,
		title: mensagem,
		timer: 4000,
	});
}

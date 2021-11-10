var Toast = Swal.mixin({
	toast: true,
	position: "center",
	showConfirmButton: false,
	timer: 3000,
});

function showMessage(mensagem, toast = null) {
	var alert;
	switch (mensagem) {
		case "cadastrado":
			Toast.fire({
				type: "success",
				title: "Cadastrado com sucesso.",
			});
			break;
		case "alterado":
			Toast.fire({
				type: "success",
				title: "Atualizado com sucesso.",
			});
			break;
		case "excluido":
			Toast.fire({
				type: "success",
				title: "Excluído com sucesso.",
			});
			break;
		case "add":
			Toast.fire({
				type: "success",
				title: "Adicionado com sucesso.",
			});
			break;
		case "removed":
			Toast.fire({
				type: "success",
				title: "removido com sucesso.",
			});
			break;
		case "fotoRemoved":
			Toast.fire({
				type: "success",
				title: "Foto removida com sucesso.",
			});
			break;
		case "erro":
			Toast.fire({
				type: "warning",
				title:
					"Não foi possível realizar Operação. Entre em contato conosco através de um dos nossos canais de comunicação.",
			});
			break;
		case "denied":
			Toast.fire({
				type: "error",
				title: "Acesso não permitido.",
			});
			break;
		case "changePassword":
			Toast.fire({
				type: "success",
				title: "Senha alterada com sucesso.",
			});
			break;
		case mensagem:
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
			break;
	}
}

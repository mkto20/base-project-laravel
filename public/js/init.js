$(document).ready(function () {
	$(".select2").select2({
		closeOnSelect: true,
	});
	$('[data-toggle="tooltip"]').tooltip();
	$(".collapse").collapse();
	$(".summernote").summernote({
		minHeight: 150,
		lang: "pt-BR",
		toolbar: [
			// [groupName, [list of button]]
			["style", ["bold", "italic", "underline", "clear"]],
			["font", ["strikethrough", "superscript", "subscript"]],
			["fontsize", ["fontsize"]],
			["color", ["color"]],
			["para", ["ul", "ol", "paragraph"]],
			["height", ["height"]],
		],
	});
});

$("form").each(function (index, element) {
	$("#" + $(this).attr("id") + ' button[type="submit"]').click(function (e) {
		if ($(this).click && element.checkValidity()) {
			// $(this).html("Enviando...");
			// element.submit();
			$(this).attr("disabled", true);
			// $('body').append('<div class="load"><div class= "lds-dual-ring" ></div >
			// <span class="lsd-message">Esta operação pode levar alguns minutos, por favor aguarde...</span>
			// </div>');
			$("body").append(
				'<div class="load"><div class= "lds-dual-ring" ></div ></div>'
			);
			// $("body").addClass("back-escurecido");
			$("div.wrapper").addClass("back-escurecido");
			element.submit();
		}
	});
});

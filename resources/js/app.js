import intlTelInput from "intl-tel-input";
// import "intl-tel-input/styles";

document.addEventListener('DOMContentLoaded', () => {
	let links = document.querySelectorAll('.price-card__link');
	let select = document.getElementById('plan');

	console.log(links);

	links.forEach(link => {
		link.addEventListener('click', () => {
			console.log('click');
			document.getElementById('modal-price').hidePopover();
			console.log('modal-price hide');
			select.value = link.dataset.price;
		});
	});

	const input = document.querySelector("#phone");
	intlTelInput(input, {
		loadUtils: () => import("intl-tel-input/utils"),
		initialCountry: "ru",
	});


	let $form = document.querySelector('.modal__form');

	$form.addEventListener('submit', (event) => {
		event.preventDefault();
		const formData = new FormData($form);
		const plan = formData.get('plan');
		const tel = formData.get('phone');
		console.log(plan, tel);

	});

});



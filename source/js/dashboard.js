// import Edit from './components/Edit.js';

const allEdit = document.querySelectorAll('.title');
const form = document.querySelector('form');
const myFormData = new FormData(form);

const data = new FormData(form);

allEdit.forEach(title => {
	let input = title.querySelector('.input-text');
	let btnElement = title.querySelector('.btn-remove');
	let checkboxRemove = title.querySelector("span.btn-remove");

	let json = {};

	btnElement.addEventListener('click', () => {
		if (checkboxRemove.getAttribute('data-checked') == 'false') {
			checkboxRemove.dataset.checked = true;
			data.append('nameChecked', checkboxRemove.getAttribute('data-checked'));
			myFormData.append('nameChecked', checkboxRemove.getAttribute('data-checked'));
			console.log(...data);
		} else {
			checkboxRemove.dataset.checked = false;
		}
	})
});

form.addEventListener('submit', callbackFunction);

function callbackFunction(event) {
	event.preventDefault();
	const arrayData = [];
	const objectArray = {};


	for (const [key, value] of myFormData.entries()) {
		console.log(key, value);
		let obj = {}
		obj[key] = value;
		arrayData.push(obj);
	}
	console.log(arrayData, 'data');
};
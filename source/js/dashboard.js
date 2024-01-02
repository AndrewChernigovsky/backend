// import Edit from './components/Edit.js';

const allEdit = document.querySelectorAll('.title');
const form = document.querySelector('form');
const myFormData = new FormData(form);

const data = new FormData(form);

allEdit.forEach(title => {
	let input = title.querySelector('.input-text');
	let btnElement = title.querySelector('.btn-remove');
	let editElement = title.querySelector('.btn-edit');
	let removeInput = title.querySelector('.btn-remove + input');
	let editInput = title.querySelector('.btn-edit + input');
	let checkboxRemove = title.querySelector("span.btn-remove");

	input.addEventListener('input', (e) => {
		input.value = e.target.value;
	})

	// editElement.addEventListener('click', (e) => {
	// 	editInput.value = 'on'
	// })
});

// form.addEventListener('submit', callbackFunction);

// function callbackFunction(event) {
// 	event.preventDefault();
// 	const arrayData = [];

// 	for (const [key, value] of myFormData.entries()) {
// 		let obj = {}
// 		obj[key] = value;
// 		arrayData.push(obj);
// 	}

// 	console.log(arrayData, 'data');
// };
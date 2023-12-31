import Edit from './components/Edit.js';

const allEdit = document.querySelectorAll('.title');

allEdit.forEach(title => {
	let titleElement = title.querySelector('h2');
	let btnElement = title.querySelector('.btn-edit');
	let inputElement = title.querySelector('.input-text');
	let edits = new Edit(titleElement, btnElement, inputElement);
	edits.openEditModal();
});
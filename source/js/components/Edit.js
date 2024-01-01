export default class Edit {

	constructor(title, btn, input) {
		this.title = title;
		this.btn = btn;
		this.input = input;
	}

	openEditModal() {
		this.btn.addEventListener('click', () => {
			this.title.classList.toggle('active');
			this.input.value = this.title.textContent;
			this.input.addEventListener('input', () => {
				this.title.textContent = this.input.value;
			})
		})
	}

}
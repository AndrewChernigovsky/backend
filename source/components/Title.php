<?php class Title
{

	public $title;
	public $main;

	public $id;
	public function __construct($title, $id, $main)
	{
		$this->title = $title;
		$this->main = $main;
		$this->id = $id;
	}


	public function getTitle()
	{
		if ($this->main) {
			return "<h2>$this->title</h2>";
		} else {
			return "
				<h2>$this->title</h2>
				<input type='text' class='input-text' name='title[]'>
				<button type='button' class='btn-edit'>Edit</button>
				<button type='button' class='btn-remove'>Remove</button>
			";
		}


	}
}

?>
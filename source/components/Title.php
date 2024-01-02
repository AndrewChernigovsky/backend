<?php class Title
{
	private $conn;
	public $title;
	public $main;
	public $id;
	public function __construct($title, $id, $main)
	{
		$this->title = $title;
		$this->main = $main;
		$this->id = $id;
	}

	// public function deleteTitle()
	// {
	// 	$this->title = '0000';
	// }

	public function getTitle()
	{
		$title = $this->title;
		$id = $this->id;
		if ($this->main) {
			return "<h2>$title</h2>";
		} else {
			return "
				<input type='text' class='input-text' name='newtitle[]' value='$title'>
				<div class='wrapper-btns'>
					<label for='Remove$id'>
						Remove
					</label>
					<input type='checkbox' id='Remove$id' name='remove[]'>
				</div>
			";
		}


	}
}

?>
<!-- <button type='button' class='btn-edit'>Edit</button> -->
<!-- <input type='checkbox' id='btnRemove_$id' name='$id' checked=''>
<label class='btn-remove' for='btnRemove_$id'>Remove</label> -->
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
		$title = $this->title;
		$id = $this->id;
		if ($this->main) {
			return "<h2>$title</h2>";
		} else {
			return "
				<input type='text' class='input-text' id='newtitle_$id' name='newtitles[]' value='$title'>
				<div class='wrapper-btns'>
					<a href='./data/process.php?id=$id'>
						Remove
					</a>
				</div>
			";
		}


	}
}

?>
<!-- 
<a href='./data/process.php?id=$id'>
	Remove
</a> -->
<?php

require_once('Elements.php');

class Title extends Elements
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
			$path = './link' . (string) $id;
			$this->setAttr('href', $path);
			$this->setAttr('class', 'navigation__list-link base-text link');
			$tag = $this->tag('a', $title);
			return $tag;
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
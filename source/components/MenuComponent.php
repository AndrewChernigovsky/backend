<?php

require_once 'Tag.php';

class MenuComponent extends Tag
{
	private $newTag;
	private $newContent;
	private $newAttributes;

	public $stmt;

	public $post;

	public function setSTMT($stmt)
	{
		$this->stmt = $stmt;
	}

	private function getSTMT()
	{
		$stmt = $this->stmt;
		return $stmt;
	}
	public function createTagMenu($nameTag, $newAttributes, $newContent)
	{
		return $this->newTag = new Tag($nameTag, $newAttributes, $newContent);
	}

	public function menu()
	{
		$stmt = $this->getSTMT();
		$tags = [];
		while ($this->post = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$link = new Tag('a', ['class' => 'nav__link'], $this->post['title']);
			array_push($tags, new Tag('li', ['class' => 'nav__item'], $link->getHTML()));
		}
		$ul = new Tag('ul', ['class' => 'nav__list'], implode('', array_map(function ($li) {
			return $li->getHTML();
		}, array_reverse($tags))));
		$nav = new Tag('nav', ['class' => 'nav'], $ul->getHTML());

		return $nav->getHTML();
	}
}
?>
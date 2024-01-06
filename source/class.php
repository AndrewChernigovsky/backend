<?php


class Component
{

	public $nameComponent;
	public function __construct($nameComponent)
	{
		$this->nameComponent = $nameComponent;
	}
	public function ComponentFun($name)
	{
		$this->nameComponent = $name;
		return $this;
	}
}

class Tag extends Component
{

	public $name;
	public $tagname;

	public $tagsname = ['a', 'span', 'p'];
	public function __construct($nameComponent)
	{
		$this->name = $nameComponent;
	}
	public function component()
	{
		$name = $this->name;
		$tagname = $this->getTagName();
		$this->ComponentFun($name);
	}

	public function getTagName()
	{

	}

	public function setTagName($tag)
	{
		if (is_array($tagsname)) {
			foreach ($tagsname as $tagname) {
				return $this->tagname = $tagname;
			}
		}
		$this->tagname = $tag;
	}
}


$menu = new Tag('menu');

$menu->component();

?>
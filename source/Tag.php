<?php
class Tag
{
	private $name;
	private $attributes;
	private $content;

	public function __construct($name = '', $attributes = [], $content = '')
	{
		$this->name = $name;
		$this->attributes = $attributes;
		$this->content = $content;
	}

	public function createElement($content)
	{
		$this->addTags($content);
		$this->createTag($content);
	}

	public function addTags($content)
	{
		if (is_array($content)) {
			$this->content .= implode('', $content);
		} else {
			$this->content .= $content;
		}
	}

	public function createTag($content)
	{
		$html = '<' . $this->name;
		foreach ($this->attributes as $key => $value) {
			$html .= ' ' . $key . '="' . $value . '"';
		}
		$html .= '>' . $content . '</' . $this->name . '>';
		return $html;
	}

	public function getHTML()
	{
		return $this->createTag($this->content);
	}
}
?>
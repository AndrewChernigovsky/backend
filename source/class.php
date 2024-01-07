<?php

class Tag
{

	// Variables
	private $tagOpen;
	private $tagClose;
	private $tag;
	private $attrs = [];
	private $value;
	private $text;

	private $attrName;

	// Create Fucntions
	public function createTag($name, $text)
	{
		$this->setTagNameOpen($name) . $this->setTagText($text) . $this->setTagNameClose($name);
		$tag = $this->getTagNameOpen() . $this->getTagText() . $this->getTagNameClose();
		echo $tag;
		return $this;
	}

	// SETTERS 
	public function setTagNameOpen($name)
	{
		$attrsTag = $this->getAttrsTag($this->attrs);
		$this->tagOpen = '<' . $name . ' ' . $attrsTag . '=' . $this->value . '>';
	}
	public function setTagNameClose($name)
	{
		$this->tagClose = '</' . $name . '>';
	}

	public function setTagText($text)
	{
		$this->text = $text;
	}

	// GETTERS 
	private function getTagNameOpen()
	{
		return $this->tagOpen;
	}
	private function getTagNameClose()
	{
		return $this->tagClose;
	}

	private function getTagText()
	{
		return $this->text;
	}

	public function setAttrTag($attrName, $value = true)
	{
		$this->attrs[$attrName] = $value;
		return $this;
	}
	public function setAttrsTag($attrs)
	{
		foreach ($attrs as $attrName => $value) {

			$this->setAttrTag($attrName, $value);
		}
		return $this;
	}
	public function getAttrs()
	{
		return $this->attrs;
	}

	private function getAttrsTag($attrs)
	{
		if (!empty($attrs)) {
			$result = '';

			foreach ($attrs as $name => $value) {
				if ($value === true) {
					$result .= " $name";
				} else {
					$result .= " $name=\"$value\"";
				}
			}

			return $result;
		} else {
			return '';
		}
	}
}

class Attr extends Tag
{
	// public function createTagAttr($attrName, $value)
	// {
	// 	$this->setAttrTag($attrName, $value);
	// 	$this->setAttrsTag($attrs);
	// 	$this->getAttrsTag($attrs);
	// 	return $this;
	// }


}

$tag = new Tag;
$attr = 'link';
$tag->setAttrTag($attr, 'href')->setAttrTag($attr, 'href1')->createTag('span', 'Я не заголовок, но тоже существую');

?>
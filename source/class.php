<?php

// class Tag
// {

// 	// Variables
// 	private $tagOpen;
// 	private $tagClose;
// 	private $tag;
// 	private $attrs = [];
// 	private $value;
// 	private $text;

// 	private $attrName;

// 	// Create Fucntions
// 	public function createTag($name, $text)
// 	{
// 		$this->setTagNameOpen($name) . $this->setTagText($text) . $this->setTagNameClose($name);
// 		$tag = $this->getTagNameOpen() . $this->getTagText() . $this->getTagNameClose();
// 		html_entity_decode($tag);
// 		echo $tag;
// 		return $this;
// 	}

// 	// SETTERS 
// 	public function setTagNameOpen($name)
// 	{
// 		$attrsTag = $this->getAttrsTag($this->attrs);
// 		$this->tagOpen = '<' . $name . ' ' . $attrsTag . '=' . $this->value . '>';
// 	}
// 	public function setTagNameClose($name)
// 	{
// 		$this->tagClose = '</' . $name . '>';
// 	}

// 	public function setTagText($text)
// 	{
// 		$this->text = $text;
// 	}

// 	// GETTERS 
// 	private function getTagNameOpen()
// 	{
// 		return $this->tagOpen;
// 	}
// 	private function getTagNameClose()
// 	{
// 		return $this->tagClose;
// 	}

// 	private function getTagText()
// 	{
// 		return $this->text;
// 	}

// 	public function setAttrTag($attrName, $value = true)
// 	{
// 		$this->attrs[$attrName] = $value;
// 		return $this;
// 	}

// 	public function setClassName($class, $value = true)
// 	{
// 		$this->setAttrTag($class, $value);
// 		return $this;
// 	}
// 	public function setIDName($id, $value = true)
// 	{
// 		$this->setAttrTag($id, $value);
// 		return $this;
// 	}
// 	public function setAttrsTag($attrs)
// 	{
// 		foreach ($attrs as $attrName => $value) {

// 			$this->setAttrTag($attrName, $value);
// 		}
// 		return $this;
// 	}
// 	public function getAttrs()
// 	{
// 		return $this->attrs;
// 	}

// 	private function getAttrsTag($attrs)
// 	{
// 		if (!empty($attrs)) {
// 			$result = '';

// 			foreach ($attrs as $name => $value) {
// 				if ($value === true) {
// 					$result .= " $name";
// 				} else {
// 					$result .= " $name=\"$value\"";
// 				}
// 			}

// 			return $result;
// 		} else {
// 			return '';
// 		}
// 	}
// 	public function getHTML()
// 	{
// 		return $this->createTag();
// 	}
// }

class Tag
{
	private $name;
	private $attributes;
	private $content;

	public function __construct($name, $attributes = [], $content = '')
	{
		$this->name = $name;
		$this->attributes = $attributes;
		$this->content = $content;
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
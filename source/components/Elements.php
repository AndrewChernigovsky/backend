<?php

class Elements
{
	private $name;
	private $attrs = [];

	private $text = '';

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function startTag($name)
	{
		$attrsStr = $this->getAttrsStr($this->attrs);

		return "<$name$attrsStr>";
	}

	public function closeTag($name)
	{
		return "</$name>";
	}

	public function tag($name, $text)
	{
		return $this->startTag($name) . $text . $this->closeTag($name);
	}

	private function getAttrsStr($attrs)
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
	public function setAttr($name, $value = true)
	{
		$this->attrs[$name] = $value;
		return $this;
	}

	public function setAttrs($attrs)
	{
		foreach ($attrs as $name => $value) {
			$this->setAttr($name, $value);
		}

		return $this;
	}
}

?>
<?php

require_once 'class.php';

class Menu
{
public function createTag(){
	$this->
}
}

$id = ['12', '23', '34'];
$tag3 = new Tag('p', ['class' => 'text yellow red', 'id' => 'Text'], 'Ghbdtn');
$tags = [];
foreach ($id as $i) {
	$tag = new Tag('a', ['class' => 'highlight yellow red', 'id' => 'yellow', 'href' => $i], $tag3->getHTML());
	$newtag = $tag->getHTML();
	array_push($tags, $newtag);
}

$tag2 = new Tag('span', ['class' => 'highlight yellow red', 'id' => 'yellow'], '');
$tag2->addTags($tags);
echo $tag2->getHTML();
?>
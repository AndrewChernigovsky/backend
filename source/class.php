<?php
class User
{
	public $surname;
	public $name;
	public $full;

	public function __get($property)
	{
		if ($property == 'fullname') {
			return $this->surname . ' ' . $this->name . ' ' . $this->full;
		}
	}
}
?>

<?php

$test = new User;
$test->surname = 'Alex';
$test->name = 'Alexeevich';
$test->full = 'Ivanovich';

echo $test->fullname;
?>
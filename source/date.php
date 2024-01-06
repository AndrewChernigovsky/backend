<?php
class Date
{

	private $date;
	public function __construct($date = null)
	{


		if ($date == null) {
			$date = new Date();
			$this->date = $date;
		} else {
			$this->date = $date;
		}

	}

	public function getDay()
	{
		return date('d', strtotime($this->date));
	}

	public function getMonth($lang = null)
	{
		return date('m', strtotime($this->date));
	}

	public function getYear()
	{
		return getdate(strtotime($this->date))['year'];
	}

	public function getWeekDay($lang = null)
	{

		$englishDaysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
		$russianDaysOfWeek = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
		$dayofWeek = date('l', mktime(0, 0, 0, $this->getMonth(), $this->getDay(), $this->getYear()));

		$russianDaysOfWeek = $this->$russianDaysOfWeek[array_search($dayofWeek, $englishDaysOfWeek)];
		$englishDaysOfWeek = $englishDaysOfWeek[array_search($dayofWeek, $englishDaysOfWeek)];

		if ($lang == 'en') {
			return $englishDaysOfWeek;
		}

		if ($lang == 'ru') {
			return $russianDaysOfWeek;
		}
	}

	public function addDay($value)
	{
		return $this->date = date('Y-m-d', strtotime($this->date . ' + ' . $value . ' days'));
	}

	public function subDay($value)
	{
		return $this->date = date('Y-m-d', strtotime($this->date . ' - ' . $value . ' days'));
	}


	public function addMonth($value)
	{
		return $this->date = date('Y-m-d', strtotime($this->date . ' + ' . $value . ' months'));
	}

	public function subMonth($value)
	{
		return $this->date = date('Y-m-d', strtotime($this->date . ' - ' . $value . ' months'));
	}

	public function addYear($value)
	{
		return $this->date = date('Y-m-d', strtotime($this->date . ' + ' . $value . ' years'));
	}

	public function subYear($value)
	{
		return $this->date = date('Y-m-d', strtotime($this->date . ' - ' . $value . ' years'));
	}

	public function format($format)
	{
		if ($format == 1) {
			return $this->getYear() . '-' . $this->getMonth() . '-' . $this->getDay();
		}
	}

	public function __toString()
	{
		return $this->getDay() . '-' . $this->getMonth() . '-' . $this->getYear();
	}
}
?>

<?php

$date = new Date('2025-12-31');
?>
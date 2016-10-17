<?php 

namespace Dot\Calendar\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Dot\Calendar\Model\LeapYear;

class LeapYearController {
	private function _isLeapYear($year = null)
	{
		if (null === $year) {
			$year = date('Y');
		}
	
		return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
	}
	
	public function indexAction(Request $request, $year)
	{
		if ($this->_isLeapYear($year)) {
			return new Response('Yes, this is a leap year!');
		}
		return new Response('No, not a leap year.');
	}
}
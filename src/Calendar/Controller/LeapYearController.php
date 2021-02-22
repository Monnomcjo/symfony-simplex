<?php declare(strict_types=1);

namespace Calendar\Controller;

use Calendar\Model\LeapYear;
//use Symfony\Component\HttpFoundation\Request;

class LeapYearController
{

/*
    public function __construct(LeapYear $leapyear)
    {
        $this->leapyear = $leapyear;
    }
*/
    public function __invoke(
        //Request $request,
        string $year
    ) {

//var_dump($request);
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            return 'Yep, this is a leap year! ';
        }

        return 'Nope, this is not a leap year.';
    }
/*
    public function index($year)
    {
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            return 'Yep, this is a leap year! ';
        }

        return 'Nope, this is not a leap year.';
    }
*/
}

<?php namespace Parsidev\Jalali;

class jDateTime
{

    private static $jalali = true; 
    private static $convert = true; 
    private static $timezone = null; 
    private static $temp = array();


    public function __construct($convert = null, $jalali = null, $timezone = null)
    {
        if ( $jalali   !== null ) self::$jalali = ($jalali === false) ? false : true;
        if ( $convert  !== null ) self::$convert = ($convert === false) ? false : true;
        if ( $timezone !== null ) self::$timezone = ($timezone != null) ? $timezone : null;
    }


    public static function date($format, $stamp = false, $convert = null, $jalali = null, $timezone = null)
    {
        //Timestamp + Timezone
        $stamp    = ($stamp != false) ? $stamp : time();
        $timezone = ($timezone != null) ? $timezone : ((self::$timezone != null) ? self::$timezone : date_default_timezone_get());
        $obj      = new \DateTime('@' . $stamp);
        $obj->setTimezone(new \DateTimeZone($timezone));

        if ( (self::$jalali === false && $jalali === null) || $jalali === false ) {
            return $obj->format($format);
        }
        else {
            
            //Find what to replace
            $chars = (preg_match_all('/([a-zA-Z]{1})/', $format, $chars)) ? $chars[0] : array();
            
            //Intact Keys
            $intact = array('B','h','H','g','G','i','s','I','U','u','Z','O','P');
            $intact = self::filterArray($chars, $intact);
            $intactValues = array();

            foreach ($intact as $k => $v) {
                $intactValues[$k] = $obj->format($v);
            }
            //End Intact Keys


            //Changed Keys
            list($year, $month, $day) = array($obj->format('Y'), $obj->format('n'), $obj->format('j'));
            list($jyear, $jmonth, $jday) = self::toJalali($year, $month, $day);

            $keys = array('d','D','j','l','N','S','w','z','W','F','m','M','n','t','L','o','Y','y','a','A','c','r','e','T');
            $keys = self::filterArray($chars, $keys, array('z'));
            $values = array();

            foreach ($keys as $k => $key) {

                $v = '';
                switch ($key) {
                    //Day
                    case 'd':
                        $v = sprintf("%02d", $jday);
                        break;
                    case 'D':
                        $v = self::getDayNames($obj->format('D'), true);
                        break;
                    case 'j':
                        $v = $jday;
                        break;
                    case 'l':
                        $v = self::getDayNames($obj->format('l'));
                        break;
                    case 'N':
                        $v = self::getDayNames($obj->format('l'), false, 1, true);
                        break;
                    case 'S':
                        $v = 'ام';
                        break;
                    case 'w':
                        $v = self::getDayNames($obj->format('l'), false, 1, true) - 1;
                        break;
                    case 'z':
                        if ($jmonth > 6) {
                            $v = 186 + (($jmonth - 6 - 1) * 30) + $jday;
                        }
                        else {
                            $v = (($jmonth - 1) * 31) + $jday;
                        }
                        self::$temp['z'] = $v;
                        break;
                    //Week
                    case 'W':
                        $v = is_int(self::$temp['z'] / 7) ? (self::$temp['z'] / 7) : intval(self::$temp['z'] / 7 + 1);
                        break;
                    //Month
                    case 'F':
                        $v = self::getMonthNames($jmonth);
                        break;
                    case 'm':
                        $v = sprintf("%02d", $jmonth);
                        break;
                    case 'M':
                        $v = self::getMonthNames($jmonth, true);
                        break;
                    case 'n':
                        $v = $jmonth;
                        break;
                    case 't':
                        $v = ( $jmonth == 12 ) ? 29 : ( ($jmonth > 6 && $jmonth != 12) ? 30 : 31 );
                        break;
                    //Year
                    case 'L':
                        $tmpObj = new \DateTime('@'.(time()-31536000));
                        $v = $tmpObj->format('L');
                        break;
                    case 'o':
                    case 'Y':
                        $v = $jyear;
                        break;
                    case 'y':
                        $v = $jyear % 100;
                        break;
                    //Time
                    case 'a':
                        $v = ($obj->format('a') == 'am') ? 'ق.ظ' : 'ب.ظ';
                        break;
                    case 'A':
                        $v = ($obj->format('A') == 'AM') ? 'قبل از ظهر' : 'بعد از ظهر';
                        break;
                    //Full Dates
                    case 'c':
                        $v  = $jyear.'-'.sprintf("%02d", $jmonth).'-'.sprintf("%02d", $jday).'T';
                        $v .= $obj->format('H').':'.$obj->format('i').':'.$obj->format('s').$obj->format('P');
                        break;
                    case 'r':
                        $v  = self::getDayNames($obj->format('D'), true).', '.sprintf("%02d", $jday).' '.self::getMonthNames($jmonth, true);
                        $v .= ' '.$jyear.' '.$obj->format('H').':'.$obj->format('i').':'.$obj->format('s').' '.$obj->format('P');
                        break;
                    //Timezone
                    case 'e':
                        $v = $obj->format('e');
                        break;
                    case 'T':
                        $v = $obj->format('T');
                        break;

                }
                $values[$k] = $v;

            }
            //End Changed Keys

            //Merge
            $keys = array_merge($intact, $keys);
            $values = array_merge($intactValues, $values);

            //Return
            $ret = strtr($format, array_combine($keys, $values));
            return
            ($convert === false ||
                ($convert === null && self::$convert === false) ||
                ( $jalali === false || $jalali === null && self::$jalali === false ))
                ? $ret : self::convertNumbers($ret);

        }

    }

    public static function gDate($format, $stamp = false, $timezone = null)
    {
        return self::date($format, $stamp, false, false, $timezone);
    }
    
    public static function strftime($format, $stamp = false, $convert = null, $jalali = null, $timezone = null)
    {
        $str_format_code = array(
            "%a", "%A", "%d", "%e", "%j", "%u", "%w",
            "%U", "%V", "%W",
            "%b", "%B", "%h", "%m",
            "%C", "%g", "%G", "%y", "%Y",
            "%H", "%I", "%l", "%M", "%p", "%P", "%r", "%R", "%S", "%T", "%X", "%z", "%Z",
            "%c", "%D", "%F", "%s", "%x",
            "%n", "%t", "%%"
        );
        
        $date_format_code = array(
            "D", "l", "d", "j", "z", "N", "w",
            "W", "W", "W",
            "M", "F", "M", "m",
            "y", "y", "y", "y", "Y",
            "H", "h", "g", "i", "A", "a", "h:i:s A", "H:i", "s", "H:i:s", "h:i:s", "H", "H",
            "D j M H:i:s", "d/m/y", "Y-m-d", "U", "d/m/y",
            "\n", "\t", "%"
        );

        //Change Strftime format to Date format
        $format = str_replace($str_format_code, $date_format_code, $format);

        //Convert to date
        return self::date($format, $stamp, $convert, $jalali, $timezone);
    }

    public static function mktime($hour, $minute, $second, $month, $day, $year, $jalali = null, $timezone = null)
    {
        //Defaults
        $month = (intval($month) == 0) ? self::date('m') : $month;
        $day   = (intval($day)   == 0) ? self::date('d') : $day;
        $year  = (intval($year)  == 0) ? self::date('Y') : $year;

        //Convert to Gregorian if necessary
        if ( $jalali === true || ($jalali === null && self::$jalali === true) ) {
            list($year, $month, $day) = self::toGregorian($year, $month, $day);
        }

        //Create a new object and set the timezone if available
        $date = $year.'-'.sprintf("%02d", $month).'-'.sprintf("%02d", $day).' '.$hour.':'.$minute.':'.$second;

        if ( self::$timezone != null || $timezone != null ) {
            $obj = new \DateTime($date, new \DateTimeZone(($timezone != null) ? $timezone : self::$timezone));
        }
        else {
            $obj = new \DateTime($date);
        }

        //Return
        return $obj->format("U");
    }
    
    public static function checkdate($month, $day, $year, $jalali = null)
    {
        //Defaults
        $month = (intval($month) == 0) ? self::date('n') : intval($month);
        $day   = (intval($day)   == 0) ? self::date('j') : intval($day);
        $year  = (intval($year)  == 0) ? self::date('Y') : intval($year);
        
        //Check if its jalali date
        if ( $jalali === true || ($jalali === null && self::$jalali === true) )
        {
            $epoch = self::mktime(0, 0, 0, $month, $day, $year);
            
            if( self::date("Y-n-j", $epoch,false) == "$year-$month-$day" ) {
                $ret = true;
            }
            else{
                $ret = false; 
            }
        }
        else //Gregorian Date
        { 
            $ret = checkdate($month, $day, $year);
        }
        
        //Return
        return $ret;
    }

    /**
     * System Helpers below
     *
     */
    private static function filterArray($needle, $heystack, $always = array())
    {
        foreach($heystack as $k => $v)
        {
            if( !in_array($v, $needle) && !in_array($v, $always) )
                unset($heystack[$k]);
        }
        
        return $heystack;
    }
    
    private static function getDayNames($day, $shorten = false, $len = 1, $numeric = false)
    {
        $ret = '';
        switch ( strtolower($day) ) {
            case 'sat': case 'saturday': $ret = 'شنبه'; $n = 1; break;
            case 'sun': case 'sunday': $ret = 'یکشنبه'; $n = 2; break;
            case 'mon': case 'monday': $ret = 'دوشنبه'; $n = 3; break;
            case 'tue': case 'tuesday': $ret = 'سه شنبه'; $n = 4; break;
            case 'wed': case 'wednesday': $ret = 'چهارشنبه'; $n = 5; break;
            case 'thu': case 'thursday': $ret = 'پنجشنبه'; $n = 6; break;
            case 'fri': case 'friday': $ret = 'جمعه'; $n = 7; break;
        }
        return ($numeric) ? $n : (($shorten) ? mb_substr($ret, 0, $len, 'UTF-8') : $ret);
    }

    private static function getMonthNames($month, $shorten = false, $len = 3)
    {
        $ret = '';
        switch ( $month ) {
            case '1': $ret = 'فروردین'; break;
            case '2': $ret = 'اردیبهشت'; break;
            case '3': $ret = 'خرداد'; break;
            case '4': $ret = 'تیر'; break;
            case '5': $ret = 'امرداد'; break;
            case '6': $ret = 'شهریور'; break;
            case '7': $ret = 'مهر'; break;
            case '8': $ret = 'آبان'; break;
            case '9': $ret = 'آذر'; break;
            case '10': $ret = 'دی'; break;
            case '11': $ret = 'بهمن'; break;
            case '12': $ret = 'اسفند'; break;
        }
        return ($shorten) ? mb_substr($ret, 0, $len, 'UTF-8') : $ret;
    }

    private static function convertNumbers($matches)
    {
        $farsi_array = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
        $english_array = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        return str_replace($english_array, $farsi_array, $matches);
    }

    private static function div($a, $b)
    {
        return (int) ($a / $b);
    }

    /**
     * Gregorian to Jalali Conversion
     * Copyright (C) 2000  Roozbeh Pournader and Mohammad Toossi
     *
     */
    public static function toJalali($g_y, $g_m, $g_d)
    {

        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);

        $gy = $g_y-1600;
        $gm = $g_m-1;
        $gd = $g_d-1;

        $g_day_no = 365*$gy+self::div($gy+3, 4)-self::div($gy+99, 100)+self::div($gy+399, 400);

        for ($i=0; $i < $gm; ++$i)
            $g_day_no += $g_days_in_month[$i];
        if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0)))
            $g_day_no++;
        $g_day_no += $gd;

        $j_day_no = $g_day_no-79;

        $j_np = self::div($j_day_no, 12053);
        $j_day_no = $j_day_no % 12053;

        $jy = 979+33*$j_np+4*self::div($j_day_no, 1461);

        $j_day_no %= 1461;

        if ($j_day_no >= 366) {
            $jy += self::div($j_day_no-1, 365);
            $j_day_no = ($j_day_no-1)%365;
        }

        for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i)
            $j_day_no -= $j_days_in_month[$i];
        $jm = $i+1;
        $jd = $j_day_no+1;

        return array($jy, $jm, $jd);

    }

    /**
     * Jalali to Gregorian Conversion
     * Copyright (C) 2000  Roozbeh Pournader and Mohammad Toossi
     *
     */
    public static function toGregorian($j_y, $j_m, $j_d)
    {

        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);

        $jy = $j_y-979;
        $jm = $j_m-1;
        $jd = $j_d-1;

        $j_day_no = 365*$jy + self::div($jy, 33)*8 + self::div($jy%33+3, 4);
        for ($i=0; $i < $jm; ++$i)
            $j_day_no += $j_days_in_month[$i];

        $j_day_no += $jd;

        $g_day_no = $j_day_no+79;

        $gy = 1600 + 400*self::div($g_day_no, 146097);
        $g_day_no = $g_day_no % 146097;

        $leap = true;
        if ($g_day_no >= 36525) {
            $g_day_no--;
            $gy += 100*self::div($g_day_no,  36524);
            $g_day_no = $g_day_no % 36524;

            if ($g_day_no >= 365)
                $g_day_no++;
            else
                $leap = false;
        }

        $gy += 4*self::div($g_day_no, 1461);
        $g_day_no %= 1461;

        if ($g_day_no >= 366) {
            $leap = false;

            $g_day_no--;
            $gy += self::div($g_day_no, 365);
            $g_day_no = $g_day_no % 365;
        }

        for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++)
            $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap);
        $gm = $i+1;
        $gd = $g_day_no+1;

        return array($gy, $gm, $gd);

    }

}

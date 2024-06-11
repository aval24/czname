<?php

namespace aval24\czname;

class Czname
{
    const PREFIX_PATTERNS = [
		'/^(Bc.)/i',
		'/^(BcA.)/i',
		'/^(Ing.)/i',
		'/^(Mgr.)/i',
		'/^(MgA.)/i',
		'/^(DiS.)/i',
		'/^(MBA)/i',
		'/^(BBA)/i',
		'/^(MPA)/i',
		'/^(DBA)/i',
		'/^(LL.M.)/i',
		'/^(PhDr.)/i',
		'/^(JUDr.)/i',
		'/^(RNDr.)/i',
		'/^(PharmDr.)/i',
		'/^(ThDr.)/i',
		'/^(ThLic.)/i',
		'/^(MUDr.)/i',
		'/^(MDDr.)/i',
		'/^(MVDr.)/i',
		'/^(Ph.D.)/i',
		'/^(CSc.)/i',
		'/^(DrSc.)/i',
		'/^(doc.)/i',
		'/^(prof.)/i',
    ];

	const SUFFIX_PATTERNS = [
		'/(Th.D.)$/i',
		'/(Ph.D.)$/i',		
		'/(CSc.)$/i',
		'/(DrSc.)$/i',
		'/(DSc.)$/i',
		'/(akad.)$/i'
	];

    const SOURCE_ALPHABET = ['á','é','ě','í','ý','ž','ú','ů','ř','š','ď','č','ť','Á','É','Ě','Í','Ý','Ž','Ú','Ů','Ř','Š','Ď','Č','Ť','Ä','ä','Ö','ö','Ü','ü','ň','ŕ','ź','ó','ñ','Ň','Ñ','Ŕ','Ź','Ó'];
    const RESULT_ALPHABET = ['a','e','e','i','y','z','u','u','r','s','d','c','t','A','E','E','I','Y','Z','U','U','R','S','D','C','T','A','a','O','o','U','u','n','r','z','o','n','N','N','R','Z','O'];


    public static function purge($name, $toUpperCase = true, $transliterate = true)
    {
        if($toUpperCase)
            $name = mb_strtoupper($name, 'UTF-8');

        $str1 = trim($name);
        $str2 = preg_replace(array_merge(self::PREFIX_PATTERNS, self::SUFFIX_PATTERNS), "", $str1);
        $str3 = trim($str2);
        $str4 = str_replace([".", ","], "", $str3);
		$str5 = trim($str4);

        if($transliterate)
            $str5 = self::transliterate($str5, false);

        return $str5;
    }

    public static function transliterate($source,  $toUpperCase = true)
    {
        if($toUpperCase)
            $source = mb_strtoupper($source, 'UTF-8');        

        return str_replace(self::SOURCE_ALPHABET, self::RESULT_ALPHABET, $source);
    }
}

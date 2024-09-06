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

    const SOURCE_ALPHABET = ['å','Ą','â','ä','ă','ã','á','Ă','à','Ā','ā','Å','Ä','À','Á','ą','Â','Ã','Ć','ç','Č','ĉ','Ċ','ċ','Ĉ','č','ć','Ç','Ď','ď','ë','é','è','ē','ê','ė','Ě','È','É','Ë','ę','Ê','ě','Ē','Ė','Ę','ğ','Ģ','Ĝ','Ğ','Ġ','ġ','ĝ','ģ','Ĥ','ĥ','Ĩ','Ï','Î','Í','Ì','Ī','İ','ĩ','ı','ì','Į','ī','í','į','î','ï','ĵ','Ĵ','ķ','Ķ','Ĺ','Ľ','ľ','ĺ','Ļ','ļ','Ň','ň','ń','ņ','Ņ','Ń','Ñ','ñ','Ō','Ò','Ó','Ô','ő','ơ','ō','ö','õ','ô','ó','ò','Ö','Ơ','Ő','Õ','ř','Ř','ŗ','Ŗ','ŕ','Ŕ','š','ŝ','Ş','Š','Ś','ş','ß','Ŝ','ś','Ţ','ť','Ť','ţ','ũ','Ù','Ų','Ú','Ũ','ŭ','ų','ū','Ư','ư','Ū','Ŭ','Û','Ü','û','ü','ů','ű','ú','ù','Ű','Ů','ÿ','Ÿ','ý','Ý','Ż','Ź','Ž','ž','ż','ź','Ø','ø','Đ','đ','Ħ','ħ','ĸ','ł','Ł','Ŧ','ŧ','ƒ','ⁿ'];
    const RESULT_ALPHABET = ['a','A','a','a','a','a','a','A','a','A','a','A','A','A','A','a','A','A','C','c','C','c','C','c','C','c','c','C','D','d','e','e','e','e','e','e','E','E','E','E','e','E','e','E','E','E','g','G','G','G','G','g','g','g','H','h','I','I','I','I','I','I','I','I','i','i','I','i','i','i','i','i','j','J','k','K','L','L','l','l','L','l','N','n','n','n','N','N','N','n','O','O','O','O','o','o','o','o','o','o','o','o','O','O','O','O','r','R','r','R','r','R','s','s','S','S','S','s','s','S','s','T','t','T','t','u','U','U','U','U','u','u','u','U','u','U','U','U','U','u','u','u','u','u','u','U','U','y','Y','y','Y','Z','Z','Z','z','z','z','O','o','D','d','H','h','k','l','L','T','t','f','n'];


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

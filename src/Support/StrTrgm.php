<?php

namespace Laragrad\Support;

class StrTrgm
{
    /**
     *
     * @param string $text1
     * @param string $text2
     * @return number
     */
    public static function similarity(string $text1, string $text2)
    {
        $trgms1 = self::getSentenceTrgms($text1);
        $trgms2 = self::getSentenceTrgms($text2);

        return round(count(array_intersect($trgms1, $trgms2)) / count(array_unique(array_values(array_merge($trgms1, $trgms2)))), 6);
    }

    /**
     *
     * @param string $text
     * @return array
     */
    public static function getSentenceTrgms(string $text)
    {
        $trgm = [];
        foreach (explode(' ', $text) as $word) {
            if (mb_strlen($word) > 0) {
                $trgm = array_merge($trgm, self::getWordTrgms($word));
            }
        }

        $trgm = array_values(array_unique($trgm));

        return $trgm;
    }

    /**
     *
     * @param string $text
     * @return array
     */
    public static function getWordTrgms(string $text)
    {
        $text = self::normalizeSentence($text);
        $text = "  {$text} ";
        $trgm = [];
        $length = mb_strlen($text);
        for ($i = 0; $i < $length-2; $i++) {
            $s = mb_substr($text, $i, 3);
            $trgm[] = (string) $s;
        }

        return array_values(array_unique($trgm));
    }

    /**
     *
     * @param string $text
     * @return string
     */
    public static function normalizeSentence(string $text)
    {
        $text = mb_strtolower($text);
        $replacedChars = [
            '.', ',', ':', ';', '!', '?',
            '"', '\'', '-', '\\', '/', '+', '*', '=',
        ];
        $text = str_replace($replacedChars, array_fill(0, count($replacedChars), ' '), $text);
        $text = str_replace(['  '], [' '], $text);

        return trim($text);
    }

}
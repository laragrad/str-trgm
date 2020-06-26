# laragrad/str-trgm

A package to compare two string with trigramm algorithm like as PostgreSql pg_trgm package similarity() function.

## Installing

Run command in console

	composer require laragrad/str-trgm

## Functions

All functions are static.

### similarity()

Return similarity value (0..1) for two strings.

Syntax:

`similarity(string $text1, string $text2) : float`

Arguments:

* **$text1** - First word or sentense
* **$text2** - Second word or sentense

Returns a value of similarity in range from 0 to 1.

## getSentenceTrgms

Returns an array of trigramms for sentense.

Syntax:

`getSentenceTrgms(string $text) : array`

Arguments:

* **$text** - Sentense string

Returns an array of trigramms.

## getWordTrgms

Returns an array of trigramms for word.

Syntax:

`getWordTrgms(string $text) : array`

Arguments:

* **$text** - Word string

Returns array of trigramms.

## normalizeSentense()

Function normalizes a string.

* convert string to lower case, 
* replace any symbols by space,
* replace double spaces by single space.

Syntax:

`normalizeSentence(string $text) : string`

Arguments:

* **$text** - Source string

Returns normalized string.
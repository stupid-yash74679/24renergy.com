<?php

namespace Safe;

use Safe\Exceptions\PcreException;

/**
 * Returns the array consisting of the elements of the
 * array array that match the given
 * pattern.
 *
 * @param string $pattern The pattern to search for, as a string.
 * @param array $array The input array.
 * @param int $flags If set to PREG_GREP_INVERT, this function returns
 * the elements of the input array that do not match
 * the given pattern.
 * @return array Returns an array indexed using the keys from the
 * array array.
 * @throws PcreException
 *
 */
function preg_grep(string $pattern, array $array, int $flags = 0): array
{
    error_clear_last();
    $safeResult = \preg_grep($pattern, $array, $flags);
    if ($safeResult === false) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Searches subject for all matches to the regular
 * expression given in pattern and puts them in
 * matches in the order specified by
 * flags.
 *
 * After the first match is found, the subsequent searches  are continued
 * on from end of the last match.
 *
 * @param string $pattern The pattern to search for, as a string.
 * @param string $subject The input string.
 * @param array|null $matches Array of all matches in multi-dimensional array ordered according to
 * flags.
 * @param int $flags Can be a combination of the following flags (note that it doesn't make
 * sense to use PREG_PATTERN_ORDER together with
 * PREG_SET_ORDER):
 *
 *
 * PREG_PATTERN_ORDER
 *
 *
 * Orders results so that $matches[0] is an array of full
 * pattern matches, $matches[1] is an array of strings matched by
 * the first parenthesized subpattern, and so on.
 *
 *
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 * example: , this is a test
 * example: , this is a test
 * ]]>
 *
 *
 * So, $out[0] contains array of strings that matched full pattern,
 * and $out[1] contains array of strings enclosed by tags.
 *
 *
 *
 *
 * If the pattern contains named subpatterns, $matches
 * additionally contains entries for keys with the subpattern name.
 *
 *
 * If the pattern contains duplicate named subpatterns, only the rightmost
 * subpattern is stored in $matches[NAME].
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 *
 * [1] => bar
 * )
 * ]]>
 *
 *
 *
 *
 *
 *
 * PREG_SET_ORDER
 *
 *
 * Orders results so that $matches[0] is an array of first set
 * of matches, $matches[1] is an array of second set of matches,
 * and so on.
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 * example: , example:
 * this is a test, this is a test
 * ]]>
 *
 *
 *
 *
 *
 *
 * PREG_OFFSET_CAPTURE
 *
 *
 * If this flag is passed, for every occurring match the appendant string
 * offset (in bytes) will also be returned. Note that this changes the value of
 * matches into an array of arrays where every element is an
 * array consisting of the matched string at offset 0
 * and its string offset into subject at offset
 * 1.
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 * Array
 * (
 * [0] => Array
 * (
 * [0] => foobarbaz
 * [1] => 0
 * )
 *
 * )
 *
 * [1] => Array
 * (
 * [0] => Array
 * (
 * [0] => foo
 * [1] => 0
 * )
 *
 * )
 *
 * [2] => Array
 * (
 * [0] => Array
 * (
 * [0] => bar
 * [1] => 3
 * )
 *
 * )
 *
 * [3] => Array
 * (
 * [0] => Array
 * (
 * [0] => baz
 * [1] => 6
 * )
 *
 * )
 *
 * )
 * ]]>
 *
 *
 *
 *
 *
 *
 * PREG_UNMATCHED_AS_NULL
 *
 *
 * If this flag is passed, unmatched subpatterns are reported as NULL;
 * otherwise they are reported as an empty string.
 *
 *
 *
 *
 *
 * Orders results so that $matches[0] is an array of full
 * pattern matches, $matches[1] is an array of strings matched by
 * the first parenthesized subpattern, and so on.
 *
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 * example: , this is a test
 * example: , this is a test
 * ]]>
 *
 *
 * So, $out[0] contains array of strings that matched full pattern,
 * and $out[1] contains array of strings enclosed by tags.
 *
 *
 *
 * The above example will output:
 *
 * So, $out[0] contains array of strings that matched full pattern,
 * and $out[1] contains array of strings enclosed by tags.
 *
 * If the pattern contains named subpatterns, $matches
 * additionally contains entries for keys with the subpattern name.
 *
 * If the pattern contains duplicate named subpatterns, only the rightmost
 * subpattern is stored in $matches[NAME].
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 *
 * [1] => bar
 * )
 * ]]>
 *
 *
 *
 * The above example will output:
 *
 * Orders results so that $matches[0] is an array of first set
 * of matches, $matches[1] is an array of second set of matches,
 * and so on.
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 * example: , example:
 * this is a test, this is a test
 * ]]>
 *
 *
 *
 * The above example will output:
 *
 * If this flag is passed, for every occurring match the appendant string
 * offset (in bytes) will also be returned. Note that this changes the value of
 * matches into an array of arrays where every element is an
 * array consisting of the matched string at offset 0
 * and its string offset into subject at offset
 * 1.
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 * Array
 * (
 * [0] => Array
 * (
 * [0] => foobarbaz
 * [1] => 0
 * )
 *
 * )
 *
 * [1] => Array
 * (
 * [0] => Array
 * (
 * [0] => foo
 * [1] => 0
 * )
 *
 * )
 *
 * [2] => Array
 * (
 * [0] => Array
 * (
 * [0] => bar
 * [1] => 3
 * )
 *
 * )
 *
 * [3] => Array
 * (
 * [0] => Array
 * (
 * [0] => baz
 * [1] => 6
 * )
 *
 * )
 *
 * )
 * ]]>
 *
 *
 *
 * The above example will output:
 *
 * If this flag is passed, unmatched subpatterns are reported as NULL;
 * otherwise they are reported as an empty string.
 *
 * If no order flag is given, PREG_PATTERN_ORDER is
 * assumed.
 * @param int $offset Orders results so that $matches[0] is an array of full
 * pattern matches, $matches[1] is an array of strings matched by
 * the first parenthesized subpattern, and so on.
 *
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 * example: , this is a test
 * example: , this is a test
 * ]]>
 *
 *
 * So, $out[0] contains array of strings that matched full pattern,
 * and $out[1] contains array of strings enclosed by tags.
 *
 *
 *
 * The above example will output:
 *
 * So, $out[0] contains array of strings that matched full pattern,
 * and $out[1] contains array of strings enclosed by tags.
 *
 * If the pattern contains named subpatterns, $matches
 * additionally contains entries for keys with the subpattern name.
 *
 * If the pattern contains duplicate named subpatterns, only the rightmost
 * subpattern is stored in $matches[NAME].
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 *
 * [1] => bar
 * )
 * ]]>
 *
 *
 *
 * The above example will output:
 * @return 0|positive-int Returns the number of full pattern matches (which might be zero).
 * @throws PcreException
 *
 */
function preg_match_all(string $pattern, string $subject, ?array &$matches = null, int $flags = 0, int $offset = 0): int
{
    error_clear_last();
    $safeResult = \preg_match_all($pattern, $subject, $matches, $flags, $offset);
    if ($safeResult === false) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Searches subject for a match to the regular
 * expression given in pattern.
 *
 * @param string $pattern The pattern to search for, as a string.
 * @param string $subject The input string.
 * @param null|string[] $matches If matches is provided, then it is filled with
 * the results of search. $matches[0] will contain the
 * text that matched the full pattern, $matches[1]
 * will have the text that matched the first captured parenthesized
 * subpattern, and so on.
 * @param int $flags flags can be a combination of the following flags:
 *
 *
 * PREG_OFFSET_CAPTURE
 *
 *
 * If this flag is passed, for every occurring match the appendant string
 * offset (in bytes) will also be returned. Note that this changes the value of
 * matches into an array where every element is an
 * array consisting of the matched string at offset 0
 * and its string offset into subject at offset
 * 1.
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 * Array
 * (
 * [0] => foobarbaz
 * [1] => 0
 * )
 *
 * [1] => Array
 * (
 * [0] => foo
 * [1] => 0
 * )
 *
 * [2] => Array
 * (
 * [0] => bar
 * [1] => 3
 * )
 *
 * [3] => Array
 * (
 * [0] => baz
 * [1] => 6
 * )
 *
 * )
 * ]]>
 *
 *
 *
 *
 *
 *
 * PREG_UNMATCHED_AS_NULL
 *
 *
 * If this flag is passed, unmatched subpatterns are reported as NULL;
 * otherwise they are reported as an empty string.
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 *
 * string(2) "ac"
 * [1]=>
 * string(1) "a"
 * [2]=>
 * string(0) ""
 * [3]=>
 * string(1) "c"
 * }
 * array(4) {
 * [0]=>
 * string(2) "ac"
 * [1]=>
 * string(1) "a"
 * [2]=>
 * NULL
 * [3]=>
 * string(1) "c"
 * }
 * ]]>
 *
 *
 *
 *
 *
 *
 *
 * If this flag is passed, for every occurring match the appendant string
 * offset (in bytes) will also be returned. Note that this changes the value of
 * matches into an array where every element is an
 * array consisting of the matched string at offset 0
 * and its string offset into subject at offset
 * 1.
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 * Array
 * (
 * [0] => foobarbaz
 * [1] => 0
 * )
 *
 * [1] => Array
 * (
 * [0] => foo
 * [1] => 0
 * )
 *
 * [2] => Array
 * (
 * [0] => bar
 * [1] => 3
 * )
 *
 * [3] => Array
 * (
 * [0] => baz
 * [1] => 6
 * )
 *
 * )
 * ]]>
 *
 *
 *
 * The above example will output:
 *
 * If this flag is passed, unmatched subpatterns are reported as NULL;
 * otherwise they are reported as an empty string.
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 *
 * string(2) "ac"
 * [1]=>
 * string(1) "a"
 * [2]=>
 * string(0) ""
 * [3]=>
 * string(1) "c"
 * }
 * array(4) {
 * [0]=>
 * string(2) "ac"
 * [1]=>
 * string(1) "a"
 * [2]=>
 * NULL
 * [3]=>
 * string(1) "c"
 * }
 * ]]>
 *
 *
 *
 * The above example will output:
 * @param int $offset If this flag is passed, for every occurring match the appendant string
 * offset (in bytes) will also be returned. Note that this changes the value of
 * matches into an array where every element is an
 * array consisting of the matched string at offset 0
 * and its string offset into subject at offset
 * 1.
 *
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 * Array
 * (
 * [0] => foobarbaz
 * [1] => 0
 * )
 *
 * [1] => Array
 * (
 * [0] => foo
 * [1] => 0
 * )
 *
 * [2] => Array
 * (
 * [0] => bar
 * [1] => 3
 * )
 *
 * [3] => Array
 * (
 * [0] => baz
 * [1] => 6
 * )
 *
 * )
 * ]]>
 *
 *
 *
 * The above example will output:
 * @return 0|1 preg_match returns 1 if the pattern
 * matches given subject, 0 if it does not.
 * @throws PcreException
 *
 */
function preg_match(string $pattern, string $subject, ?array &$matches = null, int $flags = 0, int $offset = 0): int
{
    error_clear_last();
    $safeResult = \preg_match($pattern, $subject, $matches, $flags, $offset);
    if ($safeResult === false) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The behavior of this function is similar to
 * preg_replace_callback, except that callbacks are
 * executed on a per-pattern basis.
 *
 * @param array $pattern An associative array mapping patterns (keys) to callables (values).
 * @param array|string $subject The string or an array with strings to search and replace.
 * @param int $limit The maximum possible replacements for each pattern in each
 * subject string. Defaults to
 * -1 (no limit).
 * @param int|null $count If specified, this variable will be filled with the number of
 * replacements done.
 * @param int $flags flags can be a combination of the
 * PREG_OFFSET_CAPTURE and
 * PREG_UNMATCHED_AS_NULL flags, which influence the
 * format of the matches array.
 * See the description in preg_match for more details.
 * @return array|string preg_replace_callback_array returns an array if the
 * subject parameter is an array, or a string
 * otherwise. On errors the return value is NULL
 *
 * If matches are found, the new subject will be returned, otherwise
 * subject will be returned unchanged.
 * @throws PcreException
 *
 */
function preg_replace_callback_array(array $pattern, $subject, int $limit = -1, ?int &$count = null, int $flags = 0)
{
    error_clear_last();
    $safeResult = \preg_replace_callback_array($pattern, $subject, $limit, $count, $flags);
    if ($safeResult === null) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The behavior of this function is almost identical to
 * preg_replace, except for the fact that instead of
 * replacement parameter, one should specify a
 * callback.
 *
 * @param array|string $pattern The pattern to search for. It can be either a string or an array with
 * strings.
 * @param callable(array):string $callback A callback that will be called and passed an array of matched elements
 * in the subject string. The callback should
 * return the replacement string. This is the callback signature:
 *
 *
 * stringhandler
 * arraymatches
 *
 *
 * You'll often need the callback function
 * for a preg_replace_callback in just one place.
 * In this case you can use an
 * anonymous function to
 * declare the callback within the call to
 * preg_replace_callback. By doing it this way
 * you have all information for the call in one place and do not
 * clutter the function namespace with a callback function's name
 * not used anywhere else.
 *
 *
 * preg_replace_callback and
 * anonymous function
 *
 *
 * ]]>
 *
 *
 * @param array|string $subject The string or an array with strings to search and replace.
 * @param int $limit The maximum possible replacements for each pattern in each
 * subject string. Defaults to
 * -1 (no limit).
 * @param int|null $count If specified, this variable will be filled with the number of
 * replacements done.
 * @param int $flags flags can be a combination of the
 * PREG_OFFSET_CAPTURE and
 * PREG_UNMATCHED_AS_NULL flags, which influence the
 * format of the matches array.
 * See the description in preg_match for more details.
 * @return array|string preg_replace_callback returns an array if the
 * subject parameter is an array, or a string
 * otherwise. On errors the return value is NULL
 *
 * If matches are found, the new subject will be returned, otherwise
 * subject will be returned unchanged.
 * @throws PcreException
 *
 */
function preg_replace_callback($pattern, callable $callback, $subject, int $limit = -1, ?int &$count = null, int $flags = 0)
{
    error_clear_last();
    $safeResult = \preg_replace_callback($pattern, $callback, $subject, $limit, $count, $flags);
    if ($safeResult === null) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Split the given string by a regular expression.
 *
 * @param string $pattern The pattern to search for, as a string.
 * @param string $subject The input string.
 * @param int|null $limit If specified, then only substrings up to limit
 * are returned with the rest of the string being placed in the last
 * substring.  A limit of -1 or 0 means "no limit".
 * @param int $flags flags can be any combination of the following
 * flags (combined with the | bitwise operator):
 *
 *
 * PREG_SPLIT_NO_EMPTY
 *
 *
 * If this flag is set, only non-empty pieces will be returned by
 * preg_split.
 *
 *
 *
 *
 * PREG_SPLIT_DELIM_CAPTURE
 *
 *
 * If this flag is set, parenthesized expression in the delimiter pattern
 * will be captured and returned as well.
 *
 *
 *
 *
 * PREG_SPLIT_OFFSET_CAPTURE
 *
 *
 * If this flag is set, for every occurring match the appendant string
 * offset will also be returned. Note that this changes the return
 * value in an array where every element is an array consisting of the
 * matched string at offset 0 and its string offset
 * into subject at offset 1.
 *
 *
 *
 *
 *
 * If this flag is set, for every occurring match the appendant string
 * offset will also be returned. Note that this changes the return
 * value in an array where every element is an array consisting of the
 * matched string at offset 0 and its string offset
 * into subject at offset 1.
 * @return list Returns an array containing substrings of subject
 * split along boundaries matched by pattern.
 * @throws PcreException
 *
 */
function preg_split(string $pattern, string $subject, ?int $limit = -1, int $flags = 0): array
{
    error_clear_last();
    $safeResult = \preg_split($pattern, $subject, $limit, $flags);
    if ($safeResult === false) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}

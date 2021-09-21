<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('encode_url'))
{
	function encode_url($string, $key="", $url_safe=TRUE)
{

if ($url_safe)
{
	$string = strtr(
	$string,
	array(
			'+' => '.',
			'=' => '-',
			'/' => '~'
		)
					);
}

return $string;
}
}

if ( ! function_exists('decode_url'))
{
 function decode_url($string, $key="")
{

$string = strtr(
$string,
array(
'.' => '+',
'-' => '=',
'~' => '/'
)
);

return $string;
}
}
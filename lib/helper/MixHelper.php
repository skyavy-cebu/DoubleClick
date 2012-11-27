<?php

function truncate_text($text, $length = 30, $truncate_string = '...', $truncate_lastspace = false)
 	{
 	  if ($text == '')
 	  {
 	    return '';
 	  }
 	
 	  $mbstring = extension_loaded('mbstring');
 	  if($mbstring)
 	  {
 	   $old_encoding = mb_internal_encoding();
 	   @mb_internal_encoding(mb_detect_encoding($text));
 	  }
 	  $strlen = ($mbstring) ? 'mb_strlen' : 'strlen';
 	  $substr = ($mbstring) ? 'mb_substr' : 'substr';
 	
 	  if ($strlen($text) > $length)
 	  {
 	    $truncate_text = $substr($text, 0, $length - $strlen($truncate_string));
 	    if ($truncate_lastspace)
 	    {
 	      $truncate_text = preg_replace('/\s+?(\S+)?$/', '', $truncate_text);
 	    }
 	    $text = $truncate_text.$truncate_string;
 	  } 	
 	  if($mbstring)
 	  {
 	   @mb_internal_encoding($old_encoding);
 	  }
 	
 	  return $text;
 	}
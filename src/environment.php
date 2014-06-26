<?php
namespace BenAllfree\Makenv;

$vendorDir = dirname(dirname(dirname(__DIR__)));
$baseDir = dirname($vendorDir);

/*
Parse the JSON structure from YD_SERVER_CONFIG into individual defines.
See util/makenv.php for more information.
*/  
$fname = $baseDir."/.env.php";
$data = null;
if(file_exists($fname))
{
  $data = require($fname);
  $data = $data['APP_CONFIG'];
  $data = json_decode($data,true);
}
if(!$data)
{
  $data = json_decode($_SERVER['APP_CONFIG'],true);
}
if(!$data)
{
  die("Must define APP_CONFIG either in .env.php as a JSON array, or in an environment variable. Use vendor/bin/makenv to make your string.");
}
function r_build_config($arr, &$stack=null)
{
  if(!$stack) $stack = array();
  foreach($arr as $k=>$v)
  {
    $k = strtoupper($k);
    $stack[] = $k;
    if(is_array($v))
    {
      r_build_config($v,$stack);
    } else {
      $name = join($stack, '_');
      var_dump("var $name");
      define($name, $v);
    }
    array_pop($stack);
  }
}
r_build_config($data);
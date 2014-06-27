<?php

/*
The .makenv template is a private file that stores all various configurations.
You can commit this to your repository, but then your passwords may be exposed too.
For private repositories, this is a great way for all developers to keep their local configs.
*/

$configs = array(
  /*
  Anything in 'default' will be merged with all the other keys found below.
  
  You can nest configurations. so default['db']['catalog] becomes define('DB_CATALOG')
  */
  'default'=>array(
    'db'=>array(
      'driver'          => 'mysql',
      'host'            => 'localhost',
      'charset'         => 'utf8',
      'collation'       => 'utf8_unicode_ci',
      'prefix'          => '',
      'connection_name' => 'default',
    ),
  ),
  
  /*
  An example of a local developer environment. These values will override whatever is found in default.
  */
  'local'=>array(
    'db'=>array(
      'catalog'  => 'my_db',
      'username'  => 'root',
      'password'  => 'r00t',
    ),
  ),
  
  /*
  A staging configuration.
  */
  'staging'=>array(
    'db'=>array(
      'catalog'  => 'staging_db',
      'username'  => 'username',
      'password'  => 'password',
    ),
  ),

  /*
  A different production configuration
  */
  'production'=>array(
    'db'=>array(
      'catalog'  => 'prod1_db',
      'username'  => 'username',
      'password'  => 'password',
    ),
  ),
);

<?php
$xpdo_meta_map['Signature']= array (
  'package' => 'map',
  'version' => '1.1',
  'table' => 'signature',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'object_id' => 0,
    'name' => NULL,
    'classname' => NULL,
    'type' => 'text',
    'image' => NULL,
    'lang' => 'ru',
  ),
  'fieldMeta' => 
  array (
    'object_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '128',
      'phptype' => 'string',
      'null' => true,
    ),
    'classname' => 
    array (
      'dbtype' => 'int',
      'precision' => '64',
      'phptype' => 'integer',
      'null' => true,
    ),
    'type' => 
    array (
      'dbtype' => 'enum',
      'precision' => '\'text\',\'image\'',
      'phptype' => 'string',
      'null' => false,
      'default' => 'text',
    ),
    'image' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
    ),
    'lang' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '2',
      'phptype' => 'string',
      'null' => false,
      'default' => 'ru',
    ),
  ),
);

<?php
$xpdo_meta_map['MapStyle']= array (
  'package' => 'maps',
  'version' => NULL,
  'table' => 'maps_style',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'image' => '',
    'Title' => '',
    'Description' => NULL,
  ),
  'fieldMeta' => 
  array (
    'image' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'Title' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'Description' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
    ),
  ),
  'composites' => 
  array (
    'Comments' => 
    array (
      'class' => 'Comments',
      'local' => 'id',
      'foreign' => 'StyleId',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
  ),
);

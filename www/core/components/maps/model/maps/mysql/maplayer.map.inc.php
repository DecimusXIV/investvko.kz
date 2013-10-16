<?php
$xpdo_meta_map['MapLayer']= array (
  'package' => 'maps',
  'version' => NULL,
  'table' => 'maps_layer',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'Title' => '',
    'Description' => NULL,
    'Published' => 0,
  ),
  'fieldMeta' => 
  array (
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
    'Published' => 
    array (
      'dbtype' => 'int',
      'precision' => '1',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
  ),
  'composites' => 
  array (
    'MapObject' => 
    array (
      'class' => 'MapObject',
      'local' => 'id',
      'foreign' => 'LayerId',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
  ),
);

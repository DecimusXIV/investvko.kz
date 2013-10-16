<?php
$xpdo_meta_map['Objects']= array (
  'package' => 'map',
  'version' => '1.1',
  'table' => 'objects',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'layer_id' => NULL,
    'style_id' => 0,
    'type' => 'marker',
    'name' => NULL,
    'gist' => NULL,
    'geometry_point' => NULL,
    'geometry_polygon' => NULL,
    'geometry_polyline' => NULL,
  ),
  'fieldMeta' => 
  array (
    'layer_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => true,
    ),
    'style_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'type' => 
    array (
      'dbtype' => 'enum',
      'precision' => '\'marker\',\'polygon\',\'polyline\'',
      'phptype' => 'string',
      'null' => false,
      'default' => 'marker',
    ),
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
    ),
    'gist' => 
    array (
      'dbtype' => 'mediumtext',
      'phptype' => 'string',
      'null' => true,
    ),
    'geometry_point' => 
    array (
      'dbtype' => 'point',
      'phptype' => 'integer',
      'null' => true,
    ),
    'geometry_polygon' => 
    array (
      'dbtype' => 'polygon',
      'phptype' => 'string',
      'null' => true,
    ),
    'geometry_polyline' => 
    array (
      'dbtype' => 'linestring',
      'phptype' => 'string',
      'null' => true,
    ),
  ),
);

<?php
$xpdo_meta_map['MapObject']= array (
  'package' => 'maps',
  'version' => NULL,
  'table' => 'maps_object',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'LayerId' => 1,
    'StyleId' => NULL,
    'IconId' => NULL,
    'Type' => 'marker',
    'Title' => '',
    'Description' => NULL,
    'Geometry' => NULL,
    'GeometrySVG' => NULL,
    'CircleRadius' => NULL,
    'IndexZ' => 0,
    'Published' => 0,
    'Message' => NULL,
  ),
  'fieldMeta' => 
  array (
    'LayerId' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'default' => 1,
    ),
    'StyleId' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => true,
    ),
    'IconId' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => true,
    ),
    'Type' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '16',
      'phptype' => 'string',
      'null' => false,
      'default' => 'marker',
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
    'Geometry' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
    ),
    'GeometrySVG' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
    ),
    'CircleRadius' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => true,
    ),
    'IndexZ' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
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
    'Message' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
    ),
  ),
  'aggregates' => 
  array (
    'MapLayer' => 
    array (
      'class' => 'MapLayer',
      'local' => 'LayerId',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'MapStyle' => 
    array (
      'class' => 'MapStyle',
      'local' => 'StyleId',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'MapIcon' => 
    array (
      'class' => 'MapIcon',
      'local' => 'IconId',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);

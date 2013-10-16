<?php
$xpdo_meta_map['mrktRegion']= array (
  'package' => 'market',
  'version' => '1.1',
  'table' => 'mrkt_regions',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'id' => NULL,
    'name' => NULL,
  ),
  'fieldMeta' => 
  array (
    'id' => 
    array (
      'dbtype' => 'int',
      'precision' => '100',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
      'generated' => 'native',
    ),
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '64',
      'phptype' => 'string',
      'null' => false,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 
    array (
      'alias' => 'PRIMARY',
      'primary' => true,
      'unique' => true,
      'columns' => 
      array (
        'id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
  'composites' => 
  array (
    'Adverts' => 
    array (
      'class' => 'mrktAdverts',
      'local' => 'id',
      'foreign' => 'region',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
  ),
);

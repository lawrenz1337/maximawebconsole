<?php
$xpdo_meta_map['maximaweb_request']= array (
  'package' => 'maximaweb',
  'version' => '1.1',
  'table' => 'maximaweb_request',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'user_id' => 0,
    'input' => '',
    'output' => '',
    'done' => 0,
    'files' => '',
  ),
  'fieldMeta' => 
  array (
    'user_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '20',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'input' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'sting',
    ),
    'output' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
    ),
    'done' => 
    array (
      'dbtype' => 'int',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'files' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'json',
    ),
  ),
  'aggregates' => 
  array (
    'MaximaUser' => 
    array (
      'class' => 'modUser',
      'local' => 'user_id',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);

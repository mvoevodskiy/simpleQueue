<?php

$xpdo_meta_map['sqMessage'] = [
    'package' => 'simplequeue',
    'version' => '1.1',
    'table' => 'simplequeue_messages',
    'extends' => 'xPDOSimpleObject',
    'tableMeta' =>
        [
            'engine' => 'MyISAM',
        ],
    'fields' =>
        [
            'service' => '',
            'action' => '',
            'subject' => '',
            'createdon' => 'CURRENT_TIMESTAMP',
            'finishedon' => '',
            'createdby' => 0,
            'processing' => 0,
            'processed' => 0,
            'status' => 0,
            'properties' => '',
        ],
    'fieldMeta' =>
        [
            'service' =>
                [
                    'dbtype' => 'varchar',
                    'precision' => '30',
                    'phptype' => 'string',
                    'null' => false,
                    'default' => '',
                ],
            'action' =>
                [
                    'dbtype' => 'varchar',
                    'precision' => '30',
                    'phptype' => 'string',
                    'null' => false,
                    'default' => '',
                ],
            'subject' =>
                [
                    'dbtype' => 'varchar',
                    'precision' => '255',
                    'phptype' => 'string',
                    'null' => false,
                    'default' => '',
                ],
            'createdon' =>
                [
                    'dbtype' => 'timestamp',
                    'phptype' => 'timestamp',
                    'null' => false,
                    'default' => 'CURRENT_TIMESTAMP',
                ],
            'finishedon' =>
                [
                    'dbtype' => 'timestamp',
                    'phptype' => 'timestamp',
                    'null' => true,
                    'default' => null,
                ],
            'createdby' =>
                [
                    'dbtype' => 'int',
                    'precision' => '10',
                    'attributes' => 'unsigned',
                    'phptype' => 'integer',
                    'null' => false,
                    'default' => 0,
                ],
            'processing' =>
                [
                    'dbtype' => 'int',
                    'precision' => '1',
                    'attributes' => 'unsigned',
                    'phptype' => 'boolean',
                    'null' => false,
                    'default' => 0,
                ],
            'processed' =>
                [
                    'dbtype' => 'tinyint',
                    'precision' => '1',
                    'phptype' => 'boolean',
                    'null' => false,
                    'default' => 0,
                ],
            'status' =>
                [
                    'dbtype' => 'int',
                    'precision' => '11',
                    'phptype' => 'integer',
                    'null' => false,
                    'default' => 0,
                ],
            'properties' =>
                [
                    'dbtype' => 'text',
                    'phptype' => 'json',
                    'null' => false,
                    'default' => '',
                ],
        ],
    'indexes' =>
        [
            'service' =>
                [
                    'alias' => 'service',
                    'primary' => false,
                    'unique' => false,
                    'type' => 'BTREE',
                    'columns' =>
                        [
                            'service' =>
                                [
                                    'length' => '',
                                    'collation' => 'A',
                                    'null' => false,
                                ],
                        ],
                ],
            'subject' =>
                [
                    'alias' => 'subject',
                    'primary' => false,
                    'unique' => false,
                    'type' => 'BTREE',
                    'columns' =>
                        [
                            'subject' =>
                                [
                                    'length' => '',
                                    'collation' => 'A',
                                    'null' => false,
                                ],
                        ],
                ],
            'createdon' =>
                [
                    'alias' => 'createdon',
                    'primary' => false,
                    'unique' => false,
                    'type' => 'BTREE',
                    'columns' =>
                        [
                            'createdon' =>
                                [
                                    'length' => '',
                                    'collation' => 'A',
                                    'null' => false,
                                ],
                        ],
                ],
            'processed' =>
                [
                    'alias' => 'processed',
                    'primary' => false,
                    'unique' => false,
                    'type' => 'BTREE',
                    'columns' =>
                        [
                            'processed' =>
                                [
                                    'length' => '',
                                    'collation' => 'A',
                                    'null' => false,
                                ],
                        ],
                ],
            'status' =>
                [
                    'alias' => 'status',
                    'primary' => false,
                    'unique' => false,
                    'type' => 'BTREE',
                    'columns' =>
                        [
                            'status' =>
                                [
                                    'length' => '',
                                    'collation' => 'A',
                                    'null' => false,
                                ],
                        ],
                ],
        ],
    'composites' =>
        [
            'Log' =>
                [
                    'class' => 'sqLog',
                    'local' => 'id',
                    'foreign' => 'message_id',
                    'cardinality' => 'many',
                    'owner' => 'local',
                ],
        ],
    'aggregates' =>
        [
            'User' =>
                [
                    'class' => 'modUser',
                    'local' => 'createdby',
                    'foreign' => 'id',
                    'cardinality' => 'one',
                    'owner' => 'foreign',
                ],
            'UserProfile' =>
                [
                    'class' => 'modUserProfile',
                    'local' => 'createdby',
                    'foreign' => 'internalKey',
                    'owner' => 'foreign',
                    'cardinality' => 'one',
                ],
        ],
];

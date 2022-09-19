<?php

$xpdo_meta_map['sqMessage'] = [
    'package' => 'simplequeue',
    'version' => '1.1',
    'table' => 'simplequeue_messages',
    'extends' => 'xPDOSimpleObject',
    'fields' =>
        [
            'service' => '',
            'action' => '',
            'subject' => '',
            'createdon' => 'CURRENT_TIMESTAMP',
            'createdby' => 'CURRENT_TIMESTAMP',
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
                    'precision' => '191',
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
            'createdby' =>
                [
                    'dbtype' => 'timestamp',
                    'phptype' => 'timestamp',
                    'null' => false,
                    'default' => 'CURRENT_TIMESTAMP',
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

<?php

$xpdo_meta_map['sqLog'] = [
    'package' => 'simplequeue',
    'version' => '1.1',
    'table' => 'simplequeue_logs',
    'extends' => 'xPDOSimpleObject',
    'fields' =>
        [
            'message_id' => 0,
            'user_id' => 0,
            'timestamp' => 'CURRENT_TIMESTAMP',
            'operation' => '',
            'entry' => '0',
        ],
    'fieldMeta' =>
        [
            'message_id' =>
                [
                    'dbtype' => 'int',
                    'precision' => '10',
                    'attributes' => 'unsigned',
                    'phptype' => 'integer',
                    'null' => false,
                    'default' => 0,
                ],
            'user_id' =>
                [
                    'dbtype' => 'int',
                    'precision' => '10',
                    'attributes' => 'unsigned',
                    'phptype' => 'integer',
                    'null' => false,
                    'default' => 0,
                ],
            'timestamp' =>
                [
                    'dbtype' => 'timestamp',
                    'phptype' => 'timestamp',
                    'null' => false,
                    'default' => 'CURRENT_TIMESTAMP',
                ],
            'operation' =>
                [
                    'dbtype' => 'varchar',
                    'precision' => '100',
                    'phptype' => 'string',
                    'null' => false,
                    'default' => '',
                ],
            'entry' =>
                [
                    'dbtype' => 'varchar',
                    'precision' => '255',
                    'phptype' => 'string',
                    'null' => false,
                    'default' => '0',
                ],
        ],
    'indexes' =>
        [
            'message_id' =>
                [
                    'alias' => 'message_id',
                    'primary' => false,
                    'unique' => false,
                    'type' => 'BTREE',
                    'columns' =>
                        [
                            'message_id' =>
                                [
                                    'length' => '',
                                    'collation' => 'A',
                                    'null' => false,
                                ],
                        ],
                ],
            'user_id' =>
                [
                    'alias' => 'user_id',
                    'primary' => false,
                    'unique' => false,
                    'type' => 'BTREE',
                    'columns' =>
                        [
                            'user_id' =>
                                [
                                    'length' => '',
                                    'collation' => 'A',
                                    'null' => false,
                                ],
                        ],
                ],
            'timestamp' =>
                [
                    'alias' => 'timestamp',
                    'primary' => false,
                    'unique' => false,
                    'type' => 'BTREE',
                    'columns' =>
                        [
                            'message_id' =>
                                [
                                    'length' => '',
                                    'collation' => 'A',
                                    'null' => false,
                                ],
                        ],
                ],
        ],
    'aggregates' =>
        [
            'Message' =>
                [
                    'class' => 'sqLog',
                    'local' => 'message_id',
                    'foreign' => 'id',
                    'owner' => 'foreign',
                    'cardinality' => 'one',
                ],
            'User' =>
                [
                    'class' => 'modUser',
                    'local' => 'user_id',
                    'foreign' => 'id',
                    'owner' => 'foreign',
                    'cardinality' => 'one',
                ],
            'UserProfile' =>
                [
                    'class' => 'modUserProfile',
                    'local' => 'user_id',
                    'foreign' => 'internalKey',
                    'owner' => 'foreign',
                    'cardinality' => 'one',
                ],
        ],
];

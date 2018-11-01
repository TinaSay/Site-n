<?php

$config = [
    'id' => 'console',
    'controllerMap' => [
        // Migrations for the specific project's module
        'migrate' => [
            'class' => \yii\console\controllers\MigrateController::class,
            'migrationTable' => '{{%migration}}',
            'interactive' => false,
            'migrationPath' => [
                '@app/migrations',
                '@yii/rbac/migrations',
                '@app/modules/auth/migrations',
                '@vendor/yii2-developer/yii2-logging/migrations',
                '@vendor/yii2-developer/yii2-storage/migrations',
                '@vendor/yii2-developer/yii2-content/migrations',
                '@vendor/yii2-developer/yii2-example/migrations',
                '@app/modules/contactus/migrations',
            ],
        ],
        'access' => [
            'class' => \krok\access\AccessController::class,
            'userIds' => [
                1,
            ],
            'rules' => [
                \app\modules\auth\rbac\AuthorRule::class,
            ],
            'config' => [
                [
                    'name' => 'system',
                    'controllers' => [
                        'default' => [
                            'index',
                            'flush-cache',
                        ],
                    ],
                ],
                [
                    'name' => 'logging',
                    'controllers' => [
                        'default' => [
                            'index',
                            'view',
                        ],
                    ],
                ],
                [
                    'name' => 'imperavi',
                    'controllers' => [
                        'default' => [
                            'file-upload',
                            'file-list',
                            'image-upload',
                            'image-list',
                        ],
                    ],
                ],
                [
                    'name' => 'auth',
                    'controllers' => [
                        'auth' => [
                            'index',
                            'create',
                            'update',
                            'delete',
                            'view',
                            'refresh-token',
                        ],
                        'log' => ['index'],
                        'social' => ['index'],
                        'profile' => ['index'],
                    ],
                ],
                [
                    'name' => 'content',
                    'controllers' => [
                        'default' => [],
                    ],
                ],
                [
                    'name' => 'example',
                    'controllers' => [
                        'default' => [],
                    ],
                ],
                [
                    'name' => 'backupManager',
                    'controllers' => [
                        'default' => [
                            'index',
                            'download',
                        ],
                        'database' => [
                            'backup',
                        ],
                        'filesystem' => [
                            'backup',
                        ],
                    ],
                ],
                [
                    'name' => 'contactus',
                    'controllers' => [
                        'default' => [
                            'index',
                            'view',
                            'delete',
                        ],
                        'note' => [
                            'index',
                            'create',
                            'update',
                            'view',
                            'delete',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'modules' => [],
    'components' => [
        'urlManager' => [
            'baseUrl' => '/',
            'hostInfo' => '/',
            'rules' => require(__DIR__ . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'rules.php'),
        ],
        'errorHandler' => [
            'class' => \krok\sentry\console\SentryErrorHandler::class,
            'sentry' => \krok\sentry\Sentry::class,
        ],
    ],
];

return \yii\helpers\ArrayHelper::merge(require(__DIR__ . DIRECTORY_SEPARATOR . 'common.php'), $config);

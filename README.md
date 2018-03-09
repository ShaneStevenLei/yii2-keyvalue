KeyValue
========
KeyValue

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist stevenlei/yii2-keyvalue "^1.0.0"
```

or add

```
"stevenlei/yii2-keyvalue": "^1.0.0"
```

to the require section of your `composer.json` file.


Usage
-----

Configuration

Add `cache` configuration:

Use `FileCache`

```
return [
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ]
]
```

or `Memcache`

```
return [
    'components' => [
        'class'        => 'yii\caching\MemCache',
            'keyPrefix'    => '',
            'useMemcached' => true,
            'servers'      => [
                [
                    'host' => '127.0.0.1',
                    'port' => 11211,
                    //'weight' => 60
                ],
        ],
    ]
]
```

 or `Redis`
 

```
return [
    'components' => [
        'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => '127.0.0.1',
                'port' => 6379,
                'database' => 0,
            ]
        ]
    ]
]
```


Add modules configuration:

```
return [
    'modules'    => [
        'kv'     => [
            'class' => 'stevenlei\keyvalue\Module',
        ],
    ],
];
```

migrations:

```
yii migrate --migrationPath=@stevenlei/keyvalue/migrations
```

You can then access KeyValue manager through the following URL:

```
http://localhost/kv/key-value/index
```




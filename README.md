# mn-sys-pdd
jayfir 拼多多集成包

# 配置Yii组件
```
common\config\main.php
        components=>[

         'pdd' => [
                    'class' => 'jayfir\pdd\PopClient',
                    'appkey' => '***',
                    'secretKey' => '**',
                    'format' => 'JSON'
                ],
        ]

```

# 调用方式
```
example:

$req = new \jayfir\pdd\request\ItemSearchRequest();

        $req->setSortType(2);
        $req->setWithCoupon('true');
        $result = \Yii::$app->pdd->execute($req);

```


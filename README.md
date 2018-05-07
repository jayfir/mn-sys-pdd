# mn-sys-pdd
jayfir 拼多多集成包

# 配置Yii组件
```
common\config\main.php
        components=>[

         'pdd' => [
                    'class' => 'jayfir\pdd\PopClient',
                    'appkey' => '34f1a221a7254de89a84582f3af90d98',
                    'secretKey' => '3682ba34735ff57de572f7cde7098545671b6930',
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


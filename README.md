# mn-sys-pdd
jayfir 拼多多集成包

# 注意
```
因拼多多官方刚上线联盟模式,在接口调用方面经常调整,本组件会根据官方修改不时变动,请开发者注意!
```
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


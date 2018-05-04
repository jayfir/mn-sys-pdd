<?php

namespace jayfir\pdd;

use jayfir\pdd\PopClient;
use jayfir\pdd\ApplicationVar;
use jayfir\pdd\HttpdnsGetRequest;

class ClusterPopClient extends PopClient
{

    private static $dnsconfig;
    private static $syncDate = 0;
    private static $applicationVar;
    private static $cfgDuration = 10;

    public function __construct($appkey = "", $secretKey = "")
    {
        ClusterPopClient::$applicationVar = new ApplicationVar;
        $this->appkey = $appkey;
        $this->secretKey = $secretKey;
        $saveConfig = ClusterPopClient::$applicationVar->getValue();

        if ($saveConfig) {
            $tmpConfig = $saveConfig['dnsconfig'];
            ClusterPopClient::$dnsconfig = $this->object_to_array($tmpConfig);
            unset($tmpConfig);

            ClusterPopClient::$syncDate = $saveConfig['syncDate'];
            if (!ClusterPopClient::$syncDate)
                ClusterPopClient::$syncDate = 0;
        }
    }

    public function __destruct()
    {
        if (ClusterPopClient::$dnsconfig && ClusterPopClient::$syncDate) {
            ClusterPopClient::$applicationVar->setValue("dnsconfig", ClusterPopClient::$dnsconfig);
            ClusterPopClient::$applicationVar->setValue("syncDate", ClusterPopClient::$syncDate);
            ClusterPopClient::$applicationVar->write();
        }
    }

    public function execute($request = null, $session = null, $bestUrl = null)
    {
        $currentDate = date('U');
        $syncDuration = $this->getDnsConfigSyncDuration();
        $bestUrl = $this->getBestVipUrl($this->gatewayUrl, $request->getApiMethodName(), $session);
        if ($currentDate - ClusterPopClient::$syncDate > $syncDuration * 60) {
            $httpdns = new HttpdnsGetRequest;
            ClusterPopClient::$dnsconfig = json_decode(parent::execute($httpdns, null, $bestUrl)->result, true);
            $syncDate = date('U');
            ClusterPopClient::$syncDate = $syncDate;
        }
        return parent::execute($request, $session, $bestUrl);
    }

    private function getDnsConfigSyncDuration()
    {
        if (ClusterPopClient::$cfgDuration) {
            return ClusterPopClient::$cfgDuration;
        }
        if (!ClusterPopClient::$dnsconfig) {
            return ClusterPopClient::$cfgDuration;
        }
        $config = json_encode(ClusterPopClient::$dnsconfig);
        if (!$config) {
            return ClusterPopClient::$cfgDuration;
        }
        $config = ClusterPopClient::$dnsconfig['config'];
        $duration = $config['interval'];
        ClusterPopClient::$cfgDuration = $duration;

        return ClusterPopClient::$cfgDuration;
    }

    private function getBestVipUrl($url, $apiname = null, $session = null)
    {
        $config = ClusterPopClient::$dnsconfig['config'];
        $degrade = $config['degrade'];
        if (strcmp($degrade, 'true') == 0) {
            return $url;
        }
        $currentEnv = $this->getEnvByApiName($apiname, $session);
        $vip = $this->getVipByEnv($url, $currentEnv);
        if ($vip)
            return $vip;
        return $url;
    }

    private function getVipByEnv($comUrl, $currentEnv)
    {
        $urlSchema = parse_url($comUrl);
        if (!$urlSchema)
            return null;
        if (!ClusterPopClient::$dnsconfig['env'])
            return null;

        if (!array_key_exists($currentEnv, ClusterPopClient::$dnsconfig['env']))
            return null;

        $hostList = ClusterPopClient::$dnsconfig['env'][$currentEnv];
        if (!$hostList)
            return null;

        $vipList = null;
        foreach ($hostList as $key => $value) {
            if (strcmp($key, $urlSchema['host']) == 0 && strcmp($value['proto'], $urlSchema['scheme']) == 0) {
                $vipList = $value;
                break;
            }
        }
        $vip = $this->getRandomWeightElement($vipList['vip']);

        if ($vip) {
            return $urlSchema['scheme'] . "://" . $vip . $urlSchema['path'];
        }
        return null;
    }

    private function getEnvByApiName($apiName, $session = "")
    {
        $apiCfgArray = ClusterPopClient::$dnsconfig['api'];
        if ($apiCfgArray) {
            if (array_key_exists($apiName, $apiCfgArray)) {
                $apiCfg = $apiCfgArray[$apiName];
                if (array_key_exists('user', $apiCfg)) {
                    $userFlag = $apiCfg['user'];
                    $flag = $this->getUserFlag($session);
                    if ($userFlag && $flag) {
                        return $this->getEnvBySessionFlag($userFlag, $flag);
                    } else {
                        return $this->getRandomWeightElement($apiCfg['rule']);
                    }
                }
            }
        }
        return $this->getDeafultEnv();
    }

    private function getUserFlag($session)
    {
        if ($session && strlen($session) > 5) {
            if ($session[0] == '6' || $session[0] == '7') {
                return $session[strlen($session) - 1];
            } else if ($session[0] == '5' || $session[0] == '8') {
                return $session[5];
            }
        }
        return null;
    }

    private function getEnvBySessionFlag($targetConfig, $flag)
    {
        if ($flag) {
            $userConf = ClusterPopClient::$dnsconfig['user'];
            $cfgArry = $userConf[$targetConfig];
            foreach ($cfgArry as $key => $value) {
                if (in_array($flag, $value))
                    return $key;
            }
        }else {
            return null;
        }
    }

    private function getRandomWeightElement($elements)
    {
        $totalWeight = 0;
        if ($elements) {
            foreach ($elements as $ele) {
                $weight = $this->getElementWeight($ele);
                $r = $this->randomFloat() * ($weight + $totalWeight);
                if ($r >= $totalWeight) {
                    $selected = $ele;
                }
                $totalWeight += $weight;
            }
            if ($selected) {
                return $this->getElementValue($selected);
            }
        }
        return null;
    }

    private function getElementWeight($ele)
    {
        $params = explode('|', $ele);
        return floatval($params[1]);
    }

    private function getElementValue($ele)
    {
        $params = explode('|', $ele);
        return $params[0];
    }

    private function getDeafultEnv()
    {
        return ClusterPopClient::$dnsconfig['config']['def_env'];
    }

    private static function startsWith($haystack, $needle)
    {
        return $needle === "" || strpos($haystack, $needle) === 0;
    }

    private function object_to_array($obj)
    {
        $_arr = is_object($obj) ? get_object_vars($obj) : $obj;
        foreach ($_arr as $key => $val) {
            $val = (is_array($val) || is_object($val)) ? $this->object_to_array($val) : $val;
            $arr[$key] = $val;
        }
        return$arr;
    }

    private function randomFloat($min = 0, $max = 1)
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }

}

?>
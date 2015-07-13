<?php

function alert($str)
{
    print "<pre>";
    print_r($str);
    print "</pre>";
}

function connectMysql($config)
{
    $link = mysql_connect($config['hostname'], $config['username'], $config['password']);
    if (!$link) {
        return 'Not connected : ' . mysql_error();
    } else {
        return 'success';
    }
}

function connectMemcache($config)
{
    if (class_exists('Memcache')) {
        $memcache = new Memcache;
        if ($memcache->connect($config['host'], $config['port'])) {
            return 'success';
        } else {
            return 'not connected';
        }
    } else {
        return 'Class Memcache Not Found.';
    }
}

function connectRedis($config)
{
    if (class_exists('Redis')) {
        $redis = new Redis();
        if ($redis->connect($config['host'], $config['port'])) {
            return 'success';
        } else {
            return 'Not connected Redis';
        }
    } else {
        return 'Class Redis Not Found.';
    }
}

function getWsdl($config)
{
    $mystring = file_get_contents($config['url']);
    $pos = strpos($mystring, $config['find_word']);
    if ($pos === false) {
        return 'wsdl not found';
    } else {
        return 'success';
    }
}

function curlTruemoveHStandardGet($config)
{
    $curl = curl_init($config['url']);
    if (is_resource($curl) === true) {
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_VERBOSE, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($result, true);
        if (isset($data['header']['code'])) {
            return 'success';
        } else {
            return 'error';
        }
    } else {
        return 'error';
    }
}

// Determine Start Time
function slog_time()
{
    $mtime = microtime();
    $mtime = explode(" ", $mtime);
    $mtime = $mtime[1] + $mtime[0];
    $starttime = $mtime;

    // Return our time
    return $starttime;
}

// Determine end time
function elog_time($starttime)
{
    $mtime = microtime();
    $mtime = explode(" ", $mtime);
    $mtime = $mtime[1] + $mtime[0];
    $endtime = $mtime;
    $totaltime = ($endtime - $starttime);

    // Return our display
    return $totaltime;
}

?>

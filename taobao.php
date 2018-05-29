<?php
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
/**
 * Created by PhpStorm.
 * User: Eilen
 * Date: 2018/5/26
 * Time: 11:35
 */
/**
 * @param $url  需要处理的链接地址
 * @return bool|string  获取成功返回网页资源，否则不返回
 */
function PageResponse($url){
    $results=file_get_contents($url);
    if ($results) {
        return $results;
    }
}

/**
 * @param $result   需要处理的网页资源文件
 */
function Analysis($result){
    preg_match('/raw_title":"(.*?)"/',$result,$goods_name);
    sleep(30);
    preg_match('/view_price":"(.*?)"/',$result,$goods_price);
    sleep(30);
    print_r($goods_name);
    print_r($goods_price);
}

/**
 * @param $url  需要处理的链接地址
 * @param $n    需要爬去的页数
 * @return mixed    返回获取到的资源数组
 */
function Pagecycles($url,$n){
    $tail=0;
    for ($i=0;$i<$n;$i++){
        $result=PageResponse($url);
        sleep(120);
        if($result){
            Analysis($result);
            sleep(10);
            $url.=$tail+=44;
        }else{
            echo 'error';
        }
        echo 'This is '.$i.'Page';
    }
}

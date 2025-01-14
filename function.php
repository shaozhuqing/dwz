<?php
//不允许缩短的域名，黑名单判断
function checkBlackList($url,$blackList){
	$host = parse_url($url)['host'];
	$host = strtolower($host);
	foreach($blackList as $v){
		//包含*的情况
		if(strpos($v,'*') === 0){
			$host = '*.'.getTopHost($host);  //取顶级域名进行对比
		}
		if($host == $v){
			return false;   //黑名单域名
		}
	}
	return true;   //不是黑名单
}

//获取顶级域名
function getTopHost($host){
	//查看是几级域名
    $data = explode('.', $host);
    $n = count($data);

    //判断是否是双后缀
    $preg = '/[\w].+\.(com|net|org|gov|edu)\.cn$/';
    if(($n > 2) &&  preg_match($preg,$host)){
    	//双后缀取后3位
    	$host = $data[$n-3].'.'.$data[$n-2].'.'.$data[$n-1];
    }else{
    	//非双后缀取后两位
    	$host = $data[$n-2].'.'.$data[$n-1];
    }
    return $host;
}

//生成大小写字母和数字随机字符串
function createId($len){
    //大小写字母和数字混用
    $str = 'abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
    //小写字母和数字混用
    //$str = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $key = '';
    for($i = 0;$i < $len;$i++){
        $key .= $str[mt_rand(0,strlen($str)-1)];
    }
    return $key;
}

//查看随机生成的id 是否已经被占用,占用重新生成，递归
function checkId($arr,$id){
    if(!isset($arr[$id])){
        return $id;
    }else{
        $id = createId(4);
        return checkId($arr,$id);
    }
}

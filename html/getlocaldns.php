<?php
header('Access-Control-Allow-Origin: *');
/**
 * 取文件最后$n行
 * @param string $filename 文件路径
 * @param int $n 最后几行
 * @return mixed false表示有错误，成功则返回字符串
 */
function FileLastLines($filename, $n, $host) {
    if (! $fp = fopen ( $filename, 'r' )) {
        echo "打开文件失败，请检查文件路径是否正确，路径和文件名不要包含中文";
        return false;
    }
    $pos = - 2;
    $eof = "";
    $str = "";
    $s = "";
    while ( $n > 0 ) {
        while ( $eof != "\n" ) {
            if (! fseek ( $fp, $pos, SEEK_END )) {
                $eof = fgetc ( $fp );
                $pos --;
            } else {
                break;
            }
        }
        $s = fgets ( $fp );
        $arr = explode ( ' ', $s );
        if ($arr [6] == $host) {
            return $arr [4];
        }
        // var_dump($arr);
        $str .= $s;
        $eof = "";
        $n --;
    }
    return "error#error";
}
// echo nl2br ( FileLastLines ( 'aaaa', 8, "undefined.cdndetect.bcetstool.com" ) );
//    echo (FileLastLines ( '/var/named/query.log', 100,"sss.cdndetect.bcetstool.com" ) ); 
if (isset ( $_SERVER )) {
    //echo $_SERVER ["HTTP_HOST"];
    $str = FileLastLines ( '/var/named/query.log', 500, $_SERVER ["HTTP_HOST"] );
    $arr = explode ( '#', $str );
    //var_dump($arr);
    echo $arr[0];
}


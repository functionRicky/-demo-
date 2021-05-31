/**
     * 解密 反编译银联demo方法
     *
     * @param [type] $src
     * @param [type] $dst
     * @return void
     */
    function crack($src, $dst) {
        $content = file_get_contents($src);
        $pos = strpos($content, '?>');
        //删除读取文件的代码
        $code = substr($content, $pos + 3);
        //删除解码代码
        $code = substr($code, 700);
        //解码目标代码
        $cracked = base64_decode(strtr($code, 'EnteryouwkhRHYKNWOUTAaBbCcDdFfGgIiJjLlMmPpQqSsVvXxZz0123456789+/=','ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/'));
        //写入目标文件
        file_put_contents($dst, "<?php " . $cracked . " ?>");
    }
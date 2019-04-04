<?php

$config = array(
    'core'     => array(
        'version'                  => '4.0', // 内部版本号
        'build_version'            => 'b4.0.000', // 前端构建用
        'limit'                    => array(
            'uploadSingleFileMaxSize' => 1024 * 1024 * 10, //10M
            'uploadFileType'          => explode("|", 'jpg|gif|png|bmp|swf|txt|rar|zip|doc|pdf|wav|jar|docx|xlsx|pptx|ppt|cvs|xls|rtf'),
        ),
        'session'                  => array(
            'save_handler' => 'memcache',
            "save_path"    => "tcp://127.0.0.1:11211?persistent=1",
        ),
        'component'                => array(
            'Base'      => 'Base',
            'Database'  => 'Database',
        ),

);

//载入所有数据源配置
if (file_exists($dir . "/config/self_config.php")) {
    $self_config = include $dir . "/config/self_config.php";
    $config   = array_merge($config, $self_config);
}

return $config;

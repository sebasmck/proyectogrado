<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => base_path('public\pdf\bin\wkhtmltopdf.exe'),
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltoimage',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);

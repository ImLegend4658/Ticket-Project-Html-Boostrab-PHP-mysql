<?php
include_once '/opt/lampp/htdocs/ticket/config/database.php';

$setting = $mysqli->query('select * from setting where id = 1')->fetch_assoc();
if(count($setting)){
    $app_name = $setting['app_name'];
    $Admin_email = $setting['Admin_Email'];
}else{
    $app_name = 'Ticket';
    $Admin_email = 'Admin@gmail.com';
}

$config = [
    'app_name' => $app_name,
    'Admin_Email' => $Admin_email,
    'lang' => 'en',
    'dir' => 'rtl',
    'app_url' => '/ticket',
    'upload_dir' => '',
    'admin_assets' => ''];
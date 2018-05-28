<?php
//GUMP套件教學
//GUMP::xss_clean 移除跨站攻擊的不安全代碼
//GUMP::is_valid 設定驗證規則

//ini_set('display_errors', '1');

require 'vendor/autoload.php';
$hero_name = "";
$hero_description = "";

// 移除跨站攻擊的不安全代碼
$data = GUMP::xss_clean($_POST);

// 設定驗證規則
$is_valid = GUMP::is_valid($data, array( 
'hero_name' => 'required',
'hero_description' => 'required|max_len,100|min_len,6'
));

if($is_valid === true) { // 如果符合規則的話
  $table = "hero";
  $data_array['hero_name'] = $data['hero_name'];
  $data_array['hero_description'] = $data['hero_name'];
  Database::get()->insert($table, $data_array);
  header("Location: ".WebsiteConfig::BASE_URL."success");
} else {
print_r($is_valid);
die;
}
exit;

?>
<?php
//ini_set('display_errors', '1');
require 'vendor/autoload.php';

$mysql_address = "10.10.1.108"; // 通常是連接同一台機器，如果是遠端就設 IP
$mysql_username = "twhg";     // 設定連接資料庫用戶帳號
$mysql_password = "TwhG5008"; // 設定連接資料庫用戶的密碼
$mysql_database = "TWHOUSE";     // 設成你在 mysql 創的資料庫
$DAO = new DatabaseAccessObject($mysql_address, $mysql_username, $mysql_password, $mysql_database);
// 要新增資料就：
$table = "hero"; // 設定你想新增資料的資料表
$data_array['hero_name'] = "凡恩";
$data_array['hero_hp'] = 100;
$data_array['hero_mp'] = 80;
$DAO->insert($table, $data_array);
$hero_id = $DAO->getLastId(); // 可以拿到他自動建立的 id
// 這樣就完成新增動作了

// 想要查詢的話
$table = "hero"; // 設定你想查詢資料的資料表
$condition = "hero_name = '凡恩'";
$hero = $DAO->query($table, $condition, $order_by = "1", $fields = "*", $limit = "");
// 這樣寫等同於下面直接呼叫的語法：
$hero = $DAO->execute("SELECT * FROM hero WHERE hero_name = '凡恩'");
print_r($hero); // 可以印出來看看

// 那想修改資料呢？
$table = "hero";
$data_array['hero_name'] = "凡恩ATM"; // 想改他的名字
$key_column = "hero_id"; //
$id = $hero_id; // 根據我們剛剛上面拿到的 hero ID
$DAO->update($table, $data_array, $key_column, $id);
echo $DAO->getLastSql(); // 想知道會轉換成什麼語法 可以印出來看看


// // 最後的刪除也不難，告訴他條件就可以了
// $table = "hero";
// $key_column = "hero_id";
// $id = 1; // 我們假設要刪除 hero_id = 1 的英雄
// $DAO->delete($table, $key_column, $id); 
// // 一行搞定


?>
<?php
$parameter = strtolower($route->getParameter(1));
$controller_array = scandir('controller');
$controller_array = array_change_key_case($controller_array, CASE_LOWER);

if (in_array($parameter.'.php', $controller_array)) {
  include( 'controller/'.$parameter.'.php' );
}else{
  include( 'controller/login.php' ); // 預設讀取登入頁
}
// $route = new Router(Request::uri()); //搭配 .htaccess 排除資料夾名稱後解析 URL
// $route->getParameter(1); // 從 http://127.0.0.1/game/aaa/bbb 取得 aaa 字串之意

// // 用參數決定載入某頁並讀取需要的資料
// switch($route->getParameter(1)){

//     case "do_create": // 執行儲存動作後回到新增表單畫面
//       $hero_name = "";
//       $hero_description = "";
      
//       // 移除跨站攻擊的不安全代碼
//       $data = GUMP::xss_clean($_POST);

//       // 設定驗證規則
//       $is_valid = GUMP::is_valid($data, array( 
//         'hero_name' => 'required',
//         'hero_description' => 'required|max_len,100|min_len,6'
//       ));
//       if($is_valid === true) { // 如果符合規則的話
//           $table = "hero";
//           $data_array['hero_name'] = $data['hero_name'];
//           $data_array['hero_description'] = $data['hero_name'];
//           Database::get()->insert($table, $data_array);
//           header("Location: ".Config::BASE_URL."/success");
//       } else {
//         print_r($is_valid);
//         die;
//       }
//       exit;
//     break;

//     case "success":
//       include('view/header/default.php'); // 載入共用的頁首
//       include('view/body/success.php');    // 載入新增用的表單
//       include('view/footer/default.php'); // 載入共用的頁尾
//     break;

//     case "register":
//       if(isset($_POST['submit'])) 
//       {
//         $gump = new GUMP();
//         $_POST = $gump->sanitize($_POST); 

//         $validation_rules_array = array(
//           'username'    => 'required|alpha_numeric|max_len,20|min_len,8',
//           'email'       => 'required|valid_email',
//           'password'    => 'required|max_len,20|min_len,8',
//           'passwordConfirm' => 'required'
//         );
//         $gump->validation_rules($validation_rules_array);

//         $filter_rules_array = array(
//           'username' => 'trim|sanitize_string',
//           'email'    => 'trim|sanitize_email',
//           'password' => 'trim',
//           'passwordConfirm' => 'trim'
//         );
//         $gump->filter_rules($filter_rules_array);

//         $validated_data = $gump->run($_POST);

//         if($validated_data === false) {
//           $error = $gump->get_readable_errors(false);
//         } else {
//           // validation successful
//           foreach($validation_rules_array as $key => $val) {
//             ${$key} = $_POST[$key];
//           }
//           $userVeridator = new UserVeridator();
//           $userVeridator->isPasswordMatch($password, $passwordConfirm);
//           $userVeridator->isUsernameDuplicate($username);
//           $userVeridator->isEmailDuplicate($email);
//           $error = $userVeridator->getErrorArray();
//         } 
//         //if no errors have been created carry on
//         if(count($error) == 0)
//         {
//           //hash the password
//           $passwordObject = new Password();
//           $hashedpassword = $passwordObject->password_hash($password, PASSWORD_BCRYPT);
      
//           //create the random activasion code
//           $activasion = md5(uniqid(rand(),true));
      
//           try {

//             // 新增到資料庫
//             $data_array = array(
//               'username' => $username,
//               'password' => $hashedpassword,
//               'email' => $email,
//               'active' => $activasion
//             );
//             Database::get()->insert("members", $data_array);

//             //redirect to index page
//             header('Location: '.Config::BASE_URL.'register');
            
//           //else catch the exception and show the error.
//           } catch(PDOException $e) {
//               $error[] = $e->getMessage();
//           }
//         }
//       }
//       include('view/header/default.php'); // 載入共用的頁首
//       include('view/body/register.php');  // 載入註冊用的表單
//       include('view/footer/default.php'); // 載入共用的頁尾
//     break;

//     case "create": // 顯示新增表單畫面
//       include('view/header/default.php'); // 載入共用的頁首
//       include('view/body/create.php');    // 載入新增用的表單
//       include('view/footer/default.php'); // 載入共用的頁尾
//     break;

//     case "list":
//       // 讀取全英雄列表資料
//       // $DAO->query( ...略... );
//       include('view/header/default.php'); // 載入共用的頁首
//       include('view/body/list.php');
//       include('view/footer/default.php'); // 載入共用的頁尾
//     break;

//     case "hero":
//       // 讀取單一英雄資料
//       // $DAO->query( ...略... );

//       include('view/header/default.php'); // 載入共用的頁首
//       include('view/body/hero.php');
//       include('view/footer/default.php'); // 載入共用的頁尾
//     break;

//     default:
//       include('view/header/default.php'); // 載入共用的頁首
//       include('view/body/default.php');
//       include('view/footer/default.php'); // 載入共用的頁尾
//     break;
// }
?>
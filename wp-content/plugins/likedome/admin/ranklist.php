<?php
### Check Whether User Can Manage Likedome
if(!current_user_can('administrator')) {
    die('Access Denied');
}
### Variables Variables Variables
$base_name = plugin_basename('likedome/admin/ranklist.php');
$base_page = 'admin.php?page='.$base_name;
$category = trim($_REQUEST['category']);

define( 'LIKEDOME_PLUGINS_ROOT', dirname( dirname( __FILE__ ) ) );
require_once( LIKEDOME_PLUGINS_ROOT .  '/config.php' );
require_once( LIKEDOME_PLUGINS_ROOT . '/includes/classes.php');

### Determines Which Category It Is
switch($category) {
    // Add
    case 'joingroup':
        $groupId = intval($_POST['groupId']);
        $matchId = intval($_POST['matchId']);
        $userId = intval($_POST['memberId']);
        $succe = updateUser($userId, $matchId, $groupId, -1, 1, 1, 1, 1);
        if($succe != 1) {
            echo "添加队伍提交失败";
            return;
        }
        echo "添加队伍提交成功";
        break;
      // Del
      case 'del':
      	$matchId = intval($_POST['matchId']);
      	$userId = intval($_POST['userId']);
	    $succe = delUser($userId, $matchId);
	    if($succe != 1) {
           echo "删除选手失败";
           return;
	    }
	    echo "删除选手完成";
      break;
      // Update
      case 'update':
      break;
     // Main Page
    default:
        echo '<h2>'. '数据排行' . '</h2>';
        echo $tpl->GetTemplate('ranklist.php');
        break;
}
?>
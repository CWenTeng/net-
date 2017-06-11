<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        //对文章
        // 添加 "createPost" 权限
        $createPost = $auth->createPermission('createPost');
        $createPost->description = '新增文章';
        $auth->add($createPost);

        // 添加 "updatePost" 权限
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = '修改文章';
        $auth->add($updatePost);

        // 添加 "deletePost" 权限
        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = '删除文章';
        $auth->add($deletePost);
        
        //对评论
        // 添加 "updateComment" 权限
        $updateComment = $auth->createPermission('updateComment');
        $updateComment->description = '修改评论';
        $auth->add($updateComment);

        // 添加 "deleteComment" 权限
        $deleteComment = $auth->createPermission('deleteComment');
        $deleteComment->description = '删除评论';
        $auth->add($deleteComment);

        // 添加 "approveComment" 权限
        $approveComment = $auth->createPermission('approveComment');
        $approveComment->description = '审核评论';
        $auth->add($approveComment);

        //对预定管理
        // 添加 "updateReserve" 权限
        $updateReserve = $auth->createPermission('updateReserve');
        $updateReserve->description = '修改预定';
        $auth->add($updateReserve);

        // 添加 "deleteReserve" 权限
        $deleteReserve = $auth->createPermission('deleteReserve');
        $deleteReserve->description = '删除预定';
        $auth->add($deleteReserve);

        // 添加 "createReserve" 权限
        $createReserve = $auth->createPermission('createReserve');
        $createReserve->description = '新增预定';
        $auth->add($createReserve);

        //对专家管理
        // 添加 "updateExpert" 权限
        $updateExpert = $auth->createPermission('updateExpert');
        $updateExpert->description = '修改专家';
        $auth->add($updateExpert);

        // 添加 "deleteExpert" 权限
        $deleteExpert = $auth->createPermission('deleteExpert');
        $deleteExpert->description = '删除专家';
        $auth->add($deleteExpert);

        // 添加 "createExpert" 权限
        $createExpert = $auth->createPermission('createExpert');
        $createExpert->description = '新增专家';
        $auth->add($createExpert);

        //对医院管理
        // 添加 "updateHospital" 权限
        $updateHospital = $auth->createPermission('updateHospital');
        $updateHospital->description = '修改医院';
        $auth->add($updateHospital);

        // 添加 "deleteHospital" 权限
        $deleteHospital = $auth->createPermission('deleteHospital');
        $deleteHospital->description = '删除医院';
        $auth->add($deleteHospital);

        // 添加 "createHospital" 权限
        $createHospital = $auth->createPermission('createHospital');
        $createHospital->description = '新增医院';
        $auth->add($createHospital);
        
        //对用户管理者
        // 添加 "updateUser" 权限
        $updateUser = $auth->createPermission('updateUser');
        $updateUser->description = '修改用户信息';
        $auth->add($updateUser);

        // 添加 "deleteUser" 权限
        $deleteUser = $auth->createPermission('deleteUser');
        $deleteUser->description = '删除用户';
        $auth->add($deleteUser);

        // 添加 "createUser" 权限
        $createUser = $auth->createPermission('createUser');
        $createUser->description = '新增用户';
        $auth->add($createUser);

        // 添加 "indexUser" 权限
        $indexUser = $auth->createPermission('indexUser');
        $indexUser->description = '查看用户界面';
        $auth->add($indexUser);


        //对管理员用户
        // 添加 "updateAdminuser" 权限
        $updateAdminuser = $auth->createPermission('updateAdminuser');
        $updateAdminuser->description = '修改管理员信息';
        $auth->add($updateAdminuser);

        // 添加 "deleteAdminuser" 权限
        $deleteAdminuser = $auth->createPermission('deleteAdminuser');
        $deleteAdminuser->description = '删除管理员';
        $auth->add($deleteAdminuser);

        // 添加 "createAdminuser" 权限
        $createAdminuser = $auth->createPermission('createAdminuser');
        $createAdminuser->description = '新增管理员';
        $auth->add($createAdminuser);

        // 添加 "indexAdminuser" 权限
        $indexAdminuser = $auth->createPermission('indexAdminuser');
        $indexAdminuser->description = '查看管理员界面';
        $auth->add($indexAdminuser);


        //第三级管理员，用户文章，用户评论，用户预定，专家，医院管理的管理
        // 添加 "postadmin" 角色并赋予 "updatePost" “deletePost” “createPost”
        $ThirdAdmin = $auth->createRole('ThirdAdmin');
        $ThirdAdmin->description = '第三级管理员';
        $auth->add($ThirdAdmin);
        $auth->addChild($ThirdAdmin, $updatePost);
        $auth->addChild($ThirdAdmin, $createPost);
        $auth->addChild($ThirdAdmin, $deletePost);
        $auth->addChild($ThirdAdmin, $updateComment);
        $auth->addChild($ThirdAdmin, $approveComment);
        $auth->addChild($ThirdAdmin, $deleteComment);
        $auth->addChild($ThirdAdmin, $updateReserve);
        $auth->addChild($ThirdAdmin, $createReserve);
        $auth->addChild($ThirdAdmin, $deleteReserve);
        $auth->addChild($ThirdAdmin, $updateExpert);
        $auth->addChild($ThirdAdmin, $createExpert);
        $auth->addChild($ThirdAdmin, $deleteExpert);
        $auth->addChild($ThirdAdmin, $updateHospital);
        $auth->addChild($ThirdAdmin, $createHospital);
        $auth->addChild($ThirdAdmin, $deleteHospital);

        
        //第二级管理员用于管理用户，和第三级管理员
        // 添加 "postOperator" 角色并赋予  “deletePost” 
        $SecondAdmin = $auth->createRole('SecondAdmin');
        $SecondAdmin->description = '第二级管理员';
        $auth->add($SecondAdmin);
        $auth->addChild($SecondAdmin, $indexUser);
        $auth->addChild($SecondAdmin, $ThirdAdmin);
        $auth->addChild($SecondAdmin, $updateUser);
        $auth->addChild($SecondAdmin, $createUser);
        $auth->addChild($SecondAdmin, $deleteUser);

        //第一级管理员，总管理者
        // 添加 "admin" 角色并赋予所有其他角色拥有的权限
        $admin = $auth->createRole('admin');
        $admin->description = '系统管理员';
        $auth->add($admin);
        $auth->addChild($admin, $indexAdminuser);
        $auth->addChild($admin, $SecondAdmin);
        $auth->addChild($admin, $updateAdminuser);
        $auth->addChild($admin, $createAdminuser);
        $auth->addChild($admin, $deleteAdminuser);

        
        

        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($admin, 1);
        $auth->assign($SecondAdmin, 2);
        $auth->assign($ThirdAdmin, 3);
    }
}
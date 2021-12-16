<?php
/* Smarty version 4.0.0, created on 2021-12-16 11:20:50
  from 'D:\phpProject\IT1995Blog\app\admin\view\student.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61bab09283dbd6_68690941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '411a2a734267a6db6b983598c40e08118feebb53' => 
    array (
      0 => 'D:\\phpProject\\IT1995Blog\\app\\admin\\view\\student.html',
      1 => 1639624847,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61bab09283dbd6_68690941 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>HelloWorld</h1>
    <table border="1" cellspacing="1" cellpadding="1">
        <thead>
        <tr>
            <td>ID</td>
            <td>名字</td>
            <td>年龄</td>
            <td>性别</td>
            <td>邮箱</td>
            <td>地址</td>
            <td>更新时间</td>
        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['students']->value, 'student');
$_smarty_tpl->tpl_vars['student']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['age'];?>
</td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['student']->value['sex'] == "m") {?> 男
                <?php } else { ?>女
                <?php }?>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['email'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['address'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['student']->value['updateTime'];?>
</td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>

    </table>
</body>
</html><?php }
}

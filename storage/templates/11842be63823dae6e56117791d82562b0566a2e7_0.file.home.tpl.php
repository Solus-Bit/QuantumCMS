<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-08 15:10:48
         compiled from "/home/vagrant/Code/QuantumCMS/app/templates/pages/user/home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1133659223559d3d78511738_75692264%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11842be63823dae6e56117791d82562b0566a2e7' => 
    array (
      0 => '/home/vagrant/Code/QuantumCMS/app/templates/pages/user/home.tpl',
      1 => 1436357017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1133659223559d3d78511738_75692264',
  'variables' => 
  array (
    'system_currentUser' => 0,
    'system_path' => 0,
    'home_empire' => 0,
    'home_character_count' => 0,
    'home_play_time' => 0,
    'home_menuPoints' => 0,
    'menuPoint' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_559d3d78618756_26775753',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559d3d78618756_26775753')) {
function content_559d3d78618756_26775753 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1133659223559d3d78511738_75692264';
?>
<div style="float: left; padding-right: 20px; height: 100%; border-right: 1px solid black;">
    <table>
        <tr>
            <th>Account:</th>
            <td><?php echo $_smarty_tpl->tpl_vars['system_currentUser']->value->getLogin();?>
</td>
        </tr>
        <tr>
            <th>Reich:</th>
            <td><img src="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
img/empire_<?php echo $_smarty_tpl->tpl_vars['home_empire']->value;?>
.png" /></td>
        </tr>
        <tr>
            <th>Charaktere:</th>
            <td><?php echo $_smarty_tpl->tpl_vars['home_character_count']->value;?>
</td>
        </tr>
        <tr>
            <th>Spielzeit:</th>
            <td><?php echo $_smarty_tpl->tpl_vars['home_play_time']->value;?>
</td>
        </tr>
        <tr>
            <th>L&ouml;schcode:</th>
            <td><?php echo $_smarty_tpl->tpl_vars['system_currentUser']->value->getSocialId();?>
</td>
        </tr>
    </table>
</div>
<div style="float: left; padding-left: 20px;">
    <?php
$foreach_0_menuPoint_sav['s_item'] = isset($_smarty_tpl->tpl_vars['menuPoint']) ? $_smarty_tpl->tpl_vars['menuPoint'] : false;
$_from = $_smarty_tpl->tpl_vars['home_menuPoints']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['menuPoint'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['menuPoint']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menuPoint']->value) {
$_smarty_tpl->tpl_vars['menuPoint']->_loop = true;
$foreach_0_menuPoint_sav['item'] = $_smarty_tpl->tpl_vars['menuPoint'];
?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;
echo $_smarty_tpl->tpl_vars['menuPoint']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['menuPoint']->value['title'];?>
</a></li>
    <?php
$_smarty_tpl->tpl_vars['menuPoint'] = $foreach_0_menuPoint_sav['item'];
}
if ($foreach_0_menuPoint_sav['s_item']) {
$_smarty_tpl->tpl_vars['menuPoint'] = $foreach_0_menuPoint_sav['s_item'];
}
?>
</div>
<div style="clear: both;">
</div><?php }
}
?>
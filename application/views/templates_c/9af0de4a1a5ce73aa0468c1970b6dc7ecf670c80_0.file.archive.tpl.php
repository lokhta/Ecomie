<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:51
  from 'C:\wamp64\www\Ecomie\application\views\templates\admin\archive.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08e3d16201_30824728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9af0de4a1a5ce73aa0468c1970b6dc7ecf670c80' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\admin\\archive.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb08e3d16201_30824728 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\Ecomie\\application\\third_party\\smarty\\libs\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),));
?>
<div>
    <table class="tab">
        <tr class="thead">
            <th>N° évènement</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['archive']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
            <tr style="background: <?php echo smarty_function_cycle(array('values'=>'#fff , #D6EAF8'),$_smarty_tpl);?>
">
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['eventId'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['eventName'];?>
</td>
        
                <td class="link_gestion">
                    <a href="<?php echo base_url();?>
Events/archives?event_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['eventId'];?>
"><i class="fas fa-search"></i></a>
                </td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
    </div>
</div><?php }
}

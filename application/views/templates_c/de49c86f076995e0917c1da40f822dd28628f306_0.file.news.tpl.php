<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:50
  from 'C:\wamp64\www\Ecomie\application\views\templates\admin\news.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08e27874e1_84951532',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de49c86f076995e0917c1da40f822dd28628f306' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\admin\\news.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb08e27874e1_84951532 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\Ecomie\\application\\third_party\\smarty\\libs\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),));
?>
<div>
    <table class="tab">
        <tr class="thead">
            <th>N° article</th>
            <th>Titre</th>
            <th>Date de création</th>
            <th>Actions</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['news']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
            <tr style="background: <?php echo smarty_function_cycle(array('values'=>'#fff , #D6EAF8'),$_smarty_tpl);?>
">
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['newsId'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['newsTitle'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['date'];?>
</td>
                <td class="link_gestion">
                    <a href="<?php echo base_url();?>
Newsletters/dashboard?news_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['newsId'];?>
"><i class="fas fa-search"></i></a>
                    <button style="border:0px" class="delete btn_basket" data-link="<?php echo base_url();?>
Newsletters/dashboard?news_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['newsId'];?>
&amp;del=1"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
    <div id="formContent">
        <?php echo form_open('Newsletters/dashboard','class="form"');?>

        <p class="field-content">
            <?php echo form_label("Titre");?>

            <?php echo form_input("newsTitle",'',"id='title'");?>

        </p>
                <?php echo form_textarea('newsContent','','id="newsContent" class="ckeditor"');?>

        <?php echo form_submit('valider','Valider','id="submit"');?>

        <?php echo form_close();?>

    </div>
</div>

<?php echo '<script'; ?>
>
        $(function() {

            $('.delete').click(function() {
                var ok = confirm('Êtes-vous sûr de vouloir supprimer ?');
                if(ok){
                var current = $(this);
                var link = current.data('link');
                window.location.replace(link);
               }
            });
        });
    <?php echo '</script'; ?>
><?php }
}

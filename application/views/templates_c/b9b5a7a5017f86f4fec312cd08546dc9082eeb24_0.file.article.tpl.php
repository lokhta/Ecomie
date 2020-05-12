<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:42
  from 'C:\wamp64\www\Ecomie\application\views\templates\admin\article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08da6fa6a5_49493637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9b5a7a5017f86f4fec312cd08546dc9082eeb24' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\admin\\article.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb08da6fa6a5_49493637 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\Ecomie\\application\\third_party\\smarty\\libs\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),));
?>
<div>
    <table class="tab">
        <tr class="thead">
            <th>N° article</th>
            <th>Statut</th>
            <th>Titre</th>
            <th>Date de création</th>
            <?php if ($_SESSION['role'] == 1) {?>
                <th>Auteur</th>
            <?php }?>
            <th>Actions</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
            <tr style="background: <?php echo smarty_function_cycle(array('values'=>'#fff , #D6EAF8'),$_smarty_tpl);?>
">
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['articleId'];?>
</td>
                <?php if ($_smarty_tpl->tpl_vars['val']->value['articleValidate'] == 0) {?>
                    <td><i class="fas fa-hourglass-half"></i></td>
                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['articleValidate'] == 1) {?>
                    <td><i class="far fa-check-circle"></i></td>
                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['articleValidate'] == 2) {?>
                    <td><i class="far fa-times-circle"></i></td>
                <?php }?>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['articleTitle'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['date'];?>
</td>
                <?php if ($_SESSION['role'] == 1) {?>
                    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['author'];?>
</td>
                <?php }?>
                <td class="link_gestion">
                    <a href="<?php echo base_url();?>
Articles/dashboard?article_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['articleId'];?>
"><i class="fas fa-search"></i></a>
                    <button style="border:0px" class="delete btn_basket" data-link="<?php echo base_url();?>
Articles/dashboard?article_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['articleId'];?>
&amp;del=1"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
    <div id="formContent">
        <?php echo form_open('Articles/dashboard','class="form"');?>

        <p class="field-content">
            <?php echo form_label("Catégorie");?>

            <?php echo form_dropdown('articleCategory',$_smarty_tpl->tpl_vars['option']->value,"id='cat'");?>

        </p>
        <p class="field-content">
            <?php echo form_label("Titre");?>

            <?php echo form_input("articleTitle",'',"id='title'");?>

        </p>
                <?php echo form_textarea('articleContent','','id="articleContent" class="tinymce"');?>

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
>
<?php }
}

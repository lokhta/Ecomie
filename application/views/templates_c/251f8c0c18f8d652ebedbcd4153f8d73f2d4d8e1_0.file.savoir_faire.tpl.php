<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:56
  from 'C:\wamp64\www\Ecomie\application\views\templates\pages\savoir_faire.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08e8f0b803_00561164',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '251f8c0c18f8d652ebedbcd4153f8d73f2d4d8e1' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\pages\\savoir_faire.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ebb08e8f0b803_00561164 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Ecomie - Savoir-Faire",'name'=>$_smarty_tpl->tpl_vars['Name']->value), 0, false);
?>
    <div class="btn-content" id="btn-create-art">
        <?php if ($_SESSION['id']) {?>
            <a href="<?php echo base_url();?>
Articles/dashboard" class="btn">Créer un article</a> 
        <?php }?>
    </div>
    <div id="search_content">
        <form action="<?php echo base_url();?>
Articles/articles?search=1" method="post" id="form_search">
            <span>Rechercher par mots-clés : </span>
            <input type="text" name="keyword" class="field_search">
            <input type="submit" value="Rechercher" class="btn btn_search">
        </form>

        <div id="search_cat">
            <span>Rechercher par catégorie : </span>
            <a href="<?php echo base_url();?>
Articles/articles?category_id=1" class="btn btn_search" id="search_savoir" data-category-name="Savoir">Savoir</a>
            <a href="<?php echo base_url();?>
Articles/articles?category_id=2" class="btn btn_search" id="search_faire" data-category-name="Faire">Faire</a>
        </div>

    </div>
    <div class="contenaire__bloc">
        <?php if (!$_smarty_tpl->tpl_vars['article']->value && $_GET['search']) {?>
            <p>Aucuns articles n'a été trouvés</p>
            <?php } else { ?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>

                    <section class="savoir__faire">
                        <a class="<?php echo $_smarty_tpl->tpl_vars['val']->value['category'];?>
__bloc" href="<?php echo base_url();?>
Articles/articles?article_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['articleId'];?>
">
                            <div class="<?php echo $_smarty_tpl->tpl_vars['val']->value['category'];?>
__logo">
                                <img src="<?php echo base_url();?>
assets/img/<?php echo $_smarty_tpl->tpl_vars['val']->value['category'];?>
" alt="">
                            </div>
                            <div class="<?php echo $_smarty_tpl->tpl_vars['val']->value['category'];?>
__titre">
                                <h2><?php echo $_smarty_tpl->tpl_vars['val']->value['articleTitle'];?>
</h2>
                            </div>
                        </a>
                        <div class="auteur">
                            <p><?php echo $_smarty_tpl->tpl_vars['val']->value['author'];?>
</p>
                            <p><?php echo $_smarty_tpl->tpl_vars['val']->value['date'];?>
</p>
                        </div>
                    </section>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>     
        <?php }?>
    </div>
        <section class="astuce__fb">
            <p>Plein d'autres astuce sur notre page Facebook</p>
            <a href="#"><img src="<?php echo base_url();?>
assets/img/facebook.svg" alt="Facebook"></a>
        </section>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

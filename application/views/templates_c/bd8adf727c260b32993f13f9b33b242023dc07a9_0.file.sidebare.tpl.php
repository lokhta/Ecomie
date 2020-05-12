<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:42
  from 'C:\wamp64\www\Ecomie\application\views\templates\admin\sidebare.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08da5f6142_36616439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd8adf727c260b32993f13f9b33b242023dc07a9' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\admin\\sidebare.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb08da5f6142_36616439 (Smarty_Internal_Template $_smarty_tpl) {
?><aside id="sidebar">
    <nav class="side__nav">
    <?php if ($_SESSION['role'] != 3) {?>
        <div class="link-nav-admin">
            <div class="content_ico">
                <i class="fas fa-tachometer-alt ico_admin"></i>
            </div>
            <a href="<?php echo base_url();?>
dashboard" class="link_admin">Tableau de bord</a>
        </div>
    <?php }?>
        <div class="link-nav-admin">
            <div class="content_ico">
                <i class="fas fa-user ico_admin"></i>
            </div>
            <a href="<?php echo base_url();?>
users/profil" class="link_admin">Profil</a>
        </div>
        
        <div class="link-nav-admin">
            <div class="content_ico"> 
                <i class="fas fa-address-book ico_admin"></i>
            </div>
            <a href="<?php echo base_url();?>
users/membres" class="link_admin">Membres</a>
        </div>

        <div class="link-nav-admin">
            <div class="content_ico">
                <i class="fas fa-newspaper ico_admin"></i>
            </div>
            <a href="<?php echo base_url();?>
Articles/dashboard" class="link_admin">Articles</a>
        </div>
        <?php if ($_SESSION['role'] != 3) {?>
        <div class="link-nav-admin">
            <div class="content_ico">
                <i class="fas fa-calendar-alt ico_admin"></i>
            </div>
            <a href="<?php echo base_url();?>
Events/dashboard" class="link_admin">Evénements</a>
        </div>
        <?php }?>
        <?php if ($_SESSION['role'] != 3) {?>
        <div class="link-nav-admin">
            <div class="content_ico">            
                <i class="fas fa-images"></i>
            </div>
            <a href="<?php echo base_url();?>
Galeries/dashboard" class="link_admin">Galerie</a>
        </div>
        <?php }?>
        <?php if ($_SESSION['role'] == 1) {?>
        <div class="link-nav-admin">
                <div class="content_ico">
                    <i class="fas fa-paper-plane ico_admin"></i>
                </div>
            <a href="<?php echo base_url();?>
newsletters/dashboard" class="link_admin">Newsletters</a>
        </div>
        <?php }?>
        <div class="link-nav-admin">
            <div class="content_ico">
                <i class="fas fa-envelope ico_admin"></i>
            </div>
            <?php if ($_SESSION['role'] != 3) {?>
                <a href="<?php echo base_url();?>
forms/dashboard" class="link_admin">Messagerie</a>
                <?php } elseif ($_SESSION['role'] == 3) {?>
                <a href="<?php echo base_url();?>
Messages/dashboard" class="link_admin">Messagerie</a>
            <?php }?>

        </div>
        <?php if ($_SESSION['role'] != 3) {?>
        <div class="link-nav-admin">
            <div class="content_ico">            
                <i class="fas fa-archive ico_admin"></i>
            </div>
            <a href="<?php echo base_url();?>
events/archives" class="link_admin">Archives</a>
        </div>
        <?php }?>
    </nav>
</aside><?php }
}

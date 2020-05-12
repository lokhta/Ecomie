<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:47
  from 'C:\wamp64\www\Ecomie\application\views\templates\admin\membre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08df753ec1_90037420',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c89a24ed46a76e19c0a57f401140291a916de4eb' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\admin\\membre.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb08df753ec1_90037420 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\Ecomie\\application\\third_party\\smarty\\libs\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),));
?>
<div>

    <div id="tab_content">


        <div id="tab_left">
            <table class="tab">
                <tr class="thead">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th></th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users_list']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
                    <tr style="background: <?php echo smarty_function_cycle(array('values'=>'#fff , #D6EAF8'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['userName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['userFirstname'];?>
</td>
                        <td class="link_gestion">
                        <?php if ($_SESSION['role'] != 3) {?>
                            <button class="action btn_more btn_display" data-role = "<?php echo $_smarty_tpl->tpl_vars['val']->value['roleName'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['val']->value['userId'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['val']->value['userName'];?>
" data-firstname="<?php echo $_smarty_tpl->tpl_vars['val']->value['userFirstname'];?>
" data-mail="<?php echo $_smarty_tpl->tpl_vars['val']->value['userEmail'];?>
"
                            data-phone="<?php echo $_smarty_tpl->tpl_vars['val']->value['userPhone'];?>
" data-address="<?php echo $_smarty_tpl->tpl_vars['val']->value['userAddress'];?>
" data-cp="<?php echo $_smarty_tpl->tpl_vars['val']->value['userCp'];?>
" data-city="<?php echo $_smarty_tpl->tpl_vars['val']->value['userCity'];?>
"><i class="fas fa-search"></i></button>
                            <?php if ($_SESSION['role'] == 1) {?>
                                <button style="border:0px" class="delete btn_basket" data-link="<?php echo base_url();?>
users/membres?user_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['userId'];?>
&amp;del=1"><i class="fas fa-trash-alt"></i></button>
                            <?php }?>

                            <?php } elseif ($_SESSION['role'] == 3) {?>
                                <button class="action btn_message btn_display" id="btn_message" data-id="<?php echo $_smarty_tpl->tpl_vars['val']->value['userId'];?>
" data-firstname="<?php echo $_smarty_tpl->tpl_vars['val']->value['userFirstname'];?>
"><i class="fas fa-envelope"></i></button>
                        <?php }?>
                        </td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
        </div>

            <div id="tab_right" class="tab_right_membre">
                <?php if ($_SESSION['role'] != 3) {?>
                    <p class="thead">Coordonnées</p>
                    <p class="row_info_membre white">
                        <span class="lab">Nom</span>
                        <span id="name" class="info_membre"></span>
                    </p>
                    <p class="row_info_membre bluesky">
                        <span class="lab">Prénom</span>
                        <span id="firstname" class="info_membre"></span>
                    </p>
                    <p class="row_info_membre white">
                        <span class="lab mail_membres">Email</span>
                        <span id="mail" class="info_membre mail"></span>
                    </p>
                    <p class="row_info_membre bluesky">
                        <span class="lab">Téléphone</span>
                        <span id="phone" class="info_membre"></span>
                    </p>
                    <p class="row_info_membre white">
                        <span class="lab">Adresse</span>
                        <span id="address" class="info_membre"></span>
                    </p>
                    <p class="row_info_membre bluesky">
                        <span class="lab">CP</span>
                        <span id="cp" class="info_membre"></span>
                    </p>
                    <p class="row_info_membre white">
                        <span class="lab">Ville</span>
                        <span id="city" class="info_membre"></span>
                    </p>

                        <div class="row_info_membre bluesky">
                        <p class="row_info_membre bluesky" id="role_content">
                            <span class="lab">Role</span>
                            <span id="roleName" class="info_membre"></span>
                        </p>
                        <?php if ($_SESSION['role'] == 1) {?>
                            <form  id="form_role">
                            <span id="user_id"></span>
                                                        <span class="info_membre" id="user_role"><?php echo $_smarty_tpl->tpl_vars['user']->value['role'];?>
</span>
                            <?php echo form_dropdown('userRole',$_smarty_tpl->tpl_vars['option']->value,'',"id='role'");?>


                            <?php echo form_submit('submit',"Valider","id='btn_submit'");?>

                            <span id="btn_edit_role"><i class="fas fa-edit"></i></span>
                            </form>
                        <?php }?>
                        </div>


                <?php }?>
                <?php if ($_SESSION['role'] == 3) {?>
                    <form action="<?php echo base_url();?>
Messages/send_message" id="form_message">

                    </form>
                    <span id="success" class="message_success"></span>
                <?php }?>
            </div>

    </div>

</div>




<?php echo '<script'; ?>
>


    $("#btn_edit_role").on("click", function(){
        $("#roleName").css("display", "none");
        $("#role").css("display", "block");
        $("#btn_submit").css("display", "block");

    })


    /*Affichage dynamique des infos membre */
    $('.action').click(function() {
        var current = $(this);
        var name = current.data('name');
        var firstname = current.data('firstname');
        var mail = current.data('mail');
        var phone = current.data('phone');
        var address = current.data('address');
        var cp = current.data('cp');
        var city = current.data('city');
        var id = current.data('id');
        var role = current.data('role');

        var url = "<?php echo base_url();?>
Users/membres";

        $('#form_role').attr("action", url);
        $("#user_id").html("<input type=checkbox name='userId' value='"+id+"' checked style='display:none;'>")
        $('#name').text(name);
        $('#roleName').text(role);
        $('#firstname').text(firstname);
        $('#mail').text(mail);
        $('#phone').text(phone);
        $('#address').text(address);
        $('#cp').text(cp);
        $('#city').text(city);
        });

<?php echo '</script'; ?>
><?php }
}

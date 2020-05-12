<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:45
  from 'C:\wamp64\www\Ecomie\application\views\templates\admin\profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08ddaf7d64_92048055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd30e709511dcc346b48f09f1617c054c9a8ebdff' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\admin\\profil.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb08ddaf7d64_92048055 (Smarty_Internal_Template $_smarty_tpl) {
?> 
                    <div class="btn-content">
                        <a href="<?php echo base_url();?>
dashboard" class="btn">Retour</a>
                    </div>
                    <?php echo form_open_multipart('users/profil');?>

                            <table id="tab_profil">
                                <section id="content_avatar">
                                    <p>INFORMATIONS PERSONNELLES</p>
                                    <img class="image" src="<?php echo base_url();?>
assets/img/upload/<?php echo $_smarty_tpl->tpl_vars['avatar']->value;?>
" alt="">
                                    <div id="gestion_photo_profil">
                                        <span id="help_image" class="info_bulle"></span>
                                        <i class="fas fa-info-circle" id="bulle_image"></i>
                                        <span class="btn btn_edit_photo">Modifier</span>
                                        <button style="border:0px" class="delete btn btn_del_photo" data-link="<?php echo base_url();?>
users/profil?del=1">Supprimer</button>
                                    </div>
                                    <?php echo form_upload("userAvatar",'',"id='userAvatar'");?>

                                </section>
                                <tr class="info_profil"></td>
                                    <td><?php echo form_label("Nom");?>
</td>
                                    <td>
                                        <span class="info_user"><?php echo $_SESSION['name'];?>
</span>
                                        <?php echo form_input("userName",'',"id='userName' class='field_profil'");?>

                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>

                                <tr class="info_profil">
                                    <td><?php echo form_label("Prénom");?>
</td>
                                    <td>
                                        <span class="info_user"><?php echo $_SESSION['firstname'];?>
</span> 
                                        <?php echo form_input("userFirstname",'',"id='userFirstname' class='field_profil'");?>
 
                                        <span class="btn_edit_profil"><i class="fas fa-edit">
                                    </td>
                                </tr>
                            
                                <tr class="info_profil">
                                    <td><?php echo form_label("email");?>
</td>
                                    <td>
                                        <span class="info_user"><?php echo $_SESSION['email'];?>
</span>
                                        <?php echo form_input("userEmail",'',"id='userEmail' class='field_profil'");?>

                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>

                                <tr class="info_profil">
                                    <td><?php echo form_label("N° de Téléphone");?>
</td>
                                    <td>
                                        <span class="info_user"><?php echo $_SESSION['phone'];?>
</span>
                                        <?php echo form_input("userPhone",'',"id='userPhone' class='field_profil'");?>

                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>

                                <tr class="info_profil">
                                    <td><?php echo form_label("Adresse postale");?>
</td>
                                    <td>
                                        <span class="info_user"><?php echo $_SESSION['address'];?>
</span>
                                        <?php echo form_input("userAddress",'',"id='userAddress' class='field_profil'");?>

                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>
                            
                                <tr class="info_profil">
                                    <td><?php echo form_label("Code postale");?>
</td>
                                    <td>
                                        <span class="info_user"><?php echo $_SESSION['cp'];?>
</span>
                                        <?php echo form_input("userCp",'',"id='userCp' class='field_profil'");?>

                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>
                            
                                <tr class="info_profil">
                                    <td><?php echo form_label("Ville");?>
</td>
                                    <td>
                                        <span class="info_user"><?php echo $_SESSION['city'];?>
</span>
                                        <?php echo form_input("userCity",'',"id='userCity' class='field_profil'");?>

                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>

                                <tr class="info_profil">
                                    <td><?php echo form_label("Mot de passe");?>
</td>
                                    <td>
                                        <span class="info_user"></span>
                                        <?php echo form_password("userPwd",'',"id='userPwd' class='field_profil'");?>

                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>
                            </table>
                            <?php echo form_submit('submit',"Mettre à jour","id='btn_edit_profil'");?>

                        <?php echo form_close();?>



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

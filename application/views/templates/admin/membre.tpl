<div>

    <div id="tab_content">


        <div id="tab_left">
            <table class="tab">
                <tr class="thead">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th></th>
                </tr>
                {foreach from=$users_list key=key item=val}
                    <tr style="background: {cycle values='#fff , #D6EAF8'}">
                        <td>{$val.userName}</td>
                        <td>{$val.userFirstname}</td>
                        <td class="link_gestion">
                        {if $smarty.session.role != 3}
                            <button class="action btn_more btn_display" data-role = "{$val.roleName}" data-id="{$val.userId}" data-name="{$val.userName}" data-firstname="{$val.userFirstname}" data-mail="{$val.userEmail}"
                            data-phone="{$val.userPhone}" data-address="{$val.userAddress}" data-cp="{$val.userCp}" data-city="{$val.userCity}"><i class="fas fa-search"></i></button>
                            {if $smarty.session.role == 1}
                                <button style="border:0px" class="delete btn_basket" data-link="{base_url()}users/membres?user_id={$val.userId}&amp;del=1"><i class="fas fa-trash-alt"></i></button>
                            {/if}

                            {elseif $smarty.session.role == 3}
                                <button class="action btn_message btn_display" id="btn_message" data-id="{$val.userId}" data-firstname="{$val.userFirstname}"><i class="fas fa-envelope"></i></button>
                        {/if}
                        </td>
                    </tr>
                {/foreach}
            </table>
        </div>

            <div id="tab_right" class="tab_right_membre">
                {if $smarty.session.role != 3}
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
                        {if $smarty.session.role == 1}
                            <form  id="form_role">
                            <span id="user_id"></span>
                            {* {form_label('Role', "role", 'class="lab"')} *}
                            <span class="info_membre" id="user_role">{$user.role}</span>
                            {form_dropdown('userRole',$option,'',"id='role'")}

                            {form_submit('submit', "Valider", "id='btn_submit'")}
                            <span id="btn_edit_role"><i class="fas fa-edit"></i></span>
                            </form>
                        {/if}
                        </div>


                {/if}
                {if $smarty.session.role == 3}
                    <form action="{base_url()}Messages/send_message" id="form_message">

                    </form>
                    <span id="success" class="message_success"></span>
                {/if}
            </div>

    </div>

</div>




<script>


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

        var url = "{base_url()}Users/membres";

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

</script>
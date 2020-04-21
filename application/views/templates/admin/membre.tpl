<div>
    <div class="btn-content">
        <a href="{base_url()}dashboard" class="btn">Retour</a>
    </div>
    {* {if $smarty.session.role == 1}
    <table class="tab">
        <tr class="thead">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse email</th>
            <th>Téléphone</th>
            <th>Code Postale</th>
            <th>Ville</th>
            <th>adresse complète</th>
            <th>Rôle</th>
            <th>Supprimer</th>
        </tr>
        {foreach from=$users key=key item=val}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.userName}</td>
                <td>{$val.userFirstname}</td>
                <td>{$val.userEmail}</td>
                <td>{$val.userPhone}</td>
                <td>{$val.userCp}</td>
                <td>{$val.userCity}</td>
                <td>{$val.userAddress}</td>
                <td>{$val.roleName}</td>
                <td class="link_gestion">
                    <a href="{base_url()}users/membres?user_id={$val.userId}&amp;del=1"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        {/foreach}
    </table>
    {else}
        <p>Vous n'avez pas l'autorisation d'accéder à cette page</p>
    {/if} *}


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
                        <a href="{base_url()}users/membres?user_id={$val.userId}"><i class="fas fa-search"></i></a>
                        <a href="{base_url()}users/membres?user_id={$val.userId}&amp;del=1"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            {/foreach}
        </table>
    </div>


    <div id="tab_right">
        <p class="thead">Coordonnées</p>
        <p class="row_info_membre white">
            <span class="lab">Nom</span>
            <span class="info_membre">{$user.userName}</span>
        </p>
        <p class="row_info_membre bluesky">
            <span class="lab">Prénom</span>
            <span class="info_membre">{$user.userFirstname}</span>
        </p>
        <p class="row_info_membre white">
            <span class="lab">Email</span>
            <span class="info_membre">{$user.userEmail}</span>
        </p>
        <p class="row_info_membre bluesky">
            <span class="lab">Téléphone</span>
            <span class="info_membre">{$user.userPhone}</span>
        </p>
        <p class="row_info_membre white">
            <span class="lab">Adresse</span>
            <span class="info_membre">{$user.userAdresse}</span>
        </p>
        <p class="row_info_membre bluesky">
            <span class="lab">CP</span>
            <span class="info_membre">{$user.userCp}</span>
        </p>
        <p class="row_info_membre white">
            <span class="lab">Ville</span>
            <span class="info_membre">{$user.userCity}</span>
        </p>
        <div class="row_info_membre bluesky">
            {form_open('users/membres')}
                {form_label('Role', "role", 'class="lab"')}
                <span class="info_membre" id="user_role">{$user.role}</span>
                {form_dropdown('userRole',$option,'',"id='role'")}
                {form_submit('submit', "Valider", "id='btn_submit'")}
                <span id="btn_edit_role"><i class="fas fa-edit"></i></span>
            {form_close()}
        </div>
    </div>


</div>


</div>




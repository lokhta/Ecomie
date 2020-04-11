{include file="header.tpl" title="Ecomie - membres" name=$Name}
<div>
    <div class="btn-content">
        <a href="{base_url()}dashboard" class="btn">Retour</a>
    </div>
    {if $smarty.session.role == 1}
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
    {/if}
</div>
{include file="footer.tpl"}
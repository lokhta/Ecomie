{include file="header.tpl" title="Ecomie - membres" name=$Name}
    <table class="tab">
        <tr class="thead">
            <th>Id utilisateur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse email</th>
            <th>Mot de passe</th>
            <th>Rôle</th>
        </tr>
        {foreach from=$users key=key item=val}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.userId}</td>
                <td>{$val.userName}</td>
                <td>{$val.userFirstName}</td>
                <td>{$val.userEmail}</td>
                <td>{$val.userPwd}</td>
                <td>{$val.userRole}</td>
            </tr>
        {/foreach}
    </table>
{include file="footer.tpl"}
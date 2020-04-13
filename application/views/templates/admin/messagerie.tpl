<table class="tab">
    <tr class="thead">
        <th>Expéditeur</th>
        <th>Object</th>
        <th>Date de réception</th>
        <th>Action</th>
    </tr>
    {if $smarty.session.role == 1}
        {foreach from=$message key=key item=val}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.formSendername}</td>
                <td>{$val.formSubject}</td>
                <td>{$val.date} {$val.time}</td>
                <td class="link_gestion">
                    <a href="{base_url()}forms/dashboard?form_id={$val.formId}"><i class="fas fa-search"></i></a>
                    <a href="{base_url()}forms/dashboard?form_id={$val.formId}&amp;del=1"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        {/foreach}
    {/if}

</table>
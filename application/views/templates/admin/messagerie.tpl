<div class="pagination_link">{$pagination}</div>
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
                    <button style="border:0px" class="delete btn_basket" data-link="{base_url()}forms/dashboard?form_id={$val.formId}&amp;del=1"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        {/foreach}
    {/if}

</table>

<script>
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
    </script>
<div>
    <table class="tab">
        <tr class="thead">
            <th>N° évènement</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
        {foreach from=$archive item=val key=key}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.eventId}</td>
                <td>{$val.eventName}</td>
        
                <td class="link_gestion">
                    <a href="{base_url()}Events/archives?event_id={$val.eventId}"><i class="fas fa-search"></i></a>
                </td>
            </tr>
        {/foreach}
    </table>
    </div>
</div>
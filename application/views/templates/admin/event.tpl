<div>
    <table class="tab">
        <tr class="thead">
            <th>N° évènement</th>
            <th>Statut</th>
            <th>Titre</th>
            <th>Date de création</th>
            <th>Auteur</th>
            <th>Actions</th>
        </tr>
        {foreach from=$event key=key item=val}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.eventId}</td>
                <td>{$val.eventName}</td>
                <td>{$val.eventDate}</td>
                    <td>{$val.eventAuthor}</td>
        
                <td class="link_gestion">
                    <a href="{base_url()}Events/dashboard?event_id={$val.eventId}"><i class="fas fa-search"></i></a>
                    <a href="{base_url()}Events/dashboard?event_id={$val.eventId}&amp;del=1"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        {/foreach}
    </table>
    <div id="formContent">
        <p class="field-content">
            {form_label("Titre")}
            {form_input("eventName",'',"id='title'")}
        </p>
        <p class="field-content">
            {form_label("Debut date")}
            {form_input("eventDateStart",'',"id='Debut date'")}
        </p>
        <p class="field-content">
            {form_label("Debut heure")}
            {form_input("eventTimeStart",'',"id='Debut heure'")}
        </p>
        <p class="field-content">
            {form_label("Fin jour")}
            {form_input("eventDateEnd",'',"id='Fin jour'")}
        </p>
        <p class="field-content">
            {form_label("Fin heure")}
            {form_input("eventTimeEnd",'',"id='Fin heure'")}
        </p>
        {* <textarea type="text" name="eventContent" id="eventContent"></textarea> *}
        {form_textarea('eventContent','','id="eventContent" class="tinymce"')}
        {form_submit('valider','Valider','id="submit"')}
        {form_close()}
    </div>
</div>
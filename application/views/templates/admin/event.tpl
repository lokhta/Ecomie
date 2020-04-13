<div>
    <table class="tab">
        <tr class="thead">
            <th>N° évènement</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
<<<<<<< HEAD
        
        {foreach from=$event item=val key=key}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.eventId}</td>
                <td>{$val.eventName}</td>
=======
        {foreach from=$event key=key item=val}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.eventId}</td>
                <td>{$val.eventName}</td>
                <td>{$val.eventDate}</td>
                    <td>{$val.eventAuthor}</td>
>>>>>>> 441c3807dc9316f0f8d19c07d4f7a96b30a5d3b9
        
                <td class="link_gestion">
                    <a href="{base_url()}Events/dashboard?event_id={$val.eventId}"><i class="fas fa-search"></i></a>
                    <a href="{base_url()}Events/dashboard?event_id={$val.eventId}&amp;del=1"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        {/foreach}
    </table>
   
        <div class="formContent" id="edit">
                {form_open($url, "class='form'")}
                    <p class="field-content">
                        {form_label("Titre")}
                        {form_input("eventName",$eventDetail.eventName,"id='title'")}
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
                {form_textarea('eventContent',$eventDetail.eventContent,'id="eventContent" class="ckeditor"')}
                {form_submit('valider','Valider','id="submit"')}
                {form_close()}
            </div>
    </div>
</div>
<div>
    <table class="tab">
        <tr class="thead">
            <th>N° évènement</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
        {foreach from=$galerie item=val key=key}
            <tr style="background: {cycle values='#fff , #D6EAF8'}">
                <td>{$val.eventId}</td>
                <td>{$val.eventName}</td>
        
                <td class="link_gestion">
                    <a href="{base_url()}Galeries/dashboard?event_id={$val.eventId}"><i class="fas fa-search"></i></a>
                    <a href="{base_url()}Galeries/dashboard?event_id={$val.eventId}&amp;del=1"><i class="fas fa-trash-alt"></i></a>
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
          
                {form_textarea('eventContent',$eventDetail.eventContent,'id="eventContent" class="ckeditor"')}
                {form_submit('valider','Valider','id="submit"')}
                {form_close()}
            </div>
    </div>
</div>
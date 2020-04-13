<div id="modal">
    <div>
        <div class="btn-content">
            <a href="{base_url()}Events/dashboard" class="btn">Retour</a>
        </div>
    
        <div>
            <div>
                <h2>{$eventDetail.eventName}</h2>
                <span>Publié par {$eventDetail.eventAuthor} </span>
                <span>Date {$eventDetail.eventDateStart} - {$eventDetail.eventTimeStart} /
                    {$eventDetail.eventDateEnd}   {$eventDetail.eventTimeEnd}</span>
                <p>{$eventDetail.eventContent}</p>
            </div>
            <div class="content-action">
                <a href="{base_url()}Events/dashboard?event_id={$smarty.get.event_id}&amp;edit=1" class = "btn btn-edit">Modifier</a>
                <a href="{base_url()}Events/dashboard?event_id={$smarty.get.event_id}&amp;del=1" class = "btn btn-del">Supprimer</a>
            </div>
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
</div>
<div id="modal">
    <div>
        <div class="btn-content">
            <a href="{base_url()}Galeries/dashboard" class="btn">Retour</a>
        </div>
    
        <div>
            <div>
            
                <h2>{$galerieDetail.eventName}</h2>
             
            </div>
            <div class="content-action">
                <a href="{base_url()}Galeries/dashboard?event_id={$smarty.get.event_id}&amp;edit=1" class = "btn btn-edit">Modifier</a>
                <a href="{base_url()}Galeries/dashboard?event_id={$smarty.get.event_id}&amp;del=1" class = "btn btn-del">Supprimer</a>
            </div>
            <div class="formContent" id="edit">
                {form_open($url, "class='form'")}
                    <p class="field-content">
                        {form_label("Titre")}
                        {form_input("eventName",$galerieDetail.eventName,"id='title'")}
                    </p>
                {form_textarea('eventContent',$galerieDetail.eventContent,'id="eventContent" class="ckeditor"')}
                {form_submit('valider','Valider','id="submit"')}
                {form_close()}
            </div>
        </div>
    </div>
</div>
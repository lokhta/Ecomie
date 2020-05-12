<div id="modal">
    <div>
        <div class="btn-content">
            <a href="{base_url()}Messages/dashboard" class="btn">Retour</a>
        </div>
    
        <div>
            <div>
                <h2>Envoyé par {$formDetail.formSenderName} - <{$formDetail.formSendermail}></h2>
                <p id="subject_message">Objet : {$formDetail.formSubject}</p>
                <span>Message : </span>
                <p id="message_content">{$formDetail.formMessage}</p>
            </div>
            <div class="content-action">
                <button style="border:0px" class="delete btn btn_del" data-link="{base_url()}forms/dashboard?form_id={$smarty.get.form_id}&amp;del=1">Supprimer</button>
            </div>
        </div>
    </div>
</div>
<div id="modal">
    <div>
        <div class="btn-content">
            <a href="{base_url()}Messages/dashboard" class="btn">Retour</a>
        </div>
    
        <div>
            <div>
                <h2>Envoyé par le {$msg.date} à {$msg.time}</h2>
                <p>{$msg.msgContent}</p>
            </div>
            <div class="content-action">
                <button style="border:0px" class="delete btn btn_del" data-link="{base_url()}Messages/dashboard?message_id={$smarty.get.message_id}&amp;del=1">Supprimer</button>
            </div>
        </div>
    </div>
</div>
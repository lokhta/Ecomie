<div id="modal">
    <div>
        <div class="btn-content">
            <a href="{base_url()}events/archives" class="btn">Retour</a>
        </div>
    
        <div>
            <div>
            
                <h2>{$archiveDetail.eventName}</h2>
                <span>Evénement du {$archiveDetail.date}</span>
                <p>{$archiveDetail.eventContent}</p>
             
            </div>
            <div class="content-action">
                <a href="{base_url()}Galeries/editor" class = "btn btn_create_gallery">Créer une galerie photo</a>
            </div>
        </div>
    </div>
</div>
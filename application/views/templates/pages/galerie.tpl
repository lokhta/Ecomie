{include file="header.tpl" title="Ecomie - Galerie" name=$Name}
<div class="galerie">
  <span id="votre_id1" class="target"></span>
  <span id="votre_id2" class="target"></span>
  <span id="votre_id3" class="target"></span>
  <span id="votre_id4" class="target"></span>

  <div class="cadre_diapo">
    <div class="interieur_diapo">

      <div class=description>
        <span>Fête de quartier</span>
        <img src="{base_url()}assets/img/fete-du-quartier.jpg" alt="Fête" height="auto" width="600px">
      </div>

      <div class=description>
        <span>Jardin partagé</span>
        <img src="{base_url()}assets/img/jardin_partage.jpg" alt="Jardin" height="auto" width="600px">
      </div>

      <div class=description>
        <span>Zero</span>
        <img src="{base_url()}assets/img/zero.jpg" alt="Zero" height="auto" width="600px">
      </div>

      <div class=description>
        <span>Hulot</span>
        <img src="{base_url()}assets/img/hulot.jpg" alt="Hulot" height="auto" width="600px">
      </div>

    </div>

    <ul class="navigation_diapo">
      <li>
        <a href="#votre_id1">
          <img src="{base_url()}assets/img/fete-du-quartier.jpg" alt="fête" height="1000px" width="1000px">
        </a>
      </li>

      <li>
        <a href="#votre_id2">
          <img src="{base_url()}assets/img/jardin_partage.jpg" alt="Jardin" height="1000px" width="1000px">
        </a>
      </li>

      <li>
        <a href="#votre_id3">
          <img src="{base_url()}assets/img/zero.jpg" alt="Zéro déchet" height="1000px" width="1000px">
        </a>
      </li>

      <li>
        <a href="#votre_id4">
          <img src="{base_url()}assets/img/hulot.jpg" alt="Hulot" height="1000px" width="1000px">
        </a></li>
    </ul>
  </div>
</div>


<div class="btn-content" id="btn-create-art">
        {if $smarty.session.id}
            <a href="{base_url()}Archives/dashboard" class="btn-event">Créer une archive</a> 
        {/if}
    </div>
    <div class="cadre_diapo">
      <div class="interieur_diapo">
        {foreach from=$galerieDetail item=val key=key}
            <section class="savoir__faire">
                    <h2>{$val.eventName}</h2>
                    <img src="{$val.imgName}"/>
                </a>
              </section> 
            {/foreach}    
        </div>
        <section class="astuce__fb">
            <p>Plein d'autres astuce sur notre page Facebook</p>
            <a href="#"><img src="{base_url()}assets/img/facebook.svg" alt="Facebook"></a>
        </section>
      </div>  
    </div>

{include file="footer.tpl"}
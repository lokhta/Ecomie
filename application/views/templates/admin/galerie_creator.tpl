<span id="success" class="message_success">
{if $reponse}
    {$reponse}
{/if}
</span>

{form_open_multipart("galeries/editor","id='form_image'")}
    {if $error_event}
        <span class="red_error">{$error_event}</span>
    {/if}
    <p class="field_form_image">
    {form_label("Evénement :")}
    {form_dropdown('imgEvent', $option, '',"id='imgEvent'")}
    </p>
    <p class="field_form_image">
    {form_label("Texte alternatif :")}
    {form_input("imgAlt", "", "id='imgAld'")}
    {$error}
    </p>
    <p id="ulpload_field">{form_upload("imgName",'',"id='imgName'")}
    <i class="fas fa-info-circle" id="bulle_image"></i>                                     
    <span id="help_image" class="info_bulle"></span></p> 
    {form_submit('valider','Valider','id="upload"')}
{form_close()}

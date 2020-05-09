<span id="success" class="message_success">
{if $reponse}
    {$reponse}
{/if}
</span>
{form_open_multipart("galeries/editor","id='form_image'")}
    {form_dropdown('imgEvent', $option, '',"id='imgEvent'")}
    {form_input("imgAlt", "", "id='imgAld'")}
    <p id="ulpload_field">{form_upload("imgName",'',"id='imgName'")}  
    <i class="fas fa-info-circle" id="bulle_image"></i>                                     
    <span id="help_image" class="info_bulle"></span></p> 
    {form_submit('valider','Valider','id="upload"')}
{form_close()}
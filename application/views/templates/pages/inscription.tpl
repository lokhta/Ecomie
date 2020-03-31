    {include file="header.tpl" title="Ecomie - Accueil" name=$Name}
        <form method="post" action="#">
            <div class="form-group">
                <label>Entrer votre nom*</label>
                <input type="text" name="userName" class="form-control"/>
                <span class="text-danger"><?php echo form_error('userName'); ?></span>
            </div>
            <div class="form-group">
                <label>Entrer votre Prénom*</label>
                <input type="text" name="userFirstname" class="form-control"/>
                <span class="text-danger"><?php echo form_error('userFirstname'); ?></span>
            </div>
            <div class="form-group">
                <label>Entrer votre addresse mail*</label>
                <input type="text" name="userEmail" class="form-control"/>
                <span class="text-danger"><?php echo form_error('userEmail'); ?></span>
            </div>
            <div class="form-group">
                <label>Téléphone</label>
                <input type="text" name="userPhone" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Entrer votre addresse postale*</label>
                <input type="text" name="userAddress" class="form-control"/>
                <span class="text-danger"><?php echo form_error('userAddress'); ?></span>
            </div>
            <div class="form-group">
                <label>Entrer votre code postale*</label>
                <input type="text" name="userCp" class="form-control"/>
                <span class="text-danger"><?php echo form_error('userCp'); ?></span>
            </div>
            <div class="form-group">
                <label>Entrer votre nom de ville*</label>
                <input type="text" name="userCity" class="form-control"/>
                <span class="text-danger"><?php echo form_error('userCity'); ?></span>
            </div>
            <div class="form-group">
                <label>Enter Password*</label>
                <input type="password" name="userPwd" class="form-control"/>
                <span class="text-danger"><?php echo form_error('userPwd'); ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="register" value="Register" class="btn btn-info" />
            </div>
        </form>
    {include file="footer.tpl"}
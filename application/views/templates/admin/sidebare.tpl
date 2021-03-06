<aside id="sidebar">
    <nav class="side__nav">
    {if $smarty.session.role != 3}
        <div class="link-nav-admin">
            <div class="content_ico">
                <i class="fas fa-tachometer-alt ico_admin"></i>
            </div>
            <a href="{base_url()}dashboard" class="link_admin">Tableau de bord</a>
        </div>
    {/if}
        <div class="link-nav-admin">
            <div class="content_ico">
                <i class="fas fa-user ico_admin"></i>
            </div>
            <a href="{base_url()}users/profil" class="link_admin">Profil</a>
        </div>
        
        <div class="link-nav-admin">
            <div class="content_ico"> 
                <i class="fas fa-address-book ico_admin"></i>
            </div>
            <a href="{base_url()}users/membres" class="link_admin">Membres</a>
        </div>

        <div class="link-nav-admin">
            <div class="content_ico">
                <i class="fas fa-newspaper ico_admin"></i>
            </div>
            <a href="{base_url()}Articles/dashboard" class="link_admin">Articles</a>
        </div>
        {if $smarty.session.role != 3}
        <div class="link-nav-admin">
            <div class="content_ico">
                <i class="fas fa-calendar-alt ico_admin"></i>
            </div>
            <a href="{base_url()}Events/dashboard" class="link_admin">Evénements</a>
        </div>
        {/if}
        {if $smarty.session.role != 3}
        <div class="link-nav-admin">
            <div class="content_ico">            
                <i class="fas fa-images"></i>
            </div>
            <a href="{base_url()}Galeries/dashboard" class="link_admin">Galerie</a>
        </div>
        {/if}
        {if $smarty.session.role == 1}
        <div class="link-nav-admin">
                <div class="content_ico">
                    <i class="fas fa-paper-plane ico_admin"></i>
                </div>
            <a href="{base_url()}newsletters/dashboard" class="link_admin">Newsletters</a>
        </div>
        {/if}
        <div class="link-nav-admin">
            <div class="content_ico">
                <i class="fas fa-envelope ico_admin"></i>
            </div>
            {if $smarty.session.role != 3}
                <a href="{base_url()}forms/dashboard" class="link_admin">Messagerie</a>
                {elseif $smarty.session.role == 3}
                <a href="{base_url()}Messages/dashboard" class="link_admin">Messagerie</a>
            {/if}

        </div>
        {if $smarty.session.role != 3}
        <div class="link-nav-admin">
            <div class="content_ico">            
                <i class="fas fa-archive ico_admin"></i>
            </div>
            <a href="{base_url()}events/archives" class="link_admin">Archives</a>
        </div>
        {/if}
    </nav>
</aside>
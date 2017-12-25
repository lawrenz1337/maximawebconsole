<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top navbar-fixed-top">


    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{$_modx->config.site_url}">Maxima Web</a>
            {set $logged = $_modx->runSnippet('!isAuth')}
            {if $logged}
                <a class="btn btn-info" href="{$_modx->makeUrl(3)}" title="Profile">Profile</a>
                [[!Login]]
            {/if}
        </div>
    </div><!--/.container-fluid -->
</nav>
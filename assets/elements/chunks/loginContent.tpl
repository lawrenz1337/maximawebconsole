<main class="container">
    <div class="row justify-content-md-center">
        <div class="col-12 col-md-auto">
            <div class="jumbotron">
                {set $logged = $_modx->runSnippet('!isAuth')}
                {if $logged}
                    {$_modx->sendRedirect($_modx->makeUrl(1))}
                {else}
                    {$_modx->runSnippet('!Login')}
                {/if}
            </div>
        </div>
    </div>
</main>
<main class="container">
    <div class="row">
        <div class="col-lg-12">
            {set $logged = $_modx->runSnippet('!isAuth')}
            {if $logged}
                <div class="loader"></div>
                <div class="jumbotron default">
                    <form id="input" class="form-horizontal" action="#">
                        <fieldset>
                            <legend>Maxima Web Console</legend>
                            <div class="form-group">
                                <label for="exampleTextarea">Ввод команд</label>
                                <textarea style="height: 250px;" class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Отправить запрос</button>
                            </div>
                        </fieldset>
                    </form>

                    <prea id="output">
                    </prea>
                </div>
            {else}
                {$_modx->sendRedirect($_modx->makeUrl(2))}
            {/if}
        </div>
    </div>
</main>

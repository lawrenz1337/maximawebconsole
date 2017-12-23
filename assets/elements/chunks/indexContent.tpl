<main class="container">
    <div class="row">
        <div class="col-lg-12">
            {set $logged = $_modx->runSnippet('!isAuth')}
            {if $logged}
                <div class="jumbotron">
                    <fieldset>
                        <legend>Maxima Web Console</legend>
                        <div class="form-group">
                            <label for="exampleTextarea">Ввод команд</label>
                            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                        </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </fieldset>
                    <pre class="output">

(%i1) a = 5
(%o1)                                a = 5
(%i2) sum(a[i]*x^(i-2),i,0,inf)
                                inf
                                ====
                                \         i - 2
(%o2)                            >    a  x
                                /      i
                                ====
                                i = 0

                    </pre>
                </div>
            {else}
                {$_modx->sendRedirect('http://maxima.local/index.php?id=2')}
            {/if}
        </div>
    </div>
</main>

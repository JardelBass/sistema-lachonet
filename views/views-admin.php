<!-- Page Layout here -->
<div class="row admin">
    <div class="col s2 admin-naw top-pd">
        <div class="admin-cli">
            <i class='medium material-icons'>account_circle</i><br/>
            <h1><?= $_SESSION['name'] ?></h1>
        </div>
        <div class="admin-nav-b">
            <div>
                <label>SISTEMA</label>
                <ul class="">
                    <li><a class="waves-effect waves-light btn-small col s12" href="?pagi=admin&&nav=pedidos"><i class="material-icons left">event_note</i>LISTA DE PEDIDOS</a></li>
                    <li><a class="waves-effect waves-light btn-small col s12" href="?pagi=admin&&nav=final"><i class="material-icons left">event_note</i>PEDIDOS FINALIZADO</a></li>
                </ul>
            </div>
            <div class="admin-nav-l">
                <label>LANCHONETE</label>
                <ul class="">
                    <li><a class="waves-effect waves-light btn-small col s12" href="?pagi=admin&&nav=produtos"><i class="material-icons left">event_note</i>PRODUTOS</a></li>
                    <li><a class="waves-effect waves-light btn-small col s12" href="?pagi=admin&&nav=usuario"><i class="material-icons left">group</i>USUARIOS</a></li>
                    <li><a class="waves-effect waves-light btn-small col s12 red" href="?pagi=admin&sair"><i class="material-icons left">close</i>SAIR</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col s10 offset-s2">
       <?php include_once $pagina;?>
    </div>
</div>

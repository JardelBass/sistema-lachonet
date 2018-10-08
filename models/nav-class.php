<?php 
    class navPegi{
        
        public function nav($nav){
            session_start(); 
            include_once 'views/head.php';

            if($nav == "home"){
                $navBar = "<div class='col s8'>
                    <ul class='pagination'>
                    <li class='usar-icon'><i class='material-icons'>account_circle</i></li>
                    <li class='usar-nema'>".$_SESSION['name']."</li>
                    </ul>
                    </div>
                    <div class='col s4'>
                    <form action='' method='post'>
                    <button class='btn waves-effect waves-light col s12' type='submit' name='sair'>SAIR</button>
                    </form>
                    </div>";
                include_once 'views/views-nav.php';
                include_once 'controller/controller-clerk.php';
            }
            else if ($nav == "login"){
                include_once 'controller/controller-login.php';
            }
            else if($nav == "carregando"){
                include_once 'controller/controller-loading.php';
            }
            else if($nav == "pedido"){
                $navBar = "<div class='col s8'>
                    <ul class='pagination'>
                    <li class='disabled'>
                    <a href='?pagi=pedido&volta'>
                    <i class='material-icons'>arrow_back</i>
                    </a>
                    </li>
                    </ul>
                    </div>
                    <div class='col s4'>
                    <form action='' method='post'>
                    <button class='btn waves-effect waves-light col s12' type='submit' name='salvar'>SALVAR</button>
                    </form>
                    </div>";
                include_once 'views/views-nav.php';
                include_once 'controller/controller-pedido.php';
            }
            else if($nav == "admin"){
                include_once 'views/views-admin-nav.php';
                include_once 'controller/controller-admin.php';
            }
            else{
                include_once 'views/views-404.php';
            }

            include_once    'views/java-script.php';
            include_once    'views/footer.php';
        }
    }
?>
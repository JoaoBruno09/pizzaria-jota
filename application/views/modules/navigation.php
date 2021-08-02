<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button> 
                <div class="logo_text">
                    <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>">                       
                        <span class="light"><img class="logo-pizzaria" src="<?php echo base_url(); ?>assets/img/pizzaria-jota.png" alt="Pizzaria Jota"/>&nbsp;Pizzaria Jota</span>

                    </a>
                </div>
            </div>
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse"> 
                <ul class="nav navbar-nav">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php if ($this->session->userdata('name') && $this->session->userdata('type_account') === 'client') { ?>  
                        <div class="hidden">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url(); ?>#about">Sobre nós</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo base_url(); ?>#contact">Contactos</a>
                            </li>
                        </div>           
                        <li>
                            <a href="<?php echo base_url(); ?>menus">Menus</a> 
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>pizzas" class="page-scroll">As nossas pizzas</a>
                        </li>                  
                        <li class = "dropdown">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false">Olá <?php echo $this->session->userdata('name'); ?>&nbsp;&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu"> 
                                <li><a class="a-hover-dropdown-text" href="<?php echo base_url(); ?>Backoffice/profile"><span class="fa fa-user"></span>&nbsp;&nbsp;Perfil</a></li>
                                <li><a class="a-hover-dropdown-text" href="<?php echo base_url(); ?>ShoppingCart/car"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Carrinho(<?php echo $items ?>)</a></li>
                                <li><a class="a-hover-dropdown-text" href="<?php echo base_url(); ?>Login/deslogar"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Sair da Conta</a></li>  
                            </ul>
                        <?php } ?> 
                        <?php if ($this->session->userdata('name') && $this->session->userdata('type_account') === 'admin') { ?>                                                      
                                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                                <li class="hidden">
                                    <a href="#page-top"></a>
                                </li>
                                <li class="hidden">
                                    <a class="page-scroll" href="<?php echo base_url(); ?>#about">Sobre nós</a>
                                </li>
                                <li class="hidden">
                                    <a class="page-scroll" href="<?php echo base_url(); ?>#contact">Contactos</a>
                                </li>

                                <li class="hidden">
                                    <a href="<?php echo base_url(); ?>menus">Menus</a> 
                                </li>
                                <li class="hidden">
                                    <a href="<?php echo base_url(); ?>pizzas" class="page-scroll">As nossas pizzas</a>
                                </li>
                                <li><a class="a-hover-dropdown-text" href="<?php echo base_url(); ?>Backoffice/admin"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;Painel</a></li>
                                <li><a class="a-hover-dropdown-text" href="<?php echo base_url(); ?>Login/deslogar"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Sair da Conta</a></li>
                        <?php }?>
                        <?php if ($this->session->userdata('name')=== null) { ?>
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>pizzas" class="page-scroll">As nossas pizzas</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo base_url(); ?>#about">Sobre nós</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo base_url(); ?>#contact">Contactos</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar na conta <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <?php echo form_open("Login/logar"); ?>
                                    <div class="form">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary bt-lg"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Entrar</button>
                                        <button type="button" class="btn btn-primary bt-lg" data-toggle="modal" data-target="#modal_registo">Registar&nbsp;&nbsp;<span class="fa fa-plus"></span></button>
                                    </div>
                                    <?php echo form_close(); ?>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
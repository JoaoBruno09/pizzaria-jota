<div class="intro">
    <div class="container-fluid intro_admin">
        <div class="row">
            <div class="logout_change_mod">
                <i class="fa fa-moon-o" style="font-size: 35px;padding-right:5px;"></i>
                <label class="switch">
                    <input onclick="change_lightdark_mode();" id="change_mode" type="checkbox">
                    <span class="slider round"></span>
                    <i class="fa fa-moon"></i>
                    <i class="fa fa-lightbulb"></i>

                </label>
                <i class="fa fa-lightbulb-o" style="font-size: 35px;padding-left:5px;"></i>
                <a style="color:#fff" href = "<?php echo base_url(); ?>Login/deslogar"><i class="fa fa-power-off logout_button"></i></a>
            </div>
        </div>
        <div class="col-md-3 menu_back">
            <div class="left_menu">
                <div class="page-header"> 
                    <div class="aligned_bar">
                        <a href="<?php echo base_url(); ?>"><span class="light" style="font-size: 30px;"><img class="logo-pizzaria" src="<?php echo base_url(); ?>assets/img/pizzaria-jota.png" alt="Pizzaria Jota"/>&nbsp;Pizzaria Jota</span></a>  
                    </div>
                </div>
                <div class="menu_bar">
                    <ul class="nav navpills nav-stacked">
                        <li role="presentation"><a class="menu_bar_items" href="<?php echo base_url(); ?>backoffice/admin"><span class="fa fa-tachometer"</span>&nbsp;&nbsp;Dashboard</a></li>
                        <li role="presentation"><a class="menu_bar_items" href="<?php echo base_url(); ?>backoffice/clients"><span class="fa fa-users"></span>&nbsp;&nbsp;Clientes</a></li>
                        <li role="presentation"><a class="menu_bar_items" href="<?php echo base_url(); ?>backoffice/allorders"><span class="fa fa-list-ol"></span>&nbsp;&nbsp;Todas as Encomendas</a></li>
                        <li role="presentation"><a class="menu_bar_items" href="<?php echo base_url(); ?>backoffice/orders"><span class="fa fa-list-ul"></span>&nbsp;&nbsp;Encomendas Pendentes</a></li>
                        <li role="presentation"><a class="menu_bar_items" href="<?php echo base_url(); ?>backoffice/addproducts"><span class="fa fa-plus"></span>&nbsp;&nbsp;Adicionar Produtos</a></li> 
                    </ul>
                </div>
                <div class="page-bottom">
                    <img class="avatar_user" src="<?php echo $this->session->userdata('photo'); ?>" alt="user_photo"/>
                    <div class="admin_details">
                        <span class="light" id="name_admin">&nbsp;<?php echo $this->session->userdata('name'); ?></span><br>
                        <span class="light" id="name_admin" style="color:#62686d;">&nbsp;Administrador</span>
                    </div>
                </div>
            </div>
        </div>
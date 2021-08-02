<div class="intro">
    <div class="container">
        <div class="row">
            <h2>A Sua Encomenda</h2>
            <div class="jumbotron" style="background: transparent">
                <div class="send_data">
                    <h3>Produtos Pedidos</h3>
                    <?php
                    if ($get_cart->num_rows() > 0) {
                        foreach ($get_cart->result()as $row) {
                            if ($row->pizza_id != null) {
                                ?>
                                <?php
                                echo '<tr>';
                                echo '<div class = "row">';
                                echo '<div class = "col-sm-2 hidden-xs"><img src = "' . $row->pizza_image . '" alt = "..." class = "img-responsive"/></div>';
                                echo '<div class = "col-sm-10">';
                                echo '<h4 class = "nomargin">' . $row->pizza_name . '</h4>';
                                echo '<h10>' . $row->pizza_description . '</h10>';
                                echo '<br><h10 class="confirm_quantity">Quantidade: ' . $row->quantity . '</h10>';
                                echo '<strong><h10 class="confirm_pizzaprice">Preço: ' . $row->pizza_price * $row->quantity . '€</h10></strong>';
                                echo '</div>';
                                echo '</div>';
                                echo '</tr>';
                            } else {
                                echo '<tr>';
                                echo '<div class = "row">';
                                echo '<div class = "col-sm-2 hidden-xs"><img src = "' . $row->menu_image . '" alt = "..." class = "img-responsive"/></div>';
                                echo '<div class = "col-sm-10">';
                                echo '<h4 class = "nomargin">' . $row->menu_name . '</h4>';
                                echo '<h10>' . $row->menu_description . '</h10>';
                                echo '<br><h10 class="confirm_quantity"><b>Quantidade: ' . $row->quantity . '<b></h10>';
                                echo '<strong><h10 class="confirm_menuprice">Preço: ' . $row->menu_price * $row->quantity . '€</h10></strong>';
                                echo '</div>';
                                echo '</div>';
                                echo '</tr>';
                            }
                        }
                    }
                    ?>                    
                </div>
                <strong><h10 class="confirm_totalprice">Total: <?php echo $soma ?>€</h10></strong>
                <hr class="my-4">
                <div class="send_data">
                    <h3>Dados de Envio</h3>
                    <p>Nome do Cliente: <?php echo $this->session->userdata('name'); ?>
                        <br>NIF: <?php echo $this->session->userdata('nif'); ?>
                        <br>Telémovel: <?php echo $this->session->userdata('phone'); ?>
                        <br>Local da Entrega: <?php echo $this->session->userdata('address'); ?>, <?php echo $this->session->userdata('postal_code1'); ?>-<?php echo $this->session->userdata('postal_code2'); ?>, <?php echo $this->session->userdata('place'); ?>
                        <br>Método de Pagamento: Cobrança
                    </p>
                </div>
                <p class="lead" style="padding-top: 70px;">
                    <button class="btn btn-primary btn-lg" type="button" name="confirmpurchase" value="<?php echo $soma ?>" onclick="confirmPurchase()"
                    <?php
                    if ($get_cart->num_rows() > 0) {
                        foreach ($get_cart->result()as $row) {
                            if ($row->pizza_id != null) {
                                ?>
                                <?php
                                echo 'data-pizzaid="' . $row->pizza_id . '" data-subtotalpizza="' . $row->pizza_price * $row->quantity . '" data-quantitypizza="' . $row->quantity . '" ';
                            } else {
                                echo 'data-menuid="' . $row->menu_id . '" data-subtotalmenu="' . $row->menu_price * $row->quantity . '" data-quantitymenu="' . $row->quantity . '" ';
                            }
                        }
                    }
                    ?>
                            >Confirmar Compra&nbsp;<span class="glyphicon glyphicon-ok"></span> </button>
                </p>
            </div>


            <div class = "modal fade" id = "modal_goprofile" tabindex = "-1" role = "dialog">
                <div class = "modal-dialog" role = "document">
                    <div class = "modal-content">
                        <div class = "modal-header">
                            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;
                                </span></button>
                            <h4 class = "modal-title">A sua encomenda está sendo preparada..</h4>
                        </div>
                        <div class = "modal-body">
                            <img src = "<?php echo base_url(); ?>assets/img/correct.png">
                            <p></p>
                            <h5>Veja o estado da sua encomenda no seu perfil</h5>
                            <p id = "tamanho"></p>
                            <p id = "preco"></p>
                        </div>
                        <div class = "modal-footer">
                            <button type = "button" id = "go_profile" class = "btn btn-primary">Perfil&nbsp;
                                <span class = "glyphicon glyphicon-arrow-right"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

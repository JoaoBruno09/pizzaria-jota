<div class="col-md-9" id="backoffice_mid">
    <div class="page-header left_menu">
        <h3>DashBoard</h3>
    </div>
    <div class="block_content">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <div class="col-12 col_dashboard">
                
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success o-hidden h-100 card-dashboard n_orders">
                    <div class="card-body-dashboard">
                        <div class="card-body-icon-dashboard">
                            <i class="fa fa-fw fa-shopping-cart css-dashboard"></i>
                        </div>
                        <?php
                        if ($count_orders == "0") {
                            echo '<div class="mr-5">Sem Encomendas Novas</div>';
                        }
                        if ($count_orders == "1") {
                            echo '<div class="mr-5">' . $count_orders . '&nbsp;Encomenda Nova</div>';
                        }
                        if ($count_orders > "1") {
                            echo '<div class="mr-5"><strong>' . $count_orders . '</strong>&nbsp;Encomendas Novas</div>';
                        }
                        ?>
                    </div>
                    <a class="card-footer-dashboard text-white clearfix small z-1 a-dashboard" href="<?php base_url() ?>orders">
                        <span class="float-left">Ver mais</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
                <div class="card text-white bg-success o-hidden h-100 card-dashboard n_clients">
                    <div class="card-body-dashboard">
                        <div class="card-body-icon-dashboard">
                            <i class="fa fa-fw fa-users css-dashboard"></i>
                        </div>
                        <?php
                        if ($count_clients == "0") {
                            echo '<div class="mr-5"><strong>' . $count_clients . '</strong>&nbsp;Sem Clientes</div>';
                        }
                        if ($count_clients == "1") {
                            echo '<div class="mr-5"><strong>' . $count_clients . '</strong>&nbsp;Cliente</div>';
                        }
                        if ($count_clients > "1") {
                            echo '<div class="mr-5"><strong>' . $count_clients . '</strong>&nbsp;Clientes</div>';
                        }
                        ?>
                    </div>
                    <a class="card-footer-dashboard text-white clearfix small z-1 a-dashboard" href="<?php base_url() ?>clients">
                        <span class="float-left">Ver mais</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <!--<div class="col-md-3">
                <div class="card text-white bg-success o-hidden h-100 card-dashboard">
                    <div class="card-body-dashboard">
                        <div class="card-body-icon-dashboard">
                            <i class="fa fa-fw fa-euro css-dashboard"></i>
                        </div>
                        <?php
                        echo '<div class="mr-5"><strong>' . $count_total . '</strong>&nbsp;€ em Compras no Último Mês</div>';
                        ?>
                    </div>
                    <a class="card-footer-dashboard text-white clearfix small z-1 a-dashboard" >
                        <span class="float-left"><br></span>
                    </a>
                </div>
            </div>-->
        <div class="col-md-9">
            <table class="table table_laptop">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">Nome</th>
                        <th class="order_products" scope="col">Produtos Encomendados</th>
                        <th scope="col">Estado da Encomenda</th>
                        <th style="text-align: center;" scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <?php
                if ($get_orders_backoffice->num_rows() > 0) {
                    foreach ($get_orders_backoffice->result()as $row) {
                        ?>
                        <?php
                        echo '<tbody>';
                        echo '<tr class="trorders">';
                        echo '<th scope="row">' . $row->order_id . '</th>';
                        echo '<td style="text-align: left;">' . $row->name . '</td>';
                        echo '<td class="order_products" style="text-align: left;">' . $row->Produto . '</td>';
                        if ($row->status == 'A ser preparada') {
                            echo '<td style="text-align: left;"><img class="img_order" src=http://jbr-projects.pt/pizzaria-jota/assets/img/aserpreparada.png>&nbsp;' . $row->status . '</td>';
                        }
                        if ($row->status == 'Paga') {
                            echo '<td style="text-align: left;"><img class="img_order" src=http://jbr-projects.pt/pizzaria-jota/assets/img/paga.png>&nbsp;' . $row->status . '</td>';
                        }
                        if ($row->status == 'A ser entregue') {
                            echo '<td style="text-align: left;"><img class="img_order" src=http://jbr-projects.pt/pizzaria-jota/assets/img/aserentregue.png>&nbsp;' . $row->status . '</td>';
                        }
                        echo '<td>' . $row->total_price . '€</td>';
                        echo '<td class="change_td-tr"><button value="' . $row->order_id . '" style="background: none;border: none;" id="updatestatus" title="Editar Estado da Encomenda" data-status="' . $row->status . '"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;<a href="vieworder/' . $row->order_id . '"style="background: none;border: none;color:white;><button id="btnopenview" value="' . $row->order_id . '" style="background: none;border: none;" title="Ver Encomenda"><i class="fa fa-list"></i></button></a>&nbsp;&nbsp;<button id="deleteorder" value="' . $row->order_id . '" style="background: none;border: none;" title="Eliminar Encomenda"><i class="fa fa-trash"></i></button></td>';
                        echo '</tr>';
                        echo '</tbody>';
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
<div class="separator_bottom">

</div>
</div>
</div>

<div class="col-md-9" id="backoffice_mid">
    <div class="page-header left_menu">
        <h3>Encomendas Pendentes</h3>
    </div>
    <div class="block_content">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table">
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
                        echo '<td><button value="' . $row->order_id . '" style="background: none;border: none;" id="updatestatus" title="Editar Estado da Encomenda" data-status="' . $row->status . '"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;<a href="vieworder/' . $row->order_id . '"style="background: none;border: none;color:white;><button id="btnopenview" value="' . $row->order_id . '" style="background: none;border: none;" title="Ver Encomenda"><i class="fa fa-list"></i></button></a>&nbsp;&nbsp;<button id="deleteorder" value="' . $row->order_id . '" style="background: none;border: none;" title="Eliminar Encomenda"><i class="fa fa-trash"></i></button></td>';
                        echo '</tr>';
                        echo '</tbody>';
                    }
                }
                ?>
            </table>
        </div>
    </div>

    <div class="separator_bottom">

    </div>
    <div class="button_back" style="float:left;">
        <a href="<?php echo base_url(); ?>Backoffice/admin" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Voltar ao Painel</a>
    </div>
</div>


</div>
</div>
</div>

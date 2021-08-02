<div class="col-md-9" id="backoffice_mid">
    <div class="page-header left_menu">
        <h3>Clientes</h3>
    </div>
    <div class="block_content">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">Nome do Cleinte</th>
                        <th scope="col">Nº Telémovel</th>
                        <th scope="col">NIF</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <?php
                if ($get_clients->num_rows() > 0) {
                    foreach ($get_clients->result()as $row) {
                        ?>
                        <?php
                        echo '<tbody>';
                        echo '<tr class="trorders">';
                        echo '<th scope="row">' . $row->user_id . '</th>';
                        echo '<td style="text-align: left;">' . $row->name . '</td>';
                        echo '<td style="text-align: left;">' . $row->phone . '</td>';
                        echo '<td style="text-align: left;">' . $row->nif . '</td>';
                        echo '<td><a href="viewclient/' . $row->user_id . '" style="background: none;border: none;color:white;><button id="btnviewclient" name="btnviewclient" value=' . $row->user_id . ' style="background: none;border: none;" title="Ver Cliente"><i class="fa fa-user"></i></button></a>';
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

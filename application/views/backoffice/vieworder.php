<div class="col-md-9" id="backoffice_mid">
    <?php
    if ($orderview->num_rows() > 0) {
        foreach ($orderview->result()as $row) {
            echo '<div class = "page-header left_menu">';
            echo '<h3>Encomenda ' . $row->order_id . ' </h3>';
            echo '</div>';
            echo'<div class="block_content">';
            echo'<div class="table-wrapper-scroll-y my-custom-scrollbar">';
            echo '<div class="col-md-6 order_view_details">';
            echo '<div class="col-md-6 order_view_details">';
            echo '<div class="menu_bar">';
            echo '<ul class="nav navpills nav-stacked">';
            echo '<li role="presentation"><a class="order_items"><b>Nome do Cliente:</b>&nbsp;&nbsp;' . $row->name . '</a></li>';
            echo '<li role="presentation"><a class="order_items"><b>Nº de Télemovel:</b>&nbsp;&nbsp;' . $row->phone . '</a></li>';
            echo '<li role="presentation"><a class="order_items"><b>Pagamento:</b>&nbsp;&nbsp;' . $row->type_payment . '</a></li>';
            echo '<li role="presentation"><a class="order_items"><b>Estado:</b>&nbsp;&nbsp;' . $row->status . '</a></li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-6 order_view_details">';
            echo '<div class="menu_bar">';
            echo '<ul class="nav navpills nav-stacked">';
            echo '<li role="presentation"><a class="order_items"><b>NIF:</b>&nbsp;&nbsp;' . $row->nif . '</a></li>';
            echo '<li role="presentation"><a class="order_items"><b>Total:</b>&nbsp;&nbsp;' . $row->total_price . '€</a></li>';
            echo '<li role="presentation"><a class="order_items"><b>Data:</b>&nbsp;&nbsp;' . $row->date . '</a></li>';
            echo '<li role="presentation"><a class="order_items"><b>Hora:</b>&nbsp;&nbsp;' . $row->hour . '</a></li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-6 order_view_details">';
            echo '<table class = "table">';
            echo '<thead class = "thead-dark">';
            echo '<tr>';
            echo '<th scope = "col">Produto</th>';
            echo '<th scope = "col" style="width: 15%;">Quantidade</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr class="trorders">';
            echo '<th scope="row">' . $row->Produto . '</th>';
            echo '<td scope="row" style="text-align:center;">' . $row->Quantidade . '</td>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class = "separator_bottom">';
            echo '</div>';
            echo '<div style = "float: left;">';
            echo '<a href = "javascript:history.go(-1)" class = "btn btn-primary"><span class = "glyphicon glyphicon-arrow-left"></span>&nbsp;';
            echo 'Voltar</a>';
            echo '</div>';
        }
    }
    ?>

</div>
</div>
</div>
</div>

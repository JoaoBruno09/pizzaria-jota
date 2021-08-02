<div class="col-md-9" id="backoffice_mid">
    <?php
    if ($clientview->num_rows() > 0) {
        foreach ($clientview->result()as $row) {
            echo '<div class = "page-header left_menu">';
            echo '<h3>Cliente ' . $row->user_id . ' </h3>';
            echo '</div>';
            echo'<div class="block_content">';
            echo'<div class="table-wrapper-scroll-y my-custom-scrollbar">';
            echo '<div class="col-md-6 left_menu">';
            echo '<div class="col-md-6 left_menu">';
            echo '<div class="menu_bar">';
            echo '<ul class="nav navpills nav-stacked">';
            echo '<li role="presentation"><a class="order_items"><b>Nome do Cliente:</b>&nbsp;&nbsp;' . $row->name . '</a></li>';
            echo '<li role="presentation"><a class="order_items"><b>Nº de Télemovel:</b>&nbsp;&nbsp;' . $row->phone . '</a></li>';
            echo '<li role="presentation"><a class="order_items"><b>E-mail:</b>&nbsp;&nbsp;' . $row->email . '</a></li>';
            echo '<li role="presentation"><a class="order_items"><b>NIF:</b>&nbsp;&nbsp;' . $row->nif . '</a></li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-6 left_menu">';
            echo '<div class="menu_bar">';
            echo '<ul class="nav navpills nav-stacked">';
            echo '<li role="presentation"><a class="order_items"><b>Morada:</b>&nbsp;&nbsp;' . $row->address . '</a></li>';
            echo '<li role="presentation"><a class="order_items"><b>Freguesia:</b>&nbsp;&nbsp;' . $row->place . '</a></li>';
            echo '<li role="presentation"><a class="order_items"><b>Código Postal:</b>&nbsp;&nbsp;' . $row->postal_code1 . '-'.$row->postal_code2.'</a></li>';  
            echo '</ul>';
            echo '</div>';
            echo '</div>';
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


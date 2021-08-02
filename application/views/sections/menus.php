<div class="intro">
    <div class="container">
        <div class="row">
            <h2>Os nossos Menus</h2>
            <p></p>
            <?php
            if ($get_menus->num_rows() > 0) {
                foreach ($get_menus->result()as $row) {
                    ?>
                    <?php
                    echo '<div class = "col-lg-3 col-lg-offset-1">';
                    echo '<div class="card" style="max-width:319px;">';
                    echo '<img src="' . $row->menu_image . '" class="card-img-top" alt="Card image" />';
                    echo '<div class="card-block">';
                    echo '&nbsp;';
                    echo '<h4 class="card-title" style = " min-height:60px;">' . $row->menu_name . '</h4>';
                    echo '<p class="card-text" style = " min-height:220px;">' . $row->menu_description . '</p>';
                    echo '<button id="btn_menu" name="add_menu_cart" onclick="addMenuCart()" class="btn btn-success" value=' . $row->menu_id . ' data-menuprice=' . $row->menu_price . '><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;' . $row->menu_price . ' €</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</div>
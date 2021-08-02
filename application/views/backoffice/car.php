<div class="intro">
    <div class="container">
        <div class="row">
            <h2>O seu Carrinho</h2>
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%;text-align: center">Produto</th>
                        <th style="width:8%;text-align: center">Quantidade</th>
                        <th style="width:10%;text-align: center">Preço</th>
                        <th style="width:10%"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    if ($get_cart->num_rows() > 0) {
                        foreach ($get_cart->result()as $row) {
                            if ($row->pizza_id != null) {
                                ?>
                                <?php
                                echo '<tr>';
                                echo '<td data-th = "Product">';
                                echo '<div class = "row">';
                                echo '<div class = "col-sm-2 hidden-xs"><img src = "' . $row->pizza_image . '" alt = "..." class = "img-responsive"/></div>';
                                echo '<div class = "col-sm-10">';
                                echo '<h4 class = "nomargin">' . $row->pizza_name . '</h4>';
                                echo '<h10>' . $row->pizza_description . '</h10>';
                                echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                echo '<td data-th = "Quantity">';
                                echo '<input type = "number" name="quantity_pizza" class = "form-control text-center quantity" data-pizzaid="' . $row->pizza_id . '" data-pizzaprice="' . $row->pizza_price . '" value ="' . $row->quantity . '" min="1">';
                                echo '</td>';
                                echo '<td data-th = "Price Pizza" style="padding-top: 24px;">' . $row->pizza_price * $row->quantity . '€</td>';
                                echo '<td class = "actions" data-th = "">';
                                echo '<button name="remove_product" onclick = "removeProduct()" value="' . $row->cart_id . '" class = "btn btn-danger btn-sm"><i class = "glyphicon glyphicon-trash"></i></button>';
                                echo '</td>';
                                echo '</tr>';
                            } else {
                                echo '<tr>';
                                echo '<td data-th = "Menu">';
                                echo '<div class = "row">';
                                echo '<div class = "col-sm-2 hidden-xs"><img src = "' . $row->menu_image . '" alt = "..." class = "img-responsive"/></div>';
                                echo '<div class = "col-sm-10">';
                                echo '<h4 class = "nomargin">' . $row->menu_name . '</h4>';
                                echo '<h10>' . $row->menu_description . '</h10>';
                                echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                echo '<td data-th = "Quantity">';
                                echo '<input type = "number" name="quantity_menu" class = "form-control text-center quantity" data-menuid="' . $row->menu_id . '" data-menuprice="' . $row->menu_price . '" value = "' . $row->quantity . '" min="1">';
                                echo '</td>';
                                echo '<td data-th = "Price" style="padding-top: 24px;">' . $row->menu_price * $row->quantity . '€</td>';
                                echo '<td class = "actions" data-th = "">';
                                echo '<button name="remove_product" onclick = "removeProduct()" value="' . $row->cart_id . '" class = "btn btn-danger btn-sm"><i class = "glyphicon glyphicon-trash"></i></button>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        }
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr class="visible-xs">
                        <td></td>
                    </tr>
                    <tr>
                        <td class="hidden-xs"></td>
                        <!--<td><input type="radio" name="payment" id="paypal" value="paypal"><img src="<?php echo base_url(); ?>assets/img/Paypal.png" alt="Pagamento com Paypal" class="paypal_payment"></img>
                        </td>-->
                        <td></td>
                        <td>
                            <input type="radio" name="payment" id="cobrança" value="cobrança" checked="checked"><img src="<?php echo base_url(); ?>assets/img/pagamentocobranca.png" alt="Pagamento à Cobrança" class="paypal_payment"></img>
                        </td>   
                        <td><button onclick="typePayment()" name="buttonpayment" class="btn btn-success btn-block" value="<?php echo $soma ?>">Pagamento <?php echo $soma ?>€</button></td>
                        
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

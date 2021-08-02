<!-- Pizzas Section -->
<div class="intro">
    <div class = "container">
        <div class = "row">
            <h2>As nossas pizzas</h2>
            <p></p>
            <?php
            if ($get_pizzas->num_rows() > 0) {
                foreach ($get_pizzas->result()as $row) {
                    ?>
                    <?php
                    echo '<div class = "col-lg-3 col-lg-offset-1">';
                    echo '<div class = "card">';
                    echo '<img class = "card-img-top" src="' . $row->pizza_image . '">';
                    echo '<div class = "card-body">';
                    echo '<h4 class = "card-title" style = " min-height:40px;">' . $row->pizza_name . '</h4>';
                    echo '<p class="card-text" style = " min-height:200px;">' . $row->pizza_description . '</p>';
                    if ($this->session->userdata('name')) {
                        echo '<div class="prices">';
                        echo '<button id="small" onclick="addPizzaSmallCart()" name="add_pizzasmall_cart" class="btn btn-success prices" type="button" value=' . $row->pizza_id .' data-pizzaprice=' . $row->price_small . '><span class=" glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;P: ' . $row->price_small . '€ </button>';
                        echo '<button id="medium" onclick="addPizzaMediumCart()" name="add_pizzamedium_cart" class="btn btn-success prices" type="button" value=' . $row->pizza_id .' data-pizzaprice=' . $row->price_medium . '><span class=" glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;M: ' . $row->price_medium . '€ </button>';
                        echo '<button id="family" onclick="addPizzaFamilyCart()" name="add_pizzafamily_cart" class="btn btn-success prices" type="button" value=' . $row->pizza_id .' data-pizzaprice=' . $row->price_family . '><span class=" glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;F: ' . $row->price_family . '€ </button>';
                        echo '</div>';
                    } else {
                        echo '<div class="prices">';
                        echo '<button onclick="showSa()" class="btn btn-success prices" type="button" id="small"><span class=" glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;P: ' . $row->price_small . '€</button>';
                        echo '<button onclick="showSa()" class="btn btn-success prices" type="button" id="medium"><span class=" glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;M: ' . $row->price_medium . '€</button>';
                        echo '<button onclick="showSa()" class="btn btn-success prices" type="button" id="family"><span class=" glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;F: ' . $row->price_family . '€</button>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
            <div class="modal fade" id="modalSa" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Necessário Criar Conta</h4>
                        </div>
                        <div class="modal-body">
                            <img src="<?php echo base_url(); ?>assets/img/information.png">
                            <p></p>
                            <h5>Para encomendar necessita de criar conta..</h5>
                            <p id="tamanho"></p>
                            <p id="preco"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="confirm_showSa" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Registar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


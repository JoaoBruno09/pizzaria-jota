<div class="intro">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>O seus dados</h4>
                <div class="form-group-profile">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $this->session->userdata('name'); ?>" disabled="">
                </div>
                <div class="form-group-profile">
                    <label>Email</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('email'); ?>" disabled="">
                </div>
                <div class="form-group-profile">
                    <div class="form-group row-registo">
                        <div class="col">
                            <label>Nº Telémovel</label>
                            <input type="text" class="form-control" value="<?php echo $this->session->userdata('phone'); ?>" disabled="">
                        </div>
                        <div class="col">
                            <label>NIF</label>
                            <input type="text" class="form-control" value="<?php echo $this->session->userdata('nif'); ?>" disabled="">
                        </div>
                    </div>
                </div>
                <div class="form-group-profile">
                    <label>Morada</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('address'); ?>" disabled="">
                </div>
                <div class="form-group-profile">
                    <div class="form-group row-registo">
                        <div class="col-md-6">
                            <label>Localidade</label>
                            <input type="text" id="place_profile" class="form-control" value="<?php echo $this->session->userdata('place'); ?>" disabled="">
                        </div>                       
                        <div class="col">
                            <label id="label_postal">Codigo-Postal</label> 
                            <input type="text" id="input_postal_code1" class="form-control" value="<?php echo $this->session->userdata('postal_code1'); ?>" disabled="" maxlength="4"> 
                            
                        </div>
                        <label class="label_postal-">-</label>
                        <div class="col">  
                            <label><br></label>
                            <input type="text" id="input_postal_code2" class="form-control" value="<?php echo $this->session->userdata('postal_code2'); ?>" disabled="" maxlength="3">
                        </div>


                    </div>
                </div>
                <div class="form-group-profile-data">
                    <button type="button" class="btn btn-primary-changedata " onclick="showChangeData()">Alterar Dados</button>
                    <button type="button" class="btn btn-primary-changepw " onclick="showChangePw()">Alterar Password</button>
                </div>   
            </div>
            <div class="col-md-6">
                <h4>Minhas Encomendas</h4>    
                <div>
                    <?php
                    if ($get_orders->num_rows() > 0) {
                        foreach ($get_orders->result()as $row) {
                            ?>
                            <?php
                            echo '<table id="orders" class="table table-hover table-condensed">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th scope = "col">Numero da Encomenda: ' . $row->order_id . ' </th>';
                            echo '<th scope = "col">&nbsp;</th>';
                            echo '<th scope = "col">&nbsp;</th>';

                            if ($row->status == 'A ser preparada') {
                                echo '<th scope = "col" class="orders_th"><img class="img_order" src=http://jbr-projects.pt/pizzaria-jota/assets/img/aserpreparada.png> ' . $row->status . '</th>';
                            }
                            if ($row->status == 'Paga') {
                                echo '<th scope = "col"><img class="img_order" src=http://jbr-projects.pt/pizzaria-jota/assets/img/paga.png> ' . $row->status . '</th>';
                            }
                            if ($row->status == 'A ser entregue') {
                                echo '<th scope = "col"><img class="img_order" src=http://jbr-projects.pt/pizzaria-jota/assets/img/aserentregue.png> ' . $row->status . '</th>';
                            }
                            if ($row->status == 'Entregue') {
                                echo '<th scope = "col"><img class="img_order" src=http://jbr-projects.pt/pizzaria-jota/assets/img/entregue.png> ' . $row->status . '</th>';
                            }
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            if ($row->menu_name != null) {
                                echo '<tr>';
                                echo '<th scope="col">' . $row->menu_name . '</th>';
                                echo '<th scope = "col">&nbsp;</th>';
                                echo '<th scope = "col">&nbsp;</th>';
                                echo '<th scope = "col">&nbsp;</th>';
                                echo '</tr>';
                            }
                            if ($row->pizza_name != null) {
                                echo '<tr>';
                                echo '<th>' . $row->pizza_name . '</th>';
                                echo '<th scope = "col">&nbsp;</th>';
                                echo '<th scope = "col">&nbsp;</th>';
                                echo '<th scope = "col">&nbsp;</th>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '<tfoot>';
                            echo '<th scope = "col">&nbsp;</th>';
                            echo '<th scope = "col">&nbsp;</th>';
                            echo '<th scope = "col">&nbsp;</th>';
                            echo '<th>Total: ' . $row->total_price . '€</th>';
                            echo'</tfoot>';
                            echo'</table>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="change_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alterar Dados</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open(base_url() . 'login/updateaccount', array(
                    'id' => 'update-account'
                ));
                ?>
                <div class="form-group change_data"> 
                    <label>Email:</label>
                    <input type="text" name="email" id="email" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" placeholder="E-mail">
                    <span class="help-block" id="help-email-change"></span>
                    <label>Número de Telemóvel:</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $this->session->userdata('phone'); ?>" class="form-control" placeholder="Numero de Telemóvel" maxlength="9">
                    <span class="help-block" id="help-phone-change"></span>
                    <label>Morada:</label>
                    <input type="text" name="address" id="address" value="<?php echo $this->session->userdata('address'); ?>" class="form-control" placeholder="Rua (Nº de Porta/Andar)">
                    <span class="help-block" id="help-address-change"></span>
                    <label>Localidade:</label>
                    <input type="text" name="place" id="place" value="<?php echo $this->session->userdata('place'); ?>" class="form-control" placeholder="Localidade">
                    <span class="help-block" id="help-place-change"></span>
                    <div class="row-registo">
                        <div class="col">
                            <label class="label_pc">Código-Postal:</label>
                            <input type="text" name="postal_code1" id="postal_code1" value="<?php echo $this->session->userdata('postal_code1'); ?>" class="form-control" placeholder="4 dígitos" maxlength="4">
                            <span class="help-block" id="help-postal_code1-change"></span>
                        </div>
                        <label class="label_-">-</label>
                        <div class="col" id="col_pd2">
                            <input type="text" name="postal_code2" id="postal_code2" value="<?php echo $this->session->userdata('postal_code2'); ?>" class="form-control" placeholder="3 dígitos" maxlength="3">
                            <span class="help-block" id="help-postal_code2-change"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" id="change" class="btn btn-primary" onclick="updateAccount()"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Alterar Dados</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<div class="modal fade" id="ChangeData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content-ChangeData">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alteração de Dados</h4>
            </div>
            <div class="modal-body">
                <img src="<?php echo base_url(); ?>assets/img/correct.png">
                <p></p>
                <h5>Dados Alterados com sucesso</h5>
                <p></p>
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm_ChangeData" class="btn btn-primary">&nbsp;&nbsp;Ok</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="change_pw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alterar Password</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open(base_url() . 'login/updatepw', array(
                    'id' => 'update-password'
                ));
                ?>
                <div class="form-group change_data">
                    <label>Password Antiga</label>
                    <input type="password" name="last_password" id="last_password" class="form-control" placeholder="Password Antiga">
                    <span class="help-block" id="help-lastpassword"></span>
                    <label>Nova Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Nova Password">
                    <span class="help-block" id="help-newpassword"></span>
                    <label>Confirmar Nova Password</label>
                    <input type="password" name="new_passconf" id="new_passconf" class="form-control" placeholder="Confirmar Nova Password">
                    <span class="help-block" id="help-newpassconf"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" id="changepw" class="btn btn-primary" onclick="updatePw()"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Alterar Password</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<div class="modal fade" id="ChangePw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content-ChangeData">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alteração de Password</h4>
            </div>
            <div class="modal-body">
                <img src="<?php echo base_url(); ?>assets/img/correct.png">
                <p></p>
                <h5>Password Alterada com sucesso</h5>
                <p></p>
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm_ChangePw" class="btn btn-primary">&nbsp;&nbsp;Ok</button>
            </div>
        </div>
    </div>
</div>


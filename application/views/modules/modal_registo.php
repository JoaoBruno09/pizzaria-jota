<!--MODAL DO REGISTO-->
<div class="modal fade" id="modal_registo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Criar Conta</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open(base_url() . 'index.php/login/createaccount', array(
                    'id' => 'create-account'
                ));
                ?>
                <div class="form-group row-registo">
                    <div class="col">
                        <label>Nome:</label>
                        <input type="text" name="name" id="name" value="" class="form-control" placeholder="Nome de Utilizador">
                        <span class="help-block" id="help-name"></span>
                        <label>Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="No minimo 8 caracteres">
                        <span class="help-block" id="help-password"></span>
                        <label> Confirmar Password:</label>
                        <input type="password" name="passconf" id="passconf" class="form-control" placeholder="Confirmar Password">
                        <span class="help-block" id="help-passconf"></span>
                        <label>Email:</label>
                        <input type="text" name="email" id="email" value="" class="form-control" placeholder="E-mail">
                        <span class="help-block" id="help-email"></span>
                        <label>Morada:</label>
                        <input type="text" name="address" id="address" value="" class="form-control" placeholder="Rua (Nº de Porta/Andar)">
                        <span class="help-block" id="help-address"></span>
                    </div>
                    <div class="col">
                        <label>Localidade:</label>
                        <input type="text" name="place" id="place" value="" class="form-control" placeholder="Localidade">
                        <span class="help-block" id="help-place"></span>
                        <div class="row-registo">
                            <div class="col">
                                <label class="label_pc">Código-Postal:</label>
                                <input type="text" name="postal_code1" id="postal_code1" value="" class="form-control" placeholder="4 dígitos" maxlength="4">
                                <span class="help-block" id="help-postal_code1"></span>
                            </div>
                            <label class="label_-">-</label>
                            <div class="col" id="col_pd2">
                                <input type="text" name="postal_code2" id="postal_code2" value="" class="form-control" placeholder="3 dígitos" maxlength="3">
                                <span class="help-block" id="help-postal_code2"></span>
                            </div>
                        </div>
                        <label>Número de Telemóvel:</label>
                        <input type="text" name="phone" id="phone" value="" class="form-control" placeholder="Numero de Telemóvel" maxlength="9">
                        <span class="help-block" id="help-phone"></span>
                        <label for="nif">NIF:</label>
                        <input type="text" name="nif" id="nif" value="" class="form-control" placeholder="NIF" maxlength="9">
                        <span class="help-block" id="help-nif"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="createAccount()"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Registar</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<div class="modal fade" id="modalconfirm" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align:center">Conta Criada com Sucesso</h4>
            </div>
            <div class="modal-body" style="text-align:center">
                <img src="<?php echo base_url(); ?>assets/img/correct.png">
                <p></p>
                <h5 style="text-align: center">Já pode começar a encomendar..<br>Desfrute das nossas ofertas.</h5>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm_showconfirm" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;&nbsp;Continuar</button>
            </div>
        </div>
    </div>
</div>
</div>
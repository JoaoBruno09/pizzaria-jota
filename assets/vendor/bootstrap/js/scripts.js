//var checked = JSON.parse(localStorage.getItem('change_mode'));
//document.getElementById("change_mode").checked = checked;


showRegistration = function () {
    $('#registo').fadeIn('500');
    $('.inner-registo').fadeIn('1000');
};
$('#close_registo').on('click', function () {
    $('.inner-registo').fadeOut('1000');
    $('#registo').fadeOut('500');
});
updateAccount = function () {
    var submit = true;
    var email = $('#email').val();
    var phone = $('#phone').val();
    var address = $('#address').val();
    var place = $('#place').val();
    var postal_code1 = $('#postal_code1').val();
    var postal_code2 = $('#postal_code2').val();
    if (email === '') {
        $('#help-email-change').text('*Este campo é obrigatório');
        submit = false;
    }
    if (phone === '') {
        $('#help-phone-change').text('*Este campo é obrigatório');
        submit = false;
    }
    if (phone.length < 8) {
        $('#help-phone-change').text('*O Numero de Telemóvel não contém 9 digitos');
        submit = false;
    }
    if (address === '') {
        $('#help-address-change').text('*Este campo é obrigatório');
        submit = false;
    }
    if (place === '') {
        $('#help-place-change').text('*Este campo é obrigatório');
        submit = false;
    }
    if (postal_code1 === '') {
        $('#help-postal_code1-change').text('*Este campo é obrigatório');
        submit = false;
    }
    if (postal_code1.length < 4) {
        $('#help-postal_code1-change').text('*O codigo postal não contém 4 digitos');
        submit = false;
    }
    if (postal_code2 === '') {
        $('#help-postal_code2-change').text('*Este campo é obrigatório');
        submit = false;
    }
    if (postal_code2 < 3) {
        $('#help-postal_code2-change').text('*O codigo postal não contém 3 digitos');
        submit = false;
    }

    if (submit === true) {
        $('#change_data').modal('hide');
        $('#ChangeData').modal('show');
        $('#confirm_ChangeData').click(function () {
            $('#ChangeData').modal('hide');
            //Confirmado
            $('#update-account').submit();
        });
    }
};
createAccount = function () {
    var submit = true;
    var name = $('#name').val();
    var email = $('#email').val();
    var address = $('#address').val();
    var phone = $('#phone').val();
    var password = $('#password').val();
    var passconf = $('#passconf').val();
    var place = $('#place').val();
    var postal_code1 = $('#postal_code1').val();
    var postal_code2 = $('#postal_code2').val();
    var nif = $('#nif').val();
    var temErro = 0;
    if (name === '') {
        $('#help-name').text('*O nome é obrigatório');
        submit = false;
    } else {
        $('#help-name').remove();
    }
    if (password === '') {
        $('#help-password').text('*A password é obrigatória');
        submit = false;
    } else {
        $('#help-password').remove();
    }
    if (password.length < 8) {
        $('#help-password').text('*A password tem de conter no minimo 8 caracteres');
        submit = false;
    } else {
        $('#help-password').remove();
    }
    if (passconf === '') {
        $('#help-passconf').text('*A confirmação de Password é obrigatório');
        submit = false;
    } else {
        $('#help-passconf').remove();
    }
    if (passconf !== password) {
        $('#help-passconf').text('*As passwords não coincidem');
        submit = false;
    } else {
        $('#help-passconf').remove();
    }
    if (email === '') {
        $('#help-email').text('*O email é obrigatório');
        submit = false;
    } else {
        $('#help-email').remove();
    }
    if (address === '') {
        $('#help-address').text('*A Morada é obrigatória');
        submit = false;
    } else {
        $('#help-address').remove();
    }
    if (phone === '') {
        $('#help-phone').text('*O Número de Telemóvel é obrigatório');
        submit = false;
    } else {
        $('#help-phone').remove();
    }
    if (place === '') {
        $('#help-place').text('*A Localidade é obrigatória');
        submit = false;
    } else {
        $('#help-place').remove();
    }
    if (postal_code1 === '') {
        $('#help-postal_code1').text('*O código postal é obrigatório');
        submit = false;
    } else {
        $('#help-postal_code1').remove();
    }
    if (postal_code2 === '') {
        $('#help-postal_code2').text('*O código postal é obrigatória');
        submit = false;
    } else {
        $('#help-postal_code2').remove();
    }
    if (nif === '') {
        $('#help-nif').text('*O nif é obrigatório');
        submit = false;
    }
    if (nif.length !== 9) {
        $('#help-nif').text('*O nif não tem 9 digitos ');
        submit = false;
    }

    if (
            nif.substr(0, 1) !== '1' && // pessoa singular
            nif.substr(0, 1) !== '2' && // pessoa singular
            nif.substr(0, 1) !== '3' && // pessoa singular
            //nif.substr(0, 2) !== '45' && // pessoa singular não residente
            nif.substr(0, 1) !== '5' && // pessoa colectiva
            nif.substr(0, 1) !== '6' && // administração pública
            //nif.substr(0, 2) !== '70' && // herança indivisa
            //nif.substr(0, 2) !== '71' && // pessoa colectiva não residente
            //nif.substr(0, 2) !== '72' && // fundos de investimento
            //nif.substr(0, 2) !== '77' && // atribuição oficiosa
            //nif.substr(0, 2) !== '79' && // regime excepcional
            nif.substr(0, 1) !== '8' && // empresário em nome individual (extinto)
            //nif.substr(0, 2) !== '90' && // condominios e sociedades irregulares
            //nif.substr(0, 2) !== '91' && // condominios e sociedades irregulares
            //nif.substr(0, 2) !== '98' && // não residentes
            nif.substr(0, 2) !== '99' // sociedades civis

            ) {
        temErro = 1;
    }
    var check1 = nif.substr(0, 1) * 9;
    var check2 = nif.substr(1, 1) * 8;
    var check3 = nif.substr(2, 1) * 7;
    var check4 = nif.substr(3, 1) * 6;
    var check5 = nif.substr(4, 1) * 5;
    var check6 = nif.substr(5, 1) * 4;
    var check7 = nif.substr(6, 1) * 3;
    var check8 = nif.substr(7, 1) * 2;
    var total = check1 + check2 + check3 + check4 + check5 + check6 + check7 + check8;
    var divisao = total / 11;
    var modulo11 = total - parseInt(divisao) * 11;
    if (modulo11 === 1 || modulo11 === 0) {
        comparador = 0;
    } // excepção
    else {
        comparador = 11 - modulo11;
    }


    var ultimoDigito = nif.substr(8, 1) * 1;
    if (ultimoDigito !== comparador) {
        temErro = 1;
    }

    if (temErro === 1) {
        $('#help-nif').text('*O NIF não está correto ');
        submit = false;
    } else {
        $('#help-nif').remove();
    }


    if (submit === true) {
        $('#modal_registo').modal('hide');
        $('#modalconfirm').modal('show');
        $('#confirm_showconfirm').click(function () {
            //Confirmado
            $('#create-account').submit();
        });
    }
    ;
};
showSa = function () {
    $('#modalSa').modal('show');
    $('#confirm_showSa').click(function () {
        $('#modalSa').modal('hide');
        //Confirmado
        $('#modal_registo').modal('show');
    });
};
addPizzaSmallCart = $(document).ready(function () {
    $('button[name="add_pizzasmall_cart"]').click(function () {
        var id = $(this).val();
        var price = $(this).data('pizzaprice');
        $.ajax({
            url: 'ShoppingCart/addproduct',
            type: "POST",
            data: {pizza_id: id, pizza_price: price},
            success: function () {
                window.location.href = 'ShoppingCart/car';
            }
        });
    });
});
addPizzaMediumCart = $(document).ready(function () {
    $('button[name="add_pizzamedium_cart"]').click(function () {
        var id = $(this).val();
        var price = $(this).data('pizzaprice');
        $.ajax({
            url: 'ShoppingCart/addproduct',
            type: "POST",
            data: {pizza_id: id, pizza_price: price},
            success: function () {
                window.location.href = 'ShoppingCart/car';
            }
        });
    });
});
addPizzaFamilyCart = $(document).ready(function () {
    $('button[name="add_pizzafamily_cart"]').click(function () {
        var id = $(this).val();
        var price = $(this).data('pizzaprice');
        $.ajax({
            url: 'ShoppingCart/addproduct',
            type: "POST",
            data: {pizza_id: id, pizza_price: price},
            success: function () {
                window.location.href = 'ShoppingCart/car';
            }
        });
    });
});
addMenuCart = $(document).ready(function () {
    $('button[name="add_menu_cart"]').click(function () {
        var id = $(this).val();
        var price = $(this).data('menuprice');
        $.ajax({
            url: 'ShoppingCart/addproduct',
            type: "POST",
            data: {menu_id: id, menu_price: price},
            success: function () {
                window.location.href = 'ShoppingCart/car';
            }
        });
    });
});
removeProduct = $(document).ready(function () {
    $('button[name="remove_product').click(function () {
        var id = $(this).val();
        $.post('removeproduct', {cart_id: id},
                function () {
                    window.location.href = 'car';
                });
    });
});
$(document).ready(function () {
    $('input[name="quantity_menu').change(function () {
        var quantity = $(this).val();
        var price = $(this).data('menuprice');
        var id = $(this).data('menuid');
        //alert(quantity);
        $.ajax({
            url: 'changequantity',
            type: "POST",
            data: {quantity: quantity, menu_id: id, menu_price: price},
            success: function () {
                window.location.href = 'car';
            }
        });
    });
});
$(document).ready(function () {
    $('input[name="quantity_pizza').change(function () {
        var quantity = $(this).val();
        var price = $(this).data('pizzaprice');
        var id = $(this).data('pizzaid');
        $.ajax({
            url: 'changequantity',
            type: "POST",
            data: {quantity: quantity, pizza_id: id, pizza_price: price},
            success: function () {
                window.location.href = 'car';
            }
        });
    });
});
typePayment = $(document).ready(function () {
    $('button[name="buttonpayment"]').click(function () {
        if ($('#cobrança').is(":checked")) {
            window.location.href = 'payment';
        }
        if ($('#paypal').is(":checked")) {
            alert("Em desenvolvimento");
        }

    });
});
confirmPurchase = $(document).ready(function () {
    $('button[name="confirmpurchase"]').click(function ()
    {
        var total = $(this).val();
        var pizza_id = $(this).data('pizzaid');
        var subtotal_pizza = $(this).data('subtotalpizza');
        var quantity_pizza = $(this).data('quantitypizza');
        var menu_id = $(this).data('menuid');
        var subtotal_menu = $(this).data('subtotalmenu');
        var quantity_menu = $(this).data('quantitymenu');
        $.ajax({
            url: 'purchase',
            type: "POST",
            data: {total: total, pizza_id: pizza_id, subtotal_pizza: subtotal_pizza, quantity_pizza: quantity_pizza, menu_id: menu_id, subtotal_menu: subtotal_menu, quantity_menu: quantity_menu},
            success: function () {
                $('#modal_goprofile').modal('show');
                $('#go_profile').click(function () {
                    $('#confirmpurchase').modal('hide');
                    window.location.href = 'https://jbr-projects.pt/pizzaria-jota/Backoffice/profile';
                });
            }
        });
    });
});
showChangeData = function () {
    $('#change_data').modal('show');
};
updatePw = function () {
    var submit = true;
    var last_password = $('#last_password').val();
    var new_password = $('#new_password').val();
    var new_passconf = $('#new_passconf').val();
    if (last_password === '') {
        $('#help-lastpassword').text('*Este campo é obrigatório');
        submit = false;
    }
    if (new_password < 8) {
        $('#help-newpassword').text('*A password deverá conter no minimo 8 caracteres');
        submit = false;
    }

    if (new_password === '') {
        $('#help-newpassword').text('*Este campo é obrigatório');
        submit = false;
    }

    if (new_passconf !== new_password) {
        $('#help-newpassconf').text('*As passwords não correspondem');
        submit = false;
    }

    if (submit === true) {
        $('#change_pw').modal('hide');
        $('#ChangePw').modal('show');
        $('#confirm_ChangePw').click(function () {
            $('#ChangePw').modal('hide');
            //Confirmado
            $('#update-password').submit();
        });
    }
};
showChangePw = function () {
    $('#change_pw').modal('show');
};
deleteOrder = $(document).ready(function () {
    $('button[id="deleteorder"]').click(function () {
        var id = $(this).val();
        swal({
            title: 'Eliminar Encomenda ' + id,
            text: "Não será possivel reverter esta ação",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                $.post('deleteorder', {order_id: id},
                        swal({
                            title: 'Encomenda Eliminada ',
                            text: 'Encomenda Eliminada com sucesso',
                            type: 'success'
                        }).then(function () {
                    window.location.reload(false);
                    ;
                }));
                ;
            }
        }
        );
    });
});
changeStatus = $(document).ready(function () {
    $('button[id="updatestatus"]').click(function () {
        var id = $(this).val();
        var whatstatus = $(this).data('status');
        if (whatstatus === 'Paga') {
            (async () => {

                /* inputOptions can be an object or Promise */
                const inputOptions = new Promise((resolve) => {
                    setTimeout(() => {
                        resolve({
                            'A ser preparada': 'A ser preparada',
                            'A ser entregue': 'A ser entregue',
                            'Entregue': 'Entregue'
                        });
                    }, 1000);
                });
                const {value: status} = await Swal.fire({
                    title: 'Estado da Encomenda',
                    input: 'radio',
                    width: 600,
                    inputOptions: inputOptions,
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Tem de escolher uma opção';
                        }
                    }
                });
                if (status) {
                    $.post('updateorder', {statusorder: status, order_id: id},
                            swal({
                                title: 'Estado da Encomenda Alterado ',
                                text: 'Alterou o estado da Encomenda para ' + status,
                                type: 'success'
                            }).then(function () {
                        window.location.href = 'orders';
                    }));
                }

            })();
        }
        if (whatstatus === 'A ser preparada') {
            (async () => {

                /* inputOptions can be an object or Promise */
                const inputOptions = new Promise((resolve) => {
                    setTimeout(() => {
                        resolve({
                            'A ser entregue': 'A ser entregue',
                            'Entregue': 'Entregue'
                        });
                    }, 1000);
                });
                const {value: status} = await Swal.fire({
                    title: 'Estado da Encomenda',
                    input: 'radio',
                    width: 600,
                    inputOptions: inputOptions,
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Tem de escolher uma opção';
                        }
                    }
                });
                if (status) {
                    $.post('updateorder', {statusorder: status, order_id: id},
                            swal({
                                title: 'Estado da Encomenda Alterado ',
                                text: 'Alterou o estado da Encomenda para ' + status,
                                type: 'success'
                            }).then(function () {
                        window.location.href = 'orders';
                    }));
                }

            })();
        }
        if (whatstatus === 'A ser entregue') {
            (async () => {

                /* inputOptions can be an object or Promise */
                const inputOptions = new Promise((resolve) => {
                    setTimeout(() => {
                        resolve({
                            'Entregue': 'Entregue'
                        });
                    }, 1000);
                });
                const {value: status} = await Swal.fire({
                    title: 'Estado da Encomenda',
                    input: 'radio',
                    width: 600,
                    inputOptions: inputOptions,
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Tem de escolher uma opção';
                        }
                    }
                });
                if (status) {
                    $.post('updateorder', {statusorder: status, order_id: id},
                            swal({
                                title: 'Estado da Encomenda Alterado ',
                                text: 'Alterou o estado da Encomenda para ' + status,
                                type: 'success'
                            }).then(function () {
                        window.location.href = 'orders';
                    }));
                }

            })();
        }
    });
});
enviarContact = function () {
    var namecontact = $('#namecontact').val();
    var emailcontact = $('#emailcontact').val();
    var subjectcontact = $('#subjectcontact').val();
    var messagecontact = $('#messagecontact').val();
    var submit = true;
    if (namecontact === '' || emailcontact === '' || subjectcontact === '' || messagecontact === '') {
        $('#required').text('* Obrigatório');
        submit = false;
    }

    if (submit === true) {
        $.ajax({
            url: 'https://jbr-projects.pt/pizzaria-jota/Home/contact',
            type: "POST",
            data: {namecontact: namecontact, emailcontact: emailcontact, subjectcontact: subjectcontact, messagecontact: messagecontact},
            success: function () {
                swal({
                    title: 'Mensagem Enviada com sucesso',
                    text: 'A sua mensagem foi enviada corretamente.Entraremos em contaco consigo brevemente.',
                    type: 'success'
                }).then(function () {
                    window.location.href = 'https://jbr-projects.pt/pizzaria-jota';
                });
            }
        });
    }
};
function change_lightdark_mode() {
    if ($("#change_mode").is(':checked')) {
        var checkbox = document.getElementById('change_mode');
        localStorage.setItem('change_mode', checkbox.checked);
        $(".intro_admin").css("background-color", "#fff");
        $(".fa-moon-o").css("color", "#000");
        $(".fa-lightbulb-o").css("color", "#000");
        $(".logout_button").css("color", "#000");
        $(".page-header").css({
            "color": "#000",
            "border-bottom-color": "#000"
        });
        $(".left_menu a").css("color", "#000");
        $(".page-bottom").css("border-top-color", "#000");
        $(".separator_bottom").css("border-top-color", "#000");
        $("#name_admin").css("color", "#000");

    } else {
        var checkbox = document.getElementById('change_mode');
        localStorage.setItem('change_mode', checkbox.notchecked);
        $(".intro_admin").css("background-color", "");
        $(".fa-moon-o").css("color", "");
        $(".fa-lightbulb-o").css("color", "");
        $(".logout_button").css("color", "");
        $(".page-header").css({
            "color": "",
            "border-bottom-color": ""
        });
        $(".left_menu a").css("color", "");
        $(".page-bottom").css("border-top-color", "");
        $(".separator_bottom").css("border-top-color", "");
        $("#name_admin").css("color", "");
    }
};
$( document ).ready(function() {
    if ($("#change_mode").is(':checked')) {
        $(".intro_admin").css("background-color", "#fff");
        $(".fa-moon-o").css("color", "#000");
        $(".fa-lightbulb-o").css("color", "#000");
        $(".logout_button").css("color", "#000");
        $(".page-header").css({
            "color": "#000",
            "border-bottom-color": "#000"
        });
        $(".left_menu a").css("color", "#000");
        $(".page-bottom").css("border-top-color", "#000");
        $(".separator_bottom").css("border-top-color", "#000");
        $("#name_admin").css("color", "#000");

    } else {
        $(".intro_admin").css("background-color", "");
        $(".fa-moon-o").css("color", "");
        $(".fa-lightbulb-o").css("color", "");
        $(".logout_button").css("color", "");
        $(".page-header").css({
            "color": "",
            "border-bottom-color": ""
        });
        $(".left_menu a").css("color", "");
        $(".page-bottom").css("border-top-color", "");
        $(".separator_bottom").css("border-top-color", "");
        $("#name_admin").css("color", "");
    }
});



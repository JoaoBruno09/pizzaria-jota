<!-- Contact Section -->
<section id="contact" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Contactos</h2>
            <p>Sinta-se à vontade e comunique connosco para fornecer as suas sugestões e avaliações ou para tirar alguma dúvida que tenha.</p>
            <ul class="list-inline banner-social-buttons">
                <li>
                    <a href="https://www.facebook.com/" target="_blank" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                </li>
                <li>
                    <a href="https://twitter.com/" target="_blank" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                </li>

                <li>
                    <a href="https://plus.google.com" target="_blank" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                </li>
            </ul>
            <form>
                <div class="form-group">
                    <label style="float: left;" >* Nome:</label>
                    <input type="text" class="form-control" id="namecontact">
                </div>
                <div class="form-group">
                    <label style="float: left;" >* Email:</label>
                    <input type="email" class="form-control" id="emailcontact">
                </div>
                <div class="form-group">
                    <label style="float: left;" >* Assunto:</label>
                    <input type="text" class="form-control" id="subjectcontact">
                </div>
                <div class="form-group">
                    <label style="float: left;">* Mensagem:</label>
                    <textarea class="form-control" id="messagecontact" rows="4"></textarea>
                </div>
                <span style="color:#f00" id="required"></span>
                <a class="btn btn-primary" onclick="enviarContact();"><span class="fa fa-envelope">&nbsp;</span>Enviar Contacto</a>
            </form>
            
        </div>
    </div>
</section>
<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="brand-heading" name="new">Pizzaria Jota</h1>
                    <p class="intro-text">A sua pizzaria de eleição.</p>
                    <div class="header-content-inner">
                        <?php if ($this->session->userdata('name')) { ?>
                            <div class="hidden">
                                <h4 data-toggle="modal" data-target="#modal_registo" class="btn btn-outline btn-xl page-scroll">Regista-te para começares a encomendar! </h4>
                            </div>
                        <?php } else { ?>             
                            <h4 data-toggle="modal" data-target="#modal_registo" class="btn btn-outline btn-xl page-scroll">Regista-te para começares a encomendar! </h4>
                        <?php } ?>
                    </div>
                    <div class="scroll_button">
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quote</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-plus"></i> RFQ</h3>
                        </div>
                        <form role="form" method="post" action="<?php echo SAVE_INFO_PROJECT . $id_project; ?>">
                            <?php
                              include_once 'templates/form_info_quote_rfq.inc.php';
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

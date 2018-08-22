<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
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
                  <form role="form" id="form_info_project" method="post" action="<?php echo SAVE_INFO_PROJECT . $id_project; ?>">
                    <?php
                      include_once 'templates/form_info_project.inc.php';
                    ?>
                  </form>
                </div>
            </div>
        </div>
    </section>
</div>

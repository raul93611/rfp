<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Projects</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <section class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Submitted</h3>
            </div>
            <div class="card-body table-responsive">
              <?php
              ProjectRepository::print_submitted_projects();
              ?>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>

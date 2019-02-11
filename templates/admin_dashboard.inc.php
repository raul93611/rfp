<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Home</h1>
        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-12">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>
                <?php
                Connection::open_connection();
                echo UserRepository::count_users(Connection::get_connection());
                Connection::close_connection();
                ?>
              </h3>
              <p>Registered users</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <section class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Registered users</h3>
            </div>
            <div id="content" class="card-body">
              <br>
              <div class="table-responsive">
                <?php
                UserRepository::print_users();
                ?>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>

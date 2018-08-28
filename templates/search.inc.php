<?php
$projects = [];
if(isset($_POST['search'])){
  echo $_POST['search_term'];
  Connection::open_connection();
  $projects = ProjectRepository::get_search_results(Connection::get_connection(), $_POST['search_term']);
  Connection::close_connection();
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Search</h1>
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
                            <h3 class="card-title">Projects</h3>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-4">

                            </div>
                            <div class="col-4">
                              <form role="form" method="post" action="<?php echo SEARCH; ?>">
                                <div class="form-group">
                                  <input type="search" name="search_term" class="form-control" placeholder="Search ..." required autofocus <?php if(isset($_POST['search'])){echo 'value="' . $_POST['search_term'] . '"';} ?>>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="search">Search</button>
                              </form>
                            </div>
                            <div class="col-4">

                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card card-primary">
                      <div class="card-header">
                          <h3 class="card-title">Projects</h3>
                      </div>
                      <div class="card-body">
                        <?php
                        ProjectRepository::print_search_results($projects);
                        ?>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

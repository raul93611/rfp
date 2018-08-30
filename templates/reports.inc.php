<?php
Connection::open_connection();
list($submitted_projects_by_month, $award_projects_by_month, $award_by_amount_projects_by_month) = ProjectRepository::submitted_award_award_by_amount_projects_by_month(Connection::get_connection());
list($ocho_a, $full_and_open, $hubzone, $small_business) = ProjectRepository::submitted_projects_by_priority(Connection::get_connection());
list($cancelled, $disqualified, $loss, $re_posted) = ProjectRepository::submitted_projects_by_result(Connection::get_connection());
Connection::close_connection();
?>
<div id="data_reports">
  <input type="hidden" id="submitted_projects_by_month" name="submitted_projects_by_month" <?php echo "value='" . json_encode($submitted_projects_by_month) . "'"; ?>>
  <input type="hidden" id="award_projects_by_month" name="award_projects_by_month" <?php echo "value='" . json_encode($award_projects_by_month) . "'"; ?>>
  <input type="hidden" id="award_by_amount_projects_by_month" name="award_by_amount_projects_by_month" <?php echo "value='" . json_encode($award_by_amount_projects_by_month) . "'"; ?>>
  <input type="hidden" id="ocho_a" name="ocho_a" <?php echo "value='" . json_encode($ocho_a) . "'"; ?>>
  <input type="hidden" id="full_and_open" name="full_and_open" <?php echo "value='" . json_encode($full_and_open) . "'"; ?>>
  <input type="hidden" id="hubzone" name="hubzone" <?php echo "value='" . json_encode($hubzone) . "'"; ?>>
  <input type="hidden" id="small_business" name="small_business" <?php echo "value='" . json_encode($small_business) . "'"; ?>>
  <input type="hidden" id="cancelled" name="cancelled" <?php echo "value='" . json_encode($cancelled) . "'"; ?>>
  <input type="hidden" id="disqualified" name="disqualified" <?php echo "value='" . json_encode($disqualified) . "'"; ?>>
  <input type="hidden" id="loss" name="loss" <?php echo "value='" . json_encode($loss) . "'"; ?>>
  <input type="hidden" id="re_posted" name="re_posted" <?php echo "value='" . json_encode($re_posted) . "'"; ?>>
</div>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Reports</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="far fa-chart-bar"></i> Submitted</h3>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="submitted_chart" height="100"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    Current year
                  </span>
                </div>
              </div>
            </div>
            <div class="card card-primary">
              <div class="card-header no-border">
                  <h3 class="card-title"><i class="far fa-chart-bar"></i> Award</h3>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="award_chart" height="100"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    Current year
                  </span>
                </div>
              </div>
            </div>
            <div class="card card-primary">
              <div class="card-header no-border">
                  <h3 class="card-title"><i class="far fa-chart-bar"></i> Award (by amount)</h3>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="award_by_amount_chart" height="100"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    Current year
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-chart-pie"></i> Submitted</h3>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="submitted_pie_chart" height="400"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    Current year
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-chart-pie"></i> Results</h3>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="result_pie_chart" height="400"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    Current year
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

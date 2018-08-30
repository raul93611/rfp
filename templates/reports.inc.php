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

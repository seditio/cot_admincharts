<!-- BEGIN: MAIN -->
<div class="row">
  <div class="col-xl-7 col-xxl-8">
    <div class="block">
      <h2>{PHP.R.icon-chart-line}Посещения за последние {PHP.period_days_str}</h2>
      <div class="wrapper position-relative" style="height: 300px;">
        <canvas id="myChart1" data-visits="{PHP.visits_days}" data-dates="{PHP.dates_days}" data-label="{PHP.L.Hits}"></canvas>
      </div>
    </div>
  </div>
  <div class="col-xl-5 col-xxl-4">
    <div class="block">
      <h2>{PHP.R.icon-chart-line}Посещения за последние {PHP.period_months_str}</h2>
      <div class="wrapper position-relative" style="height: 300px;">
        <canvas id="myChart4" data-visits="{PHP.visits_months}" data-months="{PHP.dates_months}" data-label="{PHP.L.Hits}"></canvas>
      </div>
    </div>
  </div>
</div>
<!-- END: MAIN -->

<div class="block" id="doughnut_charts">
  <h2>{PHP.R.icon-chart-pie}Заполнение meta-тегов</h2>
  <div class="wrapper">
    <div class="d-sm-flex">
      <div class="mb-3 mb-sm-0">
        <span class="fs-6 fw-bold text-center mb-2 d-block">{PHP.L.Pages}</span>
        <div class="mx-auto position-relative">
          <canvas id="myChart2" data-m1="{PHP.metas_pages}" data-m2="{PHP.colors}" data-m3=" {PHP.L.Pages}" data-m4="{PHP.L.meta1},{PHP.L.meta0}"></canvas>
        </div>
      </div>
      <div>
        <span class="fs-6 fw-bold text-center mb-2 d-block">{PHP.L.Structure}</span>
        <div class="mx-auto position-relative">
          <canvas id="myChart3" data-m1="{PHP.metas_structure}" data-m2="{PHP.colors}" data-m3=" {PHP.L.Categories}" data-m4="{PHP.L.meta1},{PHP.L.meta0}"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

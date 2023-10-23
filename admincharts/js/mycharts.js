Chart.defaults.font.family = '"Open Sans", sans-serif';
Chart.defaults.font.size = 13;

if (document.body.contains(document.querySelector('#myChart1'))) {
  const chart_line = document.getElementById('myChart1');

  new Chart(chart_line, {
    type: 'line',
    data: {
      labels: (chart_line.getAttribute('data-dates')).split(','),
      datasets: [{
        label: chart_line.getAttribute('data-label'),
        data: (chart_line.getAttribute('data-visits')).split(','),
        borderWidth: 1,
        pointRadius: 2,
        borderColor: 'rgb(13,110,253)',
        // backgroundColor: 'rgb(110,168,254)',
        // fill: {
        //   target: 'origin',
        //   below: 'rgb(110,168,254)'    // And blue below the origin
        // },
      }]
    },
    options: {
      tension: 0,
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins:{
        legend: {
          display: false
        }
      }
    }
  });
}

if (document.body.contains(document.querySelector('#myChart4'))) {
  const chart_bar = document.getElementById('myChart4');

  new Chart(chart_bar, {
    type: 'bar',
    data: {
      labels: (chart_bar.getAttribute('data-months')).split(','),
      datasets: [{
        label: chart_bar.getAttribute('data-label'),
        data: (chart_bar.getAttribute('data-visits')).split(','),
        borderWidth: 1,
        pointRadius: 2,
        backgroundColor: 'rgb(117,183,152)',
        borderColor: 'rgb(25,135,84)',
      }]
    },
    options: {
      tension: 0,
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins:{
        legend: {
          display: false
        }
      }
    }
  });
}

if (document.body.contains(document.querySelector('#myChart2'))) {
  const chart_donut1 = document.getElementById('myChart2');

  new Chart(chart_donut1, {
    type: 'doughnut',
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins:{
        legend: {
          display: false
        }
      }
    },
    data: {
      datasets: [{
        data: (chart_donut1.getAttribute('data-m1')).split(','),
        backgroundColor: (chart_donut1.getAttribute('data-m2')).split(';'),
        label: chart_donut1.getAttribute('data-m3'),
      }],
      labels: (chart_donut1.getAttribute('data-m4')).split(','),
    },
  });
}

if (document.body.contains(document.querySelector('#myChart3'))) {
  const chart_donut2 = document.getElementById('myChart3');

  new Chart(chart_donut2, {
    type: 'doughnut',
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins:{
        legend: {
          display: false
        }
      }
    },
    data: {
      datasets: [{
        data: (chart_donut2.getAttribute('data-m1')).split(','),
        backgroundColor: (chart_donut2.getAttribute('data-m2')).split(';'),
        label: chart_donut2.getAttribute('data-m3'),
      }],
      labels: (chart_donut2.getAttribute('data-m4')).split(','),
    },
  });
}

// Function to fetch data from the Laravel backend
async function fetchData(url) {
  const response = await fetch(url);
  const data = await response.json();
  return data;
}

// Function to update the chart with fetched data
async function updateChart(chart, options, dataUrl) {
  const data = await fetchData(dataUrl);

  // Update the series and categories with the fetched data
  options.series[0].data = Object.values(data);
  options.xaxis.categories = Object.keys(data);

  // Initialize or update the chart with the updated options
  if (!chart) {
      chart = new ApexCharts(document.querySelector(options.chart.container), options);
      chart.render();
  } else {
      chart.updateOptions(options, true);
  }
}

// URLs for data fetching
const compJobChartUrl = '/comp__most_post_job_chart';

// Chart options
let optionsProfileVisit = {
  annotations: {
      position: "back",
  },
  dataLabels: {
      enabled: false,
  },
  chart: {
      type: "bar",
      height: 300,
      container: "#chart-profile-visit",
  },
  fill: {
      opacity: 1,
  },
  plotOptions: {},
  series: [
      {
          name: "sales",
          data: [],
      },
  ],
  colors: "#435ebe",
  xaxis: {
      categories: [],
  },
};

let optionsVisitorsProfile = {
  series: [70, 30],
  labels: ["Male", "Female"],
  colors: ["#435ebe", "#55c6e8"],
  chart: {
      type: "donut",
      width: "100%",
      height: "350px",
      container: "#chart-visitors-profile",
  },
  legend: {
      position: "bottom",
  },
  plotOptions: {
      pie: {
          donut: {
              size: "30%",
          },
      },
  },
};

let optionsEurope = {
  series: [
      {
          name: "series1",
          data: [],
      },
  ],
  chart: {
      height: 80,
      type: "area",
      toolbar: {
          show: false,
      },
      container: "#chart-europe",
  },
  colors: ["#5350e9"],
  stroke: {
      width: 2,
  },
  grid: {
      show: false,
  },
  dataLabels: {
      enabled: false,
  },
  xaxis: {
      type: "datetime",
      categories: [],
      axisBorder: {
          show: false,
      },
      axisTicks: {
          show: false,
      },
      labels: {
          show: false,
      },
  },
  show: false,
  yaxis: {
      labels: {
          show: false,
      },
  },
  tooltip: {
      x: {
          format: "dd/MM/yy HH:mm",
      },
  },
};

// Existing charts
var chartProfileVisit = null;
var chartVisitorsProfile = null;
var chartEurope = null;

// Fetch and update data for each chart
updateChart(chartProfileVisit, optionsProfileVisit, compJobChartUrl);
updateChart(chartVisitorsProfile, optionsVisitorsProfile, compJobChartUrl);
updateChart(chartEurope, optionsEurope, compJobChartUrl);

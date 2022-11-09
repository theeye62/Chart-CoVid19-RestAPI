<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script src="chart_bar.js"></script> -->

    <title>Chart</title>
</head>
<body>
    <div class="container">
        <div class=""card text-center m-5>

                <center><h2>Covid Global Cases by SGN</h2></center>

                <canvas id="myChart" width="600" height="1000"></canvas>

        </div>
    </div>

<script>
var countryLabel = [], casesData = []

async function dummyChart() {
await getDummyData()

let ctx = document.getElementById('myChart');
let myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: countryLabel,
        datasets: [{
            data: casesData,
            label: 'covid cases',
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        indexAxis: 'y',
    }
});
}
dummyChart()

async function getDummyData() {
    const apiUrl = "https://disease.sh/v3/covid-19/countries"

    const response = await fetch(apiUrl)
    const barChartData = await response.json()
    
    const country = barChartData.map( (x) => x.country)
    const cases = barChartData.map( (x) => x.cases)

    console.log(country, cases)

    countryLabel = country
    casesData = cases
}



</script>

</body>
</html>
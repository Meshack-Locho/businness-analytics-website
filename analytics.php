
<?php

session_start();
include "config.php";
if (!isset($_SESSION["id"])) {
    header("Location: loginform.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="main.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #myChart, #products {
            width: 100%; /* Make the chart width 100% of its container */
            max-width: 100%; /* Limit the maximum width if needed */
            max-height: 500px;
            height: auto; /* Make the height adjust automatically based on aspect ratio */
            border: 1px solid #ddd; /* Example border styling */
            border-radius: 5px; /* Example border radius */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Example box shadow */
  }
    </style>
</head>
<body>
    <div id="header">
    <div class="navigation">
            <nav>
                <ul>
                    <li><a href="#">App</a></li>
                    <li><a href="#">Plans</a></li>
                </ul>
            </nav>
            <i class="fa-solid fa-bars options-toggle"></i>
        </div>
    </div>
    <div class="options">
            <i class="fa-solid fa-circle-xmark options-toggle"></i>
            <div class="logo">
                <a href="index.php"><i class="fa-solid fa-store"></i></a>
            </div>
            <div class="user-info">
                <i class="fa-solid fa-user user-icon"></i>
                <h4><?= $_SESSION["name"]?></h4>
                
            </div>
        <nav>
        <ul>
            <li><a href="dashboard.php">Account <i class="fa-solid fa-user"></i></a></li>
            <li><a href="analytics.php">Sales Analytics <i class="fa-solid fa-chart-pie"></i></a></li>
            <li><a href="inbox.php">Inbox <i class="fa-solid fa-envelope"></i></a></li>
            <li><a href="edit.php">Edit Info <i class="fa-solid fa-edit"></i></a></li>
            <li><a href="logout.php">Logout <i class="fa-solid fa-person-through-window"></i></a></li>
        </ul>
        </nav>
    </div>

    <div class="dashboard-content">
        <div class="chart-container">
        <canvas id="myChart"></canvas>

        <div class="detailed-analytics">
            <h2>Here are the detailed analytics regarding your sales(6 Months)</h2>
            <div class="business-stats">
                <div>
                    <h4 id="best-month">Best Month: April</h4>
                    <h4 id="worst-month">Worst Month: July</h4>
                </div>
                <div>
                    <h4 id="highest-sale">Most Sales: 81</h4>
                    <h4 id="lowest-sales">Lowest Sales: 40</h4>
                </div>

                <div>
                    <h5>Average Sales for the past 6 months</h5>
                    <h4 id="average">Average: 66</h4>
                </div>

                <div>
                    <h5>Total Sales</h5>
                    <h4 id="total-sales"></h4>
                </div>

                <div>
                    <h5>Total Revenue</h5>
                    <h4 id="total-revenue"></h4>
                    <h4 id="main-revenue-source"></h4>
                </div>

                <div>
                    <h5>Profit/Loss</h5>
                    <h4 id="cost-of-goods"></h4>
                    <h4 id="profit-loss"></h4>
                </div>
            </div>
        </div>

        <h2>Product Sales Data</h2>

        <canvas id="products"></canvas>

        <div class="business-stats">
            <div>
                <h5>Most Bought Product</h5>
                <h4 id="most-bought"></h4>
                <h4 id="least-bought"></h4>
            </div>
            <div>
                <h5>Product Purchase Power</h5>
                <h4 id="max-purchase"></h4>
                <h4 id="min-purchase"></h4>
            </div>
        </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="main.js"></script>
    
    <script>

const bestMonthEl = document.getElementById("best-month")
const highestSaleEl = document.getElementById("highest-sale")
const worstMonthEl = document.getElementById("worst-month")
const lowestSalesEl = document.getElementById("lowest-sales")
const averageEl = document.getElementById("average")
const totalSalesEl = document.getElementById("total-sales")
const totalRevenueEl = document.getElementById("total-revenue")
const costOfGoodsEl = document.getElementById("cost-of-goods")
const profitOrLossEl = document.getElementById("profit-loss")
const mostBought = document.getElementById("most-bought")
const leastBought = document.getElementById("least-bought")
const maxPurchaseEl = document.getElementById("max-purchase")
const minPurchaseEl = document.getElementById("min-purchase")
const mainRevenueSourceEl = document.getElementById("main-revenue-source")

let ctx = document.getElementById('myChart').getContext('2d');
let productTrendCtx = document.getElementById("products").getContext("2d")

// Defining data
let data = {
  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [{
    label: 'Sales Data',
    data: [65, 59, 80, 81, 56, 55, 40],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
};

let productData = {
    labels: ["CPUs", "Laptops", "Phones", "Refridgerators", "Microwaves", "Monitors", "Television", "DVDs", "Headphones"],
    datasets: [{
        label: "Product Sales Data",
        data: [10, 15, 43, 6, 9, 12, 22, 4, 27],
        fill: false,
        borderColor: "white",
        tension: 0.1,
        backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',  // CPUs
                    'rgba(54, 162, 235, 0.6)',  // Laptops
                    'rgba(255, 206, 86, 0.6)',  // Phones
                    'rgba(75, 192, 192, 0.6)',  // Refrigerators
                    'rgba(153, 102, 255, 0.6)', // Microwaves
                    'rgba(255, 159, 64, 0.6)',  // Monitors
                    'rgba(255, 99, 255, 0.6)',  // Television
                    'rgba(201, 203, 207, 0.6)', // DVDs
                    'rgba(100, 181, 246, 0.6)'  // Others
                ],

    }]
}

let productOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        y:{
            beginAtZero: true
        }
    },
  plugins: {
    legend: {
        display: true,
        labels: {
            color: 'rgba(75, 192, 192, 1)',
            font: {
                size:14
            }
        }
    }
  }
}
// Configuring options for the chart
let options = {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    y: {
      beginAtZero: true
    }
  }
};

// Create the chart
let myChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: productOptions
});

let productDataChart = new Chart(productTrendCtx, {
    type: "bar",
    data: productData,
    options:options
})


//DATA FOR THE FIRST CHART, SALES
let salesData = data.datasets[0].data
let months = data.labels
let maxSales = Math.max(...data.datasets[0].data)
let minSales = Math.min(...data.datasets[0].data)
let maxMonth = months[salesData.indexOf(maxSales)]
let minMonth = months[salesData.indexOf(minSales)]
let total = salesData.reduce((accumulator, currentValue)=> accumulator + currentValue, 0)
let averageSales = salesData.reduce((accumulator, currentValue)=> accumulator + currentValue, 0) / salesData.length
let totalRev = total * 250
let formattedRev = totalRev.toLocaleString("en-US")

///DATA FOR THE SECOND CHART, PRODUCT DATA
let prods = productData.labels
let purchaseData =  productData.datasets[0].data

let mainRevenueSourceValue = Math.max(...productData.datasets[0].data) * 400
let mainRevenueSourceProd = prods[purchaseData.indexOf(Math.max(...purchaseData))]

let costOfGoods = 65000

let profitOrLoss = totalRev - costOfGoods


bestMonthEl.textContent = "Best Performing Month: " + maxMonth
highestSaleEl.textContent = "Highest Sales: " + maxSales + " " + "sales in, " + maxMonth


worstMonthEl.textContent = "Worst Performing Month: " + minMonth
lowestSalesEl.textContent = "Lowest Sales: " + minSales + " " + "sales in, " + minMonth

averageEl.textContent = "Sales Average: " + Math.round(averageSales) + " " + "in six months."

totalSalesEl.textContent = "Total Sales: " + total + " " + "in the six month period"

totalRevenueEl.textContent = "Total Revenue: $" +formattedRev

mainRevenueSourceEl.textContent = "Main Revenue Source: " + mainRevenueSourceProd + " " + "(Revenue from the product: $" + mainRevenueSourceValue.toLocaleString("en-US") + ")"

costOfGoodsEl.textContent = "Initial Cost of Goods: " + costOfGoods.toLocaleString("en-US")

profitOrLossEl.textContent = "Profit/Loss: $" + profitOrLoss.toLocaleString("en-US")

// console.log(maxMonth, "Whixh had ", maxSales)
// console.log(minMonth, "Which had ", minSales)
// console.log(Math.round(averageSales))

console.log(productData.datasets[0].data)

///DATA FOR THE SECOND CHART, PRODUCTDATA

let maximumPurchase = Math.max(...purchaseData)
let minPurchase = Math.min(...purchaseData)
let mostBoughtProduct =  prods[purchaseData.indexOf(maximumPurchase)]
let leastBoughtProduct = prods[purchaseData.indexOf(minPurchase)]


mostBought.textContent = "Most Bought Product: " + mostBoughtProduct
leastBought.textContent = "Least Bought Product: " + leastBoughtProduct
maxPurchaseEl.textContent = "Number of purchases for the most bought Product: " + maximumPurchase
minPurchaseEl.textContent = "Number of purchases for the least bought Product: " + minPurchase

    </script>
    
</body>
</html>
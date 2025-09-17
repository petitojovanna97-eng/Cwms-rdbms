<?php
include '../views/nav/topnav.php';
include '../views/nav/server_sidebar.php';
include '../page/admin_dashboard.php';
?>
<div class="container-fluid">
    <div class="row" id="dashboard-cards">
        <!-- AJAX will inject cards here -->
    </div>

    <!-- Chart area -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <canvas id="myAreaChart"></canvas>
        </div>
        <div class="col-xl-4 col-lg-5">
            <canvas id="myPieChart"></canvas>
        </div>
    </div>
</div>

<?php include '../views/nav/server_footer.php'; ?>

<!-- jQuery + AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $.ajax({
        url: "api/dashboard.php",
        method: "GET",
        dataType: "json",
        success: function(data){
            let cards = `
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$${data.monthly}</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$${data.annual}</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>`;
            
            data.tasks.forEach(task => {
                cards += `
                <div class="mb-2">
                    <span>${task.name} - ${task.progress}%</span>
                    <div class="progress">
                        <div class="progress-bar bg-info" style="width:${task.progress}%"></div>
                    </div>
                </div>`;
            });

            cards += `
                </div>
            </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${data.pending}</div>
                    </div>
                </div>
            </div>`;

            $("#dashboard-cards").html(cards);
        }
    });
});
</script>
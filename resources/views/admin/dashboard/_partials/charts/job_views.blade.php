<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right ui-sortable-handle">
        <li class="pull-left header">Job views for last 30 days</li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active">
            <div class="chart">
                <canvas id="viewsChartDashboard" height="300"></canvas>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 col-xs-6">
                    <div class="description-block border-right">
                        <h5 class="description-header">{{ $stats['jobs']['opened']['total'] }}</h5>
                        <span class="description-text">TOTAL VIEWS</span>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <div class="description-block border-right">
                        <h5 class="description-header">{{ $stats['jobs']['opened']['today'] }}</h5>
                        <span class="description-text">VIEWS TODAY</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
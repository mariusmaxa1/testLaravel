<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-check"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Active jobs</span>
                <span class="info-box-number">{{ $stats['jobs']['active'] }} of {{ $stats['jobs']['total'] }}</span>
                <div class="progress">
                    <div class="progress-bar" style="width: {{ round($stats['jobs']['total'] <= 0 ? 0 : ($stats['jobs']['active'] * 100 / $stats['jobs']['total'])) }}%"></div>
                </div>
                  <span class="progress-description">
                    Currently active jobs
                  </span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-asterisk"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">New jobs</span>
                <span class="info-box-number">{{ $stats['jobs']['new'] }} of {{ $stats['jobs']['total'] }}</span>
                <div class="progress">
                    <div class="progress-bar" style="width: {{ round($stats['jobs']['total'] <= 0 ? 0 : ($stats['jobs']['new'] * 100 / $stats['jobs']['total'])) }}%"></div>
                </div>
                  <span class="progress-description">
                    Currently new jobs
                  </span>
            </div>
        </div>
    </div>

    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-laptop"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total jobs</span>
                <span class="info-box-number">{{ $stats['jobs']['total'] }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total users</span>
                <span class="info-box-number">{{ $stats['users']['total'] }}</span>
            </div>
        </div>
    </div>
</div>
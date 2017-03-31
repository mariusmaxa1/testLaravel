<div class="box">
    <div class="box-header">
        <h3 class="box-title">Recent jobs</h3>
    </div>
    @if(count($latest['jobs']) > 0)
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>User</th>
                    <th>Company</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Active to</th>
                    <th>&nbsp;</th>
                </tr>
                @foreach($latest['jobs'] as $job)
                    <tr>
                        <td>{{ $job->id }}</td>
                        <td><a href="{{ route('admin.jobs.show', $job->id) }}">{{ $job->title }}</a></td>
                        <td>{{ $job->type->title }}</td>
                        <td>
                            @if($job->remote)
                                Remote
                            @else
                                {{ $job->country }}, {{ $job->city }}
                            @endif
                        </td>
                        <td><a href="{{ route('admin.users.show', $job->user->id) }}">{{ $job->user->name }}</a></td>
                        <td>
                            @if($job->company)
                                <a href="{{ route('admin.companies.show', $job->company->id) }}">{{ $job->company->name }}</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ (int) app('counter')->get('model.job.'.$job->id.'.opened.total')->getValue() }}</td>
                        <td>
                            @if($job->active)
                                <span class="label label-success">active</span>
                            @else
                                <span class="label label-default">inactive</span>
                            @endif
                            @if($job->featured)
                                <span class="label label-info">featured</span>
                            @endif
                            @if($job->new)
                                <span class="label label-warning">new</span>
                            @endif
                            @if($job->filled)
                                <span class="label label-danger">filled</span>
                            @endif
                        </td>
                        <td>
                            @if($job->active)
                                {{ $job->active_to }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-right">
                            @if($job->active)
                                <a href="{{ route('admin.jobs.deactivate', $job->id) }}" class="btn btn-info btn-xs confirm-action">Deactivate</a>
                            @else
                                <a href="{{ route('admin.jobs.activate', $job->id) }}" class="btn btn-success btn-xs confirm-action">Activate</a>
                            @endif
                            @if(!$job->filled)
                                <a href="{{ route('admin.jobs.fill', $job->id) }}" class="btn btn-danger btn-xs confirm-action">fill</a>
                            @else
                                <a href="{{ route('admin.jobs.unfill', $job->id) }}" class="btn btn-danger btn-xs confirm-action">un-fill</a>
                            @endif
                            <a href="{{ route('admin.jobs.show', $job->id) }}" class="btn btn-success btn-xs">view</a>
                            <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-warning btn-xs">edit</a>
                            <a href="{{ route('admin.jobs.delete', $job->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <div class="box-body">
            <div class="alert alert-info">Jobs list is empty.</div>
        </div>
    @endif
</div>
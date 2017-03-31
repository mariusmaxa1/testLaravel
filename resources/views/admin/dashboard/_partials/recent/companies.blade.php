<div class="box">
    <div class="box-header">
        <h3 class="box-title">Recent companies</h3>
    </div>
    @if(count($latest['companies']) > 0)
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>&nbsp;</th>
                </tr>
                @foreach($latest['companies'] as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td><a href="{{ route('admin.companies.show', $company->id) }}">{{ $company->name }}</a></td>
                        <td class="text-right">
                            <a href="{{ route('admin.companies.show', $company->id) }}" class="btn btn-success btn-xs">view</a>
                            <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-warning btn-xs">edit</a>
                            <a href="{{ route('admin.companies.delete', $company->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <div class="box-body">
            <div class="alert alert-info">Users list is empty.</div>
        </div>
    @endif
</div>
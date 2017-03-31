<div class="box">
    <div class="box-header">
        <h3 class="box-title">Recent users</h3>
    </div>
    @if(count($latest['users']) > 0)
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                </tr>
                @foreach($latest['users'] as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td class="text-right">
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-success btn-xs">view</a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-xs">edit</a>
                            <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
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
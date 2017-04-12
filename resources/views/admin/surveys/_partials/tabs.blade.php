<ul class="nav nav-tabs box-tools">
    <li @if(isset($_active_tab) && $_active_tab == 'overview') class="active" @endif ><a href="{{ route('admin.surveys.show', $survey->id) }}">Overview</a></li>
    <li @if(isset($_active_tab) && $_active_tab == 'edit') class="active" @endif ><a href="{{ route('admin.surveys.edit', $survey->id) }}">Edit</a></li>
    <li @if(isset($_active_tab) && $_active_tab == 'edit') class="active" @endif ><a href="{{ route('admin.surveys.sections.index', $survey->id) }}">Sectiuni</a></li>
    <li @if(isset($_active_tab) && $_active_tab == 'edit') class="active" @endif ><a href="{{ route('admin.surveys.questions.index', $survey->id) }}">Intrebari</a></li>

    <li class="pull-right"><a href="{{ route('admin.surveys.index') }}" class="btn btn-box-tool" data-toggle="tooltip" title="Back to list" data-widget="chat-pane-toggle" data-original-title="Back to list"><i class="fa fa-arrow-left"></i> Back to list</a></li>
    <li class="pull-right"><a href="{{ route('admin.surveys.destroy', $survey->id) }}" class="btn btn-box-tool confirm-action" data-toggle="tooltip" title="Delete" data-widget="chat-pane-toggle" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a></li>
</ul>
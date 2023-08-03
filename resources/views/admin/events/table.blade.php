<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="events-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Content</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->slug }}</td>
                    <td>{{ $event->content }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.events.destroy', $event->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.events.show', [$event->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.events.edit', [$event->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $events])
        </div>
    </div>
</div>

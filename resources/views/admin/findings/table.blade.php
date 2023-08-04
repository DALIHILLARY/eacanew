<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="findings-table">
            <thead>
            <tr>
                <th>Title</th>
                {{-- <th>Content</th> --}}
                <th>Contributor</th>
                <th>Date</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($findings as $finding)
                <tr>
                    <td>{{ $finding->title }}</td>
                    {{-- <td>{{ $finding->content }}</td> --}}
                    <td>{{ $finding->user->name }}</td>
                    <td>{{ $finding->updated_at->format('d/m/Y H:m:i') }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.findings.destroy', $finding->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.findings.show', [$finding->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.findings.edit', [$finding->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $findings])
        </div>
    </div>
</div>

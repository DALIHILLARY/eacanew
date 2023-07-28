<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="organisations-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Physical Address</th>
                <th>Country</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($organisations as $organisation)
                <tr>
                    <td>{{ $organisation->name }}</td>
                    <td>{{ $organisation->email }}</td>
                    <td>{{ $organisation->phone }}</td>
                    <td>{{ $organisation->website }}</td>
                    <td>{{ $organisation->physical_address }}</td>
                    <td>{{ $organisation->country->name }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.organisations.destroy', $organisation->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.organisations.show', [$organisation->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.organisations.edit', [$organisation->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $organisations])
        </div>
    </div>
</div>

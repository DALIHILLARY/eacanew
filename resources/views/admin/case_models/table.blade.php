<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="case-models-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Category(s)</th>
                <th>Member State(s)</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($caseModels as $caseModel)
                <tr>
                    <td>{{ $caseModel->title }}</td>
                    <td>
                        @foreach($caseModel->categories as $category)
                            <span class="badge badge-info">{{ $category->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach($caseModel->countries as $country)
                            <span class="badge badge-info">{{ $country->name }}</span>
                        @endforeach
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.caseModels.destroy', $caseModel->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.caseModels.show', [$caseModel->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.caseModels.edit', [$caseModel->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $caseModels])
        </div>
    </div>
</div>

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="forum-categories-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($forumCategories as $forumCategory)
                <tr>
                    <td>{{ $forumCategory->name }}</td>
                    <td>{{ Str::limit($forumCategory->description,50,'...') }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.forumCategories.destroy', $forumCategory->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.forumCategories.show', [$forumCategory->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.forumCategories.edit', [$forumCategory->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $forumCategories])
        </div>
    </div>
</div>

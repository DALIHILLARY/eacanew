<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="blog-posts-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Content</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogPosts as $blogPost)
                <tr>
                    <td>{{ $blogPost->title }}</td>
                    <td>{{ $blogPost->slug }}</td>
                    <td>{{ $blogPost->content }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.blogPosts.destroy', $blogPost->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.blogPosts.show', [$blogPost->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.blogPosts.edit', [$blogPost->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $blogPosts])
        </div>
    </div>
</div>

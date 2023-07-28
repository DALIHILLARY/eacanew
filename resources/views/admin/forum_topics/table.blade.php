<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="forum-topics-table">
            <thead>
            <tr>
                <th>{!!__('models/forum_topics.fields.forum_category_id') !!}</th>
                <th>{!!  __('models/forum_topics.fields.user_id') !!}</th>
                <th>{!! __('models/forum_topics.fields.name') !!}</th>
                <th>{!! __('models/forum_topics.fields.description') !!}</th>
                <th colspan="3">{!! __('models/forum_topics.action') !!}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($forumTopics as $forumTopic)
                <tr>
                    <td>{{ $forumTopic->forumCategory->name }}</td>
                    <td>{{ $forumTopic->author->name }}</td>
                    <td>{{ $forumTopic->name }}</td>
                    <td>{{ Str::limit($forumTopic->description,30,'...') }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.forumTopics.destroy', $forumTopic->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.forumTopics.show', [$forumTopic->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.forumTopics.edit', [$forumTopic->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $forumTopics])
        </div>
    </div>
</div>

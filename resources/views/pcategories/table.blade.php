<div class="table-responsive">
    <table class="table" id="pcategories-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pcategories as $pcategories)
            <tr>
                <td>{{ $pcategories->name }}</td>
                <td>
                    {!! Form::open(['route' => ['pcategories.destroy', $pcategories->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pcategories.show', [$pcategories->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('pcategories.edit', [$pcategories->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

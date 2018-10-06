@extends('oxygen::layouts.master-dashboard')

@section('pageMainActions')
    @include('oxygen::dashboard.partials.searchField')

    <a href="{{ route('manage.settings.create') }}" class="btn btn-success"><em class="fa fa-plus-circle"></em> Add New Setting</a>
@stop

@section('content')
    @include('oxygen::dashboard.partials.table-allItems', [
        'tableHeader' => [
            'Key', 'Value', 'Data Type', 'Description', 'Actions'
        ]
    ])

    @foreach ($allItems as $item)
        <tr>
            <td>
                <a href="{{ route('manage.settings.edit', ['id' => $item->id]) }}">{{ $item->setting_key }}</a>
            </td>
            <td>{{ $item->setting_value }}</td>
            <td>{{ $item->setting_data_type }}</td>
            <td>{{ $item->description }}</td>
            <td>
                <a href="{{ route('manage.settings.edit', ['id' => $item->id]) }}" class="btn btn-success"><em class="fa fa-edit"></em> Edit</a>
                <form action="{{ route('manage.settings.destroy', ['id' => $item->id]) }}" method="POST" class="form form-inline">
                	{{ method_field('delete') }}
                	{{ csrf_field() }}
                	<button class="btn btn-danger js-confirm"><em class="fa fa-times"></em> Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
@stop
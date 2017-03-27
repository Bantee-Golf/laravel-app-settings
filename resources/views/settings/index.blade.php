@extends('oxygen::layouts.master-dashboard')

@section('pageMainActions')
    @include('oxygen::partials.searchField-section')

    <a href="/settings/new" class="btn btn-success"><em class="fa fa-plus-circle"></em> Add New Setting</a>

    {{ Settings::get('34563') }}
@stop

@section('content')
    @include('oxygen::partials.table-allItems', [
        'tableHeader' => [
            'Key', 'Value', 'Data Type', 'Description', 'Actions'
        ]
    ])

    @foreach ($allItems as $item)
        <tr>
            <td>
                <a href="{{ route('settings.edit', ['id' => $item->id]) }}">{{ $item->setting_key }}</a>
            </td>
            <td>{{ $item->setting_value }}</td>
            <td>{{ $item->setting_data_type }}</td>
            <td>{{ $item->description }}</td>
            <td>
                <a href="{{ route('settings.edit', ['id' => $item->id]) }}" class="btn btn-success">Edit</a>
                <form action="{{ route('settings.entity', ['id' => $item->id]) }}" method="POST" class="form form-inline">
                	{{ method_field('delete') }}
                	{{ csrf_field() }}
                	<button class="btn btn-danger js-confirm"><em class="fa fa-trash"></em></button>
                </form>
            </td>
        </tr>
    @endforeach
@stop
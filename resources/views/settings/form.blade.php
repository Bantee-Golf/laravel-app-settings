@extends('oxygen::layouts.master-dashboard')

@section('content')
    <div class="all-items">
        <div class="title-container">
            <h1 class="page-title">{{ $pageTitle }}</h1>
        </div>
    </div>

    <div id="main">

        <div class="container form-elegant-container">
            @if ($entity->id)
                @if (!$entity->is_key_editable)
                    <div class="alert alert-warning">
                        <strong>NOTE</strong>
                        <div>This key is locked. Any changes to the key will be ignored.</div>
                    </div>
                @endif
                <form action="{{ route('manage.settings.update', ['id' => $entity->id]) }}" method="post" class="form-horizontal">
                    @else
                        <form action="{{ route('manage.settings.store') }}" method="post" class="form-horizontal">
                            @endif

                            @if ($entity->id)
                                {{ method_field('put') }}
                            @endif

                            {{ csrf_field() }}

                            @if ($entity->is_key_editable)
                                {{ $form->render('setting_key') }}
                            @else
                                {{ $form->render('setting_key', null, ['attributes' => 'readonly']) }}
                            @endif

                            @switch ($entity->setting_data_type)
                                @case (\EMedia\AppSettings\Entities\Setting::DATA_TYPE_TEXT)
                                    {{ $form->render('setting_value', null, ['type' => 'textarea']) }}
                                    @break
                                @default
                                    {{ $form->render('setting_value') }}
                            @endswitch

                            {{ $form->render(null, ['setting_key', 'setting_value']) }}

                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    {{--<a href="{{ url()->previous() }}" class="btn btn-default pull-right">Cancel</a>--}}
                                    <button type="submit" class="btn btn-success text-right btn-wide btn-lg">Save</button>
                                </div>
                            </div>
                        </form>
        </div>

    </div>
@endsection

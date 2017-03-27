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
                <form action="{{ route('settings.entity', ['id' => $entity->id]) }}" method="post" class="form-horizontal">
            @else
                <form action="{{ route('settings') }}" method="post" class="form-horizontal">
            @endif

                @if ($entity->id)
                    {{ method_field('put') }}
                @endif

                {{ csrf_field() }}

                {{ $form->render() }}

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <a href="{{ url()->previous() }}" class="btn btn-default pull-right">Cancel</a>
                        <button type="submit" class="btn btn-success text-right">Save</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection




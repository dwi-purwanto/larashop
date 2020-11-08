@extends('admin.layout')
@section('content')
@php $formtitle = !empty($category) ? 'Update' : 'New' @endphp
<div class="row">
    <div class="col-xl-6 col-sm-6">
        <div class="card">
            <div class="card-body">
                @include('admin.partials.flash')
                <h2 class="mb-1">{{$formtitle}} Category</h2>
                @if (!empty($category))
                    {!! Form::model($category, ['url' => ['admin/categories', $category->id], 'method' => 'PUT']) !!}
                    {!! Form::hidden('id') !!}
                @else
                    {!! Form::open(['url' => 'admin/categories']) !!}

                @endif
                     <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category Name']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Parent') !!}
                        {!! General::selectMultiLevel('parent_id', $categories, ['class' => 'form-control', 'selected' => !empty(old('parent_id')) ?  old('parent_id') : !empty($category['parent_id']) ? $category['parent_id'] : '', 'placeholder' => '--Choose Category--' ]) !!}
                    </div>

                <div class="form-footer pt-5 border-top">
                    <a class="btn btn-success" href=" {{ url('admin/categories') }} "> Back </a>
                    <button class="btn btn-primary" type="submit"> Save </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection

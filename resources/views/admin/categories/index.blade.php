@extends('admin.layout')
@section('content')
<!-- Top Statistics -->
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>Categories</h2>
            </div>

            <div class="card-body">
                @include('admin.partials.flash')
                <div class="responsive-data-table">
                    <a href="{{ url('/admin/categories/create')}}" class="mb-1 btn btn-primary">
						<i class=" mdi mdi-plus mr-1"></i>  Add New
                    </a>
                    <table id="responsive-data-table" class="table dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Parent</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $no = 1; @endphp
                            @forelse($categories as $category)
                                <tr>
                                    <td> {{$no++}} </td>
                                    <td> {{$category->name}} </td>
                                    <td> {{$category->slug}} </td>
                                    <td> {{$category->slug}} </td>
                                    <td>
                                        <a href="{{ url('admin/categories/'.$category->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>

                                        {!! Form::open(['url' => 'admin/categories/'.$category->id, 'class' => 'delete', 'style' => 'display:inline']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('remove', ['class'=> 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td> <p class="text-center"> No.records </p></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

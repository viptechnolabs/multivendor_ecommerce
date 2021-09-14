@extends('layouts.app')

@section('content')
    <div class="aiz-main-content">
        <div class="px-15px px-lg-25px">
            <div class="aiz-titlebar text-left mt-2 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="h3">All categories</h1>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{ route('add_category') }}" class="btn btn-primary">
                            <span>Add New category</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0 h6">Categories</h5>
                    <form class="" id="sort_categories" action="" method="GET">
                        <div class="box-inline pad-rgt pull-left">
                            <div class="" style="min-width: 200px;">
                                <input type="text" class="form-control" id="search" name="search"
                                       placeholder="Type name & Enter">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                        <tr>
                            <th data-breakpoints="lg">#</th>
                            <th>Name</th>
                            <th data-breakpoints="lg">Parent Category</th>
                            <th data-breakpoints="lg">Order Level</th>
                            <th data-breakpoints="lg">Level</th>
                            <th data-breakpoints="lg">Banner</th>
                            <th data-breakpoints="lg">Icon</th>
                            <th data-breakpoints="lg">Featured</th>
                            <th data-breakpoints="lg">Commission</th>
                            <th width="10%" class="text-right">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @php
                                        $parent = \App\Models\Category::where('id', $category->parent_id)->first();
                                    @endphp
                                    @if ($parent != null)
                                        {{ $parent->name }}
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>{{ $category->order_level }}</td>
                                <td>{{ $category->level }}</td>
                                <td>
                                    @if($category->banner != null)
                                        <img src="" alt="Banner" class="h-50px">
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>
                                    @if($category->icon != null)
                                        <span class="avatar avatar-square avatar-xs">
                                    <img src="" alt="icon">
                                </span>
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input type="checkbox" onchange="update_featured(this)"
                                               value="{{ $category->id }}" <?php if ($category->featured == 1) echo "checked";?>>
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{ $category->commision_rate }} %</td>
                                <td class="text-right">
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('category_edit', $category->id)}}" title="Edit">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                       data-href="{{route('category_destroy', $category->id)}}" title="Delete">
                                        <i class="las la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="aiz-pagination">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
        <script type="text/javascript">
            function update_featured(el){
                if(el.checked){
                    var status = 1;
                }
                else{
                    var status = 0;
                }
                $.post('{{ route('category_featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                    if(data == 1){
                        AIZ.plugins.notify('success', 'Featured categories updated successfully');
                    }
                    else{
                        AIZ.plugins.notify('danger', 'Something went wrong');
                    }
                });
            }
            @if (session()->has('message'))
            AIZ.plugins.notify('danger', '{{ Session::get('message') }}');
            @endif
        </script>
@endsection

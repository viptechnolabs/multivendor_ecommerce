@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Update Category</h5>
            </div>
            <div class="card-body p-0">
                <form class="p-4" action="{{ route('update_category', $category->id) }}" method="POST" enctype="multipart/form-data">
{{--                    <input name="_method" type="hidden" value="PATCH">--}}
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Name <i class="las la-language text-danger" title="Translatable"></i></label>
                        <div class="col-md-9">
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Parent Category</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="parent_id" data-toggle="select2" data-placeholder="Choose ..."data-live-search="true" data-selected="{{ $category->parent_id }}">
                                @foreach($categories as $key => $category1)
                                    <option value="{{ $category1->id }}">{{ $category1->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Ordering Number
                        </label>
                        <div class="col-md-9">
                            <input type="number" name="order_level" value="{{ $category->order_level }}" class="form-control" id="order_level" placeholder="Order Level">
                            <small>Higher number has high priority</small>
                        </div>
                    </div>
    	              <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">Banner <small>(200x200)</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="banner" class="selected-files" value="{{ $category->banner }}">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">Icon <small>(32x32)</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="icon" class="selected-files" value="{{ $category->icon }}">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Meta Title</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="meta_title" value="{{ $category->meta_title }}" placeholder="Meta Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Meta Description</label>
                        <div class="col-md-9">
                            <textarea name="meta_description" rows="5" class="form-control">{{ $category->meta_description }}</textarea>
                        </div>
                    </div>
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-md-3 col-form-label">Slug</label>--}}
{{--                        <div class="col-md-9">--}}
{{--                            <input type="text" placeholder="Slug" id="slug" name="slug" value="{{ $category->slug }}" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @if (get_setting('category_wise_commission') == 1)--}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Commission Rate</label>
                            <div class="col-md-9 input-group">
                                <input type="number" lang="en" min="0" step="0.01" id="commision_rate" name="commision_rate" value="{{ $category->commision_rate }}" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
{{--                    @endif--}}
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

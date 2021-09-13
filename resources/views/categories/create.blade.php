@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Category Information</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Parent Category</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="parent_id" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                <option value="0">No Parent</option>
                                @foreach(App\Models\Category::CATEGORY as $key => $value )
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Ordering Number
                        </label>
                        <div class="col-md-9">
                            <input type="number" name="order_level" class="form-control" id="order_level" placeholder="Order Level">
                            <small>Higher number has high priority</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">Banner <small>200x200</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="banner" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">Icon <small> 32x32</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="icon" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Meta Title</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="meta_title" placeholder="Meta Title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Meta Description</label>
                        <div class="col-md-9">
                            <textarea name="meta_description" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
{{--                    @if (get_setting('category_wise_commission') == 1)--}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Commission Rate</label>
                            <div class="col-md-9 input-group">
                                <input type="number" lang="en" min="0" step="0.01" placeholder="Commission Rate" id="commision_rate" name="commision_rate" class="form-control">
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
<div class="modal fade" id="aizUploaderModal" data-backdrop="static" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-adaptive" role="document">
        <div class="modal-content h-100">
            <div class="modal-header pb-0 bg-light">
                <div class="uppy-modal-nav">
                    <ul class="nav nav-tabs border-0">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-medium text-dark" data-toggle="tab" href="#aiz-select-file">Select File</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium text-dark" data-toggle="tab" href="#aiz-upload-new">Upload New</a>
                        </li>
                    </ul>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content h-100">
                    <div class="tab-pane active h-100" id="aiz-select-file">
                        <div class="aiz-uploader-filter pt-1 pb-3 border-bottom mb-4">
                            <div class="row align-items-center gutters-5 gutters-md-10 position-relative">
                                <div class="col-xl-2 col-md-3 col-5">
                                    <div class="">
                                        <!-- Input -->
                                        <select class="form-control form-control-xs aiz-selectpicker" name="aiz-uploader-sort">
                                            <option value="newest" selected>Sort by newest</option>
                                            <option value="oldest">Sort by oldest</option>
                                            <option value="smallest">Sort by smallest</option>
                                            <option value="largest">Sort by largest</option>
                                        </select>
                                        <!-- End Input -->
                                    </div>
                                </div>
                                <div class="col-md-3 col-5">
                                    <div class="custom-control custom-radio">
                                        <input type="checkbox" class="custom-control-input" name="aiz-show-selected" id="aiz-show-selected" name="stylishRadio">
                                        <label class="custom-control-label" for="aiz-show-selected">
                                            Selected Only
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-3 ml-auto mr-0 col-2 position-static">
                                    <div class="aiz-uploader-search text-right">
                                        <input type="text" class="form-control form-control-xs" name="aiz-uploader-search" placeholder="Search your files">
                                        <i class="search-icon d-md-none"><span></span></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="aiz-uploader-all clearfix c-scrollbar-light">
                            <div class="align-items-center d-flex h-100 justify-content-center w-100">
                                <div class="text-center">
                                    <h3>No files found</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane h-100" id="aiz-upload-new">
                        <div id="aiz-upload-files" class="h-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between bg-light">
                <div class="flex-grow-1 overflow-hidden d-flex">
                    <div class="">
                        <div class="aiz-uploader-selected">0 File selected</div>
                        <button type="button" class="btn-link btn btn-sm p-0 aiz-uploader-selected-clear">Clear</button>
                    </div>
                    <div class="mb-0 ml-3">
                        <button type="button" class="btn btn-sm btn-primary" id="uploader_prev_btn">Prev</button>
                        <button type="button" class="btn btn-sm btn-primary" id="uploader_next_btn">Next</button>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="aizUploaderAddSelected">Add Files</button>
            </div>
        </div>
    </div>
</div>

@endsection

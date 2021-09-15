@php
    $type = Session::get('userType');
    $active = Auth::user()->status;
@endphp
    <!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="trmS34TGQEdD5xgq7MGAlXlxTRTtZ5nH3XGRPMxE">
    <meta name="app-url" content="{{ env('APP_URL') }}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="">
    <title> | </title>

    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!-- aiz core css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aiz-core.css') }}">
    {{--  Toast  --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @yield('style')
    <style>
        body {
            font-size: 12px;
        }
    </style>
    <script>
        var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: 'Nothing selected',
            nothing_found: 'Nothing found',
            choose_file: 'Choose file',
            file_selected: 'File selected',
            files_selected: 'Files selected',
            add_more_files: 'Add more files',
            adding_more_files: 'Adding more files',
            drop_files_here_paste_or: 'Drop files here, paste or',
            browse: 'Browse',
            upload_complete: 'Upload complete',
            upload_paused: 'Upload paused',
            resume_upload: 'Resume upload',
            pause_upload: 'Pause upload',
            retry_upload: 'Retry upload',
            cancel_upload: 'Cancel upload',
            uploading: 'Uploading',
            processing: 'Processing',
            complete: 'Complete',
            file: 'File',
            files: 'Files',
        }
    </script>

    <style type="text/css">/* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor, .chartjs-size-monitor-expand, .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand > div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink > div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }</style>
</head>
<body class="">

<div class="aiz-main-wrapper">
    <div class="aiz-sidebar-wrap">
        <div class="aiz-sidebar left c-scrollbar">
            <div class="aiz-side-nav-logo-wrap">
                <a href="#" class="d-block text-left">
                    <img class="mw-100" src="{{ asset('assets/img/logo.png') }}" alt="">
                </a>
            </div>
            <div class="aiz-side-nav-wrap">
                <div class="px-20px mb-3">
                    <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text"
                           name="" placeholder="Search in menu" id="menu-search" onkeyup="menuSearch()">
                </div>
                <ul class="aiz-side-nav-list" id="search-menu">

                </ul>
                @if(Auth::user()->user_type === 'admin')
                    <ul class="aiz-side-nav-list metismenu" id="main-menu" data-toggle="aiz-side-menu">

                        <li class="aiz-side-nav-item mm-active">
                            <a href="#" class="aiz-side-nav-link active" aria-expanded="true">
                                <i class="las la-home aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Dashboard</span>
                            </a>
                        </li>

                        <!-- POS Addon-->

                        <!-- Category -->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Category</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <!--Submenu-->
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('add_category') }}" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Add Category</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('category') }}" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Product -->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Products</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <!--Submenu-->
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a class="aiz-side-nav-link" href="3">
                                        <span class="aiz-side-nav-text">Add New product</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/products/all" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">All Products</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/products/admin"
                                       class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">In House Products</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/products/seller"
                                       class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Seller Products</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/digitalproducts" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Digital Products</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/product-bulk-upload/index"
                                       class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Bulk Import</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/product-bulk-export" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Bulk Export</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/brands" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Brand</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/attributes" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Attribute</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/reviews" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Product Reviews</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Sale -->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-money-bill aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Sales</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <!--Submenu-->
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/all_orders" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All Orders</span>
                                    </a>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/inhouse-orders"
                                       class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Inhouse orders</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/seller_orders" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Seller Orders</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/orders_by_pickup_point"
                                       class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Pick-up Point Order</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Deliver Boy Addon-->

                        <!-- Refund addon -->


                        <!-- Customers -->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-user-friends aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Customers</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/customers" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Customer list</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Sellers -->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-user aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Sellers</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('seller') }}" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All Seller</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('seller_request') }}" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Seller Request</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/seller/payments"
                                       class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Payouts</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/withdraw_requests_all"
                                       class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Payout Requests</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/vendor_commission"
                                       class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Seller Commission</span>
                                    </a>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/verification/form"
                                       class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Seller Verification Form</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="http://127.0.0.1/ecommerce/admin/uploaded-files" class="aiz-side-nav-link ">
                                <i class="las la-folder-open aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Uploaded Files</span>
                            </a>
                        </li>

                        <!-- Reports -->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-file-alt aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Reports</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/in_house_sale_report"
                                       class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">In House Product Sale</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/seller_sale_report"
                                       class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Seller Products Sale</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/stock_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Products Stock</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/wish_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Products wishlist</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/user_search_report"
                                       class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">User Searches</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/commission-log" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Commission History</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/wallet-history" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Wallet Recharge History</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!--Blog System-->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-bullhorn aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Blog System</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/blog" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All Posts</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/blog-category" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Categories</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- marketing -->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-bullhorn aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Marketing</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/flash_deals" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Flash deals</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/newsletter" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Newsletters</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/subscribers" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Subscribers</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/coupon" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Coupon</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Support -->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-link aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Support</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/support_ticket"
                                       class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Ticket</span>
                                    </a>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/conversations" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Product Queries</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Website Setup -->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-desktop aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Website Setup</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/website/header" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Header</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/website/footer" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Footer</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/website/pages" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Pages</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/website/appearance"
                                       class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Appearance</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Setup & Configurations -->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Setup &amp; Configurations</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/general-setting"
                                       class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">General Settings</span>
                                    </a>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/activation" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Features activation</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/languages" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Languages</span>
                                    </a>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/currency" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Currency</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/tax" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Vat &amp; TAX</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/pick_up_points"
                                       class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Pickup point</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/smtp-settings" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">SMTP Settings</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/payment-method" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Payment Methods</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/file_system" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">File System Configuration</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/social-login" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Social media Logins</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/google-analytics"
                                       class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Analytics Tools</span>
                                    </a>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Facebook</span>
                                        <span class="aiz-side-nav-arrow"></span>
                                    </a>
                                    <ul class="aiz-side-nav-list level-3 mm-collapse">
                                        <li class="aiz-side-nav-item">
                                            <a href="http://127.0.0.1/ecommerce/admin/facebook-chat"
                                               class="aiz-side-nav-link">
                                                <span class="aiz-side-nav-text">Facebook Chat</span>
                                            </a>
                                        </li>
                                        <li class="aiz-side-nav-item">
                                            <a href="http://127.0.0.1/ecommerce/admin/facebook-comment"
                                               class="aiz-side-nav-link">
                                                <span class="aiz-side-nav-text">Facebook Comment</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/google-recaptcha"
                                       class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Google reCAPTCHA</span>
                                    </a>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Shipping</span>
                                        <span class="aiz-side-nav-arrow"></span>
                                    </a>
                                    <ul class="aiz-side-nav-list level-3 mm-collapse">
                                        <li class="aiz-side-nav-item">
                                            <a href="http://127.0.0.1/ecommerce/admin/shipping_configuration"
                                               class="aiz-side-nav-link ">
                                                <span class="aiz-side-nav-text">Shipping Configuration</span>
                                            </a>
                                        </li>
                                        <li class="aiz-side-nav-item">
                                            <a href="http://127.0.0.1/ecommerce/admin/countries"
                                               class="aiz-side-nav-link ">
                                                <span class="aiz-side-nav-text">Shipping Countries</span>
                                            </a>
                                        </li>
                                        <li class="aiz-side-nav-item">
                                            <a href="http://127.0.0.1/ecommerce/admin/cities"
                                               class="aiz-side-nav-link ">
                                                <span class="aiz-side-nav-text">Shipping Cities</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </li>


                        <!-- Staffs -->
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-user-tie aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Staffs</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/staffs" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All staffs</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/roles" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Staff permissions</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-user-tie aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">System</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2 mm-collapse">
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/system/update" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Update</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="http://127.0.0.1/ecommerce/admin/system/server-status"
                                       class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Server status</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Addon Manager -->
                        <li class="aiz-side-nav-item">
                            <a href="http://127.0.0.1/ecommerce/admin/addons" class="aiz-side-nav-link ">
                                <i class="las la-wrench aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Addon Manager</span>
                            </a>
                        </li>
                    </ul><!-- .aiz-side-nav -->
                    @endif
                @if(Auth::user()->user_type === 'seller')
                    <ul class="aiz-side-nav-list metismenu" id="main-menu" data-toggle="aiz-side-menu">

                        <li class="aiz-side-nav-item mm-active">
                            <a href="#" class="aiz-side-nav-link active" aria-expanded="true">
                                <i class="las la-home aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Dashboard </span>
                            </a>
                        </li>
                    @php

                    @endphp
                    @if(Auth::user()->status == 1)
                        <!-- Product -->
                            <li class="aiz-side-nav-item">
                                <a href="#" class="aiz-side-nav-link">
                                    <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Products</span>
                                    <span class="aiz-side-nav-arrow"></span>
                                </a>
                                <!--Submenu-->
                                <ul class="aiz-side-nav-list level-2 mm-collapse">
                                    <li class="aiz-side-nav-item">
                                        <a class="aiz-side-nav-link" href="3">
                                            <span class="aiz-side-nav-text">Add New product</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="http://127.0.0.1/ecommerce/admin/products/all"
                                           class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">All Products</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="http://127.0.0.1/ecommerce/product-bulk-upload/index"
                                           class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Bulk Import</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="http://127.0.0.1/ecommerce/reviews" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Product Reviews</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Sale -->
                            <li class="aiz-side-nav-item">
                                <a href="#" class="aiz-side-nav-link">
                                    <i class="las la-money-bill aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Sales</span>
                                    <span class="aiz-side-nav-arrow"></span>
                                </a>
                                <!--Submenu-->
                                <ul class="aiz-side-nav-list level-2 mm-collapse">
                                    <li class="aiz-side-nav-item">
                                        <a href="http://127.0.0.1/ecommerce/admin/all_orders"
                                           class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">All Orders</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Customers -->
                            <li class="aiz-side-nav-item">
                                <a href="#" class="aiz-side-nav-link">
                                    <i class="las la-user-friends aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Customers</span>
                                    <span class="aiz-side-nav-arrow"></span>
                                </a>
                                <ul class="aiz-side-nav-list level-2 mm-collapse">
                                    <li class="aiz-side-nav-item">
                                        <a href="http://127.0.0.1/ecommerce/admin/customers" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Customer list</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Sellers -->

                            <!-- Reports -->
                            <li class="aiz-side-nav-item">
                                <a href="#" class="aiz-side-nav-link">
                                    <i class="las la-file-alt aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Reports</span>
                                    <span class="aiz-side-nav-arrow"></span>
                                </a>
                                <ul class="aiz-side-nav-list level-2 mm-collapse">
                                    <li class="aiz-side-nav-item">
                                        <a href="http://127.0.0.1/ecommerce/admin/stock_report"
                                           class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Products Stock</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- marketing -->
                            <li class="aiz-side-nav-item">
                                <a href="#" class="aiz-side-nav-link">
                                    <i class="las la-bullhorn aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Marketing</span>
                                    <span class="aiz-side-nav-arrow"></span>
                                </a>
                                <ul class="aiz-side-nav-list level-2 mm-collapse">
                                    <li class="aiz-side-nav-item">
                                        <a href="http://127.0.0.1/ecommerce/admin/newsletter" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Prime Product</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="http://127.0.0.1/ecommerce/subscribers" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Subscribers</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="http://127.0.0.1/ecommerce/admin/addons" class="aiz-side-nav-link ">
                                    <i class="las la-history aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Payment history</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="http://127.0.0.1/ecommerce/admin/addons" class="aiz-side-nav-link ">
                                    <i class="las la-money-bill-wave-alt aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Money Withdraw</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                @endif
            </div><!-- .aiz-side-nav-wrap -->
        </div><!-- .aiz-sidebar -->
        <div class="aiz-sidebar-overlay"></div>
    </div><!-- .aiz-sidebar -->
    <div class="aiz-content-wrapper">
        <div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
            <div class="d-xl-none d-flex">
                <div class="aiz-topbar-logo-wrap d-flex align-items-center justify-content-start">
                    <a href="http://127.0.0.1/ecommerce/admin" class="d-block">
                        <img src="{{ asset('assets/img/logo.png') }}" class="brand-icon" alt="">
                    </a>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
                <div class="d-none d-md-flex justify-content-around align-items-center align-items-stretch">

                </div>
                <div class="d-flex justify-content-around align-items-end align-items-stretch">

                    <div class="aiz-topbar-item ml-2">
                        <div class="align-items-stretch d-flex dropdown">
                            <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);"
                               role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon p-1">
                            <span class=" position-relative d-inline-block">
                                <i class="las la-bell la-2x"></i>
                                                            </span>
                        </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg py-0">
                                <div class="p-3 bg-light border-bottom">
                                    <h6 class="mb-0">Notifications</h6>
                                </div>
                                <ul class="list-group c-scrollbar-light overflow-auto" style="max-height:300px;">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="aiz-topbar-item ml-2">
                        <div class="align-items-stretch d-flex dropdown " id="lang-change">
                            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">

                                <li>
                                    <a href="javascript:void(0)" data-flag="en" class="dropdown-item  active ">
                                        <img src="{{ asset('assets/img/flags/en.png') }}" class="mr-2">
                                        <span class="language">English</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-flag="bd" class="dropdown-item ">
                                        <img src="{{ asset('assets/img/flags/bd.png') }}" class="mr-2">
                                        <span class="language">Bangla</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-flag="sa" class="dropdown-item ">
                                        <img src="{{ asset('assets/img/flags/sa.png') }}" class="mr-2">
                                        <span class="language">Arabic</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="aiz-topbar-item ml-2">
                        <div class="align-items-stretch d-flex dropdown">
                            <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown"
                               href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <span class="avatar avatar-sm mr-md-2">
                                <img src="{{ asset('assets/img/avatar-place.png') }}"
                                     onerror="this.onerror=null;this.src='{{ asset('assets/img/avatar-place.png') }}';">
                            </span>
                            <span class="d-none d-md-block">
                                <span class="d-block fw-500">{{auth()->user()->name}}</span>
                                <span class="d-block small opacity-60">{{ auth()->user()->user_type }}</span>
                            </span>
                        </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                                <a href="http://127.0.0.1/ecommerce/admin/profile" class="dropdown-item">
                                    <i class="las la-user-circle"></i>
                                    <span>Profile</span>
                                </a>

                                <a href="{{route('logout')}}" class="dropdown-item">
                                    <i class="las la-sign-out-alt"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    </div><!-- .aiz-topbar-item -->
                </div>
            </div>
        </div><!-- .aiz-topbar -->
        <div class="aiz-main-content">
            @yield('content')
        </div>
    </div><!-- .aiz-content-wrapper -->
</div><!-- .aiz-main-wrapper -->

@yield('modal')

@include('sweet::alert')
<script src="{{ asset('assets/js/vendors.js') }}"></script>
<script src="{{ asset('assets/js/aiz-core.js') }}"></script>
@yield('script')
<script type="text/javascript">
    AIZ.plugins.chart('#pie-1', {
        type: 'doughnut',
        data: {
            labels: [
                'Total published products',
                'Total sellers products',
                'Total admin products'
            ],
            datasets: [
                {
                    data: [
                        0,
                        0,
                        0
                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff",
                        '#fdcb6e',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            legend: {
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });

    AIZ.plugins.chart('#pie-2', {
        type: 'doughnut',
        data: {
            labels: [
                'Total sellers',
                'Total approved sellers',
                'Total pending sellers'
            ],
            datasets: [
                {
                    data: [
                        1,
                        1,
                        0
                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff",
                        '#fdcb6e',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            legend: {
                labels: {
                    fontFamily: 'Montserrat',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });
    var sfs = {
        labels: [
            'Demo category 1',
            'Demo category 2',
            'Demo category 3',
        ],
        datasets: [
            0,
            0,
            0,
        ]
    }
    AIZ.plugins.chart('#graph-1', {
        type: 'bar',
        data: {
            labels: [
                'Demo category 1',
                'Demo category 2',
                'Demo category 3',
            ],
            datasets: [{
                label: 'Number of sale',
                data: [
                    0,
                    0,
                    0,
                ],
                backgroundColor: [
                    'rgba(55, 125, 255, 0.4)',
                    'rgba(55, 125, 255, 0.4)',
                    'rgba(55, 125, 255, 0.4)',
                ],
                borderColor: [
                    'rgba(55, 125, 255, 1)',
                    'rgba(55, 125, 255, 1)',
                    'rgba(55, 125, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines: {
                        color: '#f2f3f8',
                        zeroLineColor: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10
                    }
                }]
            },
            legend: {
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
            }
        }
    });
    AIZ.plugins.chart('#graph-2', {
        type: 'bar',
        data: {
            labels: [
                'Demo category 1',
                'Demo category 2',
                'Demo category 3',
            ],
            datasets: [{
                label: 'Number of Stock',
                data: [
                    0,
                    0,
                    0,
                ],
                backgroundColor: [
                    'rgba(253, 57, 149, 0.4)',
                    'rgba(253, 57, 149, 0.4)',
                    'rgba(253, 57, 149, 0.4)',
                ],
                borderColor: [
                    'rgba(253, 57, 149, 1)',
                    'rgba(253, 57, 149, 1)',
                    'rgba(253, 57, 149, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines: {
                        color: '#f2f3f8',
                        zeroLineColor: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10
                    }
                }]
            },
            legend: {
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
            }
        }
    });
</script>

<script type="text/javascript">

    if ($('#lang-change').length > 0) {
        $('#lang-change .dropdown-menu a').each(function () {
            $(this).on('click', function (e) {
                e.preventDefault();
                var $this = $(this);
                var locale = $this.data('flag');
                $.post('http://127.0.0.1/ecommerce/language', {
                    _token: 'trmS34TGQEdD5xgq7MGAlXlxTRTtZ5nH3XGRPMxE',
                    locale: locale
                }, function (data) {
                    location.reload();
                });

            });
        });
    }

    function menuSearch() {
        var filter, item;
        filter = $("#menu-search").val().toUpperCase();
        items = $("#main-menu").find("a");
        items = items.filter(function (i, item) {
            if ($(item).find(".aiz-side-nav-text")[0].innerText.toUpperCase().indexOf(filter) > -1 && $(item).attr('href') !== '#') {
                return item;
            }
        });

        if (filter !== '') {
            $("#main-menu").addClass('d-none');
            $("#search-menu").html('')
            if (items.length > 0) {
                for (i = 0; i < items.length; i++) {
                    const text = $(items[i]).find(".aiz-side-nav-text")[0].innerText;
                    const link = $(items[i]).attr('href');
                    $("#search-menu").append(`<li class="aiz-side-nav-item"><a href="${link}" class="aiz-side-nav-link"><i class="las la-ellipsis-h aiz-side-nav-icon"></i><span>${text}</span></a></li`);
                }
            } else {
                $("#search-menu").html(`<li class="aiz-side-nav-item"><span	class="text-center text-muted d-block">Nothing found</span></li>`);
            }
        } else {
            $("#main-menu").removeClass('d-none');
            $("#search-menu").html('')
        }
    }
</script>


</body>
</html>

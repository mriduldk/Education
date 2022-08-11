@extends('layouts/fullLayoutMaster')

@section('title', 'School Table')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
{{-- page css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
@endsection



@section('content')
<!-- BEGIN: Header-->
<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">

        <ul class="nav navbar-nav">
            <li class="nav-item"><img src="../../../app-assets/images/logo/btc-logo.svg" alt=""></li>

        </ul>



        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item"><a class="nav-link dropdown-toggle" href="#"> <span class="btn btn-danger"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg> One Click Information (OCI)</span></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                        data-feather="moon"></i></a></li>

        </ul>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand"
                    href="../../../html/ltr/vertical-menu-template/index.html"><span class="brand-logo">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                    y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%"
                                    y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path"
                                            d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                            style="fill:currentColor"></path>
                                        <path id="Path1"
                                            d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                            fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                        </polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                        </polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                            points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                        </polygon>
                                    </g>
                                </g>
                            </g>
                        </svg></span>
                    <h2 class="brand-text">खारिथि</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a class="d-flex align-items-center" href="index.html"><i
                        data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboards">Dashboards</span><span
                        class="badge badge-light-warning rounded-pill ms-auto me-1">2</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="dashboard-analytics.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Analytics">Analytics</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="eCommerce">eCommerce</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="app-email.html"><i
                        data-feather="mail"></i><span class="menu-title text-truncate"
                        data-i18n="Email">Email</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="app-chat.html"><i
                        data-feather="message-square"></i><span class="menu-title text-truncate"
                        data-i18n="Chat">Chat</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="app-todo.html"><i
                        data-feather="check-square"></i><span class="menu-title text-truncate"
                        data-i18n="Todo">Todo</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="app-calendar.html"><i
                        data-feather="calendar"></i><span class="menu-title text-truncate"
                        data-i18n="Calendar">Calendar</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="app-kanban.html"><i
                        data-feather="grid"></i><span class="menu-title text-truncate"
                        data-i18n="Kanban">Kanban</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span
                        class="menu-title text-truncate" data-i18n="Invoice">Invoice</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-invoice-list.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">List</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="app-invoice-preview.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Preview">Preview</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="app-invoice-edit.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Edit">Edit</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="app-invoice-add.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Add">Add</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="app-file-manager.html"><i
                        data-feather="save"></i><span class="menu-title text-truncate" data-i18n="File Manager">File
                        Manager</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="shield"></i><span
                        class="menu-title text-truncate" data-i18n="Roles &amp; Permission">Roles &amp;
                        Permission</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-access-roles.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Roles">Roles</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="app-access-permission.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Permission">Permission</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                        data-feather="shopping-cart"></i><span class="menu-title text-truncate"
                        data-i18n="eCommerce">eCommerce</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-ecommerce-shop.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Shop">Shop</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="app-ecommerce-details.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Details">Details</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="app-ecommerce-wishlist.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Wish List">Wish List</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="app-ecommerce-checkout.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Checkout">Checkout</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span
                        class="menu-title text-truncate" data-i18n="User">User</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-user-list.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">List</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="View">View</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="app-user-view-account.html"><span
                                        class="menu-item text-truncate" data-i18n="Account">Account</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-security.html"><span
                                        class="menu-item text-truncate" data-i18n="Security">Security</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-billing.html"><span
                                        class="menu-item text-truncate" data-i18n="Billing &amp; Plans">Billing
                                        &amp; Plans</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-notifications.html"><span
                                        class="menu-item text-truncate"
                                        data-i18n="Notifications">Notifications</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-connections.html"><span
                                        class="menu-item text-truncate" data-i18n="Connections">Connections</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span
                        class="menu-title text-truncate" data-i18n="Pages">Pages</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Account Settings">Account
                                Settings</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="page-account-settings-account.html"><span
                                        class="menu-item text-truncate" data-i18n="Account">Account</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="page-account-settings-security.html"><span
                                        class="menu-item text-truncate" data-i18n="Security">Security</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="page-account-settings-billing.html"><span
                                        class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Billings
                                        &amp; Plans</span></a>
                            </li>
                            <li><a class="d-flex align-items-center"
                                    href="page-account-settings-notifications.html"><span
                                        class="menu-item text-truncate"
                                        data-i18n="Notifications">Notifications</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="page-account-settings-connections.html"><span
                                        class="menu-item text-truncate" data-i18n="Connections">Connections</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="d-flex align-items-center" href="page-profile.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Profile">Profile</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="page-faq.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="FAQ">FAQ</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="page-knowledge-base.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Knowledge Base">Knowledge Base</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="page-pricing.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Pricing">Pricing</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="page-license.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="License">License</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="page-api-key.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="API Key">API Key</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Blog">Blog</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="page-blog-list.html"><span
                                        class="menu-item text-truncate" data-i18n="List">List</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="page-blog-detail.html"><span
                                        class="menu-item text-truncate" data-i18n="Detail">Detail</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="page-blog-edit.html"><span
                                        class="menu-item text-truncate" data-i18n="Edit">Edit</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Mail Template">Mail Template</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center"
                                    href="https://pixinvent.com/demo/vuexy-mail-template/mail-welcome.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Welcome">Welcome</span></a>
                            </li>
                            <li><a class="d-flex align-items-center"
                                    href="https://pixinvent.com/demo/vuexy-mail-template/mail-reset-password.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Reset Password">Reset Password</span></a>
                            </li>
                            <li><a class="d-flex align-items-center"
                                    href="https://pixinvent.com/demo/vuexy-mail-template/mail-verify-email.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Verify Email">Verify Email</span></a>
                            </li>
                            <li><a class="d-flex align-items-center"
                                    href="https://pixinvent.com/demo/vuexy-mail-template/mail-deactivate-account.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Deactivate Account">Deactivate Account</span></a>
                            </li>
                            <li><a class="d-flex align-items-center"
                                    href="https://pixinvent.com/demo/vuexy-mail-template/mail-invoice.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Invoice">Invoice</span></a>
                            </li>
                            <li><a class="d-flex align-items-center"
                                    href="https://pixinvent.com/demo/vuexy-mail-template/mail-promotional.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Promotional">Promotional</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Miscellaneous">Miscellaneous</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="page-misc-coming-soon.html"
                                    target="_blank"><span class="menu-item text-truncate" data-i18n="Coming Soon">Coming
                                        Soon</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="page-misc-not-authorized.html"
                                    target="_blank"><span class="menu-item text-truncate" data-i18n="Not Authorized">Not
                                        Authorized</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="page-misc-under-maintenance.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Maintenance">Maintenance</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="page-misc-error.html" target="_blank"><span
                                        class="menu-item text-truncate" data-i18n="Error">Error</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user-check"></i><span
                        class="menu-title text-truncate" data-i18n="Authentication">Authentication</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Login">Login</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="auth-login-basic.html" target="_blank"><span
                                        class="menu-item text-truncate" data-i18n="Basic">Basic</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="auth-login-cover.html" target="_blank"><span
                                        class="menu-item text-truncate" data-i18n="Cover">Cover</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Register">Register</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="auth-register-basic.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Basic">Basic</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="auth-register-cover.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Cover">Cover</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="auth-register-multisteps.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Multi-Steps">Multi-Steps</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Forgot Password">Forgot
                                Password</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="auth-forgot-password-basic.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Basic">Basic</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="auth-forgot-password-cover.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Cover">Cover</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Reset Password">Reset Password</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="auth-reset-password-basic.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Basic">Basic</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="auth-reset-password-cover.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Cover">Cover</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Verify Email">Verify Email</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="auth-verify-email-basic.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Basic">Basic</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="auth-verify-email-cover.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Cover">Cover</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Two Steps">Two Steps</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="auth-two-steps-basic.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Basic">Basic</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="auth-two-steps-cover.html"
                                    target="_blank"><span class="menu-item text-truncate"
                                        data-i18n="Cover">Cover</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="modal-examples.html"><i
                        data-feather="square"></i><span class="menu-title text-truncate"
                        data-i18n="Modal Examples">Modal Examples</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="User Interface">User Interface</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="ui-typography.html"><i
                        data-feather="type"></i><span class="menu-title text-truncate"
                        data-i18n="Typography">Typography</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="ui-feather.html"><i
                        data-feather="eye"></i><span class="menu-title text-truncate"
                        data-i18n="Feather">Feather</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="credit-card"></i><span
                        class="menu-title text-truncate" data-i18n="Card">Card</span><span
                        class="badge badge-light-success rounded-pill ms-auto me-1">New</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="card-basic.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Basic">Basic</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="card-advance.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Advance">Advance</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="card-statistics.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Statistics">Statistics</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="card-analytics.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Analytics">Analytics</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="card-actions.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Card Actions">Card Actions</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="briefcase"></i><span
                        class="menu-title text-truncate" data-i18n="Components">Components</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="component-accordion.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Accordion">Accordion</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-alerts.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Alerts">Alerts</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-avatar.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Avatar">Avatar</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-badges.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Badges">Badges</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-breadcrumbs.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Breadcrumbs">Breadcrumbs</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-buttons.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Buttons">Buttons</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-carousel.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Carousel">Carousel</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-collapse.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Collapse">Collapse</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-divider.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Divider">Divider</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-dropdowns.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Dropdowns">Dropdowns</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-list-group.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List Group">List Group</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-modals.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Modals">Modals</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-navs-component.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Navs Component">Navs Component</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-offcanvas.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Offcanvas">Offcanvas</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-pagination.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Pagination">Pagination</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-pill-badges.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Pill Badges">Pill Badges</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-pills-component.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Pills Component">Pills Component</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-popovers.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Popovers">Popovers</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-progress.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Progress">Progress</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-spinner.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Spinner">Spinner</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-tabs-component.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Tabs Component">Tabs Component</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-timeline.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Timeline">Timeline</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-bs-toast.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Toasts">Toasts</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="component-tooltips.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Tooltips">Tooltips</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="box"></i><span
                        class="menu-title text-truncate" data-i18n="Extensions">Extensions</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="ext-component-sweet-alerts.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Sweet Alert">Sweet Alert</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-blockui.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Block UI">BlockUI</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-toastr.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Toastr">Toastr</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-sliders.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Sliders">Sliders</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-drag-drop.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Drag &amp; Drop">Drag &amp; Drop</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-tour.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Tour">Tour</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-clipboard.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Clipboard">Clipboard</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-media-player.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Media player">Media Player</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-context-menu.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Context Menu">Context Menu</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-swiper.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="swiper">Swiper</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-tree.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Tree">Tree</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-ratings.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Ratings">Ratings</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="ext-component-i18n.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="l18n">l18n</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="layout"></i><span
                        class="menu-title text-truncate" data-i18n="Page Layouts">Page Layouts</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="layout-collapsed-menu.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Collapsed Menu">Collapsed Menu</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="layout-full.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Layout Full">Layout Full</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="layout-without-menu.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Without Menu">Without Menu</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="layout-empty.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Layout Empty">Layout Empty</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="layout-blank.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Layout Blank">Layout Blank</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Forms &amp; Tables</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="copy"></i><span
                        class="menu-title text-truncate" data-i18n="Form Elements">Form Elements</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="form-input.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Input">Input</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-input-groups.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Input Groups">Input Groups</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-input-mask.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Input Mask">Input Mask</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-textarea.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Textarea">Textarea</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-checkbox.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Checkbox">Checkbox</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-radio.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Radio">Radio</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-custom-options.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Custom Options">Custom Options</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-switch.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Switch">Switch</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-select.html"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Select">Select</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-number-input.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Number Input">Number Input</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-file-uploader.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="File Uploader">File Uploader</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-quill-editor.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Quill Editor">Quill Editor</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="form-date-time-picker.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Date &amp; Time Picker">Date &amp; Time Picker</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="form-layout.html"><i
                        data-feather="box"></i><span class="menu-title text-truncate" data-i18n="Form Layout">Form
                        Layout</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="form-wizard.html"><i
                        data-feather="package"></i><span class="menu-title text-truncate" data-i18n="Form Wizard">Form
                        Wizard</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="form-validation.html"><i
                        data-feather="check-circle"></i><span class="menu-title text-truncate"
                        data-i18n="Form Validation">Form Validation</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="form-repeater.html"><i
                        data-feather="rotate-cw"></i><span class="menu-title text-truncate"
                        data-i18n="Form Repeater">Form Repeater</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="table-bootstrap.html"><i
                        data-feather="server"></i><span class="menu-title text-truncate"
                        data-i18n="Table">Table</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="grid"></i><span
                        class="menu-title text-truncate" data-i18n="Datatable">Datatable</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="table-datatable-basic.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Basic">Basic</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="table-datatable-advanced.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Advanced">Advanced</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span data-i18n="Charts &amp; Maps">Charts &amp; Maps</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="pie-chart"></i><span
                        class="menu-title text-truncate" data-i18n="Charts">Charts</span><span
                        class="badge badge-light-danger rounded-pill ms-auto me-2">2</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="d-flex align-items-center" href="chart-apex.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Apex">Apex</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="chart-chartjs.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Chartjs">Chartjs</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="maps-leaflet.html"><i
                        data-feather="map"></i><span class="menu-title text-truncate" data-i18n="Leaflet Maps">Leaflet
                        Maps</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Misc">Misc</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="menu"></i><span
                        class="menu-title text-truncate" data-i18n="Menu Levels">Menu Levels</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Second Level">Second Level 2.1</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Second Level">Second Level 2.2</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="#"><span class="menu-item text-truncate"
                                        data-i18n="Third Level">Third Level 3.1</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="#"><span class="menu-item text-truncate"
                                        data-i18n="Third Level">Third Level 3.2</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="disabled nav-item"><a class="d-flex align-items-center" href="#"><i
                        data-feather="eye-off"></i><span class="menu-title text-truncate"
                        data-i18n="Disabled Menu">Disabled Menu</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center"
                    href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation"
                    target="_blank"><i data-feather="folder"></i><span class="menu-title text-truncate"
                        data-i18n="Documentation">Documentation</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="https://pixinvent.ticksy.com/"
                    target="_blank"><i data-feather="life-buoy"></i><span class="menu-title text-truncate"
                        data-i18n="Raise Support">Raise Support</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <!-- CrossFade Carousel Start -->
        <section id="carousel-crossfade">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset(mix('images/banner/banner-1.jpg')) }}"
                                            class="img-fluid d-block w-100" alt="cf-img-1" />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset(mix('images/banner/banner-2.jpg')) }}"
                                            class="img-fluid d-block w-100" alt="cf-img-2" />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset(mix('images/banner/banner-3.jpg')) }}"
                                            class="img-fluid d-block w-100" alt="cf-img-3" />
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CrossFade Carousel End -->



        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Schools & Colleges Statistics</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Year</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">2022-23</a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i
                                    class="me-1" data-feather="check-square"></i><span
                                    class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i
                                    class="me-1" data-feather="message-square"></i><span
                                    class="align-middle">Chat</span></a><a class="dropdown-item"
                                href="app-email.html"><i class="me-1" data-feather="mail"></i><span
                                    class="align-middle">Email</span></a><a class="dropdown-item"
                                href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span
                                    class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Donut Chart Starts-->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title mb-75">Number of Schools</h4>
                                <span class="card-subtitle text-muted">Spending on various categories </span>
                            </div>
                            <div class="card-body">
                                <div id="donut-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Donut Chart Ends-->
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Donut Chart Starts-->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title mb-75">Number of Teachers</h4>
                                <span class="card-subtitle text-muted">Spending on various categories </span>
                            </div>
                            <div class="card-body">
                                <div id="donut-chart2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Donut Chart Ends-->
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Donut Chart Starts-->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title mb-75">Students Strengths</h4>
                                <span class="card-subtitle text-muted">Spending on various categories </span>
                            </div>
                            <div class="card-body">
                                <div id="donut-chart3"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Donut Chart Ends-->
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Donut Chart Starts-->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title mb-75">Non Teaching Staff</h4>
                                <span class="card-subtitle text-muted">Spending on various categories </span>
                            </div>
                            <div class="card-body">
                                <div id="donut-chart4"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Donut Chart Ends-->
                </div>
            </div>
            <!-- apex charts section start -->
            <section id="apexchart">

                <div class="row">

                    <!-- Column Chart Starts -->
                    <div class="col-12">
                        <div class="card">
                            <div
                                class="card-header d-flex flex-md-row flex-column justify-content-md-between justify-content-start align-items-md-center align-items-start">
                                <h4 class="card-title">Enrolment by Level of Education & Genders</h4>
                                <div class="d-flex align-items-center mt-md-0 mt-1">
                                    <i class="font-medium-2" data-feather="calendar"></i>
                                    <input type="text"
                                        class="form-control flat-picker bg-transparent border-0 shadow-none"
                                        placeholder="YYYY-MM-DD" />
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="column-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column Chart Ends -->

                    <!-- Polar Area Chart Starts -->
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Medium</h4>
                                <div class="dropdown">
                                    <i data-feather="more-vertical" class="cursor-pointer" role="button"
                                        id="heat-chart-dd" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    </i>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="heat-chart-dd">
                                        <a class="dropdown-item" href="#">Last 28 Days</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas class="polar-area-chart-ex chartjs" data-height="350"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Polar Area Chart Ends-->


                    <div class="col-lg-12 col-12">
                        <div class="row match-height">
                            <!-- Sales Line Chart Card -->
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-start">
                                        <div>
                                            <h4 class="card-title mb-25">Sales</h4>
                                            <p class="card-text mb-0">2020 Total Sales: 12.84k</p>
                                        </div>
                                        <i data-feather="settings" class="font-medium-3 text-muted cursor-pointer"></i>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div id="sales-line-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Sales Line Chart Card -->
                        </div>
                    </div>


                    <!-- Apex charts section end -->
                </div>

            </section>

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />

<script>
$(function() {
    'use strict';

    var flatPicker = $('.flat-picker'),
        isRtl = $('html').attr('data-textdirection') === 'rtl',
        chartColors = {
            column: {
                series1: '#826af9',
                series2: '#d2b0ff',
                bg: '#f8d3ff'
            },
            success: {
                shade_100: '#7eefc7',
                shade_200: '#06774f'
            },
            donut: {
                series1: '#ffe700',
                series2: '#00d4bd',
                series3: '#826bf8',
                series4: '#2b9bf4',
                series5: '#FFA1A1'
            },
            area: {
                series3: '#a4f8cd',
                series2: '#60f2ca',
                series1: '#2bdac7'
            }
        };

    // heat chart data generator
    function generateDataHeat(count, yrange) {
        var i = 0;
        var series = [];
        while (i < count) {
            var x = 'w' + (i + 1).toString();
            var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

            series.push({
                x: x,
                y: y
            });
            i++;
        }
        return series;
    }

    // Init flatpicker
    if (flatPicker.length) {
        var date = new Date();
        flatPicker.each(function() {
            $(this).flatpickr({
                mode: 'range',
                defaultDate: ['2019-05-01', '2019-05-10']
            });
        });
    }

    // Area Chart
    // --------------------------------------------------------------------
    var areaChartEl = document.querySelector('#line-area-chart'),
        areaChartConfig = {
            chart: {
                height: 400,
                type: 'area',
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: false,
                curve: 'straight'
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'start'
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            colors: [chartColors.area.series3, chartColors.area.series2, chartColors.area.series1],
            series: [{
                    name: 'Visits',
                    data: [100, 120, 90, 170, 130, 160, 140, 240, 220, 180, 270, 280, 375]
                },
                {
                    name: 'Clicks',
                    data: [60, 80, 70, 110, 80, 100, 90, 180, 160, 140, 200, 220, 275]
                },
                {
                    name: 'Sales',
                    data: [20, 40, 30, 70, 40, 60, 50, 140, 120, 100, 140, 180, 220]
                }
            ],
            xaxis: {
                categories: [
                    '7/12',
                    '8/12',
                    '9/12',
                    '10/12',
                    '11/12',
                    '12/12',
                    '13/12',
                    '14/12',
                    '15/12',
                    '16/12',
                    '17/12',
                    '18/12',
                    '19/12',
                    '20/12'
                ]
            },
            fill: {
                opacity: 1,
                type: 'solid'
            },
            tooltip: {
                shared: false
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof areaChartEl !== undefined && areaChartEl !== null) {
        var areaChart = new ApexCharts(areaChartEl, areaChartConfig);
        areaChart.render();
    }

    // Column Chart
    // --------------------------------------------------------------------
    var columnChartEl = document.querySelector('#column-chart'),
        columnChartConfig = {
            chart: {
                height: 400,
                type: 'bar',
                stacked: true,
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '15%',
                    colors: {
                        backgroundBarColors: [
                            chartColors.column.bg,
                            chartColors.column.bg,
                            chartColors.column.bg,
                            chartColors.column.bg,
                            chartColors.column.bg
                        ],
                        backgroundBarRadius: 10
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'start'
            },
            colors: [chartColors.column.series1, chartColors.column.series2],
            stroke: {
                show: true,
                colors: ['transparent']
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            series: [{
                    name: 'Male',
                    data: [90, 120, 55, 100, 80, 125, 175, 70, 88, 180]
                },
                {
                    name: 'Female',
                    data: [85, 100, 30, 40, 95, 90, 30, 110, 62, 20]
                }
            ],
            xaxis: {
                categories: ['7/12', '8/12', '9/12', '10/12', '11/12', '12/12', '13/12', '14/12', '15/12',
                    '16/12'
                ]
            },
            fill: {
                opacity: 1
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof columnChartEl !== undefined && columnChartEl !== null) {
        var columnChart = new ApexCharts(columnChartEl, columnChartConfig);
        columnChart.render();
    }

    // Scatter Chart
    // --------------------------------------------------------------------
    var scatterChartEl = document.querySelector('#scatter-chart'),
        scatterChartConfig = {
            chart: {
                height: 400,
                type: 'scatter',
                zoom: {
                    enabled: true,
                    type: 'xy'
                },
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'start'
            },
            colors: [window.colors.solid.warning, window.colors.solid.primary, window.colors.solid.success],
            series: [{
                    name: 'Angular',
                    data: [
                        [5.4, 170],
                        [5.4, 100],
                        [6.3, 170],
                        [5.7, 140],
                        [5.9, 130],
                        [7.0, 150],
                        [8.0, 120],
                        [9.0, 170],
                        [10.0, 190],
                        [11.0, 220],
                        [12.0, 170],
                        [13.0, 230]
                    ]
                },
                {
                    name: 'Vue',
                    data: [
                        [14.0, 220],
                        [15.0, 280],
                        [16.0, 230],
                        [18.0, 320],
                        [17.5, 280],
                        [19.0, 250],
                        [20.0, 350],
                        [20.5, 320],
                        [20.0, 320],
                        [19.0, 280],
                        [17.0, 280],
                        [22.0, 300],
                        [18.0, 120]
                    ]
                },
                {
                    name: 'React',
                    data: [
                        [14.0, 290],
                        [13.0, 190],
                        [20.0, 220],
                        [21.0, 350],
                        [21.5, 290],
                        [22.0, 220],
                        [23.0, 140],
                        [19.0, 400],
                        [20.0, 200],
                        [22.0, 90],
                        [20.0, 120]
                    ]
                }
            ],
            xaxis: {
                tickAmount: 10,
                labels: {
                    formatter: function(val) {
                        return parseFloat(val).toFixed(1);
                    }
                }
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof scatterChartEl !== undefined && scatterChartEl !== null) {
        var scatterChart = new ApexCharts(scatterChartEl, scatterChartConfig);
        scatterChart.render();
    }

    // Line Chart
    // --------------------------------------------------------------------
    var lineChartEl = document.querySelector('#line-chart'),
        lineChartConfig = {
            chart: {
                height: 400,
                type: 'line',
                zoom: {
                    enabled: false
                },
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            series: [{
                data: [280, 200, 220, 180, 270, 250, 70, 90, 200, 150, 160, 100, 150, 100, 50]
            }],
            markers: {
                strokeWidth: 7,
                strokeOpacity: 1,
                strokeColors: [window.colors.solid.white],
                colors: [window.colors.solid.warning]
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            colors: [window.colors.solid.warning],
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                padding: {
                    top: -20
                }
            },
            tooltip: {
                custom: function(data) {
                    return (
                        '<div class="px-1 py-50">' +
                        '<span>' +
                        data.series[data.seriesIndex][data.dataPointIndex] +
                        '%</span>' +
                        '</div>'
                    );
                }
            },
            xaxis: {
                categories: [
                    '7/12',
                    '8/12',
                    '9/12',
                    '10/12',
                    '11/12',
                    '12/12',
                    '13/12',
                    '14/12',
                    '15/12',
                    '16/12',
                    '17/12',
                    '18/12',
                    '19/12',
                    '20/12',
                    '21/12'
                ]
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof lineChartEl !== undefined && lineChartEl !== null) {
        var lineChart = new ApexCharts(lineChartEl, lineChartConfig);
        lineChart.render();
    }

    // Bar Chart
    // --------------------------------------------------------------------
    var barChartEl = document.querySelector('#bar-chart'),
        barChartConfig = {
            chart: {
                height: 400,
                type: 'bar',
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    barHeight: '30%',
                    endingShape: 'rounded'
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                padding: {
                    top: -15,
                    bottom: -10
                }
            },
            colors: window.colors.solid.info,
            dataLabels: {
                enabled: false
            },
            series: [{
                data: [700, 350, 480, 600, 210, 550, 150]
            }],
            xaxis: {
                categories: ['MON, 11', 'THU, 14', 'FRI, 15', 'MON, 18', 'WED, 20', 'FRI, 21', 'MON, 23']
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof barChartEl !== undefined && barChartEl !== null) {
        var barChart = new ApexCharts(barChartEl, barChartConfig);
        barChart.render();
    }

    // Candlestick Chart
    // --------------------------------------------------------------------
    var candlestickEl = document.querySelector('#candlestick-chart'),
        candlestickChartConfig = {
            chart: {
                height: 400,
                type: 'candlestick',
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            series: [{
                data: [{
                        x: new Date(1538778600000),
                        y: [150, 170, 50, 100]
                    },
                    {
                        x: new Date(1538780400000),
                        y: [200, 400, 170, 330]
                    },
                    {
                        x: new Date(1538782200000),
                        y: [330, 340, 250, 280]
                    },
                    {
                        x: new Date(1538784000000),
                        y: [300, 330, 200, 320]
                    },
                    {
                        x: new Date(1538785800000),
                        y: [320, 450, 280, 350]
                    },
                    {
                        x: new Date(1538787600000),
                        y: [300, 350, 80, 250]
                    },
                    {
                        x: new Date(1538789400000),
                        y: [200, 330, 170, 300]
                    },
                    {
                        x: new Date(1538791200000),
                        y: [200, 220, 70, 130]
                    },
                    {
                        x: new Date(1538793000000),
                        y: [220, 270, 180, 250]
                    },
                    {
                        x: new Date(1538794800000),
                        y: [200, 250, 80, 100]
                    },
                    {
                        x: new Date(1538796600000),
                        y: [150, 170, 50, 120]
                    },
                    {
                        x: new Date(1538798400000),
                        y: [110, 450, 10, 420]
                    },
                    {
                        x: new Date(1538800200000),
                        y: [400, 480, 300, 320]
                    },
                    {
                        x: new Date(1538802000000),
                        y: [380, 480, 350, 450]
                    }
                ]
            }],
            xaxis: {
                type: 'datetime'
            },
            yaxis: {
                tooltip: {
                    enabled: true
                },
                opposite: isRtl
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                padding: {
                    top: -23
                }
            },
            plotOptions: {
                candlestick: {
                    colors: {
                        upward: window.colors.solid.success,
                        downward: window.colors.solid.danger
                    }
                },
                bar: {
                    columnWidth: '40%'
                }
            }
        };
    if (typeof candlestickEl !== undefined && candlestickEl !== null) {
        var candlestickChart = new ApexCharts(candlestickEl, candlestickChartConfig);
        candlestickChart.render();
    }

    // Heat map chart
    // --------------------------------------------------------------------
    var heatmapEl = document.querySelector('#heatmap-chart'),
        heatmapChartConfig = {
            chart: {
                height: 350,
                type: 'heatmap',
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                heatmap: {
                    enableShades: false,

                    colorScale: {
                        ranges: [{
                                from: 0,
                                to: 10,
                                name: '0-10',
                                color: '#b9b3f8'
                            },
                            {
                                from: 11,
                                to: 20,
                                name: '10-20',
                                color: '#aba4f6'
                            },
                            {
                                from: 21,
                                to: 30,
                                name: '20-30',
                                color: '#9d95f5'
                            },
                            {
                                from: 31,
                                to: 40,
                                name: '30-40',
                                color: '#8f85f3'
                            },
                            {
                                from: 41,
                                to: 50,
                                name: '40-50',
                                color: '#8176f2'
                            },
                            {
                                from: 51,
                                to: 60,
                                name: '50-60',
                                color: '#7367f0'
                            }
                        ]
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            grid: {
                padding: {
                    top: -25
                }
            },
            series: [{
                    name: 'SUN',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'MON',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'TUE',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'WED',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'THU',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'FRI',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'SAT',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                }
            ],
            xaxis: {
                labels: {
                    show: false
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            }
        };
    if (typeof heatmapEl !== undefined && heatmapEl !== null) {
        var heatmapChart = new ApexCharts(heatmapEl, heatmapChartConfig);
        heatmapChart.render();
    }

    // Radialbar Chart
    // --------------------------------------------------------------------
    var radialBarChartEl = document.querySelector('#radialbar-chart'),
        radialBarChartConfig = {
            chart: {
                height: 350,
                type: 'radialBar'
            },
            colors: [chartColors.donut.series1, chartColors.donut.series2, chartColors.donut.series4],
            plotOptions: {
                radialBar: {
                    size: 185,
                    hollow: {
                        size: '25%'
                    },
                    track: {
                        margin: 15
                    },
                    dataLabels: {
                        name: {
                            fontSize: '2rem',
                            fontFamily: 'Montserrat'
                        },
                        value: {
                            fontSize: '1rem',
                            fontFamily: 'Montserrat'
                        },
                        total: {
                            show: true,
                            fontSize: '1rem',
                            label: 'Comments',
                            formatter: function(w) {
                                return '80%';
                            }
                        }
                    }
                }
            },
            grid: {
                padding: {
                    top: -35,
                    bottom: -30
                }
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            stroke: {
                lineCap: 'round'
            },
            series: [80, 50, 35],
            labels: ['Comments', 'Replies', 'Shares']
        };
    if (typeof radialBarChartEl !== undefined && radialBarChartEl !== null) {
        var radialChart = new ApexCharts(radialBarChartEl, radialBarChartConfig);
        radialChart.render();
    }

    // Radar Chart
    // --------------------------------------------------------------------
    var radarChartEl = document.querySelector('#radar-chart'),
        radarChartConfig = {
            chart: {
                height: 400,
                type: 'radar',
                toolbar: {
                    show: false
                },
                parentHeightOffset: 0,
                dropShadow: {
                    enabled: false,
                    blur: 8,
                    left: 1,
                    top: 1,
                    opacity: 0.2
                }
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            yaxis: {
                show: false
            },
            series: [{
                    name: 'iPhone 11',
                    data: [41, 64, 81, 60, 42, 42, 33, 23]
                },
                {
                    name: 'Samsung s20',
                    data: [65, 46, 42, 25, 58, 63, 76, 43]
                }
            ],
            colors: [chartColors.donut.series1, chartColors.donut.series3],
            xaxis: {
                categories: ['Battery', 'Brand', 'Camera', 'Memory', 'Storage', 'Display', 'OS', 'Price']
            },
            fill: {
                opacity: [1, 0.8]
            },
            stroke: {
                show: false,
                width: 0
            },
            markers: {
                size: 0
            },
            grid: {
                show: false,
                padding: {
                    top: -20,
                    bottom: -20
                }
            }
        };
    if (typeof radarChartEl !== undefined && radarChartEl !== null) {
        var radarChart = new ApexCharts(radarChartEl, radarChartConfig);
        radarChart.render();
    }

    // Donut Chart
    // --------------------------------------------------------------------
    var donutChartEl = document.querySelector('#donut-chart'),
        donutChartConfig = {
            chart: {
                height: 350,
                type: 'donut'
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            labels: ['Pre Primary', 'Primary', 'Upper Primary', 'Secondary'],
            series: [85, 16, 50, 50],
            colors: [
                chartColors.donut.series1,
                chartColors.donut.series5,
                chartColors.donut.series3,
                chartColors.donut.series2
            ],
            dataLabels: {
                enabled: true,
                formatter: function(val, opt) {
                    return parseInt(val) + '%';
                }
            },
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                fontSize: '2rem',
                                fontFamily: 'Montserrat'
                            },
                            value: {
                                fontSize: '1rem',
                                fontFamily: 'Montserrat',
                                formatter: function(val) {
                                    return parseInt(val) + '%';
                                }
                            },
                            total: {
                                show: true,
                                fontSize: '1.5rem',
                                label: 'Operational',
                                formatter: function(w) {
                                    return '31%';
                                }
                            }
                        }
                    }
                }
            },
            responsive: [{
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 380
                        }
                    }
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 320
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                        name: {
                                            fontSize: '1.5rem'
                                        },
                                        value: {
                                            fontSize: '1rem'
                                        },
                                        total: {
                                            fontSize: '1.5rem'
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            ]
        };
    if (typeof donutChartEl !== undefined && donutChartEl !== null) {
        var donutChart = new ApexCharts(donutChartEl, donutChartConfig);
        donutChart.render();
    }


    var donutChartEl = document.querySelector('#donut-chart2'),
        donutChartConfig = {
            chart: {
                height: 350,
                type: 'donut'
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            labels: ['Male', 'Female'],
            series: [70, 30],
            colors: [
                chartColors.donut.series1,
                chartColors.donut.series5,
                chartColors.donut.series3,
                chartColors.donut.series2
            ],
            dataLabels: {
                enabled: true,
                formatter: function(val, opt) {
                    return parseInt(val) + '%';
                }
            },
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                fontSize: '2rem',
                                fontFamily: 'Montserrat'
                            },
                            value: {
                                fontSize: '1rem',
                                fontFamily: 'Montserrat',
                                formatter: function(val) {
                                    return parseInt(val) + '%';
                                }
                            },
                            total: {
                                show: true,
                                fontSize: '1.5rem',
                                label: 'Operational',
                                formatter: function(w) {
                                    return '31%';
                                }
                            }
                        }
                    }
                }
            },
            responsive: [{
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 380
                        }
                    }
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 320
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                        name: {
                                            fontSize: '1.5rem'
                                        },
                                        value: {
                                            fontSize: '1rem'
                                        },
                                        total: {
                                            fontSize: '1.5rem'
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            ]
        };
    if (typeof donutChartEl !== undefined && donutChartEl !== null) {
        var donutChart = new ApexCharts(donutChartEl, donutChartConfig);
        donutChart.render();
    }


    var donutChartEl = document.querySelector('#donut-chart3'),
        donutChartConfig = {
            chart: {
                height: 350,
                type: 'donut'
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            labels: ['Pre Primary', 'Primary', 'Upper Primary', 'Secondary'],
            series: [85, 16, 50, 50],
            colors: [
                chartColors.donut.series1,
                chartColors.donut.series5,
                chartColors.donut.series3,
                chartColors.donut.series2
            ],
            dataLabels: {
                enabled: true,
                formatter: function(val, opt) {
                    return parseInt(val) + '%';
                }
            },
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                fontSize: '2rem',
                                fontFamily: 'Montserrat'
                            },
                            value: {
                                fontSize: '1rem',
                                fontFamily: 'Montserrat',
                                formatter: function(val) {
                                    return parseInt(val) + '%';
                                }
                            },
                            total: {
                                show: true,
                                fontSize: '1.5rem',
                                label: 'Operational',
                                formatter: function(w) {
                                    return '31%';
                                }
                            }
                        }
                    }
                }
            },
            responsive: [{
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 380
                        }
                    }
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 320
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                        name: {
                                            fontSize: '1.5rem'
                                        },
                                        value: {
                                            fontSize: '1rem'
                                        },
                                        total: {
                                            fontSize: '1.5rem'
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            ]
        };
    if (typeof donutChartEl !== undefined && donutChartEl !== null) {
        var donutChart = new ApexCharts(donutChartEl, donutChartConfig);
        donutChart.render();
    }

    var donutChartEl = document.querySelector('#donut-chart4'),
        donutChartConfig = {
            chart: {
                height: 350,
                type: 'donut'
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            labels: ['Lower Primary', 'Upper Primary', 'High School', 'HS School'],
            series: [85, 16, 50, 50],
            colors: [
                chartColors.donut.series1,
                chartColors.donut.series5,
                chartColors.donut.series3,
                chartColors.donut.series2
            ],
            dataLabels: {
                enabled: true,
                formatter: function(val, opt) {
                    return parseInt(val) + '%';
                }
            },
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                fontSize: '2rem',
                                fontFamily: 'Montserrat'
                            },
                            value: {
                                fontSize: '1rem',
                                fontFamily: 'Montserrat',
                                formatter: function(val) {
                                    return parseInt(val) + '%';
                                }
                            },
                            total: {
                                show: true,
                                fontSize: '1.5rem',
                                label: 'Operational',
                                formatter: function(w) {
                                    return '31%';
                                }
                            }
                        }
                    }
                }
            },
            responsive: [{
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 380
                        }
                    }
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 320
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                        name: {
                                            fontSize: '1.5rem'
                                        },
                                        value: {
                                            fontSize: '1rem'
                                        },
                                        total: {
                                            fontSize: '1.5rem'
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            ]
        };
    if (typeof donutChartEl !== undefined && donutChartEl !== null) {
        var donutChart = new ApexCharts(donutChartEl, donutChartConfig);
        donutChart.render();
    }




});
</script>


@endsection

@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

@endsection
@section('page-script')
{{-- Page js files --}}
<!-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script> -->
<script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/charts/chart-chartjs.js')) }}"></script>

<script src="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-1/js/scripts/cards/card-analytics.js?id=ead6f2040d41b5dbf6af"></script>
<script src="{{ asset(mix('js/scripts/cards/card-analytics.js')) }}"></script>


@endsection
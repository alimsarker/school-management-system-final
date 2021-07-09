<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>PABNA POLICELINE SCHOOL | DATABASE-SYSTEMS</title>
    <link rel="apple-touch-icon" href="{{ asset('backend/app-assets/images/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/app-assets/images/favicon/favicon-32x32.PNG') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/app-assets/vendors/select2/select2.min.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/animate-css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/chartist-js/chartist.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/chartist-js/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/app-assets/vendors/select2/select2-materialize.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/flag-icon/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/data-tables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/data-tables/css/select.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/vertical-modern-menu-template/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/vertical-modern-menu-template/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/dashboard-modern.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/intro.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/page-account-settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/dashboard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/data-tables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/custom/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">


@include('admin.layouts.header')
<!-- END: Header-->

@include('admin.layouts.search')


<!-- BEGIN: SideNav-->
@include('admin.layouts.sidebar')
<!-- END: SideNav-->

<!-- BEGIN: Page Main-->
<div id="main">
  <div class="row">
    
        

  @yield('admincontent')



        <!-- START RIGHT SIDEBAR NAV -->
@include('admin.layouts.rightsidebar')


    <!-- END: Page Main-->

    <!-- Theme Customizer -->


@include('admin.layouts.theme_customizer')
  
    <!-- BEGIN: Footer-->
@include('admin.layouts.footer')
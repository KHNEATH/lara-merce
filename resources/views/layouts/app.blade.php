<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> @yield('pageTitle') - Restoran</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        @include('includes.page_style')
    </head>
    <body>
        <div class="container-xxl bg-white p-0">
            @include('includes.page_nav')
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"> @yield('breadcrumb_text_heading')</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item text-warning"><a href="{{ route('pages.home') }}" class="text-warning link-underline link-underline-opacity-0">Home</a></li>
                            @yield('breadcrumb_text_label')
                        </ol>
                    </nav>
                </div>
            </div>
            @yield('content')
            <a href="#" class="btn btn-lg btn-warning btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>
        @include('includes.page_script')
    </body>
</html>
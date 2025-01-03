@extends('layouts.app')
@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <!-- Page Banner START -->
        <section class="pt-0">
            @include('student.layouts.partials.banner')
        </section>
        <!-- Page Banner END -->

        <!-- Page content START -->
        <section class="pt-0">
            <div class="container">
                <div class="row">
                    <!-- Right sidebar START -->
                    <div class="col-xl-3">
                        @include('student.layouts.partials.sidemenu')
                    </div>
                    <!-- Right sidebar END -->

                    <!-- Main content START -->
                    <div class="col-xl-9">
                        @yield('profile')
                    </div>
                    <!-- Main content END -->
                </div><!-- Row END -->
            </div>
        </section>
        <!-- Page content END -->
    </main>
    <!-- **************** MAIN CONTENT END **************** -->
@endsection

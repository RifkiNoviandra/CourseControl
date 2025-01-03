@extends('layouts.app')
@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <!--  Page Banner START -->
        @include('instructor.layouts.partials.banner')
        <!--  Page Banner END -->

        <!-- Page content START -->
        <section class="pt-0">
            <div class="container">
                <div class="row">

                    <!-- Right sidebar START -->
                        @include('instructor.layouts.partials.sidemenu')
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
    <hr/>
@endsection

@extends('layouts.backend.portal')

@section('title', 'Downloads - MPTFS')

@push('css')
@endpush

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @if (session('locale') == 'en')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Upload Poster Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Upload Poster</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- form start -->
                    <form action="{{ route('user.posters-save') }}" method="POST" enctype="multipart/form-data"
                        class="form-horizontal">
                        @csrf
                        <div class="row">
                            <!-- left column -->
                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">
                                <!-- Horizontal Form -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">CATEGORIES</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pb-3">
                                        <div class="form-group">
                                            <label>Select Categories</label>
                                            <div class="select2-purple">
                                                <select name="categories[]" id="category"
                                                    class="select2 {{ $errors->any() && $errors->first('categories') ? 'is-invalid' : '' }}"
                                                    multiple="multiple" data-placeholder="Select Categories"
                                                    data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-12">
                                                @if ($errors->any())
                                                    <p class="text-danger">{{ $errors->first('categories') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Choose Images Or PDF Files</label>
                                            <input type="file" class="form-control-file col-12 pl-0" name="files[]"
                                                multiple>

                                            @if ($errors->any())
                                                <p class="text-danger col-12">{{ $errors->first('files.*') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success float-right"><i
                                                class="nav-icon fas fa-upload"
                                                style="margin-right: 8px;"></i>UPLOAD</button>
                                        <a href="{{ route('author.post.index') }}" class="btn btn-danger"><i
                                                class="nav-icon fas fa-arrow-circle-left"
                                                style="margin-right: 8px;"></i>BACK</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (left) -->

                            {{-- <!-- right column -->
                            <div class="col-lg-6 col-md-12">
                                <!-- Horizontal Form -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">CHOOSE MULTIPLE IMAGES</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pb-2 mt-2">
                                        <div class="form-group row">
                                            <input type="file" class="form-control-file col-8" name="images[]" multiple>

                                            @if ($errors->any())
                                                <p class="text-danger col-8 pl-2">{{ $errors->first('images.*') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (right) --> --}}
                        </div>
                        <!-- /.row -->
                    </form>
                    <!-- /.form end-->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        @endif

        @if (session('locale') == 'hi')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>अपलोड पोस्टर पेज</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">होम</a></li>
                                <li class="breadcrumb-item active">अपलोड पोस्टर</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- right column -->
                        <div class="col-lg-12 col-md-12 ">
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">अपने पोस्टर अपलोड करें <span id="counter"></span></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body mt-2 mb-2">
                                    <form method="POST" action="{{ url('user/posters-save') }}"
                                        enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                                        @csrf
                                        <div class="dz-message">
                                            <div class="mb-4">
                                                <span class="d-block h4 mb-1">अपलोड करने के लिए फाइलें चुनें</span>
                                                <span class="d-block text-secondary mb-1">या</span>
                                                <span class="d-block h5">ड्रेग करें और छोड़ दें</span>
                                            </div>
                                            <span class="btn btn-primary">Browse files</span>
                                        </div>

                                        <div class="fallback">
                                            <input type="file" name="file" id="file" multiple>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->

                    <!-- Dropzone Preview Template -->
                    <div id="preview" style="display: none;">

                        <div class="dz-preview dz-file-preview">
                            <div class="dz-image"><img data-dz-thumbnail /></div>

                            <div class="dz-details">
                                <div class="dz-size"><span data-dz-size></span></div>
                                <div class="dz-filename"><span data-dz-name></span></div>
                            </div>
                            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                            <div class="dz-error-message"><span data-dz-errormessage></span></div>



                            <div class="dz-success-mark">

                                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                                    <title>Check</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs></defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                        sketch:type="MSPage">
                                        <path
                                            d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                                            id="Oval-2" stroke-opacity="0.198794158" stroke="#747474"
                                            fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                                    </g>
                                </svg>

                            </div>
                            <div class="dz-error-mark">

                                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                                    <title>error</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs></defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                        sketch:type="MSPage">
                                        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474"
                                            stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                            <path
                                                d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                                                id="Oval-2" sketch:type="MSShapeGroup"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!--End of Dropzone Preview Template-->

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        @endif

    </div>
    <!-- /.content-wrapper -->

@endsection

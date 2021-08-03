@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-image" style="background-image: url('{{ asset('assets/media/backgroundloginbook.jpg') }}'); background-position: center; background-size:cover"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" action="{{ route('registerUser') }}" class="user">
                            @csrf

                            <div class="form-group">
                                <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="pb-5">
                            <div class="float-start">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="float-end">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Already have an account? Login!') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        // FilePond.registerPlugin(
        //     FilePondPluginFileValidateType,
        //     FilePondPluginImageExifOrientation,
        //     FilePondPluginImagePreview,
        //     FilePondPluginImageCrop,
        //     FilePondPluginImageResize,
        //     FilePondPluginImageTransform,
        //     FilePondPluginImageEdit
        // );

        // FilePond.create(
        //     document.getElementById('photoprofile'),
        //     {
        //         labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
        //         imagePreviewHeight: 170,
        //         imageCropAspectRatio: '1:1',
        //         imageResizeTargetWidth: 200,
        //         imageResizeTargetHeight: 200,
        //         stylePanelLayout: 'compact circle',
        //         styleLoadIndicatorPosition: 'center bottom',
        //         styleProgressIndicatorPosition: 'right bottom',
        //         styleButtonRemoveItemPosition: 'left bottom',
        //         styleButtonProcessItemPosition: 'right bottom',
        //     }
        // );

        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[type=file]');
        const pond = FilePond.create(inputElement);
    </script>
@endsection

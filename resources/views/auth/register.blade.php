@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerUser') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group"> 
                                <input type="file" 
                                class="filepond"
                                name="photoprofile"
                                id="photoprofile"
                                accept="image/png, image/jpeg, image/gif"/>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
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

@extends('form')

@section('title')
    Добавление
@endsection


@section('main_view')
    <div class="container">
        <div class="text-center">
            <h1>
                Добавление изображения
            </h1>
        </div>
        <div class="container py-3">
        </div>
        <div class="container mt-5">
            @if(session('status'))
                <div class="alert alert-success" style="margin: 1% 8%">>
                    {{ session('status') }}
                </div>
            @endif
                <form name="upload-multiple-image" method="POST"  action="{{ url('Create_Image') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="margin: 2% 8%">

                        <div class="mb-3">
                            <input type="file" class="form-control" id="images" name="images[]" multiple="">
                        </div>

                        @error('images')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="submit">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>


@endsection

@section('script')

@endsection

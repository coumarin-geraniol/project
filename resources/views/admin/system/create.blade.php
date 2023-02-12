@extends('layouts.main')


@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-edit'></i> Isletim Versiyonu Eklemek
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            General <span class="fw-300"><i>inputs</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-tag">
                                Be sure to use an appropriate type attribute
                            </div>


                            <form action="{{ route('admin.system.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Isim</label>
                                    <input value="{{ old('name') }}" name="name" type="text" class="form-control">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Architecture</label>
                                    <input value="{{ old('architecture') }}" name="architecture" type="text" class="form-control">
                                    @error('architecture')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-block btn-primary mt-3">Ekle</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection



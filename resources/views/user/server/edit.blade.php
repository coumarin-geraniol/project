@extends('layouts.main')
@section('content')
    <div class="page-content">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        General <span class="fw-300"><i>inputs</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse"
                                data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen"
                                data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close"
                                data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="{{route('user.server.update', $server->id) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="d-flex justify-content-center p-2 ">
                                <div class="panel-content" data-select2-id="36">
                                    <div class="panel-tag">
                                        Server request form (Please make sure to fill in your hardware needs
                                        correctly)
                                    </div>
                                    <div class="form-group" data-select2-id="100">
                                        <label class="form-label" for="single-default">
                                            CPU:
                                        </label>
                                        <select name="cpu_id"
                                                class="select2 form-control w-100 select2-hidden-accessible"
                                                id="single-default"
                                                data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                            <optgroup data-select2-id="101">
                                                @foreach($cpus as $cpu)
                                                    <option {{ $cpu->id === $server->cpu_id ? 'selected' : ''}}
                                                            value="{{ $cpu->id }}">{{ $cpu->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select><span
                                            class="select2 select2-container select2-container--default select2-container--below select2-container--focus"
                                            dir="ltr" data-select2-id="1" style="width: 551.4px;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--single"
                                                    role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                    aria-labelledby="select2-single-default-container"><span
                                                        class="select2-selection_rendered"
                                                        id="select2-single-default-container"
                                                        role="textbox" aria-readonly="true"></span><span
                                                        class="select2-selection_arrow" role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <label class="form-label" for="single-default">
                                            RAM:
                                        </label>
                                        <select name="ram_id"
                                                class="select2 form-control w-100 select2-hidden-accessible"
                                                id="single-default"
                                                data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                            <optgroup data-select2-id="101">
                                                @foreach($rams as $ram)
                                                    <option {{ $ram->id === $server->ram_id ? 'selected' : ''}}
                                                            value="{{$ram->id}}">{{$ram->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select><span
                                            class="select2 select2-container select2-container--default select2-container--below select2-container--focus"
                                            dir="ltr" data-select2-id="1" style="width: 551.4px;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--single"
                                                    role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                    aria-labelledby="select2-single-default-container"><span
                                                        class="select2-selection_rendered"
                                                        id="select2-single-default-container"
                                                        role="textbox" aria-readonly="true"></span><span
                                                        class="select2-selection_arrow" role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <label class="form-label" for="single-default">
                                            Disk:
                                        </label>
                                        <select name="disk_id"
                                                class="select2 form-control w-100 select2-hidden-accessible"
                                                id="single-default"
                                                data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                            <optgroup data-select2-id="101">
                                                @foreach($disks as $disk)
                                                    <option {{ $disk->id === $server->disk_id ? 'selected' : ''}}
                                                            value="{{$disk->id}}">{{$disk->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select><span
                                            class="select2 select2-container select2-container--default select2-container--below select2-container--focus"
                                            dir="ltr" data-select2-id="1" style="width: 551.4px;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--single"
                                                    role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                    aria-labelledby="select2-single-default-container"><span
                                                        class="select2-selection_rendered"
                                                        id="select2-single-default-container"
                                                        role="textbox" aria-readonly="true"></span><span
                                                        class="select2-selection_arrow" role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <label class="form-label" for="single-default">
                                            İşletim Sistemi:
                                        </label>
                                        <select name="system_id"
                                                class="select2 form-control w-100 select2-hidden-accessible"
                                                id="single-default"
                                                data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                            <optgroup data-select2-id="101">
                                                @foreach($systems as $system)
                                                    <option {{ $system->id === $server->system_id ? 'selected' : ''}}
                                                            value="{{ $system->id }}">{{$system->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select><span
                                            class="select2 select2-container select2-container--default select2-container--below select2-container--focus"
                                            dir="ltr" data-select2-id="1" style="width: 551.4px;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--single"
                                                    role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                    aria-labelledby="select2-single-default-container"><span
                                                        class="select2-selection_rendered"
                                                        id="select2-single-default-container"
                                                        role="textbox" aria-readonly="true"></span><span
                                                        class="select2-selection_arrow" role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="simpleinput">A kaydı</label>
                                        <input value="{{ $server->kayit }}" name="kayit" type="text" id="simpleinput" class="form-control">
                                        @error('kayit')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="frame-wrap p-1 mb-2">
                                        <p class="form-label" for="single-default">Ağ:</p>
                                        <div class="demo">
                                            <div class="custom-control custom-radio custom-radio-rounded">
                                                <input type="radio" class="custom-control-input" id="defaultUncheckedRadio" {{ $server->dis_ag === true ? 'checked' : ""}}
                                                        name="ag" value="dis_ag">
                                                <label class="custom-control-label" for="defaultUncheckedRadio">Dış Ağ</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-radio-rounded">
                                                <input type="radio" class="custom-control-input" id="defaultCheckedRadio" {{ $server->ic_ag === true ? 'checked' : ""}}
                                                        name="ag" value="ic_ag">
                                                <label class="custom-control-label" for="defaultCheckedRadio">İç Ağ</label>
                                            </div>
                                            @error('ag')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="simpleinput">Talep nedeni</label>
                                        <input value="{{ $server->reason }}" name="reason" type="text" id="simpleinput" class="form-control">
                                        @error('reason')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="example-textarea">Açıklama</label>
                                        <textarea name="description" class="form-control" id="example-textarea" rows="5">
                                            {{ $server->description }}
                                        </textarea>
                                        @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary waves-effect waves-themed" type="submit">Submit
                                        form
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

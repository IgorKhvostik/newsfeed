@extends('layouts.layout')
@section('content')
    <section id="contentSection">
        <div class="row">
            <form style="width: 50%; margin: 0 auto; display: block;" action="/save-post" method="post"
                  enctype="multipart/form-data">

                <div class="form-group" {{ $errors->has('name') ? ' has-error' : '' }}>
                    <h3><label for="name">Post name</label></h3>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group" {{ $errors->has('description') ? ' has-error' : '' }}>
                    <h3><label for="shortText">Short description</label></h3>
                    <input type="text" class="form-control" id="shortText" name="description" value="{{ old('description') }}">
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group" {{ $errors->has('text') ? ' has-error' : '' }}>
                    <h3><label for="textarea">Text</label></h3>
                    <textarea class="form-control" id="textarea" rows="6" name="text">{{ old('text') }}</textarea>
                    @if ($errors->has('text'))
                        <span class="help-block">
                            <strong>{{ $errors->first('text') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group" {{ $errors->has('category') ? ' has-error' : '' }}>
                    <h3><label for="category">Category</label></h3>
                    <select class="form-control" id="category" name="category">
                        @foreach($catList as $id=>$cat)
                            <option id="{{$id}}">{{strtoupper($cat)}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group" {{ $errors->has('image') ? ' has-error' : '' }}>
                    <h3><label for="file">Attached picture</label></h3>
                    <input type="file" class="form-control-file" id="file" name="image">
                    @if ($errors->has('image'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-outline-primary btn-lg btn-block" value="Submit">
                </div>

                {{csrf_field()}}
            </form>
        </div>
    </section>
@endsection
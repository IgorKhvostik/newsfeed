@extends('layouts.layout')
@section('content')
    <section id="contentSection">
        <div class="row">
            <form style="width: 50%; margin: 0 auto; display: block;" action="/save-post" method="post">
                <div class="form-group">
                    <h3><label for="name">Post name</label></h3>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <h3><label for="shortText">Short description</label></h3>
                    <input type="text" class="form-control" id="shortText" name="description">
                </div>
                <div class="form-group">
                    <h3><label for="textarea">Text</label></h3>
                    <textarea class="form-control" id="textarea" rows="6" name="text"></textarea>
                </div>
                <div class="form-group">
                    <h3><label for="category">Category</label></h3>
                    <select class="form-control" id="category" name="category">
                        @foreach($catList as $id=>$cat)
                            <option id="{{$id}}">{{strtoupper($cat)}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <h3><label for="file">Attached picture</label></h3>
                    <input type="file" class="form-control-file" id="file" name="picture">
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
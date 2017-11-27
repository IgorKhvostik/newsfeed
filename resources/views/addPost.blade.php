@extends('layouts.layout')
@section('content')
    <section id="contentSection">
        <div class="row">
            <form style="width: 50%; margin: 0 auto; display: block;">
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
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <div class="form-group">
                    <h3><label for="file">Attached picture</label></h3>
                    <input type="file" class="form-control-file" id="file" placeholder=".jpg or.png" name="picture">
                </div>
                <br>
                <div class="form-group">
                    <button type="button" class="btn btn-outline-primary btn-lg btn-block">Submit</button>
                </div>

            </form>
        </div>
    </section>
@endsection
@extends('layouts.layout')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <br />
        <h2>Add a photo:</h2>
        <br />
        <form method="POST" action="/photos" enctype="multipart/form-data">
            @csrf

            @foreach ($errors as $error)
                <p>{{ $error }}</p>
            @endforeach
            
            <div class="row">
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="title" class="form-label">Photo Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="">

                        @error('title')
                            <div id="titleerror" class="invalid-feedback">
                                <p>{{ $errors->first('title') }}</p>
                            </div>
                        @enderror
                        
                        
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Choose a photo from your computer</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="caption" class="form-label">Photo Caption</label>
                        <input type="text" class="form-control" id="caption" name="caption" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Photo Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control" id="submit" value="Save" placeholder="">
                    </div>
                </div>
                <div class="col-sm">
    
                </div>
                <div class="col-sm">
                    
                </div>
            </div>
        </form>
        
        
       
    </main>
@endsection


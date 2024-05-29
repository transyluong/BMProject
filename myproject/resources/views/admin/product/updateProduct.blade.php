@extends('layout.master');
@section('Content')
    @if (session('Note'))
        <div class="alert alert-scucess">
            {{ session('Note') }}
        </div>
    @endif

    <form action="{{$product->pid}}" method="POST" enctype="multipart/form-data">
        <input class="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="mb-3">
           
        </div>
        <div class="mb-3">
            <label for="" class="from-label">ID Product</label>
            <input type="text" class="from-control" name="pid" value="{{ $product->pid }}" id=""/>
        </div>
        <div class="mb-3">
            <label for="" class="from-label">Product Name</label>
            <input type="text" class="from-control" name="pname" value="{{ $product->pname }}" id=""/>
        </div>
        <div class="mb-3">
            <label for="" class="from-label">Company</label>
            <input type="text" class="from-control" name="company" value="{{ $product->company }}" id=""/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Select Band</label>
                    <select class="form-select form-select-lg" name="selectBand" id="">
                    <option value="Assured Night time Cold and Cough">Assured Night time Cold and Cough</option>
                    <option value="AeroGreen Antibac">AeroGreen Antibac</option>
                    <option value="Bodycology">Bodycology</option>
                    <option value="Ibuprofen">Ibuprofen</option>
                    </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Select Year</label>
            <select class="form-select form-select-lg" name="selectYear" id="">
            <?php
            for($year=2015; $year<=2025; $year++){
                echo '<option value="'.$year.'">'.$year.'</option>';
            }
            ?>
            </select>
        </div>

        <div class="mb3">
            <label for="" class="from-label">Choose image</label>
            <img src="{{ $product ->pimage }}" alt="Image">
            <input type="file" class="from-control" name=" imageFile">
        </div>

        <button type="submit" class="btn btn-primary" name="btUpdate">
            Update
        </button>

@endsection
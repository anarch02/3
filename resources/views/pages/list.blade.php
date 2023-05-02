@extends('layouts.app')

@section('content')
<main id="main" class="main">

    <div class="infotitle">
      <h1>{{$info['name']}} 
        {{-- <x-modal.create :info="$info"></x-modal.create> --}}
        <x-button.create :btn="$info['create']"></x-button.create>
      </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route($info['route'])}}">{{$info['name']}}</a></li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div>
    <!-- End info Title -->

  

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <x-table.index :info="$info" :array="$array"></x-table.index>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
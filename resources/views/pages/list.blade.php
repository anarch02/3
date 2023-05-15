@extends('layouts.app')

@section('content')
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
@endsection
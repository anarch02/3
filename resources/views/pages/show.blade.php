@extends('layouts.app')

@section('content')
<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="{{Vite::asset('resources/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
          <h2> {{$object->name}} </h2>
          <h3> {{$info['type']}} </h3>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            @foreach ($info['tabs']['nav'] as $nav_item)
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="{{ '#'. $nav_item['id']}}">{{$nav_item['name']}}</button>
              </li>
            @endforeach


          </ul>
          <div class="tab-content pt-2">

            @foreach ($info['tabs']['content'] as $tab)
            <div class="tab-pane fade profile-overview" id="{{$tab['id']}}">
              <h5 class="card-title">{{$tab['id']}}</h5>

              @if ($tab['type'] == 'info_with_key')
                  @foreach ($tab['content'] as $key => $item)
                      
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">{{$key}}</div>
                        <div class="col-lg-9 col-md-8">{{$item}}</div>
                      </div>
                  @endforeach
              @endif
              @if ($tab['type'] == 'table')
                <x-table.show :array="$tab['content']"></x-table>
              @endif
              

            </div>

                
            @endforeach

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

@endsection
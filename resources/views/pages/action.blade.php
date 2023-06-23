@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"> {{isset($object)?  $object->name : "Create"}} </h5>
            <!-- Custom Styled Validation with Tooltips -->
            <form class="row g-3 needs-validation" action="{{isset($object)? route($info['route'], $object->id) : route($info['route'])}}" novalidate>
              @csrf
                @if(isset($object))
                    @method('post')
                @else
                    @method('put')
                @endif

                @dump($info['route'])
                {{isset($object)? route($info['route'], $object->id) : route($info['route'])}}
              @foreach ($info['selects'] as $select)
              <div>
                <label for="{{$select['id']}}" class="form-label">{{$select['label']}}</label>
                <select class="form-select" name="{{$select['name']}}" id="{{$select['id']}}" required="">
                  <option selected disabled="" value="">Choose...</option>
                  @foreach ($select['array'] as $item)
                    <option @isset($object)
                    @if($object[$select['name']] == $item->id) selected @endif
                    @endisset value="{{$item->id}}" > {{$item->name}} </option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Please select a valid state.
                </div>
              </div>
              @endforeach

              @foreach ($info['inputs'] as $key => $item)
              <div class="position-relative">
                <label for="validationTooltip01" class="form-label">{{$item['label']}}</label>
                <input type="{{$item['type']}}"
                class="form-control"
                id="{{$item['name']}}"
                name="{{$item['name']}}"
                @isset($object)
                value="{{$object[$item['name']]}}"
                @endisset
                placeholder="" required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
              @endforeach

              <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
              </div>
            </form><!-- End Custom Styled Validation with Tooltips -->

          </div>
        </div>

      </div>

      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title text-center">
              {{__('Info')}}
            </h5>
          </div>
          <div class="card-body">
            <p class="p-2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus rerum iure et illum iste recusandae dolore, expedita quo obcaecati rem inventore eveniet, deleniti reprehenderit fugiat dolores repudiandae alias laudantium pariatur tenetur modi. Eius quos laboriosam, placeat esse nulla explicabo voluptatum facilis laborum! Deserunt corporis, consectetur totam, tempore maiores, quibusdam doloremque natus obcaecati tenetur quaerat cumque quas iure consequuntur ad eius distinctio nemo quis. Nemo odio placeat officiis natus! Aliquam adipisci assumenda voluptates corporis cum repellat veniam, in molestiae sed amet voluptatem ipsa atque autem, obcaecati ullam ut voluptatibus id animi qui suscipit dolor. Veritatis sapiente, exercitationem minima commodi harum vitae?
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

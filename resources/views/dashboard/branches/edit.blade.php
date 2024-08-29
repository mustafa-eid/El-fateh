@extends('layouts.admin.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container-fluid">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Branches</li>
        </ol>
      </div>
    </div>
    <div>
      <div>
        <div>
          <div class="card">
            <div class="card-header">{{ __('Edit Branch') }}</div>
            <div class="card-body">
              <form method="POST" action="{{ route('branches.update', $branch->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                  <label for="en_name">{{ __('Branch Name (English)') }}</label>
                  <textarea id="en_name" class="form-control @error('en_name') is-invalid @enderror" name="en_name" required autocomplete="en_name" autofocus>{{ old('en_name', $branch->en_name) }}</textarea>
                  @error('en_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group mb-4">
                  <label for="ar_name">{{ __('Branch Name (Arabic)') }}</label>
                  <textarea id="ar_name" class="form-control @error('ar_name') is-invalid @enderror" name="ar_name" required autocomplete="ar_name" autofocus>{{ old('ar_name', $branch->ar_name) }}</textarea>
                  @error('ar_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group mb-4">
                  <label for="en_address">{{ __('Address (English)') }}</label>
                  <textarea id="en_address" class="form-control @error('en_address') is-invalid @enderror" name="en_address" required>{{ old('en_address', $branch->en_address) }}</textarea>
                  @error('en_address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group mb-4">
                  <label for="ar_address">{{ __('Address (Arabic)') }}</label>
                  <textarea id="ar_address" class="form-control @error('ar_address') is-invalid @enderror" name="ar_address" required>{{ old('ar_address', $branch->ar_address) }}</textarea>
                  @error('ar_address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <input type="hidden" name="latitude" value="{{ old('latitude', $branch->latitude) }}" id="latitude">
                <input type="hidden" name="longitude" value="{{ old('longitude', $branch->longitude) }}" id="longitude">

                <div id="phone-numbers">
                    <label>{{ __('Phone Numbers') }}</label>
                    @foreach($branch->phoneNumbers as $index => $phoneNumber)
                    <div class="form-group mb-4">
                        <select class="form-control" name="phone_numbers[{{ $index }}][title]" required>
                            <option value="whatsapp" {{ $phoneNumber->title == 'whatsapp' ? 'selected' : '' }}>Whatsapp</option>
                            <option value="mobile" {{ $phoneNumber->title == 'mobile' ? 'selected' : '' }}>Mobile</option>
                            <option value="landline" {{ $phoneNumber->title == 'landline' ? 'selected' : '' }}>Landline</option>
                            <option value="telegram" {{ $phoneNumber->title == 'telegram' ? 'selected' : '' }}>Telegram</option>
                        </select>
                        <input type="text" class="form-control" name="phone_numbers[{{ $index }}][phone_number]" placeholder="Phone Number" value="{{ old("phone_numbers.$index.phone_number", $phoneNumber->phone_number) }}" required>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-secondary" id="add-phone-number">{{ __('Add Phone Number') }}</button>
                <br>
                <br>
                <div id="map" style="height: 500px;width: 1000px;"></div>
                <div class="form-group mt-4">
                  <button type="submit" class="btn btn-primary">{{ __('Update Branch') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

<script>
  function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: {{ $branch->latitude }}, lng: {{ $branch->longitude }} },
      zoom: 13,
      mapTypeId: 'roadmap'
    });

    var marker = new google.maps.Marker({
      position: { lat: {{ $branch->latitude }}, lng: {{ $branch->longitude }} },
      map: map,
      title: 'Drag me!',
      draggable: true
    });

    google.maps.event.addListener(marker, 'dragend', function(event) {
      document.getElementById("latitude").value = this.getPosition().lat();
      document.getElementById("longitude").value = this.getPosition().lng();
    });
  }

  function handleLocationError(browserHasGeolocation, pos) {
    var content = browserHasGeolocation ?
      'Error: The Geolocation service failed.' :
      'Error: Your browser doesn\'t support geolocation.';
    var options = {
      map: map,
      position: pos,
      content: content
    };
    var infowindow = new google.maps.InfoWindow(options);
    map.setCenter(pos);
  }
  document.getElementById('add-phone-number').addEventListener('click', function() {
      var phoneNumbersDiv = document.getElementById('phone-numbers');
      var index = phoneNumbersDiv.children.length;
      var div = document.createElement('div');
      div.className = 'form-group mb-4';
      div.innerHTML = `
          <select class="form-control" name="phone_numbers[${index}][title]" required>
                      <option value="whatsapp">Whatsapp</option>
                      <option value="mobile">Mobile</option>
                      <option value="landline">Landline</option>
                      <option value="telegram">Telegram</option>
          </select>
          <input type="text" class="form-control" name="phone_numbers[${index}][phone_number]" placeholder="Phone Number" required>
      `;
      phoneNumbersDiv.appendChild(div);
  });

</script>
{{-- <script>
  ClassicEditor
      .create( document.querySelector( '#en_name' ) )
      .catch( error => {
          console.error( error );
      } );
  ClassicEditor
      .create( document.querySelector( '#ar_name' ) )
      .catch( error => {
          console.error( error );
      } );
  ClassicEditor
      .create( document.querySelector( '#en_address' ) )
      .catch( error => {
          console.error( error );
      } );
  ClassicEditor
      .create( document.querySelector( '#ar_address' ) )
      .catch( error => {
          console.error( error );
      } );
</script> --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc4op2z5AnCNM5hgYKl5M4mDsV_rILD4Y&libraries=places&callback=initAutocomplete&language=ar&region=EG" async defer></script>
@endsection

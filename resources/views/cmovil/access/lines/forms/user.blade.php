<option>{{trans('validation.attributes.briix.access.contracts.client_id_select')}}</option>

@if(!empty($clients))

  @foreach($clients as $key => $value)

    <option value="{{ $key }}">{{ $value }}</option>

  @endforeach

@endif
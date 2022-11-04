@foreach ($standards as $standard)
    <option value="{{ $standard->name }}">{{ $standard->board_name }}</option>
@endforeach

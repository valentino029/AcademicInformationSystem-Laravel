<option>--- Semesters ---</option>
@if(!empty($Semesters))
  @foreach($Semesters as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif
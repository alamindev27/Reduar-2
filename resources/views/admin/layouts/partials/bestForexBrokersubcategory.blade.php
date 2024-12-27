<option value="">Select Position</option>
@foreach ($subcategories as $subCategory)
    <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
@endforeach

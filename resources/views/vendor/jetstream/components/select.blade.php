<select name="community" id="community" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
    <option disabled selected>Select...</option>
    @foreach($communities as $_com)
        <option value="{{ $_com->id }}">{{ $_com->name }}</option>
    @endforeach
</select>

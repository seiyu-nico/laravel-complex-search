<form action="{{ route('pets.index') }}" method="get">
    <div>
        <span>name</span>:
        <input type="text" name="name|like" value="{{ request('name|like') }}">
    </div>
    <div>
        <span>size</span>:
        <label>小<input type="checkbox" name="size|in[]" value="0" @checked('0' === request('size|in.0'))></label>
        <label>中<input type="checkbox" name="size|in[]" value="1" @checked('1' === request('size|in.1'))></label>
        <label>大<input type="checkbox" name="size|in[]" value="2" @checked('2' === request('size|in.2'))></label>
    </div>
    <div>
        <span>price</span>:
        <input type="number" name="price|between[min]" value="{{ request('price|between.min') }}">~
        <input type="number" name="price|between[max]" value="{{ request('price|between.max') }}">
    </div>
    <div>
        <span>age</span>:
        <input type="text" name="age" value="{{ request('age') }}">
    </div>
    <button type="submit">search</button>
</form>

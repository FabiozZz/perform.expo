<div class="row">
        <div class="row">
            @foreach($data as $item)
                <div class="col-6 text-center">
{{--                    <a href="{{route($item->route)}}"></a><button class="btn btn-success" name="id" value="{{$item->id}}" type="submit">{{$item->category}}</button>--}}
                </div>
            @endforeach
        </div>
    </form>
</div>

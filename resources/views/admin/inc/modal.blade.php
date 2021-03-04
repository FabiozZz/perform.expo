<!-- Button trigger modal -->
<button type="button" id="modal" class="d-none btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <h5 class="modal-title">Выберете превью</h5>
                <div class="d-flex flex-row" id="change-preview"  style="overflow-x: auto;width: 100%;">
                    <form action="">
                    @method('post')
                    @csrf
                    @foreach($project->image as $image)

                        @isset($image)
                            <label for="{{$image->id}}preview"><input class="inputChecked d-none" type="radio" name="preview" id="{{$image->id}}preview" value="{{$image->name}}"><div class="inputImage" style='width: 100px;height: 100px; background-image: url({{asset('storage/images_project/'.$image->name)}});background-size: contain;background-position: center; background-repeat: no-repeat'></div></label>
                        @endisset
                    @endforeach
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" id="abort_preview" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="changePreview()" id="save_preview" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

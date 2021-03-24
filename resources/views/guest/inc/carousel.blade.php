
<style>

</style>
<div id="carouselId" class="text-center carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        $active = 'active';
        ?>
        @foreach($carousel as $project)
            @if(!$project->image->isEmpty())
                <li data-target="#carouselId" data-slide-to="{{$loop->index}}" class="{{$active}}"></li>
            @endif
            <?php
            $active = '';
            ?>
        @endforeach
    </ol>
    <div class="carousel-inner wh100" style="background-color: black" role="listbox">
        <?php
        $active = 'active';
        $i = 0;
        ?>

        @foreach($carousel as $project)
                <div class=" carousel-item ">
                    <div class="row">
                        @foreach($project->image as $image)
                            @if($image->carousel)
{{--                            @php--}}
{{--                                echo 'усть'--}}
{{--                            @endphp--}}
                                                                <div style='background-image: url("{{asset('storage/images_project/'.$project->id.'/'.$image->name)}}");
                                    background-position: center;
                                    background-size: cover' class="col-6 wh100">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <script>
                    $('.carousel-item').first().addClass('{{$active}}');
                </script>
            <?php
            $active = '';
            $i +=1;
            ?>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <div class="div"></div>
</div>
</div>


<script>
        $('carouselId').carousel();
</script>

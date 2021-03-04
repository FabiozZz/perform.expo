
<style>
    #carouselId *{
        padding: 0 -15px;
    }
    #carouselId {
        position: relative;
        max-width: 1700px;
        margin: auto;
    }
    .carousel-control-prev ,.carousel-control-next, .carousel-indicators{
        z-index: 6;
    }
    #carouselId::after {
        content: '';
        position: absolute;
        margin: auto;
        top: 0;
        left: 0;
        width: 100%;
        max-width: 1700px;
        background-image: linear-gradient(to top, black 10%,transparent);
        height: 100%;
        z-index: 1;
    }
    .wh100{
        width: 100%;
        max-width: 1700px;
        height: 100vh;
        max-height: 700px;
        margin: auto;

    }
    .div{
        background-color: black;
        width: 100px;
        height: 100px;
        position: absolute;
        z-index: 1;
        bottom: -50px;
        left: calc(50% - 50px);
        transform: rotate(45deg);
    }
</style>
<div id="carouselId" class="text-center carousel slide d-md-block d-none" data-ride="carousel">

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
        <script>
            window.onload = function () {
                $('.carousel-item').first().addClass('{{$active}}');
            };
        </script>
        @foreach($carousel as $project)
                @if(!$project->image->isEmpty())
                <div class=" carousel-item ">
                    <div class="row">
                        @foreach($project->image as $image)
                                @if($image->carousel)
                                <div style='background-image: url("{{asset('storage/images_project/'.$project->id.'/'.$image->name)}}");
                                    background-position: center;
                                    background-size: cover' class="col-6 wh100">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

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


<script>
    $('carouselId').carousel();
</script>

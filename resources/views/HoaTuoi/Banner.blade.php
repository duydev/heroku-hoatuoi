

<div class="nn-banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            @foreach( $banner as $b )

            <div class="item {{ $b == $banner[0] ? "active" : ""  }}">
                <img class="slide-image" src="{{ asset("Themes/Contents/img/banner/".$b->Ten_anh) }}" alt="">
            </div>

            @endforeach

        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    <!--end home banner-->         
</div>
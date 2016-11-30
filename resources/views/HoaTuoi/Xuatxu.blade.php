@foreach($xuatxu as $dm)
    <div class="nn-megamenu-sidebar" style="text-align:center; margin-bottom:auto">
                        <ul>
                            <li>
                                <a href="{{action('HoaTuoiController@Hoatheoxuatxu',['id' => $dm->Ma_DD]) }}" style="display:inline;">                                     
                                        <span class="col-md-1">                                       
                                        <img src="{{ asset("Themes/Contents/img/icon.png")}}" width="95" height="70">
                                        </span>
                                        <span class="col-md-9"><h5><strong>{{ $dm->Ten_DD }}</strong></h5></span>                                   
                                </a>
                            </li>
                        </ul>
    </div>
@endforeach
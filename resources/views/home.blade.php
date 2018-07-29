@extends('layouts.main')

@section('title', 'main')
@section('content')
    <div class="container container-tours">
        <section class="all-tours">
            <h1>Tours</h1>
            <div class="row">
                @if($tours)
                    @foreach($tours as $tour)
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="box-tour">
                        <h2>{{$tour->name}}</h2>
                        @if($tour->images)
                            @foreach($tour->images as $img)
                                @if($img->imagePriority == 1)
                                        <img src="{{asset('storage/'.$img->img)}}">
                                @endif
                            @endforeach
                        @endif
                        <a href="/{{$tour->slug}}" class="more">more</a>
                        <div class="description-tour">
                            <p>{{$tour->description_tour_way}}</p>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="#" class="btn-more-tours-here">More Tours Here >></a>
                </div>
            </div>
        </section>

    </div>
    <div class="box-message">
        <div class="heder-message">
            <div class="img-foto">
                <span>Dear guest, here you can ask us any questions about our tours<br/> Yours, Maria</span>
            </div>
            <div class="message-icon">
                <button class="icon-close"></button>
                <button class="icon-write"></button>
            </div>
        </div>
        <div class="body-message">
            <form action="#" method="post">
                <div>
                    <label>Your Email</label>
                    <input id="email-focus" type="text"/>
                </div>
                <div>
                    <label>Message</label>
                    <textarea></textarea>
                </div>
                <input type="submit" value="Send Massege">

            </form>
        </div>
    </div>
@endsection

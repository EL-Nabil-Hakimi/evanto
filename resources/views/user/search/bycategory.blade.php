@foreach ($events as $event)
<div class="col-12 col-sm-6 col-md-4" >
    <div class="next-event-wrap" >
        <span style="color: rgb(33, 56, 233)"><i class="bi bi-hourglass-split"></i>{{ $event->created_at->diffForHumans() }}</span>
        <figure>
            <a href="/soloevent?id={{$event->id}}"><img src="assets/images/{{ $event->image }}" alt="1"></a>
            @if($event->price == 0)
                    <div class="event-rating">Free</div>
            
            @else 
                    <div class="event-rating">{{$event->price}} DH</div>
            @endif
        </figure>

        <header class="entry-header">
            <h3 class="entry-title">{{$event->title}}</h3>

            <div class="posted-date"> {{ \Carbon\Carbon::parse($event->date)->format('l') }} <span>{{$event->date}}</span></div>
        </header>

        <div class="entry-content">
            <p>{{Str::Limit($event->description ,  90 , '...')}}.</p>
        </div>

    </div>
</div>

@endforeach
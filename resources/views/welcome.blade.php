{{-- @php
   use Carbon\Carbon;
   $dt = new Carbon;
   $dt->timezone('CET');
@endphp --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surfellow</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style-welcome.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="/js/script.js" defer></script>
    <script src="/js/modal.js" defer></script>
</head>
<body>
    <main>
        @auth
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn"> Log Out</button>
        </form>
        @endauth
        <section class="et-hero-tabs" id="home">
            <h1>SURFELLOW</h1>
            <h3>The band that will melt your heart and soul</h3>
            <div class="socials">
                {{-- <a href="#"><img src="/img/iconmonstr-facebook-5.svg" alt="facebook"></a> --}}
                <a href="https://www.instagram.com/surfellow/"><img src="/img/iconmonstr-instagram-5.svg" alt="instagram"></a>
            </div>
            <div class="et-hero-tabs-container">
              <a class="et-hero-tab" href="#home">Home</a>
              <a class="et-hero-tab" href="#events">Events</a>
              <a class="et-hero-tab" href="#hvezdicky">Hvezdicky</a>
              <a class="et-hero-tab" href="#feedback">Feedback</a>
              <a class="et-hero-tab" href="#muzika">Muzika</a>
              {{-- <a class="et-hero-tab" href="#socials">Socials</a> --}}
              <span class="et-hero-tab-slider"></span>
            </div>
          </section>

        <section id="events" class="events">
            @foreach ($events as $event)                
                <div class="event">
                    <div>Lokace: <a href="{{$event->link}}" target='_blank'>{{$event->place}}</a></div>
                    <div>Den: {{date('d.m.y', strtotime($event->dateTime))}}</div>
                    <div>Cas: {{date('H:i', strtotime($event->dateTime))}} PM</div>
                    <div>Adresa: {{$event->address}}</div>
                    @if ($event->entry > 0)
                        <div>Vstup: {{$event->entry}} CZK</div>
                        @else
                        <div>Vstup: Free</div>
                    @endif   
                </div>
            @endforeach
        </section>
        <div class="between">
            <h1 class="between__title">HVEZDICKY</h1>
        </div>
        <section id="hvezdicky" class="hvezdicky">
            <div class="mara">
                <span class="hvezdicky__span"><p class="hvezdicky__span-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam ipsam odio delectus enim cupiditate commodi possimus doloremque. Distinctio temporibus laboriosam deserunt accusantium placeat dolorum aspernatur, repellat, quibusdam, quod ea porro?</p></span>
            </div>
            <div class="veru">
                <span class="hvezdicky__span"><p class="hvezdicky__span-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam ipsam odio delectus enim cupiditate commodi possimus doloremque. Distinctio temporibus laboriosam deserunt accusantium placeat dolorum aspernatur, repellat, quibusdam, quod ea porro?</p></span>
            </div>
            <div class="kuba">
                <span class="hvezdicky__span"><p class="hvezdicky__span-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam ipsam odio delectus enim cupiditate commodi possimus doloremque. Distinctio temporibus laboriosam deserunt accusantium placeat dolorum aspernatur, repellat, quibusdam, quod ea porro?</p></span>
            </div>
        </section>
        <div class="between">
            <h1 class="between__title">FEEDBACK</h1>
        </div>
        <section id="feedback" class="feedback">
            <div class="feedback__list">>    
                @foreach ($feedbacks as $feedback)
                    <div class="feedback__item">
                        <p class="feedback__item_text">"{{$feedback->text}}"</p>
                        <p class="feedback__item_name"> - {{$feedback->name}}</p>
                        @auth
                        <form action="{{action('PageController@deletefeed', [$feedback->id])}}" method="post">
                            @method('delete')
                            @csrf
                        <button >Delete</button>
                        </form>   
                        @endauth
                    </div>
                @endforeach
            </div>
            <div class="modal__section">
                <!-- Trigger/Open The Modal -->
                <button id="myBtn" class="button">Vsechny komentare</button>

                <!-- The Modal -->
                <div id="myModal" class="modal">
                <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        @foreach ($feedbacks as $feedback)
                            <div class="feedback__item_modal">
                                <p class="feedback__item_text_modal">"{{$feedback->text}}"</p>
                                <p class="feedback__item_name_modal"> - {{$feedback->name}}</p>
                                @auth
                                <form action="{{action('PageController@deletefeed', [$feedback->id])}}" method="post">
                                    @method('delete')
                                    @csrf
                                <button >Delete</button>
                                </form>   
                                @endauth
                            </div>
                        @endforeach
                    </div>
                </div>    
            </div>
            <div class="feedback__form">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{action('PageController@feedback')}}" method="post">
                    @csrf
                    <label for="text">feedback</label>
                    <textarea name="text" cols="30" rows="1" style="resize: none" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'></textarea>
                    <label for="name">Jmeno</label>
                    <input type="text" name="name">
                    <button>poslat</button>
                </form>
            </div>    
        </section>
        <div class="between">
            <h1 class="between__title">MUZIKA</h1>
        </div>
        <section id="muzika" class="muzika">


        </section>

        {{-- <footer id="socials" class="footer">
            <div>instagram</div>
            <div>facebook</div>
        </footer> --}}

    </main>
</body>
</html>
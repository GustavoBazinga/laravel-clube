<button class="card position-relative" id="{{ $item->id }}">

  <div class="imagem-dividida cardSpamImage">
    <img src="{{ asset('storage/img/sports/' . $item->sport->image) }}" alt="balloon with an emoji face" class="card__img cardSpamImage">
    <img src="{{ asset('storage/img/professors/' . $item->professor->image) }}" alt="balloon with an emoji face" class="card__img cardSpamImage">
  </div>
  <span class="card__footer">
    <span class="cardSpamName">{{ $item->name }}</span>
    <span class="cardSpamDescription">{{ $item->professor->name }}</span>
  </span>
  <span class="notification-icon position-absolute top-0 end-0 ">
    <span class="notification-count bg-light text-dark"><b>{{ $item->slots }}</b></span> <!-- Substitua 10 pelo número de notificações -->
  </span>
  <p class="dataClass" style="visibility: hidden">{{ $item->sport->id }}/{{ $item->professor->id }}/{{ $item->day }}/{{ $item->hour }}</p>
</button>
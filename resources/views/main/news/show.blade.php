@extends('main.layouts.main')
@section('title', 'Новость')
@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="collapse navbar-collapse" id="edicaMainNav">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('main.news.index') }}">Все новости<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.popular.index') }}">Популярные</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.favorite.index') }}">Избранные новости</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.news.alike', $news->id) }}">Похожие новости</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Города</a>
                    <div class="dropdown-menu" aria-labelledby="blogDropdown">
                        @foreach($cities as $city)
                            <a class="dropdown-item" href="{{ route('main.city.index', $city->id) }}">{{ $city->title }}</a>
                        @endforeach
                    </div>
                </li>
                @auth()
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('personal.main.index') }}">Личный кабинет</a>
                    </li>
                @endauth
                @guest()
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Зайти</a>
                    </li>
                @endguest
                @can('view', auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="#">Админ панель</a>
                    </li>
                @endcan
            </ul>

        </div>
    </nav>
@endsection

@section('content')

    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title">{{ $news->title }}</h1>
            <p class="edica-blog-post-meta"  data-aos-delay="200">{{ $data->translatedFormat('F') }} {{ $data->day }}, {{ $data->year }}. {{ $data->format('H:i') }}</p>
            <section class="blog-post-featured-img" data-aos-delay="300">
                <img src="{{ asset('storage/' . $news->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section>
                <form action="{{ route('main.favorite.store', $news->id) }}" method="post">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent">

                        @auth()
                            @if(auth()->user()->relativeNews->contains($news->id))
                                <i class="fas fa-heart"></i>
                            @else
                                <i class="far fa-heart"></i>
                            @endif
                        @endauth
                        @guest()
                            @if($news->isRelated)
                                <i class="fas fa-heart disabled"></i>
                            @else
                                <i class="far fa-heart disabled"></i>
                            @endif
                        @endguest
                    </button>
                </form>
            </section>
            <section class="post-content mb-3">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $news->content !!}
                    </div>
                </div>
            </section>
        </div>
    </main>

@endsection

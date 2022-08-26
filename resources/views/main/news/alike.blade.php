@extends('main.layouts.main')
@section('title', 'Похожие новости')
@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="collapse navbar-collapse" id="edicaMainNav">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('main.news.index') }}">Все новости<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.popular.index') }}">Популярные</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.favorite.index') }}">Избранные новости</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Города</a>
                    <div class="dropdown-menu" aria-labelledby="blogDropdown">
                        @foreach($cities as $city)
                            <a class="dropdown-item"
                               href="{{ route('main.city.index', $city->id) }}">{{ $city->title }}</a>
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
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title">Похожие посты ({{ $news->type->type_news }})</h1>
            @if($alikeNews->count() > 0)
                <section class="featured-posts-section">
                    <div class="row">
                        @foreach($alikeNews as $n)
                            <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ asset('storage/' . $n->preview_image ) }}" alt="blog post">
                                </div>
                                <p class="blog-post-category">{{ $n->city->title }}</p>
                                <a href="{{ route('main.news.show', $n->id) }}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $n->title }}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
            @else
                <h2>
                    Нету похожих новостей!
                </h2>
            @endif

        </div>
    </main>
@endsection


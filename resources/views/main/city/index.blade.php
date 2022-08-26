@extends('main.layouts.main')
@section('title', 'Новости города')
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

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Города</a>
                    <div class="dropdown-menu" aria-labelledby="blogDropdown">
                        @foreach($cities as $c)
                            <a class="dropdown-item" href="{{ route('main.city.index', $c->id) }}">{{ $c->title }}</a>
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
                    <a class="nav-link" href="{{ route('admin.main.index') }}">Админ панель</a>
                </li>
                @endcan





            </ul>

        </div>
    </nav>
@endsection

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Новости {{ $city->title }}</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($news as $n)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $n->preview_image ) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $n->city->title }}</p>
                                @auth()
                                    <form action="{{ route('main.favorite.store', $n->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="border-0 bg-transparent">


                                            @if(auth()->user()->relativeNews->contains($n->id))
                                                <i class="fas fa-heart"></i>
                                            @else
                                                <i class="far fa-heart"></i>
                                            @endif


                                        </button>
                                    </form>
                                @endauth
                                @guest()
                                    @if($n->isRelated)
                                        <i class="fas fa-heart disabled"></i>
                                    @else
                                        <i class="far fa-heart disabled"></i>
                                    @endif
                                @endguest
                            </div>
                            <a href="{{ route('main.news.show', $n->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $n->title }}</h6>
                            </a>
                        </div>
                    @endforeach

                </div>

            </section>
            <h4 class="edica-page-title" data-aos="fade-up">Новости из других городов</h4>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($newsOtherCity as $nw)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $nw->preview_image ) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $nw->city->title }}</p>
                                @auth()
                                    <form action="{{ route('main.favorite.store', $nw->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="border-0 bg-transparent">


                                            @if(auth()->user()->relativeNews->contains($nw->id))
                                                <i class="fas fa-heart"></i>
                                            @else
                                                <i class="far fa-heart"></i>
                                            @endif


                                        </button>
                                    </form>
                                @endauth
                                @guest()
                                    @if($nw->isRelated)
                                        <i class="fas fa-heart disabled"></i>
                                    @else
                                        <i class="far fa-heart disabled"></i>
                                    @endif
                                @endguest
                            </div>
                            <a href="{{ route('main.news.show', $nw->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $nw->title }}</h6>
                            </a>
                        </div>
                    @endforeach

                </div>

            </section>
        </div>
    </main>
@endsection

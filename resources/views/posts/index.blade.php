@extends('layouts.main')
@section('navBar')

    <main>
        <section class="py-5 text-center container ">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Index page</h1>
                    <p class="lead text-muted">Список постов</p>
                </div>
            </div>
        </section>
        <div style="background-image: url('https://look.com.ua/pic/201209/2560x1600/look.com.ua-36303.jpg');">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-1">
                        <div class="album py-3 ">
                            <div class="container ">
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <img
                                            src="{{$post->image}}"
                                            class="bd-placeholder-img card-img-top" alt="">
                                        <div class="card-body">
                                            <h5 class="card-text">{{$post->name}}</h5>
                                            <h5 class="card-text">{{$post->description}}</h5>
                                            <div class="d-flex justify-content-between align-items-center ">
                                                <div class="btn-group rounded-3 ">
                                                    <a href="{{route('posts.show', $post->id)}}" type="button"
                                                       class="text-center btn btn-sm btn-outline-secondary p-3 ">Описание
                                                        поста
                                                    </a>
                                                </div>
                                                <small class="text-muted rounded-3">Дата
                                                    выхода:{{$post->created_at}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($loop->iteration % 3 == 0)
            </div>
            <div class="row">
                @endif
                @endforeach
                {{$posts->links()}}

            </div>
        </div>
    </main>
@endsection

@extends('layouts.main')
@section('navBar')
    <body>
    <main>
        <section class="py-5 text-center container ">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Show page</h1>
                    <p class="lead text-muted">{{$post->name}}</p>
                </div>
            </div>
        </section>
        <div
            style="background-image: url('https://catherineasquithgallery.com/uploads/posts/2021-02/1614257532_3-p-sploshnoi-chernii-fon-4.jpg');">
            <div class="row">
                <div class="album py-3 ">
                    <div class="container ">
                        <div class="col">
                            <div class="card shadow-sm">
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{$post->image}}" class="d-block w-100" alt="...">
                                        </div>

                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Предыдущий</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Следующий</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-text">{{$post->name}}</h5>
                                    <h6 class="card-text">Содержание поста: {{$post->body}}</h6>
                                </div>
                            </div>

                            @foreach($post->comments as $comment)
                                <div class="card-body" style="background-color: #f8f9fa;">
                                    <div class="d-flex flex-start align-items-center">
                                        <img class="rounded-circle shadow-1-strong me-3"
                                             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                             alt="avatar"
                                             width="60"
                                             height="60"/>
                                        <div>
                                            <h6 class="fw-bold text-primary mb-1">{{$comment->user->name}}</h6>
                                            <p class="text-muted small mb-0">{{$comment->created_at}}</p>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-4 pb-2">{{$comment->message}}</p>
                                </div>
                            @endforeach
                            @guest()
                                <a type="button" href="{{route('login')}}" class="btn btn-light btn-rounded">Чтобы комментарий авторизуйтесь.</a>
                            @endguest
                            @auth('web')
                                <form action="{{route('posts.comment')}}" method="post">
                                    @csrf
                                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                        <div class="d-flex flex-start w-100">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                 src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                                 alt="avatar"
                                                 width="40"
                                                 height="40"/>
                                            <div class="form-outline w-100">
                <textarea name="message" class="form-control" id="textAreaExample" rows="4"
                          style="background: #fff;"></textarea>
                                            </div>
                                        </div>
                                        <div class="float-end mt-2 pt-1">
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                                        </div>
                                    </div>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
    </body>
    </html>

@endsection

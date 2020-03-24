@extends('layouts.frontend')
@section('content')
<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{ $title }}</h1>
    </div>
</div>


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img src="{{ $post->featured }}" alt="seo">
                    </div>

                    <div class="post__content">


                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                Posted by

                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">Admin</a>
                                </div>

                            </div>

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{ $post->created_at->toFormattedDateString() }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('single_category', ['id'=> $post->category->id]) }}">{{ $post->category->name }}</a>
                              
                            </span>

                        </div>

                        <div class="post__content-info">

                           

                            {!! $post->content !!}

                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                    @foreach($post->tags as $tag )
                                        <a href="#" class="w-tags-item">{{ $tag->tag }}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="socials text-center"><div class="addthis_inline_share_toolbox"></div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{ asset($post->user->profile->avatar) }}" alt="Author" height="100px" width="100px">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{ $post->user->name }}</h5>
                            <p class="author-info">SEO Specialist</p>
                        </div>
                        <p class="text">{{ $post->user->profile->about }}
                        </p>
                        <div class="socials">

                            <a href="{{ $post->user->profile->facebook }}" class="social__item" target="_blank">
                                <img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{ asset('app/svg/twitter.svg') }}" alt="twitter">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{ asset('app/svg/google.svg') }}" alt="google">
                            </a>

                            <a href="{{ $post->user->profile->youtube }}" class="social__item" target="_blank">
                                <img src="{{ asset('app/svg/youtube.svg') }}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">

                    
                    @if ($previous)
                        <a href="{{ route('single_page', ['slug' => $previous->slug]) }}" class="btn-next-wrap">
                            <div class="btn-content">
                                <div class="btn-content-title">Next Post</div>
                                <p class="btn-content-subtitle">Duis Autem Velius</p>
                            </div>
                            <svg class="btn-next">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        </a>
                    @endif
                   
                      @if($next)
                        <a href="{{ route('single_page', ['slug' => $next->slug]) }}" class="btn-prev-wrap">
                            <svg class="btn-prev">
                                <use xlink:href="#arrow-left"></use>
                            </svg>
                            <div class="btn-content">
                                <div class="btn-content-title">Previous Post</div>
                                <p class="btn-content-subtitle">{{ $next->title }}</p>
                            </div>
                        </a>
                    @endif

                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                        @include('includes.disqus')
                    </div>
                </div>

                <div class="row">

                </div>


            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->
            <br><br>
            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">
                            @foreach ($tags as $tag)
                                <a href="{{ route('single_tag', ['id' => $tag->id]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                            @endforeach
                            
                            
                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
</div>
<!-- End Stunning Header -->
@endsection
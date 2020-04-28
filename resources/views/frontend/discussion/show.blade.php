@extends('frontend/layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" class="rel">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
@endsection
@section('header')
    @include('frontend/inc/header')
@endsection
@section('section')

            <div class="tt-single-topic-list">
                <div class="tt-item">
                    <div class="tt-single-topic">
                        <div class="tt-item-header">
                            <div class="tt-item-info info-top">
                                <div class="tt-avatar-icon">
                                  {{$discussion->user->image ?? Gravatar::src('surajfromleo@gmail.com')}}
                                </div>
                                <div class="tt-avatar-title">
                                    <a href="">{{$discussion->user->name}}</a>
                                </div>
                                <a href="#" class="tt-info-time">
                                 {{\Carbon\Carbon::parse($discussion->created_at)->format('d/m/Y')}}
                                </a>
                            </div>
                            <h3 class="tt-item-title">
                               {{$discussion->title}}
                            </h3>
                            <div class="tt-item-tag">
                                <ul class="tt-list-badge">
                                    <li><a href="#"><span class="tt-color03 tt-badge">{{$discussion->category->name}}</span></a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="tt-item-description">
                            {!! $discussion->contents !!}
                        </div>
                        <div class="tt-item-info info-bottom">
                            <a href="#" class="tt-icon-btn">
                                <i class="fas fa-thumbs-up"></i>
                                <span class="tt-text">{{$discussion->like}}</span>
                            </a>
                            <a href="#" class="tt-icon-btn">

                                <i class="fas fa-thumbs-down"></i>
                                <span class="tt-text">{{$discussion->dislike}}</span>
                            </a>
                            <a href="#" class="tt-icon-btn">
                                <i class="fas fa-heart"></i>
                                <span class="tt-text">12</span>
                            </a>
                            <div class="col-separator"></div>

                        </div>
                    </div>
                </div>

                <div class="row-object-inline form-default">
                    <h2 class="text-capitalize">
                    <span class="badge badge-primary">REPLIES </span>
                    </h2>
                </div>

                <div class="tt-item">
                    <div class="tt-single-topic">
                        <div class="tt-item-header pt-noborder">
                            <div class="tt-item-info info-top">
                                <div class="tt-avatar-icon">

                                </div>
                                <div class="tt-avatar-title">
                                    <a href="#">tesla02</a>
                                </div>
                                <a href="#" class="tt-info-time">
                                    <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>6 Jan,2019
                                </a>
                            </div>
                        </div>
                        <div class="tt-item-description">
                            Finally!<br>
                            Are there any special recommendations for design or an updated guide that includes new preview sizes, including retina displays?
                        </div>
                        <div class="tt-item-info info-bottom">
                            <a href="#" class="tt-icon-btn">

                                <span class="tt-text">671</span>
                            </a>
                            <a href="#" class="tt-icon-btn">

                                <span class="tt-text">39</span>
                            </a>
                            <a href="#" class="tt-icon-btn">

                                <span class="tt-text">12</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>


            <div class="tt-wrapper-inner">
                <div class="pt-editor form-default">
                    <h6 class="pt-title">Post Your Reply</h6>
                    <div class="form-group">
                        <input id="reply" type="hidden" name="reply" value="">
                        <trix-editor input="reply" placeholder="Lets get started">
                        </trix-editor>
                    </div>
                    <div class="pt-row">
                        <div class="col-auto">
                            <a href="#" class="btn btn-secondary btn-width-lg">Reply</a>
                        </div>
                    </div>
                </div>
            </div>


    @endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
<script>

</script>